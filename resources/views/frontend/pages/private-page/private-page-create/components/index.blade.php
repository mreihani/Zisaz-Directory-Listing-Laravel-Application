<div>
    <!-- load steps navigation bar component -->
    @livewire('frontend.pages.private-page.private-page-create.components.layouts.nav-bar.index')

    <!-- load each section component based on section number -->
    @if($privateSiteSectionNumber == 1)
        @livewire('frontend.pages.private-page.private-page-create.components.hero.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 2)
        @livewire('frontend.pages.private-page.private-page-create.components.about-us.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 3)
        @livewire('frontend.pages.private-page.private-page-create.components.services.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 4)
        @livewire('frontend.pages.private-page.private-page-create.components.promotional-video.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 5)
        @livewire('frontend.pages.private-page.private-page-create.components.projects.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 6)
        @livewire('frontend.pages.private-page.private-page-create.components.licenses.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 7)
        @livewire('frontend.pages.private-page.private-page-create.components.members.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 8)
        @livewire('frontend.pages.private-page.private-page-create.components.middle-banner.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 9)
        @livewire('frontend.pages.private-page.private-page-create.components.testimonials.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 10)
        @livewire('frontend.pages.private-page.private-page-create.components.blog.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 11)
        @livewire('frontend.pages.private-page.private-page-create.components.trusted-customers.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 12)
        @livewire('frontend.pages.private-page.private-page-create.components.contact-us.index', ['privateSiteId' => $privateSiteId])
    @elseif($privateSiteSectionNumber == 13)
        @livewire('frontend.pages.private-page.private-page-create.components.footer.index', ['privateSiteId' => $privateSiteId])
    @endif
</div>
