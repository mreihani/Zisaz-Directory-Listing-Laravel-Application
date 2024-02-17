<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function homePage() {
        return view('frontend.pages.home.index');
    }

    public function jobs() {
        return view('frontend.pages.jobs.jobs-all.index');
    }

    public function jobSingle($id) {
        return view('frontend.pages.jobs.job-single.index');
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

    public function resumeBuilder() {
        return view('frontend.pages.resume-builder.index');
    }

}
