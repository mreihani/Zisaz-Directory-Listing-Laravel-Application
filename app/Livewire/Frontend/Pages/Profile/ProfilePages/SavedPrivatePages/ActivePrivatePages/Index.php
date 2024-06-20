<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\SavedPrivatePages\ActivePrivatePages;

use Livewire\Component;

class Index extends Component
{
    public $psites;

    public function mount() {
        $this->psites = auth()->user()->privateSite()->with([
            'footer',
            'hero',
            'hero.psiteHeroSliders',
        ])->get();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.saved-private-pages.component.active-private-pages.index');
    }
}
