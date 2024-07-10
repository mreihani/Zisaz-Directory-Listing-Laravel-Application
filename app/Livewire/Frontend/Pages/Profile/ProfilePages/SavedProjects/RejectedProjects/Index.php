<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedProjects\RejectedProjects;

use Livewire\Component;

class Index extends Component
{
    public $projects;

    public function mount() {
        $this->projects = auth()->user()->project()->queryWithVerifyStatusRejected()->with([
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
        return view('frontend.pages.profile.profile-pages.saved-projects.component.rejected-projects.index');
    }
}
