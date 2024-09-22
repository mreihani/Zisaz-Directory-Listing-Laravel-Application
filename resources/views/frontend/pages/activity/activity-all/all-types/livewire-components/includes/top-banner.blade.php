@if(!empty($adsFirstSliderSlideOne) && $adsFirstSliderSlideOne->display_banner)
    <div class="card card-body border-0 shadow-sm pb-5 me-lg-1 mt-5 pt-5" wire:ignore>
        <div class="tns-carousel-wrapper tns-controls-static tns-nav-outside mt-4">
            <div class="tns-carousel-inner text-center" data-carousel-options="{&quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 2000, &quot;gutter&quot;: 16}">

                @if(!empty($adsFirstSliderSlideOne))
                    <div>
                        <a href="{{asset($adsFirstSliderSlideOne->url)}}">
                            <img style="height: 292px;" class="rounded-3" src="{{asset($adsFirstSliderSlideOne->image)}}" alt="Carousel image">
                        </a>
                    </div>
                @endif

                @if(!empty($adsFirstSliderSlideTwo))
                    <div>
                        <a href="{{asset($adsFirstSliderSlideTwo->url)}}">
                            <img style="height: 292px;" class="rounded-3" src="{{asset($adsFirstSliderSlideTwo->image)}}" alt="Carousel image">
                        </a>
                    </div>
                @endif

                @if(!empty($adsFirstSliderSlideThree))
                    <div>
                        <a href="{{asset($adsFirstSliderSlideThree->url)}}">
                            <img style="height: 292px;" class="rounded-3" src="{{asset($adsFirstSliderSlideThree->image)}}" alt="Carousel image">
                        </a>
                    </div>
                @endif

                @if(!empty($adsFirstSliderSlideFour))
                    <div>
                        <a href="{{asset($adsFirstSliderSlideFour->url)}}">
                            <img style="height: 292px;" class="rounded-3" src="{{asset($adsFirstSliderSlideFour->image)}}" alt="Carousel image">
                        </a>
                    </div>
                @endif

                @if(!empty($adsFirstSliderSlideFive))
                    <div>
                        <a href="{{asset($adsFirstSliderSlideFive->url)}}">
                            <img style="height: 292px;" class="rounded-3" src="{{asset($adsFirstSliderSlideFive->image)}}" alt="Carousel image">
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endif