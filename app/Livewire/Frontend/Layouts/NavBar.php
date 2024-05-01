<?php

namespace App\Livewire\Frontend\Layouts;

use Livewire\Component;

class NavBar extends Component
{
    public $myAccountHeaderAuth;
    public $isBannerShown;
    public $desktopBannerUrl;
    public $mobileBannerUrl;
    public $bannerLinkUrl;

    /**
     * Constructor for initializing class properties based on user authentication status.
     */
    public function mount() {
        // Check if the user is authenticated and set myAccountHeaderAuth and myAccountHeaderGuest accordingly
        $this->myAccountHeaderAuth = auth()->check();

        // This is for top banner
        $this->isBannerShown = true ;
        // Set URL of desktop banner
        $this->desktopBannerUrl = 'https://dkstatics-public.digikala.com/digikala-adservice-banners/af603731f7f4d7299a077400810c23e45968004b_1712849670.gif?x-oss-process=image';
        // Set URL of mobile banner
        $this->mobileBannerUrl = 'https://dkstatics-public.digikala.com/digikala-adservice-banners/27e467e008ae57738e8d44a85fb4e89849c377e5_1712849670.jpg?x-oss-process=image/quality,q_95';
        // Set banner Link url
        $this->bannerLinkUrl = 'https://www.google.com/';
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
