<?php

namespace App\Http\Controllers\Dashboards\Admin\Categories;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\ReferenceData\Category\Category;
use App\Services\ImageResizeServices\ImageResizeService;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;


class AdminDashboardCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('can:category_create,user')->only(['create','store']);
        $this->middleware('can:category_edit,user')->only(['editCategory','updateCategory']);
        $this->middleware('can:category_index,user')->only(['index','showSubItem','search']);
        $this->middleware('can:category_destroy,user')->only(['destroyCategory']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $categories = Category::paginate(10);

        return view('dashboards.users.admin.pages.categories.index.index', compact('user', 'categories'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        
        $categories = Category::all();

        return view('dashboards.users.admin.pages.categories.create.index', compact('user', 'categories'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => ['required', Rule::unique('categories', 'category_name')],
            'parent' => 'required'
        ], [
            'category_name.required' => 'لطفا نام دسته بندی را وارد نمایید.',
            'category_name.unique' => 'نام دسته بندی قبلا ثبت شده است. لطفا یک نام دیگر وارد کنید.',
            'parent.required' => 'دسته بندی اصلی را مشخص کنید'
        ]);

        if($request->img) {
            $imageResizeService = new ImageResizeService($request->img, 'category-images/');
            $category_image = $imageResizeService->resizeImage(100,100);
        }

        Category::insert([
            'category_name' => Purify::clean($validated['category_name']),
            'category_slug' => strtolower(str_replace('', '-', Purify::clean($validated['category_name']))),
            'parent' => Purify::clean($request->parent) == 0 ? 0 : Purify::clean($request->parent),
            'category_image' => $request->img ? $category_image : null
        ]);

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت ایجاد گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {

        $user = auth()->user();

        $searchString = Purify::clean(trim($request->q));

        $categories = Category::where([
            ['category_name', 'like', "%{$searchString}%"],
        ])->paginate(10);

        return view('dashboards.users.admin.pages.categories.search.index', compact('user', 'categories', 'searchString')); 
    }

    /**
     * Show the form for editing the ActCat resource.
     */
    public function editCategory(Request $request, Category $category)
    {
        $user = auth()->user();
        $categories = Category::all();
        
        return view('dashboards.users.admin.pages.categories.edit.index', compact('user', 'category', 'categories'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'category_name' => ['required', Rule::unique('categories', 'category_name')->ignore($category->id)],
            'parent' => 'required'
        ], [
            'category_name.required' => 'لطفا نام دسته بندی را وارد نمایید.',
            'category_name.unique' => 'نام دسته بندی قبلا ثبت شده است. لطفا یک نام دیگر وارد کنید.',
            'parent.required' => 'دسته بندی اصلی را مشخص کنید'
        ]);

        if($request->img) {
            $imageResizeService = new ImageResizeService($request->img, 'category-images/');
            $category_image = $imageResizeService->resizeImage(100,100);

            if(!empty($category->category_image)) {
                unlink($category->category_image);
            }
        }

        $categoryData = [
            'category_name' => Purify::clean($validated['category_name']),
            'category_slug' => strtolower(str_replace('', '-', Purify::clean($validated['category_name']))),
            'parent' => Purify::clean($request->parent) == 0 ? 0 : Purify::clean($request->parent),
        ];
        
        if($request->img) {
            $categoryData['category_image'] = $category_image;
        }

        $category->update($categoryData);

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت بروز رسانی گردید.');
    }


    /**
     * Remove the specified Actgrp resource from storage.
     */
    public function destroyCategory(Category $category)
    {
        if(!empty($category->category_image)) {
            unlink($category->category_image);
        }

        // delete act grp from the db
        $category->delete();

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Show sub item
     */
    public function showSubItem(Category $category) {
        $user = auth()->user();

        $categories = Category::allChildren($category->id);

        // paginate results
        $categories = new Collection(array_reverse($categories));
        $totalGroup = count($categories);
        $perPage = 40;
        $page = Paginator::resolveCurrentPage('page');
        $categories = new LengthAwarePaginator($categories->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        return view('dashboards.users.admin.pages.categories.index.index', compact('user', 'categories'));  
    }
}
