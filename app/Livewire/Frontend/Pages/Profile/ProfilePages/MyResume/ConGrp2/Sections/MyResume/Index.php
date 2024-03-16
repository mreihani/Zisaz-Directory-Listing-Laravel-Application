<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\MyResume\ConGrp2\Sections\MyResume;

use Livewire\Component;

class Index extends Component
{
    public $resumeSectionNumber;
    public $showResume;
    public $locations;
    public $jobBudget;
    public $title;

    public function mount() {
        $this->resumeSectionNumber = 1;
        $this->showResume = $this->getResumeStatus();
        $this->title = $this->getResumeTitle();
        $this->locations = $this->getJobLocation();
        $this->jobBudget = $this->getJobBudget();
    }

    private function getResumeStatus() {
        return !! (
            (auth()->user()->userProfile && auth()->user()->userProfile->userProfileResume)
            && (auth()->user()->userProfile->userProfileResume->ResumeField)
            && (auth()->user()->userProfile->userProfileResume->ResumeAcaBg)
            && (auth()->user()->userProfile->userProfileResume->resumeWorkExps)
        );
    }

    private function getJobLocation() {
        if($this->getResumeStatus()) {
            return auth()->user()->userProfile->userProfileResume->ResumeField->cities;
        }   
        return [];
    }

    private function getJobBudget() {
        if($this->getResumeStatus()) {
            return auth()->user()->userProfile->userProfileResume->ResumeField->payment_amount_from . ' الی ' . auth()->user()->userProfile->userProfileResume->ResumeField->payment_amount_to;
        }   
        return '';
    }

    private function getResumeTitle() {
        // if($this->getResumeStatus()) {
        //     return auth()->user()->userProfile->userProfileResume->resumeField->shopActGroups->first()->title;
        // }   
        return 'رزومه من';
    }

    public function addNewResume() {
        $this->dispatch('resumeSectionNumber', resumeSectionNumber: 2 );
    }

    public function editResume() {
        $this->dispatch('resumeSectionNumber', resumeSectionNumber: 2 );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.my-resume.component.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.my-resume.index');
    }
}
