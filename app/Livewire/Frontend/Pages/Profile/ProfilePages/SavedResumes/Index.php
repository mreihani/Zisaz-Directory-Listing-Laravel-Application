<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedResumes;

use Livewire\Component;

class Index extends Component
{
    public $userResumes;

    public function mount() {
        $this->userResumes = auth()->user()->activity()->where('activity_type', 'resume')->with('subactivity')->get();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.saved-resumes.component.index');
    }
}
