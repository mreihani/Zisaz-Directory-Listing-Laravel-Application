<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectEdit\Components\Facility;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;
use App\Models\Frontend\ReferenceData\ProjectWelfareFacility\WelfareFacility;

class Index extends Component
{
    use WithFileUploads;

    public $projectId;
    public $projectSectionNumber;
    
    public $projectDescription;

    // welfare facility
    public $welfareFacility;
    public $projectWelfareFacilitiesArray;

    // project images repeater form
    public $projectInputs;
    public $projectPlanImages;
    public $projectIteration;

    public function mount() {
        $this->projectWelfareFacilitiesArray = WelfareFacility::all()->chunk(5)->toArray();
       
        $this->getInitialValues();
    }

    private function getInitialValues() {
        if(is_null($this->projectId)) {
            
            $this->projectDescription = "";
            $this->welfareFacility = [];

            // project image repeater form
            $this->projectPlanImages = [null];
            $this->projectInputs = [0];
            $this->projectIteration = 1;
        } else {
            $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);

            $this->projectDescription = !is_null($project->projectFacility) && !is_null($project->projectFacility->project_description) ? $project->projectFacility->project_description : "";
            
            // set checkbox items related to welfare facilities
            $this->welfareFacility = [];
            foreach (WelfareFacility::all()->pluck('id')->toArray() as $checkedItemValue) {
                if(in_array($checkedItemValue, $project->welfareFacility->pluck('id')->toArray())) {
                    $this->welfareFacility[$checkedItemValue] = true;
                }
            }
            
            // project image repeater form
            $this->projectPlanImages = (!is_null($project->projectFacility) && count($project->projectFacility->projectPlanImages) > 0) ? $project->projectFacility->projectPlanImages->pluck('image_sm')->toArray() : [null];
            $this->projectInputs = (!is_null($project->projectFacility) && count($project->projectFacility->projectPlanImages) > 0) ? $project->projectFacility->projectPlanImages->keys()->toArray() : [0];
            $this->projectIteration = (!is_null($project->projectFacility) && count($project->projectFacility->projectPlanImages) > 0) ? $project->projectFacility->projectPlanImages->count() : 1;
        }
    }
    
    // save welfare facility checkbox groups into DB
    private function saveWelfareFacilityHandler($project) {
       
        // get items which are true
        $welfareFacilityArray = [];
        foreach ($this->welfareFacility as $key => $value) {
            if($value) {
                $welfareFacilityArray[] = Purify::clean($key);
            }
        }
       
        $project->welfareFacility()->sync($welfareFacilityArray, true);
    }

    // upload project images 
    private function handleProjectPlanImagesUpload($project, $welfareFacility) {
        
        if(count($this->projectPlanImages) == 0) {
            return;
        }
        
        $dir = 'storage/upload/project-resources/' . $project->id . '/facility';

        // for more than 1 item iteration
        foreach ($this->projectPlanImages as $key => $value) {
        
            // allow only 30 images
            if($key > 30) {
                break;
            }

            // do not allow empty input files
            if(!isset($value)) {
                continue;
            }

            // check if new image is being sent, images from database have type of string
            if(!is_string($value)) {
                // for large images
                $unique_image_name = hexdec(uniqid());
                $filename = $unique_image_name . '.' . 'jpg';
                $img = Image::make($value)->encode('jpg')->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_path = $dir . '/' . $filename;
                Storage::disk('public')->put('upload/project-resources/' . $project->id . '/facility' . '/' . $filename, $img);
                
                // for thumbnails
                $unique_image_name_sm = hexdec(uniqid());
                $filename_sm = $unique_image_name_sm . '.' . 'jpg';
                $img_sm = Image::make($value)->fit(612,400)->encode('jpg');
                $image_path_sm = $dir . '/' . $filename_sm;
                Storage::disk('public')->put('upload/project-resources/' . $project->id . '/facility' . '/' . $filename_sm, $img_sm);

                $welfareFacility->projectPlanImages()->create([
                    'image' => $image_path,
                    'image_sm' => $image_path_sm,
                ]);
            } else {
                
                // this is for items already stored in the database and server
                $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);
                $projectPlanImages = $project->projectFacility->projectPlanImages;
               
                // delete items from DB and server
                foreach ($projectPlanImages as $projectImageItem) {
                    if(!in_array($projectImageItem->image_sm, $this->projectPlanImages)) {
                        // here remove image from server disk
                        unlink($projectImageItem->image);
                        unlink($projectImageItem->image_sm);

                        // here delete item from database
                        $projectImageItem->delete();
                    }
                }
            }
        }
    }

    public function addProjectImage($projectIteration) {
        if(count($this->projectInputs) < 30) {
            $this->projectIteration = $projectIteration + 1;
            $this->projectPlanImages[$projectIteration] = null;
            array_push($this->projectInputs, $projectIteration);
        }
    }
    public function removeProjectImage($projectKey) {
        if(count($this->projectInputs) > 1) {
            unset($this->projectInputs[$projectKey]);    
            unset($this->projectPlanImages[$projectKey]);    
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
            projectSectionNumber: 1, 
        );
    }
    
    public function save() {  
       
        $project = $this->isProjectOwner($this->projectId);

        $project->update([
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
        $welfareFacility = $project->projectFacility()->updateOrCreate([
            'project_id' => $project->id
        ],[
            'project_description' => Purify::clean($this->projectDescription),
        ]);
        
        //save welfare facility items
        $this->saveWelfareFacilityHandler($project);

        // upload plan images
        $this->handleProjectPlanImagesUpload($project, $welfareFacility);

        $this->dispatch('projectSectionNumber', 
            projectSectionNumber: 3, 
        );
    }

    public function render()
    {
        return view('frontend.pages.project.project-edit.components.project-sections.facility.index');
    } 
}
