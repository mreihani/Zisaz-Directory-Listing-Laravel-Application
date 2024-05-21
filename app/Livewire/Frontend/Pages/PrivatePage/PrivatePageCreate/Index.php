<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;

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

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.index');
    } 
}
