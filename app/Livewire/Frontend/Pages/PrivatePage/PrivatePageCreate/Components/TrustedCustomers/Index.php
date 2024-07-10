<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\TrustedCustomers;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\TrustedCustomers\PrivateSiteTrustedCustomersImagesValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;
    
    public $isHidden;
    public $headerDescription;

    // repeater form
    public $itemImages;
    public $itemInputs;
    public $itemIteration;

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'itemImages.*' => new PrivateSiteTrustedCustomersImagesValidationRule($this->isHidden),
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا توضیحات مشتریان مورد اعتماد خود را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->trustedCustomer) && $psite->trustedCustomer->is_hidden == 1) ? true : false;
            $this->headerDescription = is_null($psite->trustedCustomer) ? "" : $psite->trustedCustomer->header_description; 

            // repeater form
            $this->getRepeaterInitialValues($psite);
        }
    }

    private function getRepeaterInitialValues($psite) {
        if(is_null($psite->trustedCustomer) || (!is_null($psite->trustedCustomer) && count($psite->trustedCustomer->psiteTrustedCustomerItem) === 0)) {
            $this->itemImages = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
        } elseif(!is_null($psite->trustedCustomer) && count($psite->trustedCustomer->psiteTrustedCustomerItem) > 0) {
            $this->itemImages = $psite->trustedCustomer->psiteTrustedCustomerItem->pluck('item_image')->toArray();
            $this->itemInputs = $psite->trustedCustomer->psiteTrustedCustomerItem->keys()->toArray();
            $this->itemIteration = $psite->trustedCustomer->psiteTrustedCustomerItem->count();
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 11, 
        );
    }

    // itemr images repeater form
    private function handleImageUpload($psite, $trustedCustomers) {
        
        if(count($this->itemImages) == 0) {
            return;
        }
        
        $dir = 'upload/private-website-resources/' . $psite->id . '/trusted-customers';

        foreach ($this->itemImages as $key => $value) {
            
            // allow only 9 items
            if($key > 9) {
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
                $img = Image::make($value)->fit(200, 200)->encode('jpg');
                $image_path = $dir . '/' . $filename;
                Storage::disk('public')->put($image_path, $img);

                $trustedCustomers->psiteTrustedCustomerItem()->create([
                    'item_image' => 'storage/upload/private-website-resources/' . $psite->id . '/trusted-customers' . '/' . $filename,
                ]);
            } else {
                // this is for items already stored in the database and server
                $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
                $items = $psite->trustedCustomer->psiteTrustedCustomerItem;
               
                // delete items from DB and server
                foreach ($items as $itemKey => $item) {
                    if(!in_array($item->item_image, $this->itemImages)) {
                        // here delete item from database
                        $item->delete();

                        // here remove image from server disk
                        unlink($item->item_image);
                    } 
                }
            }
        }
    }

    public function addItem($itemIteration) {
        if(count($this->itemInputs) < 9) { 
            $this->itemImages[$itemIteration] = null;
            $this->itemIteration = $itemIteration + 1;
            array_push($this->itemInputs, $itemIteration);
        }
    }
    public function removeItem($itemKey) {
        if(count($this->itemInputs) > 1) {
            unset($this->itemInputs[$itemKey]);    
            unset($this->itemImages[$itemKey]);    
        }
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
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
        if($this->isHidden) {
            $trustedCustomers = $psite->trustedCustomer()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $trustedCustomers = $psite->trustedCustomer()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);

            //save trustedCustomers into DB
            $this->handleImageUpload($psite, $trustedCustomers);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 13, 
        );

        // Show Toaster
        // $this->dispatch('showToaster', 
        //     title: '', 
        //     message: '
        //         اطلاعات با موفقیت ذخیره شد.
        //     ', 
        //     type: 'bg-success'
        // );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.trusted-customers.index');
    } 
}
