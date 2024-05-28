<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Members;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\Members\PrivateSiteMemberImagesValidationRule;

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
    public $itemRole;
    public $itemInputs;
    public $itemIteration;

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'itemFullname.*' => 'required_if:isHidden,==,false',
            'itemRole.*' => 'required_if:isHidden,==,false',
            'itemImages.*' => new PrivateSiteMemberImagesValidationRule($this->isHidden),
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا توضیحات اعضای تیم خود را وارد نمایید.',
        'itemFullname.*.required_if' => 'لطفا نام شخص را وارد نمایید.',
        'itemRole.*.required_if' => 'لطفا سمت شخص را وارد نمایید.',
    ];
    
    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->members) && $psite->members->is_hidden == 1) ? true : false;
            $this->headerDescription = is_null($psite->members) ? "" : $psite->members->header_description; 

            // members images repeater form
            $this->getRepeaterInitialValues($psite);
        }
    }

    private function getRepeaterInitialValues($psite) {
        if(is_null($psite->members) || (!is_null($psite->members) && count($psite->members->psiteMemberItem) === 0)) {
            $this->itemImages = [null];
            $this->itemFullname = [null];
            $this->itemRole = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
        } elseif(!is_null($psite->members) && count($psite->members->psiteMemberItem) > 0) {
            $this->itemImages = $psite->members->psiteMemberItem->pluck('item_image')->toArray();
            $this->itemFullname = $psite->members->psiteMemberItem->pluck('item_fullname')->toArray();
            $this->itemRole = $psite->members->psiteMemberItem->pluck('item_role')->toArray();
            $this->itemInputs = $psite->members->psiteMemberItem->keys()->toArray();
            $this->itemIteration = $psite->members->psiteMemberItem->count();
        }
    }

    // team images repeater form
    private function handleImageUpload($psite, $members) {
        
        if(count($this->itemImages) == 0) {
            return;
        }
        
        $dir = 'upload/private-website-resources/' . $psite->id . '/members';

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

                $members->psiteMemberItem()->create([
                    'item_image' => 'storage/upload/private-website-resources/' . $psite->id . '/members' . '/' . $filename,
                    'item_fullname' => Purify::clean(trim($this->itemFullname[$key])),
                    'item_role' => Purify::clean(trim($this->itemRole[$key])),
                ]);
            } else {
                // this is for items already stored in the database and server
                $psite = Psite::findOrFail($this->privateSiteId);
                $items = $psite->members->psiteMemberItem;
               
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
                        if(isset($this->itemFullname[$itemKey]) && isset($this->itemRole[$itemKey])) {
                            $item->update([
                                'item_fullname' => Purify::clean(trim($this->itemFullname[$itemKey])),
                                'item_role' => Purify::clean(trim($this->itemRole[$itemKey])),
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
            $this->itemRole[$itemIteration] = null;
            $this->itemIteration = $itemIteration + 1;
            array_push($this->itemInputs, $itemIteration);
        }
    }
    public function removeItem($itemKey) {
        if(count($this->itemInputs) > 1) {
            unset($this->itemInputs[$itemKey]);    
            unset($this->itemImages[$itemKey]);   
            unset($this->itemFullname[$itemKey]);     
            unset($this->itemRole[$itemKey]);     
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 6, 
        );
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

        if($psite->user->id !== auth()->user()->id) {
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

        if($this->isHidden) {
            $members = $psite->members()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $members = $psite->members()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);

            //save members into DB
            $this->handleImageUpload($psite, $members);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 8, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.members.index');
    } 
}
