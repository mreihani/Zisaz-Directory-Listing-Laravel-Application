<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedAds;

use Livewire\Component;

class Index extends Component
{
    public $userAds;

    public function mount() {
        $this->userAds = auth()->user()->activity()->where('activity_type', 'ads_registration')->with('subactivity')->get();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.saved-ads.component.index');
    }
}
