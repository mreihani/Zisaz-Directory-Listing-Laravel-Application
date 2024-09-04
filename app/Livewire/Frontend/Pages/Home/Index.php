<?php

namespace App\Livewire\Frontend\Pages\Home;

use Livewire\Component;
use App\Models\Frontend\Banners\BannerHomePage;
use App\Models\Frontend\UserModels\Activity\Activity;

class Index extends Component
{
    // public $searchQuery;
    // public $searchCategory;
    // public $searchResults;
    // public $adsRegistrations;

    // middle one banners section
    // public $isMiddleOneBannerShown;
    // public $middleOneRightBannerImageAddress;
    // public $middleOneLeftBannerImageAddress;
    // public $middleOneRightLinkUrl;
    // public $middleOneLeftLinkUrl;

    // home page slider one (has 5 slides)
    // public $isSlideOneShown;
    // public $firstSlideImageAddress;
    // public $secondSlideImageAddress;
    // public $thirdSlideImageAddress;
    // public $fourthSlideImageAddress;
    // public $fifthSlideImageAddress;
    // public $firstSlideLinkUrl;
    // public $secondSlideLinkUrl;
    // public $thirdSlideLinkUrl;
    // public $fourthSlideLinkUrl;
    // public $fifthSlideLinkUrl;

    public function mount() {
        
        // $this->searchResults = null;
        // $this->getAdsRegistrations();

        // middle one banners section
        // $homeMiddleOneRightBanner = BannerHomePage::where('position', 'home_middle_one_right_banner')->first();
        // $homeMiddleOneLeftBanner = BannerHomePage::where('position', 'home_middle_one_left_banner')->first();

        // This is for middle one banner
        //$this->isMiddleOneBannerShown = ($homeMiddleOneRightBanner && $homeMiddleOneRightBanner->display_banner == 1) ? true : false;

        // Set URL of middle one banner right
        //$this->middleOneRightBannerImageAddress = $homeMiddleOneRightBanner ? asset($homeMiddleOneRightBanner->image) : '';

        // Set URL of middle one banner left
        //$this->middleOneLeftBannerImageAddress = $homeMiddleOneLeftBanner ? asset($homeMiddleOneLeftBanner->image) : '';

        // Set banner Link url middle one banner right
        //$this->middleOneRightLinkUrl = $homeMiddleOneRightBanner ? $homeMiddleOneRightBanner->url : '';

        // Set middleOneLeft Link url middle one banner left
        //$this->middleOneLeftLinkUrl = $homeMiddleOneLeftBanner ? $homeMiddleOneLeftBanner->url : '';

        // home page slider one (has 5 slides)
        // $homeFirstSliderSlideOne = BannerHomePage::where('position', 'home_first_slider_slide_one')->first();
        // $homeFirstSliderSlideTwo = BannerHomePage::where('position', 'home_first_slider_slide_two')->first();
        // $homeFirstSliderSlideThree = BannerHomePage::where('position', 'home_first_slider_slide_three')->first();
        // $homeFirstSliderSlideFour = BannerHomePage::where('position', 'home_first_slider_slide_four')->first();
        // $homeFirstSliderSlideFive = BannerHomePage::where('position', 'home_first_slider_slide_five')->first();

        // This is for first slide
        //$this->isSlideOneShown = ($homeFirstSliderSlideOne && $homeFirstSliderSlideOne->display_banner == 1) ? true : false;

        // Set image file address for first slide
        //$this->firstSlideImageAddress = $homeFirstSliderSlideOne ? asset($homeFirstSliderSlideOne->image) : '';

        // Set image file address for second slide
        //$this->secondSlideImageAddress = $homeFirstSliderSlideTwo ? asset($homeFirstSliderSlideTwo->image) : '';

        // Set image file address for third slide
        //$this->thirdSlideImageAddress = $homeFirstSliderSlideThree ? asset($homeFirstSliderSlideThree->image) : '';

        // Set image file address for fourth slide
        //$this->fourthSlideImageAddress = $homeFirstSliderSlideFour ? asset($homeFirstSliderSlideFour->image) : '';

        // Set image file address for fifth slide
        //$this->fifthSlideImageAddress = $homeFirstSliderSlideFive ? asset($homeFirstSliderSlideFive->image) : '';

        
        // Set banner Link for first slide
        //$this->firstSlideLinkUrl = $homeFirstSliderSlideOne ? $homeFirstSliderSlideOne->url : '';

        // Set banner Link for second slide
        //$this->secondSlideLinkUrl = $homeFirstSliderSlideTwo ? $homeFirstSliderSlideTwo->url : '';

        // Set banner Link for third slide
        //$this->thirdSlideLinkUrl = $homeFirstSliderSlideThree ? $homeFirstSliderSlideThree->url : '';

        // Set banner Link for fourth slide
        //$this->fourthSlideLinkUrl = $homeFirstSliderSlideFour ? $homeFirstSliderSlideFour->url : '';
        
        // Set banner Link for fifth slide
        //$this->fifthSlideLinkUrl = $homeFirstSliderSlideFive ? $homeFirstSliderSlideFive->url : '';
    }

    public function render()
    {
        return view('frontend.pages.home.livewire-components.main-content');
    }
}
