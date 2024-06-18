<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;

class IndexController extends Controller
{
    /**
     * Handle user logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Logout the user
        auth()->guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the homepage
        return redirect('/');
    }
    
    /**
     * Render the homepage view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function homePage(Request $request) {
        return view('frontend.pages.home.index');
    }

    public function userLogin(Request $request) {
        if(auth()->check()) {
            return redirect(route('user.dashboard.profile-settings.index'));
        }
        return view('frontend.pages.home.index');
    }

    public function aboutUs() {
        return view('frontend.pages.about-us.index');
    }

    public function BlogAll() {
        return view('frontend.pages.blog.blog-all.index');
    }

    public function BlogSingle() {
        return view('frontend.pages.blog.blog-single.index');
    }

    public function contactUs() {
        return view('frontend.pages.contact-us.index');
    }

    public function faq() {
        return view('frontend.pages.faq.index');
    }

    public function support() {
        return view('frontend.pages.support.index');
    }
}
