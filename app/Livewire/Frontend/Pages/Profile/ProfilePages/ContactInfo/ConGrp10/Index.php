<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ContactInfo\ConGrp10;

use Livewire\Component;
use Stevebauman\Purify\Facades\Purify;
use App\Models\ProvinceAndCity\Province;

class Index extends Component
{
    public $provinces;
    public $selectedProvinceId;
    public $cities;
    public $selectedCityId;
    public $address;

    protected function rules()
    {
        return 
        [
            'selectedProvinceId' => 'required',
            'selectedCityId' => 'required',
        ];
	}

    protected $messages = [
        'selectedProvinceId.required' => 'لطفا استان را انتخاب نمایید.',
        'selectedCityId.required' => 'لطفا شهر را انتخاب نمایید.',
    ];

    public function mount() {
        $this->provinces = Province::all();

        $this->cities = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileContact
        && auth()->user()->userProfile->userProfileContact->city)
        ? auth()->user()->userProfile->userProfileContact->city->province->city : [];

        $this->selectedProvinceId = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileContact
        && auth()->user()->userProfile->userProfileContact->city)
        ? auth()->user()->userProfile->userProfileContact->city->province->id : '';

        $this->selectedCityId = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileContact
        && auth()->user()->userProfile->userProfileContact->city)
        ? auth()->user()->userProfile->userProfileContact->city->id : '';

        $this->address = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileContact
        && auth()->user()->userProfile->userProfileContact->address)
        ? auth()->user()->userProfile->userProfileContact->address : '';
    }

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }

    public function saveProfile() {
        
        // Validate user input
        $this->validate();
        
        // // Save user profile
        $userProfile = auth()->user()->userProfile()->firstOrCreate([
            'user_id' => auth()->user()->id
        ]);

        $userProfile->userProfileContact()->updateOrCreate([
            'user_profile_id' => $userProfile->id
        ],[
            'city_id' => Purify::clean($this->selectedCityId),
            'address' => Purify::clean($this->address),
        ]);

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.contact-info.component.con-grp10.index');
    }
}
