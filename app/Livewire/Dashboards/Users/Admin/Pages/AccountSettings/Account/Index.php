<?php

namespace App\Livewire\Dashboards\Users\Admin\Pages\AccountSettings\Account;

use Livewire\Component;
use App\Models\Profile\ShopActGrp;
use Illuminate\Validation\Validator;
use Stevebauman\Purify\Facades\Purify;

class Index extends Component
{
    // public $resumeSectionNumber;

    // protected function rules()
    // {
    //     return 
    //     [
    //         'selectedProvinceId' => 'required',
    //     ];
	// }

    // public function mount() {
        
    // }

    // public function save() {

    //     $this->validate();

      
    //     $this->dispatch('resumeSectionNumber', resumeSectionNumber: 4 );
    // }

    public function render()
    {
        return view('dashboards.users.admin.pages.account-settings.account.component.index');
    }
}
