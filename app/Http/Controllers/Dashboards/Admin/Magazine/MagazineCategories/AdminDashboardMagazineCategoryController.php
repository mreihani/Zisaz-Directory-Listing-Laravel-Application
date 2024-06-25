<?php

namespace App\Http\Controllers\Dashboards\Admin\Magazine\MagazineCategories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\UserModels\Mag\MagCategory;
use App\Http\Requests\Dashboards\Admin\Magazine\MagazineCategory\MagazineCategoryStoreRequest;
use App\Http\Requests\Dashboards\Admin\Magazine\MagazineCategory\MagazineCategoryUpdateRequest;

class AdminDashboardMagazineCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $magCategories = MagCategory::paginate(10);

        return view('dashboards.users.admin.pages.magazine.magazine-category.index.index', compact('user', 'magCategories'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        return view('dashboards.users.admin.pages.magazine.magazine-category.create.index', compact('user'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MagazineCategoryStoreRequest $request)
    {
        $validated = $request->validated();

        MagCategory::create([
            'title' => Purify::clean(trim($validated['title']))
        ]);

        return redirect(route('admin.dashboard.magazine.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت ایجاد گردید.');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Request $request, MagCategory $magCategory)
    {
        $user = auth()->user();

        return view('dashboards.users.admin.pages.magazine.magazine-category.edit.index', compact('user', 'magCategory'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MagazineCategoryUpdateRequest $request, MagCategory $magCategory)
    {
        $validated = $request->validated();
        
        $magCategory->update([
            'title' => Purify::clean(trim($validated['title']))
        ]);

        return redirect(route('admin.dashboard.magazine.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified Actcat resource from storage.
     */
    public function destroy(MagCategory $magCategory)
    {
        // delete category
        $magCategory->delete();

        return redirect(route('admin.dashboard.magazine.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {

        $user = auth()->user();

        $searchString = trim($request->q);
        $magCategories = MagCategory::where('title', 'like', '%' . $searchString . '%')->paginate(10);

        return view('dashboards.users.admin.pages.magazine.magazine-category.search.index', compact('user', 'magCategories', 'searchString')); 
    }
    
}
