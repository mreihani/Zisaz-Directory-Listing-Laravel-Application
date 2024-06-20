<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedProjects\TrashedProjects;

use Livewire\Component;

class Index extends Component
{
    public $projects;

    public function mount() {
        $this->projects = auth()->user()->project()->onlyTrashed()->with([
            'projectImages',
            'projectInfo',
            'projectFacility',
            'projectContact',
            'projectVideo',
            'welfareFacility',
        ])->get();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.saved-projects.component.trashed-projects.index');
    }
}
