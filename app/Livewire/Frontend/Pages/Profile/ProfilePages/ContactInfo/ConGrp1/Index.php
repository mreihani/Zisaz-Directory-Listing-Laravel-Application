<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ContactInfo\ConGrp1;

use Livewire\Component;
use Stevebauman\Purify\Facades\Purify;
use App\Models\ProvinceAndCity\Province;

class Index extends Component
{
    public $landline_telephone;
    public $provinces;
    public $selectedProvinceId;
    public $cities;
    public $selectedCityId;
    public $address;
    public $postal_code;

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
        $this->landline_telephone = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileContact
        && auth()->user()->userProfile->userProfileContact->landline_telephone)
        ? auth()->user()->userProfile->userProfileContact->landline_telephone : '';
        
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

        $this->postal_code = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileContact
        && auth()->user()->userProfile->userProfileContact->postal_code)
        ? auth()->user()->userProfile->userProfileContact->postal_code : '';
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
            'landline_telephone' => Purify::clean($this->landline_telephone),
            'city_id' => Purify::clean($this->selectedCityId),
            'address' => Purify::clean($this->address),
            'postal_code' => Purify::clean($this->postal_code),
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
        return view('frontend.pages.profile.profile-pages.contact-info.component.con-grp1.index');
    }
}
