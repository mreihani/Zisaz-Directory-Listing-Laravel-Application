<div>
    <!-- load steps navigation bar component -->
    @livewire('frontend.pages.project.project-edit.components.layouts.nav-bar.index', ['projectId' => $projectId])
   
    <!-- load each section component based on section number -->
    @if($projectSectionNumber == 1)
        @livewire('frontend.pages.project.project-edit.components.info.index', ['projectId' => $projectId])
    @elseif($projectSectionNumber == 2)
        @livewire('frontend.pages.project.project-edit.components.facility.index', ['projectId' => $projectId])
    @elseif($projectSectionNumber == 3)
        @livewire('frontend.pages.project.project-edit.components.contact.index', ['projectId' => $projectId])
    @elseif($projectSectionNumber == 4)
        @livewire('frontend.pages.project.project-edit.components.video.index', ['projectId' => $projectId])
    @endif
</div>
