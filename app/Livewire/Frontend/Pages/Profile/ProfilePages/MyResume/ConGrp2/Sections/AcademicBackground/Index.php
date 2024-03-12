<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\MyResume\ConGrp2\Sections\AcademicBackground;

use Livewire\Component;
use Stevebauman\Purify\Facades\Purify;

class Index extends Component
{
    public $resumeSectionNumber;
    public $inputs;
    public $i;
    public $academicLevel;
    public $fieldOfStudy;
    public $relocateForInterview;

    public function mount() {
        $this->resumeSectionNumber = 3;
        $this->inputs = $this->getInitialInput();
        $this->i = $this->getIterationNumber();
        $this->academicLevel = $this->getAcademicLevel();
        $this->fieldOfStudy = $this->getInitialFieldOfStudy();
        $this->relocateForInterview = $this->getInitialRelocateForInterview();
    }

    private function isResumeAcaBg() {
        return !! (
            auth()->user()->userProfile 
            && auth()->user()->userProfile->userProfileResume 
            && auth()->user()->userProfile->userProfileResume->resumeAcaBg
            && auth()->user()->userProfile->userProfileResume->resumeAcaBg->academicItems
        );
    }

    private function getInitialInput() {
        if($this->isResumeAcaBg()) {
            $academicItemCount = auth()->user()->userProfile->userProfileResume->resumeAcaBg->academicItems->count();

            if($academicItemCount > 0) {

                $academicArray = [];

                for ($i=0; $i < $academicItemCount; $i++) { 
                    $academicArray[$i] = $i + 1;
                }

                return $academicArray;
            }
        }

        return [0 => 1];
    }

    private function getIterationNumber() {
        if($this->isResumeAcaBg()) {
            return auth()->user()->userProfile->userProfileResume->resumeAcaBg->academicItems->count() + 1;
        }
        return 2;
    }

    private function getInitialFieldOfStudy() {
        if($this->isResumeAcaBg()) {
            $academicItems = auth()->user()->userProfile->userProfileResume->resumeAcaBg->academicItems;
            
            $fieldOfStudyArray = [];
            foreach ($academicItems as $key => $value) {
                $fieldOfStudyArray[$key + 1] = $value->field_of_study;
            }
            return $fieldOfStudyArray;
        }

        return [1 => ''];
    }

    private function getInitialRelocateForInterview() {
        if($this->isResumeAcaBg()) {
            return $this->relocateForInterview = auth()->user()->userProfile->userProfileResume->resumeAcaBg->relocate_for_interview  ? true : false;
        }

        return false;
    }

    private function getAcademicLevel() {
        if($this->isResumeAcaBg()) {
            
            $academicDbArray = auth()->user()->userProfile->userProfileResume->resumeAcaBg->academicItems->pluck('academic_level')->toArray();

            $acaArr = [];
            for ($i=0; $i < count(auth()->user()->userProfile->userProfileResume->resumeAcaBg->academicItems->pluck('academic_level')->toArray()); $i++) { 
                $acaArr[$i+1] = $academicDbArray[$i]; 
            }
            
            return $acaArr;
        }
        return [1 => "msd"];
    }

    public function add($i) {
        $this->i = $i + 1;
        $this->academicLevel[$i] = 'msd';
        $this->fieldOfStudy[$i] = '';
        array_push($this->inputs, $i);
    }

    public function remove($key) {
        if(count($this->inputs) > 1) {
            unset($this->inputs[$key]);    
            unset($this->academicLevel[$key+1]);    
        }
    }

    public function backward() {
        $this->dispatch('resumeSectionNumber', resumeSectionNumber: 2 );
    }

    public function save() {

        $userProfile = auth()->user()->userProfile()->firstOrCreate(['user_id' => auth()->user()->id]);
        $userProfileResume = $userProfile->userProfileResume()->firstOrCreate(['user_profile_id' => $userProfile->id]);
        $resumeAcaBg = $userProfileResume->resumeAcaBg()->updateOrCreate([
            'profile_resume_id' => $userProfileResume->id,
        ],[
            'relocate_for_interview' => $this->relocateForInterview,
        ]);

        $resumeAcaBg->academicItems()->delete();

        foreach($this->inputs as $key => $value) {
            $resumeAcaBg->academicItems()->create([
                'resume_aca_bg_id' => $resumeAcaBg->id,
                'academic_level' => Purify::clean($this->academicLevel[$value]),
                'field_of_study' => Purify::clean($this->fieldOfStudy[$value]),
            ]);
        }

        $this->dispatch('resumeSectionNumber', resumeSectionNumber: 4 );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.my-resume.component.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.academic-background.index');
    }
}
