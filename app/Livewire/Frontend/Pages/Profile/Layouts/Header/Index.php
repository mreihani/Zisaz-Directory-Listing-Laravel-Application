<?php

namespace App\Livewire\Frontend\Pages\Profile\Layouts\Header;

use App\Models\User;
use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Validation\Rule;
use Stevebauman\Purify\Facades\Purify;
use App\Notifications\Auth\SmsVerification;

class Index extends Component
{
    public $phone;

    public function mount() {
        $this->phone = auth()->user()->phone;
    }

    protected $listeners = [
        'headerPhone' => 'headerPhone'
    ];

    public function headerPhone($headerPhone) {
        $this->phone = $headerPhone;
    }
 
    public function render()
    {
        return view('frontend.pages.profile.layouts.component.index');
    }
}
