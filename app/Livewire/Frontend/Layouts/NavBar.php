<?php

namespace App\Livewire\Frontend\Layouts;

use Livewire\Component;
use App\Models\Frontend\Banners\BannerHomePage;

class NavBar extends Component
{
    public $myAccountHeaderAuth;
    public $isDesktopBannerShown;
    public $isMobileBannerShown;
    public $desktopBannerImageAddress;
    public $mobileBannerImageAddress;
    public $bannerLinkUrlDesktop;
    public $bannerLinkUrlMobile;

    /**
     * Constructor for initializing class properties based on user authentication status.
     */
    public function mount() {
        
        $homeTopBannerDesktop = BannerHomePage::where('position', 'home_top_banner_desktop')->first();
        $homeTopBannerMobile = BannerHomePage::where('position', 'home_top_banner_mobile')->first();
        
        // Check if the user is authenticated and set myAccountHeaderAuth and myAccountHeaderGuest accordingly
        $this->myAccountHeaderAuth = auth()->check();

        // This is for desktop banner at top
        $this->isDesktopBannerShown = ($homeTopBannerDesktop && $homeTopBannerDesktop->display_banner == 1) ? true : false;
        // This is for mobile banner at top
        $this->isMobileBannerShown = ($homeTopBannerMobile && $homeTopBannerMobile->display_banner == 1) ? true : false;
        // Set URL of desktop banner
        $this->desktopBannerImageAddress = $homeTopBannerDesktop ? asset($homeTopBannerDesktop->image) : '';
        // Set URL of mobile banner
        $this->mobileBannerImageAddress = $homeTopBannerMobile ? asset($homeTopBannerMobile->image) : '';
        // Set banner Link url desktop
        $this->bannerLinkUrlDesktop = $homeTopBannerDesktop ? $homeTopBannerDesktop->url : '';
        // Set banner Link url mobile
        $this->bannerLinkUrlMobile = $homeTopBannerMobile ? $homeTopBannerMobile->url : '';
    }

    protected $listeners = [
        'showMyAccountHeaderAuth' => 'showMyAccountHeaderAuth',
    ];

    /**
     * Set the my account header authentication flag to true.
     */
    public function showMyAccountHeaderAuth() {
        $this->myAccountHeaderAuth = true;
    }

    /**
     * Set the myAccountHeaderAuth property to false.
     */
    public function hideMyAccountHeaderAuth() {
        $this->myAccountHeaderAuth = false;
    }
    
    /**
     * Render the navigation bar view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('frontend.layouts.nav-bar');
    }
}
