<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityAll\Components;

use Livewire\Component;
use App\Models\Frontend\UserModels\Activity\Activity;

class Hero extends Component
{
    public $searchQuery;
    public $searchCategory;

    public function search() {

        $searchResults = null;

        if($this->searchCategory == '') {
            $searchResults = Activity::withWhereHas('subactivity', function($q){
                $q->where('item_title', 'like', '%'.$this->searchQuery.'%');
            })->get()->pluck('id');
        }

        if($this->searchCategory == 'آگهی ها') {
            $searchResults = Activity::where('activity_type','ads_registration')->withWhereHas('subactivity', function($q){
                $q->where('item_title', 'like', '%'.$this->searchQuery.'%');
            })->get()->pluck('id');
        }
        
        $this->dispatch('searchResults', 
            searchResults: $searchResults, 
        );
    }

    public function render()
    {
        return view('frontend.pages.activity.activity-all.livewire-components.hero');
    }
}
