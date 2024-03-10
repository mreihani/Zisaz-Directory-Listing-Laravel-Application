<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class AssetController extends Controller
{
    public function __invoke($user_id, $file)
    {
        abort_if(auth()->guest(), Response::HTTP_FORBIDDEN);

        $user_id = Purify::clean($user_id);
        $file = Purify::clean($file);

        $path = "private/$user_id/$file";

        abort_unless(Storage::exists($path), Response::HTTP_NOT_FOUND);

        if (auth()->user()->id == $user_id || auth()->user()->role == 'admin') {
            return response()->file(
                Storage::path($path)
            );
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }
}