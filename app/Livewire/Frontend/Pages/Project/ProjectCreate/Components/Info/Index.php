<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectCreate\Components\Info;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;
use App\Rules\Project\Info\ProjectSliderImagesValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $projectId;
    public $projectSectionNumber;
    
    // project information
    public $title;
    public $projectType;
    public $totalArea;
    public $floorCount;
    public $floorArea;
    public $constructorBio;

    // project images repeater form
    public $projectInputs;
    public $projectImages;
    public $projectIteration;

    public $firstname;
    public $lastname;

    protected function rules() {
        return [
            'title' => 'required',
            'projectType' => 'required',
            'totalArea' => 'required|numeric|min:0',
            'floorCount' => 'required|integer|min:0',
            'floorArea' => 'required|numeric|min:0',
            'projectImages.*' => new ProjectSliderImagesValidationRule(),
            'firstname' => 'required',
            'lastname' => 'required',
        ];
    }

    protected $messages = [
        'title.required' => 'نام پروژه را مشخص نمایید.',
        'projectType.required' => 'نوع پروژه را مشخص نمایید.',
        'totalArea.required' => 'مساحت کل زمین را وارد نمایید.',
        'totalArea.numeric' => 'مساحت کل زمین را به درستی وارد نمایید.',
        'totalArea.min' => 'مساحت کل زمین را به درستی وارد نمایید.',
        'floorCount.required' => 'تعداد طبقات را وارد نمایید.',
        'floorCount.integer' => 'تعداد طبقات را به درستی وارد نمایید.',
        'floorCount.min' => 'تعداد طبقات را به درستی وارد نمایید.',
        'floorArea.required' => 'مساحت کل زیر بنا را وارد نمایید.',
        'floorArea.numeric' => 'مساحت کل زیر بنا را به درستی وارد نمایید.',
        'floorArea.min' => 'مساحت کل زیر بنا را به درستی وارد نمایید.',
        'firstname.required' => 'لطفا نام خود را وارد نمایید',
        'lastname.required' => 'لطفا نام خانوادگی خود را وارد نمایید',
    ];

    public function mount() {
        $this->getInitialValues();

        $this->firstname = auth()->user()->firstname ?? '';
        $this->lastname = auth()->user()->lastname ?? '';
    }

    private function getInitialValues() {
        if(is_null($this->projectId)) {
            $this->projectType = "";

            // project image repeater form
            $this->projectImages = [null];
            $this->projectInputs = [0];
            $this->projectIteration = 1;
        } else {
            $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);
            
            $this->projectType = $project->project_type;
            $this->title = !is_null($project->projectInfo) && !is_null($project->projectInfo->title) ? $project->projectInfo->title : "";
            $this->totalArea = !is_null($project->projectInfo) && !is_null($project->projectInfo->total_area) ? $project->projectInfo->total_area : "";
            $this->floorCount = !is_null($project->projectInfo) && !is_null($project->projectInfo->floor_count) ? $project->projectInfo->floor_count : "";
            $this->floorArea = !is_null($project->projectInfo) && !is_null($project->projectInfo->floor_area) ? $project->projectInfo->floor_area : "";
            $this->constructorBio = !is_null($project->projectInfo) && !is_null($project->projectInfo->constructor_bio) ? $project->projectInfo->constructor_bio : "";
            
            // project image repeater form
            $this->projectImages = $project->projectImages->pluck('image_sm')->toArray();
            $this->projectInputs = $project->projectImages->keys()->toArray();
            $this->projectIteration = $project->projectImages->count();
        }
    }

    public function addProjectImage($projectIteration) {
        if(count($this->projectInputs) < 30) {
            $this->projectIteration = $projectIteration + 1;
            $this->projectImages[$projectIteration] = null;
            array_push($this->projectInputs, $projectIteration);
        }
    }
    public function removeProjectImage($projectKey) {
        if(count($this->projectInputs) > 1) {
            unset($this->projectInputs[$projectKey]);    
            unset($this->projectImages[$projectKey]);    
        }
    }

    // upload project images 
    private function handleProjectImagesUpload($project) {
        
        if(count($this->projectImages) == 0) {
            return;
        }
        
        $dir = 'storage/upload/project-resources/' . $project->id . '/info';

        // for more than 1 item iteration
        foreach ($this->projectImages as $key => $value) {
        
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
                $img = Image::make($value)->fit(1119,630)->encode('jpg');
                $image_path = $dir . '/' . $filename;
                Storage::disk('public')->put('upload/project-resources/' . $project->id . '/info' . '/' . $filename, $img);

                // for thumbnails
                $unique_image_name_sm = hexdec(uniqid());
                $filename_sm = $unique_image_name_sm . '.' . 'jpg';
                $img_sm = Image::make($value)->fit(428,195)->encode('jpg');
                $image_path_sm = $dir . '/' . $filename_sm;
                Storage::disk('public')->put('upload/project-resources/' . $project->id . '/info' . '/' . $filename_sm, $img_sm);

                $project->projectImages()->create([
                    'image' => $image_path,
                    'image_sm' => $image_path_sm,
                ]);
            } else {
                
                // this is for items already stored in the database and server
                $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);
                $projectImages = $project->projectImages;
               
                // delete items from DB and server
                foreach ($projectImages as $projectImageItem) {
                    if(!in_array($projectImageItem->image_sm, $this->projectImages)) {
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

    // check if project id is related to the owner
    private function isProjectOwner($projectId) {
        // in this case, the user is submitting a new project
        if(is_null($this->projectId)) {
            $project = auth()->user()->project()->create([
                'project_type' => Purify::clean($this->projectType),
                'slug' => Str::random() .''. Project::getLatestId(),
            ]);

        // in this case, the user has already submitted a project, and is trying to edit that
        } else {
            $project = Project::queryWithAllVerificationStatuses()->findOrFail($this->projectId);

            // the user is trying to edit a project that does not belong to himself/herself
            if(!auth()->check() || $project->user->id !== auth()->user()->id) {
                abort(403);
            } 

            // update incoming inputs
            $project->update([
                'project_type' => Purify::clean($this->projectType),
            ]);
        }

        return $project;
    }

    public function save() {  
       
        $this->validate();

        auth()->user()->update([
            'firstname' => auth()->user()->firstname ?? Purify::clean(trim($this->firstname)),
            'lastname' => auth()->user()->lastname ?? Purify::clean(trim($this->lastname)),
        ]);

        $project = $this->isProjectOwner($this->projectId);

        $project->update([
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
        $project->projectInfo()->updateOrCreate([
            'project_id' => $project->id
        ],[
            'title' => Purify::clean($this->title),
            'total_area' => Purify::clean($this->totalArea),
            'floor_count' => Purify::clean($this->floorCount),
            'floor_area' => Purify::clean($this->floorArea),
            'constructor_bio' => Purify::clean($this->constructorBio),
        ]);

        //save project images into DB
        $this->handleProjectImagesUpload($project);

        $this->dispatch('projectSectionNumber', 
            projectSectionNumber: 2, 
        );

        // set navigation class status to true, therefore the number link will ba clickable
        $this->dispatch('isNavItemActive', 
            isNavItemActive: true, 
        );

        $this->dispatch('projectId', 
            projectId: $project->id, 
        );
    }

    public function render()
    {
        return view('frontend.pages.project.project-create.components.project-sections.info.index');
    } 
}
