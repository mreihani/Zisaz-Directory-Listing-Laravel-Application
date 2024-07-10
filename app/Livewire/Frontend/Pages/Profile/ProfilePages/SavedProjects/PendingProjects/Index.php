<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedProjects\PendingProjects;

use Livewire\Component;

class Index extends Component
{
    public $projects;

    public function mount() {
        $this->projects = auth()->user()->project()->queryWithVerifyStatusPending()->with([
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
        return view('frontend.pages.profile.profile-pages.saved-projects.component.pending-projects.index');
    }
}
