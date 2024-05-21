<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Services;

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
    public $isDisplayed;

    // service item repeater form
    public $itemTitle;
    public $itemDescription;
    public $itemInputs;
    public $itemIteration;

    protected function rules() {
        return [
            'headerDescription' => 'required',
            'itemTitle.*' => 'required',
            'itemDescription.*' => 'required',
        ];
    }

    protected $messages = [
        'headerDescription.required' => 'لطفا شرح خدمات را وارد نمایید.',
        'itemTitle.*.required' => 'لطفا عنوان خدمت را وارد نمایید.',
        'itemDescription.*.required' => 'لطفا توضیحات خدمت را وارد نمایید.',
    ];

    public function mount() {
        $this->privateSiteSectionNumber = 3; 

        $this->loadInitialValues();
    }

    private function loadInitialValues() {
        if(is_null($this->privateSiteId)) {

            // $this->headerDescription;
            // $this->isDisplayed;

            // service item repeater form
            $this->itemTitle = [null];
            $this->itemDescription = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
        } else {
            // $this->headerDescription;
            // $this->isDisplayed;

            // service item repeater form
            $this->itemTitle = [null];
            $this->itemDescription = [null];
            $this->itemInputs = [0];
            $this->itemIteration = 1;
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
        if(count($this->itemTitle) == 0) {
            return;
        }
        
        $dir = 'upload/private-website-resources/' . $psite->id . '/hero';

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

        if($psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    public function save() {  
       
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);

        $service = $psite->services()->create([
            'is_displayed' => $this->isDisplayed == true ? 1 : 0,
            'header_description' => Purify::clean($this->headerDescription),
        ]);

        //save addresses into DB
        $this->handleServiceItemStore($psite, $service);
        
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 4, 
        );

        $this->dispatch('privateSiteId', 
            privateSiteId: $psite->id, 
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
        return view('frontend.pages.private-page.private-page-create.components.website-sections.services.index');
    } 
}
