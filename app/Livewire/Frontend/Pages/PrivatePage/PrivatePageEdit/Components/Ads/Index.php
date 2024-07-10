<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\Ads;

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
    
    public $isHidden;
    public $headerDescription;

    public $isSelling;
    public $isInvestment;
    public $isBid;
    public $isInquiry;
    public $isContractor;
    public $adsValidation;
    
    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'adsValidation' => $this->adsSelectionValidationHanlder() ? 'required' : '',
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا شرح آگهی ها را وارد نمایید.',
        'adsValidation.required' => 'لطفا حداقل یک نوع آگهی برای نمایش انتخاب نمایید.'
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->ads) && $psite->ads->is_hidden == 1) ? true : false;
            $this->isSelling = (!is_null($psite->ads) && $psite->ads->is_selling == 1) ? true : false;
            $this->isInvestment = (!is_null($psite->ads) && $psite->ads->is_investment == 1) ? true : false;
            $this->isBid = (!is_null($psite->ads) && $psite->ads->is_bid == 1) ? true : false;
            $this->isInquiry = (!is_null($psite->ads) && $psite->ads->is_inquiry == 1) ? true : false;
            $this->isContractor = (!is_null($psite->ads) && $psite->ads->is_contractor == 1) ? true : false;
            $this->headerDescription = is_null($psite->ads) ? "" : $psite->ads->header_description; 
        }
    }

    private function adsSelectionValidationHanlder() {
        if($this->isHidden || ($this->isSelling || $this->isInvestment || $this->isBid || $this->isInquiry || $this->isContractor)) {
            return false;
        }
        return true;
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 5, 
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
    }

    public function save() {  
       
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);

        $psite->update([
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
        if($this->isHidden) {
            $promotionalVideo = $psite->ads()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $promotionalVideo = $psite->ads()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'is_selling' => $this->isSelling == true ? 1 : 0,
                'is_investment' => $this->isInvestment == true ? 1 : 0,
                'is_bid' => $this->isBid == true ? 1 : 0,
                'is_inquiry' => $this->isInquiry == true ? 1 : 0,
                'is_contractor' => $this->isContractor == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 7, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.website-sections.ads.index');
    } 
}
