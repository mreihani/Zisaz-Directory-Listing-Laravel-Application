<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Licenses;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\Licenses\PrivateSitelicenseImagesValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;
    
    public $isHidden;
    public $headerDescription;

    // license images repeater form
    public $itemImages;
    public $itemTitle;
    public $itemInputs;
    public $itemIteration;

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'itemTitle.*' => 'required_if:isHidden,==,false',
            'itemImages.*' => new PrivateSitelicenseImagesValidationRule($this->isHidden),
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا شرح مجوز ها و افتخارات را وارد نمایید.',
        'itemTitle.*.required_if' => 'لطفا عنوان مجوز را وارد نمایید.',
    ];

    public function mount() {
        $this->loadInitialValues();
    }

    private function loadInitialValues() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);

            $this->isHidden = (!is_null($psite->licenses) && $psite->licenses->is_hidden == 1) ? true : false;
            $this->headerDescription = is_null($psite->licenses) ? "" : $psite->licenses->header_description; 

            // licnese images repeater form
            $this->getRepeaterInitialValues($psite);
        }
    }

    private function getRepeaterInitialValues($psite) {
        if(is_null($psite->licenses) || (!is_null($psite->licenses) && count($psite->licenses->psiteLicenseItem) === 0)) {
            $this->itemImages = [null];
            $this->itemTitle = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
        } elseif(!is_null($psite->licenses) && count($psite->licenses->psiteLicenseItem) > 0) {
            $this->itemImages = $psite->licenses->psiteLicenseItem->pluck('item_image')->toArray();
            $this->itemTitle = $psite->licenses->psiteLicenseItem->pluck('item_description')->toArray();
            $this->itemInputs = $psite->licenses->psiteLicenseItem->keys()->toArray();
            $this->itemIteration = $psite->licenses->psiteLicenseItem->count();
        }
    }

    // license images repeater form
    private function handleImageUpload($psite, $licenses) {
        
        if(count($this->itemImages) == 0) {
            return;
        }
        
        $dir = 'upload/private-website-resources/' . $psite->id . '/licenses';

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
                $img = Image::make($value)->fit(416, 416)->encode('jpg');
                $image_path = $dir . '/' . $filename;
                Storage::disk('public')->put($image_path, $img);

                $licenses->psiteLicenseItem()->create([
                    'item_image' => 'storage/upload/private-website-resources/' . $psite->id . '/licenses' . '/' . $filename,
                    'item_description' => Purify::clean(trim($this->itemTitle[$key])),
                ]);
            } else {
                // this is for items already stored in the database and server
                $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
                $items = $psite->licenses->psiteLicenseItem;
               
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
                        if(isset($this->itemTitle[$itemKey])) {
                            $item->update([
                                'item_description' => Purify::clean(trim($this->itemTitle[$itemKey])),
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
            $this->itemTitle[$itemIteration] = null;
            $this->itemIteration = $itemIteration + 1;
            array_push($this->itemInputs, $itemIteration);
        }
    }
    public function removeItem($itemKey) {
        if(count($this->itemInputs) > 1) {
            unset($this->itemInputs[$itemKey]);    
            unset($this->itemTitle[$itemKey]);     
            unset($this->itemImages[$itemKey]);    
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 6, 
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
            $licenses = $psite->licenses()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $licenses = $psite->licenses()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);

            //save licenses into DB
            $this->handleImageUpload($psite, $licenses);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 8, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.licenses.index');
    } 
}
