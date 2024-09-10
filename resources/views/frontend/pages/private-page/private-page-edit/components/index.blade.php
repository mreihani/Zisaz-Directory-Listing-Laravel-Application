<div>
    <!-- load steps navigation bar component -->
    @livewire('frontend.pages.private-page.private-page-edit.components.layouts.nav-bar.index', ['privateSiteId' => $privateSiteId])

    <!-- load each section component based on section number -->
    @if($privateSiteSectionNumber == 1)
        @livewire('frontend.pages.private-page.private-page-edit.components.info.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 2)
        @livewire('frontend.pages.private-page.private-page-edit.components.contact-us.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 3)
        @livewire('frontend.pages.private-page.private-page-edit.components.promotional-video.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 4)
        @livewire('frontend.pages.private-page.private-page-edit.components.licenses.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 5)
        @livewire('frontend.pages.private-page.private-page-edit.components.members.index', ['privateSiteId' => $privateSiteId])
    @endif
</div>
