<?php

namespace App\Http\Controllers\Frontend\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Frontend\UserModels\Project\Project;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class UserProjectController extends Controller
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
    public function create()
    {
        return view('frontend.pages.project.project-create.index');
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
        $project = Project::findOrFail($id);

        // check if user is authorized to edit psite item
        if(!auth()->check() || auth()->user()->id != $project->user->id) {
           abort(403);
        }
        
        return view('frontend.pages.project.project-edit.index', compact('id'));
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
