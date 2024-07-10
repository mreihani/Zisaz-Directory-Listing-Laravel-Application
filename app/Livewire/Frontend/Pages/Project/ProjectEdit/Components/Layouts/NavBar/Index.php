<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectEdit\Components\Layouts\NavBar;

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
        $this->projectSectionNumber = 1;
        $this->isNavItemActive = true;
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

    // navigate through each section by click
    public function navigate($id) {
       
        // first check if authorized
        $this->isProjectOwner($this->projectId);

        $this->projectSectionNumber = $id;

        $this->dispatch('projectSectionNumber', 
            projectSectionNumber: $id, 
        );
    }
    
    public function render()
    {
        return view('frontend.pages.project.project-edit.components.layouts.nav-bar');
    } 
}
