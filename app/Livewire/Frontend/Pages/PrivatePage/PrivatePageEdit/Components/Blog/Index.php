<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\Blog;

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

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا توضیحات را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;

        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->blog) && $psite->blog->is_hidden == 1) ? true : false;
            $this->headerDescription = is_null($psite->blog) ? "" : $psite->blog->header_description; 
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 10, 
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
        //
    }

    public function save() {  
       
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);
        
        $psite->update([
            'verify_status' => 'pending'
        ]);
        
        if($this->isHidden) {
            $blog = $psite->blog()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $blog = $psite->blog()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 12, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.website-sections.blog.index');
    } 
}
