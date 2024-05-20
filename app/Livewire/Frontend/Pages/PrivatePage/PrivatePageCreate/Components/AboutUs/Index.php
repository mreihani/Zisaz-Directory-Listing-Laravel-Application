<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\AboutUs;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;

    public $image;
    public $title;
    public $aboutUs;
    public $licenses;
    public $contactUs;
    public $isDisplayed;

    protected function rules() {
        return [
            'image' => 'required|mimes:jpg,jpeg,png,bmp|max:4096',
            'title' => 'required',
            'aboutUs' => 'required',
            'licenses' => 'required',
            'contactUs' => 'required',
        ];
    }

    protected $messages = [
        'image.required' => 'لطفا تصویر مربوط به درباره ما را بارگذاری نمایید',
        'image.mimes' => 'لطفا تصویر با فرمت مجاز را بارگذاری نمایید.',
        'image.max' => 'حجم تصویر بیشتر از مقدار مجاز است.',
        'title.required' => 'لطفا عنوان اصلی را وارد نمایید',
        'aboutUs.required' => 'لطفا اطلاعات مربوط به درباره ما را وارد نمایید',
        'licenses.required' => 'لطفا اطلاعات مربوط به مجوز ها و افتخارات را وارد نمایید',
        'contactUs.required' => 'لطفا اطلاعات تماس با ما را وارد نمایید',
    ];

    public function mount() {
        $this->privateSiteSectionNumber = 2; 
        $this->image = ""; 
    }

    private function handleImageUpload($psite) {
        $dir = 'upload/private-website-resources/' . $psite->id . '/about-us';

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';
        $img = Image::make($this->image)->fit(576, 562)->encode('jpg');
        $image_path = $dir . '/' . $filename;
        Storage::disk('public')->put($image_path, $img);

        return 'storage/upload/private-website-resources/' . $psite->id . '/about-us' . '/' . $filename;
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 1, 
        );
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

        if($psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    public function save() {  
      
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);

        $aboutUs = $psite->aboutUs()->create([
            'is_displayed' => $this->isDisplayed == true ? 1 : 0,
            'title' => Purify::clean($this->title),
            'about_us' => Purify::clean($this->aboutUs),
            'licenses' => Purify::clean($this->licenses),
            'contact_us' => Purify::clean($this->contactUs),
            'image' => $this->handleImageUpload($psite),
        ]);
        
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 3, 
        );

        // Show Toaster
        // $this->dispatch('showToaster', 
        //     title: '', 
        //     message: '
        //         اطلاعات با موفقیت ذخیره شد.
        //     ', 
        //     type: 'bg-success'
        // );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.about-us.index');
    } 
}
