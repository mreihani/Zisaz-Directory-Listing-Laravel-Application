<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\Layouts\NavBar;

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

    public function mount() {
        $this->privateSiteId = null;
        $this->privateSiteSectionNumber = 1;
    }
   
    // receive section number from sub-components
    protected $listeners = [
        'privateSiteSectionNumber' => 'privateSiteSectionNumber',
        'privateSiteId' => 'privateSiteId',
    ];
    public function privateSiteSectionNumber($privateSiteSectionNumber) {
        $this->privateSiteSectionNumber = $privateSiteSectionNumber;
    }
    public function privateSiteId($privateSiteId) {
        $this->privateSiteId = $privateSiteId;
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

        if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    // navigate through each section by click
    public function navigate($id) {
        $this->privateSiteSectionNumber = $id;

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: $id, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.layouts.nav-bar');
    } 
}
