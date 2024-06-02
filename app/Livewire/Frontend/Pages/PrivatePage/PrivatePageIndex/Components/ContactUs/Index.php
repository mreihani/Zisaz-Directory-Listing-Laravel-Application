<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageIndex\Components\ContactUs;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Purify\Facades\Purify;

class Index extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $isFormSent;
    public $emailToAddress;
    
    protected function rules() {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => ['required', config('phone-regex.ir.regex')],
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    protected $messages = [
        'name.required' => 'لطفا نام و نام خانوادگی را وارد نمایید.',
        'email.required' => 'لطفا ایمیل را وارد نمایید.',
        'email.email' => 'لطفا ایمیل صحیح وارد نمایید.',
        'phone.required' => 'لطفا شماره تماس را وارد نمایید.',
        'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید.',
        'subject.required' => 'لطفا موضوع را وارد نمایید.',
        'message.required' => 'لطفا پیام را وارد نمایید.',
    ];

    public function mount() {
        $this->isFormSent = false;
    }

    public function save() {    
        
        $validated = $this->validate();

        $mailable = new Mailable();
       
        $mailable
            ->from('info@zisaz.ir')
            ->to($this->emailToAddress)
            ->subject(Purify::clean($validated['subject']))
            ->html('نام و نام خانوادگی ارسال کننده: <br>' . Purify::clean($validated['name'])
             . '<br><br>شماره تلفن: <br>' . Purify::clean($validated['phone'])
              . '<br><br>ایمیل ارسال کننده: <br>' . Purify::clean($validated['email'])
               . '<br><br>پیام: <br>' . Purify::clean($validated['message']));

        $result = Mail::send($mailable);
        
        // Show Success Message
        $this->isFormSent = true;    
    }

   
    public function render()
    {
        return view('frontend.pages.private-page.private-page-index.components.website-sections.contact-us.index');
    } 
}
