<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings\ConGrp11;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile\ShopActCat;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Profile\ProfileInfo\SelectedShopActGrpsIdValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $shopActGrpsId;
    public $shopActGrpsArray;

    public function mount() {
        $this->profile_image = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image)
        ? asset(auth()->user()->userProfile->userProfileInformation->profile_image) :
        null;
        
        $this->gender = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->gender)
        ? auth()->user()->userProfile->userProfileInformation->gender : '';   

        $this->shopActGrpsId = $this->selectedshopActGrpsArray();
        $this->shopActGrpsArray = ShopActCat::find(18)->shopActivityGroup->chunk(1)->toArray();
    }

    protected function rules()
    {
        return 
        [
            'shopActGrpsId' => new SelectedShopActGrpsIdValidationRule(),
        ];
	}
    
    private function isProfileInfo() {
        return !! (
            auth()->user()->userProfile 
            && auth()->user()->userProfile->userProfileInformation
            && auth()->user()->userProfile->userProfileInformation->shopActGroups
        );
    }

    private function selectedshopActGrpsArray() {
        $selectedArray = $this->isProfileInfo() ? auth()->user()->userProfile->userProfileInformation->shopActGroups->pluck('id')->toArray() : null;
        if($selectedArray) {
            $selectedValuesArray = [];
            foreach ($selectedArray as $value) {
                $selectedValuesArray[$value] = true;
            }
            return $selectedValuesArray;
        }
        return []; 
    }

    private function calculateChunkNumber() {
       
        $totalCount = ShopActCat::find(18)->shopActivityGroup->count();

        return (int) ceil($totalCount / 4);
    }

    private function storeSelectedShopActGrpsId($userProfileInformation) {
        $selectedShopActGrpsIdArray = [];
        foreach ($this->shopActGrpsId as $key => $value) {
            if($value) {
                $selectedShopActGrpsIdArray[] = Purify::clean($key);
            }
        }
        
        $userProfileInformation->shopActGroups()->sync($selectedShopActGrpsIdArray, true);
    }

    public function saveProfile() {
        
        // Validate user input
        $this->validate();
        
        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        // Save user profile
        $userProfile = auth()->user()->userProfile()->firstOrCreate([
            'user_id' => auth()->user()->id
        ]);

        $userProfileInformation = $userProfile->userProfileInformation()->updateOrCreate([
            'user_profile_id' => $userProfile->id
        ],[
            'profile_image' => $profileImageAddress,
        ]);

        // Store store selected shop act grps id into db
        $this->storeSelectedShopActGrpsId($userProfileInformation);

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );
    }

    private function handleFileUpload() {

        if(is_null($this->profile_image)) {
            return null;
        }

        // Remove exsting profile image
        if(
            auth()->user()->userProfile
            && auth()->user()->userProfile->userProfileInformation
            && auth()->user()->userProfile->userProfileInformation->profile_image
            ) {
            unlink(auth()->user()->userProfile->userProfileInformation->profile_image);
        }

        $userId = auth()->user()->id;
        $dir = 'storage/upload/profile-images/' . $userId;

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->profile_image)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');
        
        Storage::disk('public')->put('upload/profile-images/' . $userId . '/' . $filename, $img);

        return $dir . '/' . $filename;
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.profile-settings.component.con-grp11.index');
    }
}
