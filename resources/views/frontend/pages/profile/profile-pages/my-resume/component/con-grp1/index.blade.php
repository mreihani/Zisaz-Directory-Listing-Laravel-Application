<div>
    @if($resumeSectionNumber == 1)
        @livewire('frontend.pages.profile.profile-pages.my-resume.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.my-resume.index')
    @elseif($resumeSectionNumber == 2)
        @livewire('frontend.pages.profile.profile-pages.my-resume.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.demanding-field.index')
    @elseif($resumeSectionNumber == 4)
        @livewire('frontend.pages.profile.profile-pages.my-resume.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.work-experience.index')
    @endif
</div>
