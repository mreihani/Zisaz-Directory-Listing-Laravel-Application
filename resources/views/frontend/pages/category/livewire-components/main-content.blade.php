<div>
    <section class="position-relative bg-white rounded-xxl-4 zindex-5" style="margin-top: 30px;">
        <div class="container pt-4 pb-5 mb-md-4">
            <div class="row">
                <!-- Sticky sidebar-->
                @include('frontend.pages.category.livewire-components.includes.sticky-sidebar')

                <!-- List of jobs-->
                <div class="col-lg-8 col-md-12 position-relative mb-4 mb-md-0" style="z-index: 1025;">
                    <!-- Main-->
                    <div class="col-lg-12 mt-5 pt-lg-5 main-div-home-page">
                        @if(is_null($filteredCollection) && is_null($sidebarCategoryFilterCollectionAds) && is_null($searchResults))
                            @include('frontend.pages.category.livewire-components.includes.main-content')
                        @elseif(!is_null($filteredCollection))
                            @include('frontend.pages.category.livewire-components.includes.filtered-collection')
                        @elseif(!is_null($sidebarCategoryFilterCollectionAds))
                            @include('frontend.pages.category.livewire-components.includes.sidebar-category-filter-collection')
                        @elseif(!is_null($searchResults))
                            @include('frontend.pages.category.livewire-components.includes.search-results-collection')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>