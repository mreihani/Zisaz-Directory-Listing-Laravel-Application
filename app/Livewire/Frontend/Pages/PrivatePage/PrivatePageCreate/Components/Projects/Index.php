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
    public $headerDescription;
    
    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا شرح پروژه ها را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->projects) && $psite->projects->is_hidden == 1) ? true : false;
            $this->headerDescription = is_null($psite->projects) ? "" : $psite->projects->header_description; 
        }
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
       
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);

        if($this->isHidden) {
            $promotionalVideo = $psite->projects()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $promotionalVideo = $psite->projects()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 6, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.projects.index');
    } 
}
