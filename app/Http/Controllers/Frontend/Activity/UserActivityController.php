<?php

namespace App\Http\Controllers\Frontend\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\UserModels\Activity\Activity;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $activityTypeUrl = $request->type;
        
        return view('frontend.pages.activity.activity-create.index', compact('activityTypeUrl'));
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
        $activity = Activity::findOrFail($id);

        // check if user is authorized to edit activity item
        if(!auth()->check() || auth()->user()->id != $activity->user->id) {
           abort(403);
        }
        
        return view('frontend.pages.activity.activity-edit.index', compact('activity'));
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
