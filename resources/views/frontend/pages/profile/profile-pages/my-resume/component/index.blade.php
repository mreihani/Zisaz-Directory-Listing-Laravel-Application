<div>
    @if($resumeSectionNumber == 1)
        @livewire('frontend.pages.profile.profile-pages.my-resume.sections.my-resume.index')
    @elseif($resumeSectionNumber == 2)
        @livewire('frontend.pages.profile.profile-pages.my-resume.sections.demanding-field.index')
    @elseif($resumeSectionNumber == 3)
        @livewire('frontend.pages.profile.profile-pages.my-resume.sections.academic-background.index')
    @elseif($resumeSectionNumber == 4)
        @livewire('frontend.pages.profile.profile-pages.my-resume.sections.work-experience.index')
    @endif
</div>