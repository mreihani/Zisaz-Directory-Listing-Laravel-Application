<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\MyResume\ConGrp1\Sections\DemandingField;

use Livewire\Component;
use App\Models\Profile\ShopActGrp;
use Illuminate\Validation\Validator;
use Stevebauman\Purify\Facades\Purify;
use App\Models\ProvinceAndCity\Province;
use App\Models\ContractType\ContractType;
use App\Rules\Profile\Resume\PaymentValidationRule;
use App\Rules\Profile\Resume\SelectedCityIdValidationRule;
use App\Rules\Profile\Resume\SelectedProvinceIdValidationRule;
use App\Rules\Profile\Resume\SelectedWorkExpIdsValidationRule;
use App\Rules\Profile\Resume\SelectedContractTypeValidationRule;

class Index extends Component
{
    public $resumeSectionNumber;

    // province and cities repeater section
    public $i;
    public $inputs;
    public $saveResumeDemadingFieldProvince;

    // work experience section
    public $workExpArray;
    public $selectedWorkExpIds;
    public $saveResumeDemadingFieldWorkExp;
   
    protected function rules()
    {
        return 
        [
            'selectedWorkExpIds' => new SelectedWorkExpIdsValidationRule(),
        ];
	}
    
    protected $messages = [
        'paymentAmountFrom.required' => 'لطفا حداقل حقوق درخواستی خود را مشخص نمایید.',
        'paymentAmountFrom.integer' => 'لطفا حداقل حقوق درخواستی صحیح را وارد نمایید.',
        'paymentAmountFrom.min' => 'لطفا حداقل حقوق درخواستی صحیح را وارد نمایید.',
        'paymentAmountTo.required' => 'لطفا حداکثر حقوق درخواستی خود را مشخص نمایید.',
        'paymentAmountTo.integer' => 'لطفا حداکثر حقوق درخواستی صحیح را وارد نمایید.',
        'paymentAmountType.required' => 'لطفا نوع حقوق درخواستی خود را مشخص نمایید.',
    ];

    public function mount() {
        $this->resumeSectionNumber = 2;

        // province and cities repeater section
        $this->i = $this->getIterationNumber();
        $this->inputs = $this->getInitialInput();

        // work experience section
        $this->workExpArray = ShopActGrp::whereBetween('id', [89, 141])->get()->chunk($this->calculateChunkNumber())->toArray();
        $this->selectedWorkExpIds = $this->selectedWorkExpArray();
    }

    private function isResumeFiled() {
        return !! (
            auth()->user()->userProfile 
            && auth()->user()->userProfile->userProfileResume 
            && auth()->user()->userProfile->userProfileResume->resumeField
        );
    }

    public function backward() {
        $this->dispatch('resumeSectionNumber', resumeSectionNumber: 1 );
    }

    // province and cities repeater section
    private function getIterationNumber() {
        if($this->isResumeFiled()) {
            return auth()->user()->userProfile->userProfileResume->resumeField->cities->count() + 1;
        }

        return 2;
    }

    private function getInitialInput() {
        if($this->isResumeFiled()) {
            $cityCount = auth()->user()->userProfile->userProfileResume->resumeField->cities->count();

            if($cityCount > 0) {

                $cityArray = [];

                for ($i=0; $i < $cityCount; $i++) { 
                    $cityArray[$i] = $i + 1;
                }

                return $cityArray;
            }
        }

        return [0 => 1];
    }

    public function add($i) {
        $this->i = $i + 1;
        $this->cities[$i] = [];
        $this->selectedProvinceId[$i] = [''];
        $this->selectedCityId[$i] = [''];
        array_push($this->inputs, $i);
    }

    public function remove($key) {
        if(count($this->inputs) > 1) {
            unset($this->inputs[$key]);    
        }

        foreach($this->selectedCityId as $key => $value) {
            if(!in_array($key, $this->inputs)) {
                unset($this->selectedCityId[$key]);
            }
        }
    }
    // End of - province and cities repeater section

    // Work experience section
    private function selectedWorkExpArray() {
        $selectedArray = $this->isResumeFiled() ? auth()->user()->userProfile->userProfileResume->resumeField->shopActGroups->pluck('id')->toArray() : null;
        if($selectedArray) {
            $selectedValuesArray = [];
            foreach ($selectedArray as $value) {
                $selectedValuesArray[$value] = true;
            }
            return $selectedValuesArray;
        }
        return []; 
    }

    private function saveResumeDemadingFieldWorkExp() {

        $selectedWorkExpIdsArray = [];
        foreach ($this->selectedWorkExpIds as $key => $value) {
            if($value) {
                $selectedWorkExpIdsArray[] = Purify::clean($key);
            }
        }
       
        auth()->user()->userProfile->userProfileResume->resumeField->shopActGroups()->sync($selectedWorkExpIdsArray, true);
    }

    private function calculateChunkNumber() {

        // Employer
        $totalCount = ShopActGrp::whereBetween('id', [89, 141])->count();

        return (int) ceil($totalCount / 4);
    }
    // End of - Work experience section

    public function save() {

        $this->validate();

        $userProfile = auth()->user()->userProfile()->firstOrCreate(['user_id' => auth()->user()->id]);
        $userProfileResume = $userProfile->userProfileResume()->firstOrCreate(['user_profile_id' => $userProfile->id]);
        $resumeField = $userProfileResume->resumeField()->firstOrCreate([
            'profile_resume_id' => $userProfileResume->id,
        ]);

        // Store selected work exp array into DB
        $this->saveResumeDemadingFieldWorkExp();

        $this->dispatch('resumeSectionNumber', resumeSectionNumber: 4 );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.my-resume.component.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.demanding-field.index');
    }
}
