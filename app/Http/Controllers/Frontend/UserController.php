<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function dashboard() {
        dd("user dashboard");
        return view('frontend.user.dashboard');
    }

}
