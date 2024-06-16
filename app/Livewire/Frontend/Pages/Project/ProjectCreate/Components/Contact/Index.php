<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectCreate\Components\Contact;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;
use App\Rules\Project\Contact\SelectedCityValidationRule;
use App\Rules\Project\Contact\SelectedProvinceValidationRule;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\ProjectWelfareFacility\WelfareFacility;

class Index extends Component
{
    use WithFileUploads;

    public $projectId;
    public $projectSectionNumber;
    
    // province and city
    public $selectedProvinceIdValidation;
    public $selectedCityIdValidation;
    public $provinces;
    public $selectedProvinceId;
    public $cities;
    public $selectedCityId;

    // addresses
    public $projectAddress;

    // address repeater form
    public $officeAddress;
    public $officeAddressInputs;
    public $officeAddressIteration;

    // office phone repeater form
    public $officePhone;
    public $officePhoneInputs;
    public $officePhoneIteration;

    // mobile phone repeater form
    public $mobilePhone;
    public $mobilePhoneInputs;
    public $mobilePhoneIteration;
    
    // social media links
    public $instagram;
    public $telegram;
    public $whatsapp;
    public $x;
    public $linkedin;
    public $eitaa;

    protected function rules() {
        return [
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->selectedProvinceId),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->selectedCityId),
            'projectAddress' => 'required',
        ];
    }

    protected $messages = [
        'projectAddress.required' => 'لطفا آدرس پروژه را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->projectId)) {

            // provinces and cities    
            $this->provinces = Province::all();
            $this->cities = [];
            $this->selectedProvinceId = '';
            $this->selectedCityId = '';

        } else {
            $project = Project::findOrFail($this->projectId);
           
            // provinces and cities    
            $this->provinces = Province::all();
            $this->selectedProvinceId = !is_null($project->projectContact) && !is_null($project->projectContact->city) ? $project->projectContact->city->province->id : ''; 
            $this->cities = !is_null($project->projectContact) && !is_null($project->projectContact->city) ? $project->projectContact->city->province->city : []; 
            $this->selectedCityId = !is_null($project->projectContact) && !is_null($project->projectContact->city) ? $project->projectContact->city->id : '';

            // load address and social media
            $this->projectAddress = !is_null($project->projectContact) && !is_null($project->projectContact->project_address) ? $project->projectContact->project_address : "";
            $this->instagram = !is_null($project->projectContact) && !is_null($project->projectContact->instagram) ? $project->projectContact->instagram : "";
            $this->telegram = !is_null($project->projectContact) && !is_null($project->projectContact->telegram) ? $project->projectContact->telegram : "";
            $this->whatsapp = !is_null($project->projectContact) && !is_null($project->projectContact->whatsapp) ? $project->projectContact->whatsapp : "";  
            $this->x = !is_null($project->projectContact) && !is_null($project->projectContact->x) ? $project->projectContact->x : "";
            $this->linkedin = !is_null($project->projectContact) && !is_null($project->projectContact->linkedin) ? $project->projectContact->linkedin : "";  
            $this->eitaa = !is_null($project->projectContact) && !is_null($project->projectContact->eitaa) ? $project->projectContact->eitaa : "";  
            
            $this->getOfficeAddressesRepeaterFormInitialValues($project);
            $this->getOfficePhoneRepeaterFormInitialValues($project);
            $this->getMobilePhoneRepeaterFormInitialValues($project);
        }
    }

    private function getOfficeAddressesRepeaterFormInitialValues($project) {
        if(is_null($project->projectContact) || (!is_null($project->projectContact) && count($project->projectContact->projectContactOfficeAddressItems) === 0)) {
            $this->officeAddress = [];
            $this->officeAddressInputs = [0];
            $this->officeAddressIteration = 1;
        } elseif(!is_null($project->projectContact) && count($project->projectContact->projectContactOfficeAddressItems) > 0) {
            $this->officeAddress = $project->projectContact->projectContactOfficeAddressItems->pluck('address')->toArray();
            $this->officeAddressInputs = $project->projectContact->projectContactOfficeAddressItems->keys()->toArray();
            $this->officeAddressIteration = $project->projectContact->projectContactOfficeAddressItems->count();
        }
    }

    private function getOfficePhoneRepeaterFormInitialValues($project) {
        if(is_null($project->projectContact) || (!is_null($project->projectContact) && count($project->projectContact->projectContactOfficePhoneItems) === 0)) {
            $this->officePhone = [];
            $this->officePhoneInputs = [0];
            $this->officePhoneIteration = 1;
        } elseif(!is_null($project->projectContact) && count($project->projectContact->projectContactOfficePhoneItems) > 0) {
            $this->officePhone = $project->projectContact->projectContactOfficePhoneItems->pluck('phone')->toArray();
            $this->officePhoneInputs = $project->projectContact->projectContactOfficePhoneItems->keys()->toArray();
            $this->officePhoneIteration = $project->projectContact->projectContactOfficePhoneItems->count();
        }
    }

    private function getMobilePhoneRepeaterFormInitialValues($project) {
        if(is_null($project->projectContact) || (!is_null($project->projectContact) && count($project->projectContact->projectContactMobilePhoneItems) === 0)) {
            $this->mobilePhone = [];
            $this->mobilePhoneInputs = [0];
            $this->mobilePhoneIteration = 1;
        } elseif(!is_null($project->projectContact) && count($project->projectContact->projectContactMobilePhoneItems) > 0) {
            $this->mobilePhone = $project->projectContact->projectContactMobilePhoneItems->pluck('phone')->toArray();
            $this->mobilePhoneInputs = $project->projectContact->projectContactMobilePhoneItems->keys()->toArray();
            $this->mobilePhoneIteration = $project->projectContact->projectContactMobilePhoneItems->count();
        }
    } 

    // office address repeater form
    public function addOfficeAddress($officeAddressIteration) {
        if(count($this->officeAddressInputs) < 4) {
            $this->officeAddress[$officeAddressIteration] = null;
            $this->officeAddressIteration = $officeAddressIteration + 1;
            array_push($this->officeAddressInputs, $officeAddressIteration);
        } 
    }
    public function removeOfficeAddress($addressKey) {
        if(count($this->officeAddressInputs) > 1) {
            unset($this->officeAddressInputs[$addressKey]);    
            unset($this->officeAddress[$addressKey]);    
        }
    }

    // office phone repeater form
    public function addOfficePhone($officePhoneIteration) {
        if(count($this->officePhoneInputs) < 4) {
            $this->officePhone[$officePhoneIteration] = null;
            $this->officePhoneIteration = $officePhoneIteration + 1;
            array_push($this->officePhoneInputs, $officePhoneIteration);
        } 
    }
    public function removeOfficePhone($officePhoneKey) {
        if(count($this->officePhoneInputs) > 1) {
            unset($this->officePhoneInputs[$officePhoneKey]);    
            unset($this->officePhone[$officePhoneKey]); 
        }
    }

    // mobile phone repeater form
    public function addMobilePhone($mobilePhoneIteration) {
        if(count($this->mobilePhoneInputs) < 4) {
            $this->mobilePhone[$mobilePhoneIteration] = null;
            $this->mobilePhoneIteration = $mobilePhoneIteration + 1;
            array_push($this->mobilePhoneInputs, $mobilePhoneIteration);
        }
    }
    public function removeMobilePhone($mobilePhoneKey) {
        if(count($this->mobilePhoneInputs) > 1) {
            unset($this->mobilePhoneInputs[$mobilePhoneKey]);    
            unset($this->mobilePhone[$mobilePhoneKey]); 
        }
    }

    // load city based on province
    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }

    // save office addresses into DB
    private function saveOfficeAddressesHandler($project, $contact) {

        if(count($this->officeAddress) == 0) {
            return;
        }
        
        $contact->projectContactOfficeAddressItems()->delete();

        foreach ($this->officeAddress as $key => $value) {

            if($value == "") {
                continue;
            }

            $contact->projectContactOfficeAddressItems()->create([
                'address' => Purify::clean(trim($value)),
            ]);
        }
    }

    // save office phones into DB
    private function saveOfficePhoneHandler($project, $contact) {

        if(count($this->officePhone) == 0) {
            return;
        }
        
        $contact->projectContactOfficePhoneItems()->delete();

        foreach ($this->officePhone as $key => $value) {

            if($value == "") {
                continue;
            }

            $contact->projectContactOfficePhoneItems()->create([
                'phone' => Purify::clean(trim($value)),
            ]);
        }
    }

    // save mobile phones into DB
    private function saveMobilePhoneHandler($project, $contact) {

        if(count($this->mobilePhone) == 0) {
            return;
        }
        
        $contact->projectContactMobilePhoneItems()->delete();

        foreach ($this->mobilePhone as $key => $value) {

            if($value == "") {
                continue;
            }

            $contact->projectContactMobilePhoneItems()->create([
                'phone' => Purify::clean(trim($value)),
            ]);
        }
    }

    // check if project id is related to the owner
    private function isProjectOwner($projectId) {
      
        $project = Project::findOrFail($this->projectId);

        // the user is trying to edit a project that does not belong to himself/herself
        if(!auth()->check() || $project->user->id !== auth()->user()->id) {
            abort(403);
        } 

        return $project;
    }
    
    public function back() {
        $this->dispatch('projectSectionNumber', 
            projectSectionNumber: 2, 
        );
    }

    public function save() {  
       
        $this->validate();

        $project = $this->isProjectOwner($this->projectId);
        
        $contact = $project->projectContact()->updateOrCreate([
            'project_id' => $project->id
        ],[
            'city_id' => Purify::clean($this->selectedCityId),
            'project_address' => Purify::clean($this->projectAddress),
            'instagram' => Purify::clean($this->instagram),
            'telegram' => Purify::clean($this->telegram),
            'whatsapp' => Purify::clean($this->whatsapp),
            'x' => Purify::clean($this->x),
            'linkedin' => Purify::clean($this->linkedin),
            'eitaa' => Purify::clean($this->eitaa),
        ]);

        // save office addresses into DB
        $this->saveOfficeAddressesHandler($project, $contact);

        // save office phones into DB
        $this->saveOfficePhoneHandler($project, $contact);

        // save mobile phones into DB
        $this->saveMobilePhoneHandler($project, $contact);

        $this->dispatch('projectSectionNumber', 
            projectSectionNumber: 4, 
        );
    }

    public function render()
    {
        return view('frontend.pages.project.project-create.components.project-sections.contact.index');
    } 
}
