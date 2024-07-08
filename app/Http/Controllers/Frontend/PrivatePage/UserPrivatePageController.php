<?php

namespace App\Http\Controllers\Frontend\PrivatePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class UserPrivatePageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pages.private-page.private-page-create.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($id);
       
        // check if user is authorized to edit psite item
        if(!auth()->check() || auth()->user()->id != $psite->user->id) {
           abort(403);
        }
        
        return view('frontend.pages.private-page.private-page-edit.index', compact('id', 'psite'));
    }

    /**
     * Undelete the soft deleted item
     */
    public function restore(string $id)
    {
        $psite = Psite::queryWithAllVerificationStatuses()->withTrashed()->findOrFail($id);
      
        // check if user is authorized to restore website item
        if(!auth()->check() || auth()->user()->id != $psite->user->id) {
            abort(403);
        }

        $psite->restore();

        $psite->update([
            'verify_status' => 'pending'
        ]);

        return redirect()->route('user.dashboard.saved-personal-websites.index');
    }

    /**
     * Soft-delete the specified item.
     */
    public function destroy(string $id)
    {
        $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($id);

        // check if user is authorized to delete website item
        if(!auth()->check() || auth()->user()->id != $psite->user->id) {
            abort(403);
        }

        $psite->delete();

        return redirect()->route('user.dashboard.saved-personal-websites.index');
    }
}
