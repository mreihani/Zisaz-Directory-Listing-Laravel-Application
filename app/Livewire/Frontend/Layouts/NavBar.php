<?php

namespace App\Livewire\Frontend\Layouts;

use Livewire\Component;

class NavBar extends Component
{

    public $myAccountHeaderAuth;

    /**
     * Constructor for initializing class properties based on user authentication status.
     */
    public function __construct() {
        // Check if the user is authenticated and set myAccountHeaderAuth and myAccountHeaderGuest accordingly
        $this->myAccountHeaderAuth = auth()->check();
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
        return view('frontend.layouts.navbar');
    }
}
