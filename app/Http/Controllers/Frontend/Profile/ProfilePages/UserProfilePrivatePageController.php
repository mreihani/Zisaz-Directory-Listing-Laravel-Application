<?php

namespace App\Http\Controllers\Frontend\Profile\ProfilePages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfilePrivatePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = null;
        if ($request->has('type')) {
            $type = $request->input('type');
        } 

        // abort if user enters irrelevant query string
        if(!is_null($type) && (!in_array($type, ['trashed','pending','rejected']))) {
            abort(404);
        }

        return view('frontend.pages.profile.profile-pages.saved-private-pages.index', compact('type'));
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
