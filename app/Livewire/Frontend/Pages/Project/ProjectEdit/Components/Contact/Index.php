<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectEdit\Components\Contact;

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

    // office phone repeater form
    public $phone;
    public $phoneInputs;
    public $phoneIteration;

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
            $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);
           
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
            
            $this->getPhoneRepeaterFormInitialValues($project);
        }
    }

    private function getPhoneRepeaterFormInitialValues($project) {
        if(is_null($project->projectContact) || (!is_null($project->projectContact) && count($project->projectContact->projectContactPhoneItems) === 0)) {
            $this->phone = [];
            $this->phoneInputs = [0];
            $this->phoneIteration = 1;
        } elseif(!is_null($project->projectContact) && count($project->projectContact->projectContactPhoneItems) > 0) {
            $this->phone = $project->projectContact->projectContactPhoneItems->pluck('phone')->toArray();
            $this->phoneInputs = $project->projectContact->projectContactPhoneItems->keys()->toArray();
            $this->phoneIteration = $project->projectContact->projectContactPhoneItems->count();
        }
    }

    // phone repeater form
    public function addPhone($phoneIteration) {
        if(count($this->phoneInputs) < 4) {
            $this->phone[$phoneIteration] = null;
            $this->phoneIteration = $phoneIteration + 1;
            array_push($this->phoneInputs, $phoneIteration);
        } 
    }
    public function removePhone($phoneKey) {
        if(count($this->phoneInputs) > 1) {
            unset($this->phoneInputs[$phoneKey]);    
            unset($this->phone[$phoneKey]); 
        }
    }

    // load city based on province
    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }

    // save phones into DB
    private function savePhoneHandler($project, $contact) {

        if(count($this->phone) == 0) {
            return;
        }
        
        $contact->projectContactPhoneItems()->delete();

        foreach ($this->phone as $key => $value) {

            if($value == "") {
                continue;
            }

            $contact->projectContactPhoneItems()->create([
                'phone' => Purify::clean(trim($value)),
            ]);
        }
    }

    // check if project id is related to the owner
    private function isProjectOwner($projectId) {
      
        $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);

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

        $project->update([
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
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

        // save office phones into DB
        $this->savePhoneHandler($project, $contact);

        $this->dispatch('projectSectionNumber', 
            projectSectionNumber: 4, 
        );
    }

    public function render()
    {
        return view('frontend.pages.project.project-edit.components.project-sections.contact.index');
    } 
}
