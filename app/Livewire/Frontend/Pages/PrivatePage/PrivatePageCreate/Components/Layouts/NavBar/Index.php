<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Layouts\NavBar;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Stevebauman\Purify\Facades\Purify;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;
    public $isNavItemActive;

    public function mount() {
        $this->privateSiteId = null;
        $this->privateSiteSectionNumber = 1;
        $this->isNavItemActive = false;
    }
   
    // receive section number from sub-components
    protected $listeners = [
        'privateSiteSectionNumber' => 'privateSiteSectionNumber',
        'privateSiteId' => 'privateSiteId',
        'isNavItemActive' => 'isNavItemActive',
    ];
    public function privateSiteSectionNumber($privateSiteSectionNumber) {
        $this->privateSiteSectionNumber = $privateSiteSectionNumber;
    }
    public function privateSiteId($privateSiteId) {
        $this->privateSiteId = $privateSiteId;
    }
    public function isNavItemActive($isNavItemActive) {
        $this->isNavItemActive = $isNavItemActive;
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

        if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    // check if the first section which is mandatory has beed saved by the user for the first time
    private function getHeroSectionStatus() {
        $psite = $this->isPsiteOwner($this->privateSiteId);

        if(!is_null($psite->hero) && $psite->hero->psiteHeroSliders->count()) {
            return true;
        }

        return false;
    }
    
    // navigate through each section by click
    public function navigate($id) {
        if(!is_null($this->privateSiteId) && $this->getHeroSectionStatus()) {
            $this->privateSiteSectionNumber = $id;

            $this->dispatch('privateSiteSectionNumber', 
                privateSiteSectionNumber: $id, 
            );
        }
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.layouts.nav-bar');
    } 
}
