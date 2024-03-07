<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\MyResume\Sections\DemandingField;

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
    public $provinces;
    public $selectedProvinceId;
    public $cities;
    public $selectedCityId;
    public $i;
    public $inputs;
    public $saveResumeDemadingFieldProvince;

    // work experience section
    public $workExpArray;
    public $selectedWorkExpIds;
    public $saveResumeDemadingFieldWorkExp;

    // contract type section
    public $contractTypeArray;
    public $selectedContractType;

    // payment amount section
    public $paymentAmountFrom;
    public $paymentAmountTo;
    public $paymentAmountType;

    protected function rules()
    {
        return 
        [
            'selectedProvinceId' => new SelectedProvinceIdValidationRule(),
            'selectedWorkExpIds' => new SelectedWorkExpIdsValidationRule(),
            'selectedContractType' => new SelectedContractTypeValidationRule(),
            'paymentAmountFrom' => ['required', 'integer', 'min:1000'],
            'paymentAmountTo' => ['required', 'integer', new PaymentValidationRule($this->paymentAmountFrom, $this->paymentAmountTo)],
            'paymentAmountType' => 'required',
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
        $this->paymentAmountFrom = $this->isResumeFiled() ? auth()->user()->userProfile->userProfileResume->resumeField->payment_amount_from : '';
        $this->paymentAmountTo = $this->isResumeFiled() ? auth()->user()->userProfile->userProfileResume->resumeField->payment_amount_to : '';
        $this->paymentAmountType = $this->isResumeFiled() ? auth()->user()->userProfile->userProfileResume->resumeField->payment_amount_type : 'monthly';
        $this->selectedContractType = $this->selectedContractTypeArray();
        $this->resumeSectionNumber = 2;
        $this->contractTypeArray = ContractType::all()->chunk(2)->toArray();

        // province and cities repeater section
        $this->i = $this->getIterationNumber();
        $this->provinces = Province::all();
        $this->selectedProvinceId = $this->getInitialSelectedProvinceId();
        $this->selectedCityId = $this->getInitialSelectedCityId();
        $this->inputs = $this->getInitialInput();
        $this->cities = $this->getInitialCity();

        // work experience section
        // employer
        $this->workExpArray = ShopActGrp::whereBetween('id', [89, 141])->get()->chunk($this->calculateChunkNumber())->toArray();
        // engineer
        //$this->workExpArray = ShopActGrp::whereBetween('id', [89, 107])->get()->chunk($this->calculateChunkNumber())->toArray();
        // worker
        //$this->workExpArray = ShopActGrp::whereBetween('id', [109, 141])->get()->chunk($this->calculateChunkNumber())->toArray();
        $this->selectedWorkExpIds = $this->selectedWorkExpArray();
    }

    private function isResumeFiled() {
        return !! (
            auth()->user()->userProfile 
            && auth()->user()->userProfile->userProfileResume 
            && auth()->user()->userProfile->userProfileResume->resumeField
        );
    }

    private function selectedContractTypeArray() {
        $selectedArray = $this->isResumeFiled() ? auth()->user()->userProfile->userProfileResume->resumeField->contactTypes->pluck('id')->toArray() : null;
        if($selectedArray) {
            $selectedValuesArray = [];
            foreach ($selectedArray as $value) {
                $selectedValuesArray[$value] = true;
            }
            return $selectedValuesArray;
        }
        return []; 
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

    public function provinceIdSelected($value)
    {
        $selectedProvinceId = $this->selectedProvinceId[$value];
        $this->cities[$value] = Province::find($selectedProvinceId)->city;
        $this->selectedCityId[$value] = $this->cities[$value]->first()->id;
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

    private function getInitialCity() {
        if($this->isResumeFiled()) {
            $cities = auth()->user()->userProfile->userProfileResume->resumeField->cities;

            $cityArray = [];
            foreach ($cities as $key => $value) {
                $cityArray[$key + 1] = $value->province->city;
            }
            return $cityArray;
        }

        return [1 => []];
    }

    private function getInitialSelectedProvinceId() {
        if($this->isResumeFiled()) {
            $cities = auth()->user()->userProfile->userProfileResume->resumeField->cities;

            $provinceArray = [];
            foreach ($cities as $key => $value) {
                $provinceArray[$key + 1] = $value->province->id;
            }
            return $provinceArray;
        }

        return [1 => ['']];
    }

    private function getInitialSelectedCityId() {
        if($this->isResumeFiled()) {
            $cities = auth()->user()->userProfile->userProfileResume->resumeField->cities;

            $cityArray = [];
            foreach ($cities as $key => $value) {
                $cityArray[$key + 1] = $value->id;
            }
            return $cityArray;
        }

        return [1 => ['']];
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

    private function saveResumeProvinceAndCity() {
        $selectedCityIdArray = Purify::clean(array_values($this->selectedCityId));
        auth()->user()->userProfile->userProfileResume->resumeField->cities()->sync($selectedCityIdArray, true); 
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

        // Engineer
        //$totalCount = ShopActGrp::whereBetween('id', [89, 107])->count();

        // Worker
        //$totalCount = ShopActGrp::whereBetween('id', [109, 141])->count();

        return (int) ceil($totalCount / 4);
    }
    // End of - Work experience section

    private function storeSelecteContractType() {
        $selectedContractTypeArray = [];
        foreach ($this->selectedContractType as $key => $value) {
            if($value) {
                $selectedContractTypeArray[] = Purify::clean($key);
            }
        }
        auth()->user()->userProfile->userProfileResume->resumeField->contactTypes()->sync($selectedContractTypeArray, true);
    }

    public function save() {

        $this->validate();

        $userProfile = auth()->user()->userProfile()->firstOrCreate(['user_id' => auth()->user()->id]);
        $userProfileResume = $userProfile->userProfileResume()->firstOrCreate(['user_profile_id' => $userProfile->id]);
        $resumeField = $userProfileResume->resumeField()->updateOrCreate([
            'profile_resume_id' => $userProfileResume->id,
        ],[
            'payment_amount_from' => Purify::clean($this->paymentAmountFrom),
            'payment_amount_to' => Purify::clean($this->paymentAmountTo),
            'payment_amount_type' => Purify::clean($this->paymentAmountType),
        ]);

        // Store selected contract type array into DB
        $this->storeSelecteContractType();

        // Store selected Province And City array into DB
        $this->saveResumeProvinceAndCity();

        // Store selected work exp array into DB
        $this->saveResumeDemadingFieldWorkExp();

        $this->dispatch('resumeSectionNumber', resumeSectionNumber: 3 );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.my-resume.component.sections.demanding-field.index');
    }
}
