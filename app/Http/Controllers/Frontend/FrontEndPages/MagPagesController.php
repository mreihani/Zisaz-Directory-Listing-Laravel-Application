<?php

namespace App\Http\Controllers\Frontend\FrontEndPages;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Frontend\UserModels\Mag\MagPost;
use App\Models\Frontend\UserModels\Mag\MagCategory;

class MagPagesController extends Controller
{
    // mag single page
    public function mag($slug) {
        $mag = MagPost::where('slug', $slug)->with('magazineCategory')->get()->first() ?: abort(404);

        $mag->setSeoMeta();

        // reading time estimation
        $textWithoutSpaces = str_replace(' ', '', $mag->body);
        $characterCount = strlen($textWithoutSpaces);
        $readingTime = ceil($characterCount / 500);

        // get all mag categories
        $magCategories = MagCategory::withCount('magazinePosts')->get();

        // get similar items for carousel element
        $similarItemsCount = $mag
        ->magazineCategory
        ->magazinePosts
        ->where('id', '!==', $mag->id)
        ->count();

        $similarItems = $mag
        ->magazineCategory
        ->magazinePosts
        ->where('id', '!==', $mag->id)
        ->take(10);    

        return view('frontend.pages.magazine.mag-single.index', compact('mag', 'readingTime', 'magCategories', 'similarItemsCount', 'similarItems'));
    }

    // get all ads with type
    public function getMags(Request $request) {

        $mags = MagPost::with('magazineCategory')->paginate(10);
        
        // get all mag categories
        $magCategories = MagCategory::withCount('magazinePosts')->get();
       
        return view('frontend.pages.magazine.mag-all.index', compact('mags', 'magCategories'));
    }
}
