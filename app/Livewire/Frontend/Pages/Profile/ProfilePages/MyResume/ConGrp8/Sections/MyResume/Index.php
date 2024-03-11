<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\MyResume\ConGrp8\Sections\MyResume;

use Livewire\Component;
use Stevebauman\Purify\Facades\Purify;

class Index extends Component
{
    public $resumeSectionNumber;
    public $workExperience;

    protected function rules()
    {
        return 
        [
            'workExperience' => 'required',
        ];
	}
    
    protected $messages = [
        'workExperience.required' => 'فیلد سابقه کار نمی تواند خالی باشد.',
    ];

    public function mount() {
        $this->resumeSectionNumber = 4;
        $this->workExperience = $this->getWorkExperience();
    }

    private function resumeWorkExps() {
        return !! (
            auth()->user()->userProfile 
            && auth()->user()->userProfile->userProfileResume 
            && auth()->user()->userProfile->userProfileResume->resumeWorkExps
        );
    }

    private function getWorkExperience() {
        if($this->resumeWorkExps()) {
            return auth()->user()->userProfile->userProfileResume->resumeWorkExps->work_experience;
        }
        return '';
    }

    public function save() {

        $this->validate();

        $userProfile = auth()->user()->userProfile()->firstOrCreate(['user_id' => auth()->user()->id]);
        $userProfileResume = $userProfile->userProfileResume()->firstOrCreate(['user_profile_id' => $userProfile->id]);
        $resumeExp = $userProfileResume->resumeWorkExps()->updateOrCreate([
            'profile_resume_id' => $userProfileResume->id,
        ],[
            'work_experience' => Purify::clean($this->workExperience),
        ]);

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.my-resume.component.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.my-resume.index');
    }
}
