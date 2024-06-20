<?php

namespace App\Http\Controllers\Frontend\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Frontend\UserModels\Project\Project;

class UserProjectController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pages.project.project-create.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        // check if user is authorized to edit project item
        if(!auth()->check() || auth()->user()->id != $project->user->id) {
           abort(403);
        }
        
        return view('frontend.pages.project.project-edit.index', compact('id'));
    }

    /**
     * Undelete the soft deleted item
     */
    public function restore(Project $project, Request $request)
    {
        // check if user is authorized to restore project item
        if(!auth()->check() || auth()->user()->id != $project->user->id) {
            abort(403);
        }

        $project->restore();

        return redirect()->route('user.dashboard.saved-projects.index');
    }

    /**
     * Soft-delete the specified item.
     */
    public function destroy(Project $project, Request $request)
    {
        // check if user is authorized to delete project item
        if(!auth()->check() || auth()->user()->id != $project->user->id) {
            abort(403);
        }

        $project->delete();

        return redirect()->route('user.dashboard.saved-projects.index');
    }
}
