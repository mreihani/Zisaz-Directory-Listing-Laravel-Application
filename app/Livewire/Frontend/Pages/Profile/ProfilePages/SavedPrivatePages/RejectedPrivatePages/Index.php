<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedPrivatePages\RejectedPrivatePages;

use Livewire\Component;

class Index extends Component
{
    public $psites;

    public function mount() {
        $this->psites = auth()->user()->privateSite()->queryWithVerifyStatusRejected()->with([
            'info',
            'contactUs',
            'promotionalVideo',
            'licenses',
            'members',
        ])->get();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.saved-private-pages.component.rejected-private-pages.index');
    }
}
