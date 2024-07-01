<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedAds\RejectedAds;

use Livewire\Component;

class Index extends Component
{
    public $userAds;

    public function mount() {
        $this->userAds = auth()->user()->activity()->queryWithVerifyStatusRejected()->where('activity_type', 'ads_registration')->with('subactivity')->get();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.saved-ads.component.rejected-ads.index');
    }
}
