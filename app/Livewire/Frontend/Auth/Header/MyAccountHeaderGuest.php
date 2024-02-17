<?php

namespace App\Livewire\Frontend\Auth\Header;

use Livewire\Component;

class MyAccountHeaderGuest extends Component
{
    public function render()
    {
        return view('frontend.layouts.header.auth-modals.my-account.header-guest');
    }
}
