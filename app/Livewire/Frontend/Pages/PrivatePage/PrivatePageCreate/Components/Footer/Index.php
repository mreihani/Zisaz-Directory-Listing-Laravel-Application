<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\Footer;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\Footer\PrivateSiteFooterLogoImageValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;

    public $logo;
    public $logoValidation;

    protected function rules() {
        return [
            'logoValidation' => new PrivateSiteFooterLogoImageValidationRule($this->logo),
        ];
    }

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->logo = null; 
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);
            $this->logo = is_null($psite->footer) ? null : $psite->footer->logo; 
        }
    }

    private function handleImageUpload($psite) {

        if(!is_string($this->logo) && !is_null($this->logo)) {

            // remove previous logo if available
            if(!is_null($psite->footer) && !is_null($psite->footer->logo)) {
                $logo = $psite->footer->logo;
                unlink($logo);
            }

            $dir = 'upload/private-website-resources/' . $psite->id . '/footer';

            $unique_logo_name = hexdec(uniqid());
            $filename = $unique_logo_name . '.' . 'jpg';
            $img = Image::make($this->logo)->fit(200, 200)->encode('jpg');
            $logo_path = $dir . '/' . $filename;
            Storage::disk('public')->put($logo_path, $img);

            return 'storage/upload/private-website-resources/' . $psite->id . '/footer' . '/' . $filename;
        } else {
            return $this->logo;
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 13, 
        );
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

        if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    public function save() {  
       
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);

        $footer = $psite->footer()->updateOrCreate([
            'psite_id' => $psite->id
        ],[
            'logo' => $this->handleImageUpload($psite),
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
        return view('frontend.pages.private-page.private-page-create.components.website-sections.footer.index');
    } 
}
