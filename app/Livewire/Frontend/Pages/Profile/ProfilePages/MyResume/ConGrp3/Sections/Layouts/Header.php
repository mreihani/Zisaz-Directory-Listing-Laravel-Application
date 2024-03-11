<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\MyResume\ConGrp3\Sections\Layouts;

use Livewire\Component;

class Header extends Component
{
    public $resumeSectionNumber;

    public function mount($resumeSectionNumber)
    {
        $this->resumeSectionNumber = $resumeSectionNumber;
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.my-resume.component.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.layouts.header');
    }
}
