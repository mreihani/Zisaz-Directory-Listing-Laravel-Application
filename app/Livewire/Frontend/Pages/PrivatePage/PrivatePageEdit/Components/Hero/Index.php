<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\Hero;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\Hero\PrivateSiteSliderImagesValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;

    public $businessType;
    public $slug;
    public $title;
    public $description;
    public $showPromotionalVideo;
    public $color;

    // slider images repeater form
    public $slideImages;
    public $slideInputs;
    public $slideIteration;

    protected function rules() {
        return [
            'businessType' => 'required',
            'slug' => ['required', 'string', 'regex:/^[A-z0-9\- ]+$/', Rule::unique('psites')->ignore($this->privateSiteId, 'id')],
            'title' => 'required',
            'description' => 'required',
            'slideImages.*' => new PrivateSiteSliderImagesValidationRule(),
        ];
    }
    
    protected $messages = [
        'businessType.required' => 'لطفا نوع کسب و کار خود را انتخاب نمایید.',
        'slug.required' => 'لطفا اسلاگ را وارد نمایید.',
        'slug.string' => 'لطفا اسلاگ صحیح را وارد نمایید.',
        'slug.regex' => 'لطفا اسلاگ را به انگلیسی با حروف لاتین وارد نمایید.',
        'slug.unique' => 'این عبارت قبلا در سامانه ثبت شده است. لطفا عبارت دیگری انتخاب نمایید.',
        'title.required' => 'لطفا شعار کسب و کار خود را وارد نمایید.',
        'description.required' => 'لطفا توضیحات کسب و کار خود را وارد نمایید.',
    ];

    public function mount() {
        // load form initial inputs based on create or update mode
        $this->loadInitialValues();
    }

    private function loadInitialValues() {
        if(is_null($this->privateSiteId)) {
            $this->businessType = '';
            $this->title = '';

            $this->color = "#155BD5";

            // slider images repeater form
            $this->slideImages = [null];
            $this->slideInputs = [0];
            $this->slideIteration = 1;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);

            $this->businessType = $psite->business_type;
            $this->color = $psite->color;
            $this->slug = $psite->slug;

            $this->title = $psite->hero->title;
            $this->description = $psite->hero->description;
            $this->showPromotionalVideo = $psite->hero->is_video_displayed ? true : false;

            // slider images repeater form
            $this->slideImages = $psite->hero->psiteHeroSliders->pluck('slider_image')->toArray();
            $this->slideInputs = $psite->hero->psiteHeroSliders->keys()->toArray();
            $this->slideIteration = $psite->hero->psiteHeroSliders->count();
        }
    }

    private function getColor() {
        $allowedColorsArray = [
            '#155BD5',
            '#424242',
            '#830B0B', 
            '#593803', 
            '#2E4502',
            '#044E08',
            '#03474A',
            '#042495',
            '#5E08A9',
            '#7B0968',
            '#850A39',
            '#730E13',
            '#89060C'
        ];

        if(in_array($this->color, $allowedColorsArray)) {
            return $this->color;
        } else {
            return "#155BD5";
        }
    }

    // slider images repeater form
    private function handleSlideUpload($psite, $hero) {
        
        if(count($this->slideImages) == 0) {
            return;
        }
        
        $dir = 'upload/private-website-resources/' . $psite->id . '/hero';

        // for more than 1 item iteration
        foreach ($this->slideImages as $key => $value) {
        
            // allow only 5 slides
            if($key > 5) {
                break;
            }

            // do not allow empty input files
            if(!isset($value)) {
                continue;
            }

            // check if new image is being sent, images from database have type of string
            if(!is_string($value)) {
                $unique_image_name = hexdec(uniqid());
                $filename = $unique_image_name . '.' . 'jpg';
                $img = Image::make($value)->fit(1000, 800)->encode('jpg');
                $image_path = $dir . '/' . $filename;
                Storage::disk('public')->put($image_path, $img);

                $hero->psiteHeroSliders()->create([
                    'slider_image' => 'storage/upload/private-website-resources/' . $psite->id . '/hero' . '/' . $filename,
                ]);
            } else {
                
                // this is for items already stored in the database and server
                $psite = Psite::findOrFail($this->privateSiteId);
                $slides = $psite->hero->psiteHeroSliders;
               
                // delete items from DB and server
                foreach ($slides as $slideItem) {
                    if(!in_array($slideItem->slider_image, $this->slideImages)) {
                        // here delete item from database
                        $slideItem->delete();

                        // here remove image from server disk
                        unlink($slideItem->slider_image);
                    }
                }
            }
        }
    }
    public function addSlide($slideIteration) {
        if(count($this->slideInputs) < 5) { 
            $this->slideImages[$slideIteration] = null;
            $this->slideIteration = $slideIteration + 1;
            array_push($this->slideInputs, $slideIteration);
        }
    }
    public function removeSlide($slideKey) {
        if(count($this->slideInputs) > 1) {
            unset($this->slideInputs[$slideKey]);    
            unset($this->slideImages[$slideKey]);    
        }
    }


    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {

        // in this case, the user is submitting a new private website
        if(is_null($this->privateSiteId)) {
            $psite = auth()->user()->privateSite()->create([
                'business_type' => Purify::clean($this->businessType),
                'slug' => strtolower(str_replace(' ', '-', Purify::clean(trim($this->slug)))),
                'color' => $this->getColor(),
            ]);

        // in this case, the user has already submitted a private website, and is trying to edit that
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);

            // the user is trying to edit a private website that does not belong to himself/herself
            if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
                abort(403);
            } 

            // update incoming inputs
            $psite->update([
                'business_type' => Purify::clean($this->businessType),
                'slug' => strtolower(str_replace(' ', '-', Purify::clean(trim($this->slug)))),
                'color' => $this->getColor(),
            ]);
        }
       
        // the user has finally authorized to edit a private website item that belongs to himself/herself
        return $psite;
    }

    public function save() {  
        
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);
        
        $hero = $psite->hero()->updateOrCreate([
            'psite_id' => $psite->id
        ],[
            'title' => Purify::clean(trim($this->title)),
            'description' => Purify::clean(trim($this->description)),
            'is_video_displayed' => $this->showPromotionalVideo == true ? 1 : 0,
        ]);
        
        //save slides into DB
        $this->handleSlideUpload($psite, $hero);

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 2, 
        );

        $this->dispatch('privateSiteId', 
            privateSiteId: $psite->id, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.website-sections.hero.index');
    } 
}
