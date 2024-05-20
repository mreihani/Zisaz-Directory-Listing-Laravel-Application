<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Hero;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Stevebauman\Purify\Facades\Purify;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
    public $slides;
    public $slideImages;
    public $slideInputs;
    public $slideIteration;

    protected function rules() {
        return [
            'businessType' => 'required',
            'slug' => "required|string|regex:/^[A-z0-9\- ]+$/|unique:psites,slug",
            'title' => 'required',
            'description' => 'required',
            'slideImages.*' => 'required|mimes:jpg,jpeg,png,bmp|max:4096',
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
        'slideImages.*.required' => 'لطفا تصویر اسلاید را بارگذاری نمایید.',
        'slideImages.*.mimes' => 'لطفا تصویر با فرمت مجاز را بارگذاری نمایید.',
        'slideImages.*.max' => 'حجم تصویر بیشتر از مقدار مجاز است.',
    ];

    public function mount() {
        $this->businessType = "";

        // slider images repeater form
        $this->slides = false;
        $this->slideImages = [null];
        $this->slideInputs = [0];
        $this->slideIteration = 1;

        $this->color = "#155bd5";
    }

    // slider images repeater form
    private function handleSlideUpload($psite, $hero) {
        if(count($this->slideImages) == 0) {
            return;
        }
       
        $dir = 'upload/private-website-resources/' . $psite->id . '/hero';

        foreach ($this->slideImages as $key => $value) {
            
            if($key > 6 || !isset($value)) {
                break;
            }

            $unique_image_name = hexdec(uniqid());
            $filename = $unique_image_name . '.' . 'jpg';
            $img = Image::make($value)->fit(1000, 800)->encode('jpg');
            $image_path = $dir . '/' . $filename;
            Storage::disk('public')->put($image_path, $img);

            $hero->psiteHeroSliders()->create([
                'slider_image' => 'storage/upload/private-website-resources/' . $psite->id . '/hero' . '/' . $filename,
            ]);
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

    public function save() {  
     
        $this->validate();

        $psite = auth()->user()->privateSite()->create([
            'business_type' => Purify::clean($this->businessType),
            'slug' => strtolower(str_replace(' ', '-', Purify::clean(trim($this->slug)))),
            'color' => Purify::clean($this->color),
        ]);
        
        $hero = $psite->hero()->create([
            'title' => Purify::clean(trim($this->title)),
            'description' => Purify::clean($this->description),
            'is_video_displayed' => $this->showPromotionalVideo == true ? 1 : 0,
        ]);
        
        //save addresses into DB
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
        return view('frontend.pages.private-page.private-page-create.components.website-sections.hero.index');
    } 
}
