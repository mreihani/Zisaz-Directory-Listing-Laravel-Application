<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Layouts\NavBar;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Stevebauman\Purify\Facades\Purify;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteSectionNumber;

    public function mount() {
        $this->privateSiteSectionNumber = 1;
    }
   
    // receive section number from sub-components
    protected $listeners = [
        'privateSiteSectionNumber' => 'privateSiteSectionNumber',
    ];
    public function privateSiteSectionNumber($privateSiteSectionNumber) {
        $this->privateSiteSectionNumber = $privateSiteSectionNumber;
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.layouts.nav-bar');
    } 
}
