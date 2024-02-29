<?php

namespace App\Notifications\Auth\Channels;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;


class MeliPayamakChannel
{
    public function send($notifiable, Notification $notification)
    {
        $patternCode = config('services.sms.meli-payamak.pattern-code.opt');
        $username = config('services.sms.meli-payamak.username');
        $password = config('services.sms.meli-payamak.password');

        $data = $notification->toMeliPayamak($notifiable);
        $code = $data['code'];
        $phone = $data['phone'];

        ini_set("soap.wsdl_cache_enabled","0");
        $sms = new \SoapClient("http://api.payamak-panel.com/post/Send.asmx?wsdl", array("encoding"=>"UTF-8"));
        $data = array(
            "username" => $username,
            "password" => $password,
            "text" => array($code),
            "to" => $phone,
            "bodyId" => $patternCode);
        $send_Result = $sms->SendByBaseNumber($data)->SendByBaseNumberResult;       
    }
}