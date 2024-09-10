<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Info;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\Info\PrivateSiteInfoLogoImageValidationRule;
use App\Rules\PrivateSite\Info\PrivateSiteInfoBusinessBannerValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;

    public $slug;
    public $title;
    public $aboutUs;

    // تصویر لوگو
    public $logo;
    public $logoValidation;

    // تصویر تابلو کسب و کار
    public $businessBanner;
    public $businessBannerValidation;

    protected function rules() {
        return [
            'slug' => !empty($this->slug) ? Rule::unique('psites')->ignore($this->privateSiteId, 'id') : '',
            'title' => 'required',
            'aboutUs' => 'required',
            'logoValidation' => new PrivateSiteInfoLogoImageValidationRule($this->logo),
            'businessBannerValidation' => new PrivateSiteInfoBusinessBannerValidationRule($this->businessBanner),
        ];
    }
    
    protected $messages = [
        'slug.required' => 'لطفا اسلاگ را وارد نمایید.',
        'slug.string' => 'لطفا اسلاگ صحیح را وارد نمایید.',
        'slug.regex' => 'لطفا اسلاگ را به انگلیسی با حروف لاتین وارد نمایید.',
        'slug.unique' => 'این عبارت قبلا در سامانه ثبت شده است. لطفا عبارت دیگری انتخاب نمایید.',
        'title.required' => 'لطفا نام کسب و کار را وارد نمایید',
        'aboutUs.required' => 'لطفا اطلاعات مربوط به درباره ما را وارد نمایید',
    ];

    public function mount() {
        // load form initial inputs based on create or update mode
        $this->loadInitialValues();
    }

    private function loadInitialValues() {
        if(is_null($this->privateSiteId)) {
            $this->logo = null; 
            $this->businessBanner = null; 
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);

            $this->slug = $psite->slug;
            $this->title = is_null($psite->info) ? null : $psite->info->title; 
            $this->aboutUs = is_null($psite->info) ? null : $psite->info->about_us; 
            $this->logo = is_null($psite->info) ? null : $psite->info->logo; 
            $this->businessBanner = is_null($psite->info) ? null : $psite->info->business_banner; 
        }
    }

    private function generateSlug() {

        if(empty(trim($this->slug))) {
            $slug = str_replace(' ', '-', Purify::clean($this->title)) .'-'. Str::random() .''. Psite::getLatestId();
        } else {
            $slug = strtolower(str_replace(' ', '-', Purify::clean(trim($this->slug))));
        }
        
        return $slug;
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {

        // in this case, the user is submitting a new private website
        if(is_null($this->privateSiteId)) {
            $psite = auth()->user()->privateSite()->create([
                'slug' => $this->generateSlug(),
            ]);

        // in this case, the user has already submitted a private website, and is trying to edit that
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);

            // the user is trying to edit a private website that does not belong to himself/herself
            if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
                abort(403);
            } 

            // update incoming inputs
            $psite->update([
                'slug' => $this->generateSlug(),
            ]);
        }
       
        // the user has finally authorized to edit a private website item that belongs to himself/herself
        return $psite;
    }

    private function handleBussinessBannerUpload($psite) {

        if(!is_string($this->businessBanner) && !is_null($this->businessBanner)) {

            // remove previous businessBanner if available
            if(!is_null($psite->info) && !is_null($psite->info->business_banner)) {
                $businessBanner = $psite->info->business_banner;
                unlink($businessBanner);
            }

            $dir = 'upload/private-website-resources/' . $psite->id . '/info';

            $unique_banner_name = hexdec(uniqid());
            $filename = $unique_banner_name . '.' . 'jpg';
            $img = Image::make($this->businessBanner)->fit(360, 200)->encode('jpg');
            $banner_path = $dir . '/' . $filename;
            Storage::disk('public')->put($banner_path, $img);

            return 'storage/upload/private-website-resources/' . $psite->id . '/info' . '/' . $filename;
        } else {
            return $this->businessBanner;
        }
    }

    private function handleLogoUpload($psite) {

        if(!is_string($this->logo) && !is_null($this->logo)) {

            // remove previous logo if available
            if(!is_null($psite->info) && !is_null($psite->info->logo)) {
                $logo = $psite->info->logo;
                unlink($logo);
            }

            $dir = 'upload/private-website-resources/' . $psite->id . '/info';

            $unique_logo_name = hexdec(uniqid());
            $filename = $unique_logo_name . '.' . 'jpg';
            $img = Image::make($this->logo)->fit(100, 100)->encode('jpg');
            $logo_path = $dir . '/' . $filename;
            Storage::disk('public')->put($logo_path, $img);

            return 'storage/upload/private-website-resources/' . $psite->id . '/info' . '/' . $filename;
        } else {
            return $this->logo;
        }
    }

    public function save() {  
        
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);
        
        $psite->update([
            'verify_status' => 'pending',
            'reject_description' => NULL,
        ]);

        $contactUs = $psite->info()->updateOrCreate([
            'psite_id' => $psite->id
        ],[
           'business_banner' => $this->handleBussinessBannerUpload($psite),
           'logo' => $this->handleLogoUpload($psite),
           'title' => Purify::clean(trim($this->title)),
           'about_us' => Purify::clean(trim($this->aboutUs)),
        ]);

        // set navigation class status to true, therefore the number link will ba clickable
        $this->dispatch('isNavItemActive', 
            isNavItemActive: true, 
        );
        
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 2, 
        );

        $this->dispatch('privateSiteId', 
            privateSiteId: $psite->id, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.info.index');
    } 
}
