<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\Testimonials;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\Testimonials\PrivateSiteTestimonialsImagesValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;
    
    public $isHidden;
    public $headerDescription;

    // team images repeater form
    public $itemImages;
    public $itemFullname;
    public $itemDescription;
    public $itemInputs;
    public $itemIteration;

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'itemFullname.*' => 'required_if:isHidden,==,false',
            'itemDescription.*' => 'required_if:isHidden,==,false',
            'itemImages.*' => new PrivateSiteTestimonialsImagesValidationRule($this->isHidden),
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا توضیحات اعضای تیم خود را وارد نمایید.',
        'itemFullname.*.required_if' => 'لطفا نام شخص را وارد نمایید.',
        'itemDescription.*.required_if' => 'لطفا سمت شخص را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;

        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->testimonials) && $psite->testimonials->is_hidden == 1) ? true : false;
            $this->headerDescription = is_null($psite->testimonials) ? "" : $psite->testimonials->header_description; 

            // testimonials repeater form
            $this->getRepeaterInitialValues($psite);
        }
    }

    private function getRepeaterInitialValues($psite) {
        if(is_null($psite->testimonials) || (!is_null($psite->testimonials) && count($psite->testimonials->psiteTestimonialItem) === 0)) {
            $this->itemImages = [null];
            $this->itemFullname = [null];
            $this->itemDescription = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
        } elseif(!is_null($psite->testimonials) && count($psite->testimonials->psiteTestimonialItem) > 0) {
            $this->itemImages = $psite->testimonials->psiteTestimonialItem->pluck('item_image')->toArray();
            $this->itemFullname = $psite->testimonials->psiteTestimonialItem->pluck('item_fullname')->toArray();
            $this->itemDescription = $psite->testimonials->psiteTestimonialItem->pluck('item_description')->toArray();
            $this->itemInputs = $psite->testimonials->psiteTestimonialItem->keys()->toArray();
            $this->itemIteration = $psite->testimonials->psiteTestimonialItem->count();
        }
    }

    // team images repeater form
    private function handleImageUpload($psite, $testimonials) {
        
        if(count($this->itemImages) == 0) {
            return;
        }
        
        $dir = 'upload/private-website-resources/' . $psite->id . '/testimonials';

        foreach ($this->itemImages as $key => $value) {
            
            // allow only 6 items
            if($key > 6) {
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
                $img = Image::make($value)->fit(100, 100)->encode('jpg');
                $image_path = $dir . '/' . $filename;
                Storage::disk('public')->put($image_path, $img);

                $testimonials->psiteTestimonialItem()->create([
                    'item_image' => 'storage/upload/private-website-resources/' . $psite->id . '/testimonials' . '/' . $filename,
                    'item_fullname' => Purify::clean(trim($this->itemFullname[$key])),
                    'item_description' => Purify::clean(trim($this->itemDescription[$key])),
                ]);
            } else {
                // this is for items already stored in the database and server
                $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
                $items = $psite->testimonials->psiteTestimonialItem;
               
                // delete items from DB and server
                foreach ($items as $itemKey => $item) {
                    if(!in_array($item->item_image, $this->itemImages)) {
                        // here delete item from database
                        $item->delete();

                        // here remove image from server disk
                        unlink($item->item_image);
                    } else {
                        // here it updates the description field without any image change
                        // but first, itemKey needs to be checked of available since one element can be deleted by the user
                        if(isset($this->itemFullname[$itemKey]) && isset($this->itemDescription[$itemKey])) {
                            $item->update([
                                'item_fullname' => Purify::clean(trim($this->itemFullname[$itemKey])),
                                'item_description' => Purify::clean(trim($this->itemDescription[$itemKey])),
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function addItem($itemIteration) {
        if(count($this->itemInputs) < 6) { 
            $this->itemImages[$itemIteration] = null;
            $this->itemFullname[$itemIteration] = null;
            $this->itemDescription[$itemIteration] = null;
            $this->itemIteration = $itemIteration + 1;
            array_push($this->itemInputs, $itemIteration);
        }
    }
    
    public function removeItem($itemKey) {
        if(count($this->itemInputs) > 1) {
            unset($this->itemInputs[$itemKey]);    
            unset($this->itemImages[$itemKey]);   
            unset($this->itemFullname[$itemKey]);     
            unset($this->itemDescription[$itemKey]);     
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 9, 
        );
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);

        if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    public function changeDisplayStatus() {
        //
    }

    public function save() {  
       
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);

        $psite->update([
            'verify_status' => 'pending'
        ]);
        
        if($this->isHidden) {
            $testimonials = $psite->testimonials()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $testimonials = $psite->testimonials()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);

            //save testimonials into DB
            $this->handleImageUpload($psite, $testimonials);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 11, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.website-sections.testimonials.index');
    } 
}
