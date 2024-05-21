<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\PromotionalVideo;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Stevebauman\Purify\Facades\Purify;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;
    
    public $isDisplayed;
    public $headerDescription;

    // protected function rules() {
    //     return [
    //         'businessType' => 'required',
    //     ];
    // }

    // protected $messages = [
    //     'businessType.required' => 'لطفا نوع کسب و کار خود را انتخاب نمایید.',
    // ];

    // public function mount() {

    // }

    // private function handleVideoUpload($psite) {

    // }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 3, 
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

    public function save() {  
       
        // $this->validate();
        
        // save video into DB
        // $this->handleVideoUpload($psite);

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 5, 
        );

        // // Show Toaster
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
        return view('frontend.pages.private-page.private-page-create.components.website-sections.promotional-video.index');
    } 
}
