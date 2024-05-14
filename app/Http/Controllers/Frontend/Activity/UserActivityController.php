<?php

namespace App\Http\Controllers\Frontend\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // create-activity?type=selling
        // route('user.create-activity.index', ['type' => 'ads'])
        // آگهی های فروش رو میاره

        // create-activity?type=resume
        // route('user.create-activity.index', ['type' => 'resume'])
        // رزومه رو میاره

        // create-activity?type=custom_page
        // route('user.create-activity.index', ['type' => 'custom_page'])
        // ثبت فروشگاه یا شرکت رو میاره
        
        $activityTypeUrl = $request->type;
        
        return view('frontend.pages.activity.activity-create.index', compact('activityTypeUrl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
