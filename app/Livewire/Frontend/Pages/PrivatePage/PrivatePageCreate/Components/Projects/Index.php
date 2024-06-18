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

    public $isProjectType1;
    public $isProjectType2;
    public $isProjectType3;
    public $isProjectType4;
    public $isProjectType5;
    public $isProjectType6;
    public $isProjectType7;
    public $isProjectType8;
    public $isProjectType9;
    public $projectValidation;
    
    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'projectValidation' => $this->projectTypeSelectionValidationHanlder() ? 'required' : '',
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا شرح پروژه ها را وارد نمایید.',
        'projectValidation.required' => 'لطفا حداقل یک نوع پروژه برای نمایش انتخاب نمایید.'
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->projects) && $psite->projects->is_hidden == 1) ? true : false;
            $this->headerDescription = is_null($psite->projects) ? "" : $psite->projects->header_description; 
            $this->isProjectType1 = (!is_null($psite->projects) && $psite->projects->is_project_type_1 == 1) ? true : false;
            $this->isProjectType2 = (!is_null($psite->projects) && $psite->projects->is_project_type_2 == 1) ? true : false;
            $this->isProjectType3 = (!is_null($psite->projects) && $psite->projects->is_project_type_3 == 1) ? true : false;
            $this->isProjectType4 = (!is_null($psite->projects) && $psite->projects->is_project_type_4 == 1) ? true : false;
            $this->isProjectType5 = (!is_null($psite->projects) && $psite->projects->is_project_type_5 == 1) ? true : false;
            $this->isProjectType6 = (!is_null($psite->projects) && $psite->projects->is_project_type_6 == 1) ? true : false;
            $this->isProjectType7 = (!is_null($psite->projects) && $psite->projects->is_project_type_7 == 1) ? true : false;
            $this->isProjectType8 = (!is_null($psite->projects) && $psite->projects->is_project_type_8 == 1) ? true : false;
            $this->isProjectType9 = (!is_null($psite->projects) && $psite->projects->is_project_type_9 == 1) ? true : false;
        }
    }

    private function projectTypeSelectionValidationHanlder() {
        if($this->isHidden
         || ($this->isProjectType1
         || $this->isProjectType2
         || $this->isProjectType3 
         || $this->isProjectType4 
         || $this->isProjectType5 
         || $this->isProjectType6 
         || $this->isProjectType7 
         || $this->isProjectType8 
         || $this->isProjectType9)
         ) {
            return false;
        }
        return true;
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 4, 
        );
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

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
                'is_project_type_1' => $this->isProjectType1 == true ? 1 : 0,
                'is_project_type_2' => $this->isProjectType2 == true ? 1 : 0,
                'is_project_type_3' => $this->isProjectType3 == true ? 1 : 0,
                'is_project_type_4' => $this->isProjectType4 == true ? 1 : 0,
                'is_project_type_5' => $this->isProjectType5 == true ? 1 : 0,
                'is_project_type_6' => $this->isProjectType6 == true ? 1 : 0,
                'is_project_type_7' => $this->isProjectType7 == true ? 1 : 0,
                'is_project_type_8' => $this->isProjectType8 == true ? 1 : 0,
                'is_project_type_9' => $this->isProjectType9 == true ? 1 : 0,
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
