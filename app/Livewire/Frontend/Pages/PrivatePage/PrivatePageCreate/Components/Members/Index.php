<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Members;

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

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 6, 
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
        //$this->handleSlideUpload($psite, $hero);

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 8, 
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
        return view('frontend.pages.private-page.private-page-create.components.website-sections.members.index');
    } 
}
