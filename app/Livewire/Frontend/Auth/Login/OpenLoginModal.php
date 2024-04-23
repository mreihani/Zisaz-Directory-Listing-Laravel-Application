<?php

namespace App\Livewire\Frontend\Auth\Login;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class OpenLoginModal extends Component
{
    public $showPhone;
    public $phone;

    public function mount() {
        $this->showPhone = auth()->check();
    }

    // show login modal on login route
    public function openLoginModal() {
        $this->dispatch('showLoginModal', 
            showModal: true, 
        ); 
    }

    // listen to the event from SmsVerification component after successfull login attempt, it simply shows phone number afte login from modal
    protected $listeners = [
        'showPhone' => 'showPhone'
    ];
    public function showPhone($showPhone) {
        $this->showPhone = $showPhone;
    }

    public function render()
    {
        return view('frontend.layouts.header.auth-modals.login.open-login-modal');
    }
}
