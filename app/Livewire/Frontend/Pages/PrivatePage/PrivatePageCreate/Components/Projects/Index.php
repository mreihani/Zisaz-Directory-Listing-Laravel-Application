<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Projects;

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
    
    // protected function rules() {
    //     return [
    //         'businessType' => 'required',
    //     ];
    // }

    // protected $messages = [
    //     'businessType.required' => 'لطفا نوع کسب و کار خود را انتخاب نمایید.',
    // ];

    public function mount() {
        $this->isHidden = false;
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 4, 
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
       
        //$this->validate();

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 6, 
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
        return view('frontend.pages.private-page.private-page-create.components.website-sections.projects.index');
    } 
}
