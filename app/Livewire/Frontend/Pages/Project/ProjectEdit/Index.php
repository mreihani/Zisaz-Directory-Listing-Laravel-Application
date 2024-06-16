<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectEdit;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;


class Index extends Component
{
    use WithFileUploads;

    public $id;
    public $projectId;
    public $projectSectionNumber;
   
    public function mount() {
        $this->projectId = $this->id;
        $this->projectSectionNumber = 1;
        $this->isUserAuthorized();
    }

    private function isUserAuthorized() {

        if(!is_null($this->projectId)) {
            $project = Project::findOrFail($this->projectId);

            if(!auth()->check() || $project->user->id !== auth()->user()->id) {
                abort(403);
            }
        }

        return true;
    }

    // receive section number from sub-components
    protected $listeners = [
        'projectSectionNumber' => 'projectSectionNumber',
        'projectId' => 'projectId',
    ];
    public function projectSectionNumber($projectSectionNumber) {
        $this->projectSectionNumber = $projectSectionNumber;
    }
    public function projectId($projectId) {
        $this->projectId = $projectId;
    }

    public function render()
    {
        return view('frontend.pages.project.project-edit.components.index');
    } 
}
