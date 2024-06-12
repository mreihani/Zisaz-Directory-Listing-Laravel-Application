<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;

class Index extends Component
{
    use WithFileUploads;

    public $id;
    public $privateSiteId;
    public $privateSiteSectionNumber;
   
    public function mount() {
        $this->privateSiteId = $this->id;
        $this->privateSiteSectionNumber = 1;
        $this->isUserAuthorized();
    }

    private function isUserAuthorized() {

        if(!is_null($this->privateSiteId)) {
            $psite = Psite::findOrFail($this->privateSiteId);

            if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
                abort(403);
            }
        }

        return true;
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

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.index');
    } 
}
