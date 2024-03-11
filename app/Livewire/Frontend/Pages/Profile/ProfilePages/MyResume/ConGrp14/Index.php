<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\MyResume\ConGrp14;

use Livewire\Component;

class Index extends Component
{
    public $resumeSectionNumber;

    public function mount() {
        $this->resumeSectionNumber = 1;
    }

    protected $listeners = [
        'resumeSectionNumber' => 'resumeSectionNumber'
    ];

    public function resumeSectionNumber($resumeSectionNumber) {
        $this->resumeSectionNumber = $resumeSectionNumber;
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.my-resume.component.con-grp' . auth()->user()->userGroupType->groupable->id . '.index');
    }
}
