<div>
    <section class="position-relative bg-white rounded-xxl-4 zindex-5" style="margin-top: 30px;">
        <div class="container-fluid pt-4 pb-5 mb-md-4">
            <div class="row">
                <!-- Sticky sidebar-->
                @include('frontend.pages.activity.activity-all.all-types.livewire-components.includes.sticky-sidebar')
               
                <!-- List of jobs-->
                <div class="col-lg-9 position-relative mb-4 mb-md-0" style="z-index: 1025;">
                    
                    <!-- Top banner-->
                    @include('frontend.pages.activity.activity-all.all-types.livewire-components.includes.top-banner',
                    [
                        'adsFirstSliderSlideOne' => $adsFirstSliderSlideOne,
                        'adsFirstSliderSlideTwo' => $adsFirstSliderSlideTwo,
                        'adsFirstSliderSlideThree' => $adsFirstSliderSlideThree,
                        'adsFirstSliderSlideFour' => $adsFirstSliderSlideFour,
                        'adsFirstSliderSlideFive' => $adsFirstSliderSlideFive,
                    ])
    
                    <!-- Main-->
                    <div class="col-lg-12 mt-5 pt-lg-5 main-div-home-page">
                        @if(is_null($sidebarFilterCollection))
                            @include('frontend.pages.activity.activity-all.all-types.livewire-components.includes.main-content', ['activities' => $activities])
                        @else
                            @include('frontend.pages.activity.activity-all.all-types.livewire-components.includes.sidebar-filter-collection')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
