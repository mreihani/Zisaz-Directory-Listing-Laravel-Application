<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectCreate\Components\Layouts\NavBar;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Stevebauman\Purify\Facades\Purify;
use App\Models\Frontend\UserModels\Project\Project;

class Index extends Component
{
    use WithFileUploads;

    public $projectId;
    public $projectSectionNumber;
    public $isNavItemActive;

    public function mount() {
        $this->projectId = null;
        $this->projectSectionNumber = 1;
        $this->isNavItemActive = false;
    }
   
    // receive section number from sub-components
    protected $listeners = [
        'projectSectionNumber' => 'projectSectionNumber',
        'projectId' => 'projectId',
        'isNavItemActive' => 'isNavItemActive',
    ];
    public function projectSectionNumber($projectSectionNumber) {
        $this->projectSectionNumber = $projectSectionNumber;
    }
    public function projectId($projectId) {
        $this->projectId = $projectId;
    }
    public function isNavItemActive($isNavItemActive) {
        $this->isNavItemActive = $isNavItemActive;
    }

    // check if private site id is related to the owner
    private function isProjectOwner($projectId) {
        $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);

        if(!auth()->check() || $project->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $project;
    }

    // check if the first section which is mandatory has beed saved by the user for the first time
    private function geInfoSectionStatus() {
        $project = $this->isProjectOwner($this->projectId);
       
        if(!is_null($project->projectInfo) && $project->projectImages->count()) {
            return true;
        }

        return false;
    }
    
    // navigate through each section by click
    public function navigate($id) {
        if(!is_null($this->projectId) && $this->geInfoSectionStatus()) {
            $this->projectSectionNumber = $id;

            $this->dispatch('projectSectionNumber', 
                projectSectionNumber: $id, 
            );
        }
    }
    
    public function render()
    {
        return view('frontend.pages.project.project-create.components.layouts.nav-bar');
    } 
}
