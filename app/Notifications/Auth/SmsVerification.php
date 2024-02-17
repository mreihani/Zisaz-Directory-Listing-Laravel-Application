<?php

namespace App\Notifications\Auth;

use App\Notifications\Auth\Channels\MeliPayamakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SmsVerification extends Notification
{
    use Queueable;
    
    public $code;
    public $phone;
    
    public function __construct($code, $phone)
    {
        $this->code = $code;
        $this->phone = $phone;
    }

    public function via(object $notifiable): array
    {
        return [MeliPayamakChannel::class];
    }

    public function toMeliPayamak($notifiable) {
        return [
          'code' => $this->code,
          'phone' => $this->phone,
        ];
    }
}


