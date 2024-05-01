<div>
    <section class="position-relative bg-white rounded-xxl-4 zindex-5" style="margin-top: 30px;">
        <div class="container pt-4 pb-5 mb-md-4">
            <div class="row">
                <!-- List of jobs-->
                <div class="col-md-12 position-relative mb-4 mb-md-0" style="z-index: 1025;">
                    <!-- Main-->
                    <div class="mt-5 pt-lg-5 main-div-home-page">
                        @if(is_null($searchResults))
                            @include('frontend.pages.home.livewire-components.includes.main-content')
                        @else
                            @include('frontend.pages.home.livewire-components.includes.search-results-collection')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
