<?php

namespace App\Livewire\Frontend\Pages\Home;

use Livewire\Component;
use App\Models\Frontend\UserModels\Activity\Activity;

class Index extends Component
{
    public $searchQuery;
    public $searchCategory;
    public $searchResults;
    public $adsRegistrations;

    public function mount() {
        $this->searchResults = null;
        $this->getAdsRegistrations();
    }

    private function getAdsRegistrations() {
        // load all ads with eager loading
        $this->adsRegistrations = Activity::where('activity_type','ads_registration')->with('subactivity')->orderBy('updated_at', 'DESC')->get();
    }

    // سرچ بار
    protected $listeners = [
        'searchResults' => 'searchResults',
    ];
    public function searchResults($searchResults) {
        $this->searchResults = Activity::find($searchResults);
    }

    public function render()
    {
        return view('frontend.pages.home.livewire-components.main-content');
    }
}
