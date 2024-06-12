<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\Services;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;

    public $headerDescription;
    public $isHidden;

    // service item repeater form
    public $itemTitle;
    public $itemTitleValidation;
    public $itemDescription;
    public $itemInputs;
    public $itemIteration;

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'itemTitle.*' => 'required_if:isHidden,==,false',
            'itemDescription.*' => 'required_if:isHidden,==,false',
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا شرح خدمات را وارد نمایید.',
        'itemTitle.*.required_if' => 'لطفا عنوان خدمت را وارد نمایید.',
        'itemDescription.*.required_if' => 'لطفا توضیحات خدمت را وارد نمایید.',
    ];

    public function mount() {
        $this->privateSiteSectionNumber = 3; 
        
        $this->loadInitialValues();
    }

    private function loadInitialValues() {
        if(is_null($this->privateSiteId)) {

            $this->isHidden = false;
            
            // service item repeater form
            $this->itemTitle = [null];
            $this->itemDescription = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);

            $this->headerDescription = is_null($psite->services) ? "" : $psite->services->header_description; 
            $this->isHidden = (!is_null($psite->services) && $psite->services->is_hidden == 1) ? true : false;
            
            // service item repeater form
            $this->getRepeaterInitialValues($psite);
        }
    }

    private function getRepeaterInitialValues($psite) {
        if(is_null($psite->services) || (!is_null($psite->services) && count($psite->services->psiteServiceItem) === 0)) {
            $this->itemTitle = [null];
            $this->itemDescription = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
        } elseif(!is_null($psite->services) && count($psite->services->psiteServiceItem) > 0) {
            $this->itemTitle = $psite->services->psiteServiceItem->pluck('card_title')->toArray();
            $this->itemDescription = $psite->services->psiteServiceItem->pluck('card_description')->toArray();
            $this->itemInputs = $psite->services->psiteServiceItem->keys()->toArray();
            $this->itemIteration = $psite->services->psiteServiceItem->count();
        }
    }

    // service item repeater form
    public function addItem($itemIteration) {
        if(count($this->itemInputs) < 9) { 
            $this->itemTitle[$itemIteration] = null;
            $this->itemDescription[$itemIteration] = null;
            $this->itemIteration = $itemIteration + 1;
            array_push($this->itemInputs, $itemIteration);
        }
    }
    public function removeItem($itemKey) {
        if(count($this->itemInputs) > 1) {
            unset($this->itemInputs[$itemKey]);    
            unset($this->itemTitle[$itemKey]);    
            unset($this->itemDescription[$itemKey]);    
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 2, 
        );
    }

    // store item repeater inputs inti DB
    private function handleServiceItemStore($psite, $service) {
        if(count($this->itemTitle) == 0 || count($this->itemDescription) == 0) {
            return;
        }
        
        $service->psiteServiceItem()->delete();

        foreach ($this->itemTitle as $key => $titleValue) {
            if($key > 8) {
                break;
            }
            $service->psiteServiceItem()->create([
                'card_title' => Purify::clean(trim($this->itemTitle[$key])),
                'card_description' => Purify::clean(trim($this->itemDescription[$key])),
            ]);
        }
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

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

        if($this->isHidden) {
            $service = $psite->services()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $service = $psite->services()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);

            //save service items into DB
            $this->handleServiceItemStore($psite, $service);
        }
        
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 4, 
        );

        $this->dispatch('privateSiteId', 
            privateSiteId: $psite->id, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.website-sections.services.index');
    } 
}
