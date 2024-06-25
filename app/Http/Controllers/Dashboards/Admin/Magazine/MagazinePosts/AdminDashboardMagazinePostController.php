<?php

namespace App\Http\Controllers\Dashboards\Admin\Magazine\MagazinePosts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Mag\MagPost;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\UserModels\Mag\MagCategory;
use App\Services\ImageResizeServices\ImageResizeService;
use App\Http\Requests\Dashboards\Admin\Magazine\MagazinePost\MagazinePostStoreRequest;
use App\Http\Requests\Dashboards\Admin\Magazine\MagazinePost\MagazinePostUpdateRequest;

class AdminDashboardMagazinePostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $magPosts = MagPost::paginate(10);

        return view('dashboards.users.admin.pages.magazine.magazine-post.index.index', compact('user', 'magPosts'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $zisazYinyMceConfig = config('zisaz-tiny-mce');
        $magCategories = MagCategory::all();

        return view('dashboards.users.admin.pages.magazine.magazine-post.create.index', compact('user', 'magCategories', 'zisazYinyMceConfig'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MagazinePostStoreRequest $request)
    {
        $validated = $request->validated();
       
        $magPost = auth()->user()->magazine()->create([
            'mag_category_id' => Purify::clean(trim($validated['mag_category_id'])),
            'title' => Purify::clean(trim($validated['title'])),
            'slug' => strtolower(str_replace(' ', '-', Purify::clean(trim($validated['slug'])))),
            'body' => trim($validated['body']),
            'meta_title' => Purify::clean(trim($validated['meta_title'])),
            'meta_description' => Purify::clean(trim($validated['meta_description'])),
            'meta_keywords' => Purify::clean(trim($validated['meta_keywords'])),
            'review_status' => Purify::clean(trim($validated['review_status'])),
        ]);

        // call and create a new instance of the class, with image and path inputs
        $renderImageService = new ImageResizeService(
            $request->image, 
            'mag-images/' . $magPost->id
        );

        // upadate magazine post image tables after image resized
        $magPost->update([
            'image' => $renderImageService->resizeImage(1296, 600),
            'image_sm' => $renderImageService->resizeImage(740, 490)
        ]);

        return redirect(route('admin.dashboard.magazine.post.index'))->with('success', 'مقاله مورد نظر با موفقیت ایجاد گردید.');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Request $request, MagPost $magPost)
    {
        $user = auth()->user();
        $zisazYinyMceConfig = config('zisaz-tiny-mce');
        $magCategories = MagCategory::all();

        return view('dashboards.users.admin.pages.magazine.magazine-post.edit.index', compact('user', 'magCategories', 'magPost', 'zisazYinyMceConfig'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MagazinePostUpdateRequest $request, MagPost $magPost)
    {
        $validated = $request->validated();
        
        $magPost->update([
            'mag_category_id' => Purify::clean(trim($validated['mag_category_id'])),
            'title' => Purify::clean(trim($validated['title'])),
            'slug' => strtolower(str_replace(' ', '-', Purify::clean(trim($validated['slug'])))),
            'body' => trim($validated['body']),
            'meta_title' => Purify::clean(trim($validated['meta_title'])),
            'meta_description' => Purify::clean(trim($validated['meta_description'])),
            'meta_keywords' => Purify::clean(trim($validated['meta_keywords'])),
            'review_status' => Purify::clean(trim($validated['review_status'])),
        ]);
       
        // upadate magazine post image tables after image resized, but first check if the user uploaded a new image
        if(!is_null($request->image)) {
            // call and create a new instance of the class, with image and path inputs
            $renderImageService = new ImageResizeService(
                $request->image, 
                'mag-images/' . $magPost->id
            );

            // remove previously uploaded images
            $renderImageService->removeExistingImage($magPost->image);
            $renderImageService->removeExistingImage($magPost->image_sm);

            $magPost->update([
                'image' => $renderImageService->resizeImage(1296, 600),
                'image_sm' => $renderImageService->resizeImage(740, 490)
            ]);
        }

        return redirect(route('admin.dashboard.magazine.post.index'))->with('success', 'مقاله مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified Actcat resource from storage.
     */
    public function destroy(MagPost $magPost)
    {
        // force delete magazine post since it has soft delete field in the database
        $magPost->forceDelete();
        Storage::deleteDirectory("public/upload/mag-images/$magPost->id");

        return redirect(route('admin.dashboard.magazine.post.index'))->with('success', 'مقاله مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {

        $user = auth()->user();

        $searchString = trim($request->q);
        $magPosts = MagPost::where('title', 'like', '%' . $searchString . '%')->paginate(10);

        return view('dashboards.users.admin.pages.magazine.magazine-post.search.index', compact('user', 'magPosts', 'searchString')); 
    }
    
}
