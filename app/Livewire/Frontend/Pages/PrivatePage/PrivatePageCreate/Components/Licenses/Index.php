<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Licenses;

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

    public function save() {  
       
        $this->validate();

        // $psite = auth()->user()->privateSite()->create([
        //     'business_type' => Purify::clean($this->businessType),
        //     'slug' => str_replace(' ', '-', Purify::clean($this->slug)),
        // ]);
        
        // $hero = $psite->hero()->create([
        //     'title' => Purify::clean($this->title),
        //     'description' => Purify::clean($this->description),
        //     'is_video_displayed' => $this->showPromotionalVideo == true ? 1 : 0,
        // ]);
        
        //save addresses into DB
        $this->handleSlideUpload($psite, $hero);

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 2, 
        );

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.licenses.index');
    } 
}
