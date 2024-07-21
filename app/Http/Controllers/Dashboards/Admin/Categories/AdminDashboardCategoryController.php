<?php

namespace App\Http\Controllers\Dashboards\Admin\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;


class AdminDashboardCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('can:category_create,user')->only(['create','store']);
        $this->middleware('can:category_edit,user')->only(['editActcat','editActgrp','updateActcat','updateActgrp']);
        $this->middleware('can:category_index,user')->only(['index','showSubItem','search']);
        $this->middleware('can:category_destroy,user')->only(['destroyActcat','destroyActgrp']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $actCats = ActCat::with('activityGroup')->get();

        // here we have a query of main actCats and merge sub-items with a foreach loop
        $mergedArr = [];
        array_push($mergedArr, $actCats);
        foreach($actCats as $actCatItem) {
            $mergedArr[] = $actCatItem->activityGroup;
        }
        $mergedCollection = collect($mergedArr)->flatten();

        // use custom pagination
        $totalGroup = count($mergedCollection);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');
        $mergedCollection = new LengthAwarePaginator($mergedCollection->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        return view('dashboards.users.admin.pages.categories.index.index', compact('user', 'mergedCollection'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        
        $actCats = ActCat::all();

        return view('dashboards.users.admin.pages.categories.create.index', compact('user', 'actCats'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'act_cat_id' => 'required',
        ],[
            'title.required' => 'لطفا عنوان دسته بندی را وارد نمایید',
            'act_cat_id.required' => 'لطفا دسته بندی اصلی را انتخاب نمایید'
        ]);

        if($request->act_cat_id == "0") {
            ActCat::create([
                'title' => Purify::clean($request->title)
            ]);
        } else {
            ActGrp::create([
                'title' => Purify::clean($request->title),
                'act_cat_id' => Purify::clean($request->act_cat_id),
            ]);
        }

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت ایجاد گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {

        $user = auth()->user();

        $searchString = Purify::clean(trim($request->q));

        $actCats = ActCat::where('title', 'like', '%' . $searchString . '%')->get();
        $actGrps = ActGrp::where('title', 'like', '%' . $searchString . '%')->get();

        $mergedCollection = $actCats->concat($actGrps);

        // use custom pagination
        $totalGroup = count($mergedCollection);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');
        $mergedCollection = new LengthAwarePaginator($mergedCollection->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => route('admin.dashboard.category.search', ['q' => $searchString]),
            'pageName' => 'page',
        ]);

        return view('dashboards.users.admin.pages.categories.search.index', compact('user', 'mergedCollection', 'searchString')); 
    }

    /**
     * Show the form for editing the ActCat resource.
     */
    public function editActcat(Request $request, string $id)
    {
        $user = auth()->user();
        
        $actCat = ActCat::findOrFail($id);

        return view('dashboards.users.admin.pages.categories.edit.act-cat.index', compact('user', 'actCat'));  
    }

    /**
     * Show the form for editing the ActGrp resource.
     */
    public function editActgrp(Request $request, string $id)
    {
        $user = auth()->user();
        
        $actCats = ActCat::all();
        $actGrp = ActGrp::findOrFail($id);

        return view('dashboards.users.admin.pages.categories.edit.act-grp.index', compact('user', 'actCats', 'actGrp'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateActcat(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'لطفا عنوان دسته بندی را وارد نمایید',
        ]);

        $actCat = ActCat::findOrFail($request->id);

        $actCat->update([
            'title' => $request->title
        ]);

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateActgrp(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'act_cat_id' => 'required',
        ],[
            'title.required' => 'لطفا عنوان دسته بندی را وارد نمایید',
            'act_cat_id.required' => 'لطفا دسته بندی اصلی را انتخاب نمایید'
        ]);

        $actGrp = ActGrp::findOrFail($request->id);

        $actGrp->update([
            'title' => Purify::clean($request->title),
            'act_cat_id' => Purify::clean($request->act_cat_id),
        ]);

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified Actcat resource from storage.
     */
    public function destroyActcat(string $id)
    {
        $actCat = ActCat::findOrFail($id);
        $actGrps = $actCat->activityGroup;
        
        foreach($actGrps as $actGrpItem) {
            // remove all relavant activities from the DB
            $actGrpItem->activity()->delete();
        }

        // delete act grp from the db
        $actCat->activityGroup()->delete();

        // delete act cat from the db
        $actCat->delete();

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Remove the specified Actgrp resource from storage.
     */
    public function destroyActgrp(string $id)
    {
        $actGrp = ActGrp::findOrFail($id);

        // remove all relavant activities from the DB
        $actGrp->activity()->delete();

        // delete act grp from the db
        $actGrp->delete();

        return redirect(route('admin.dashboard.category.index'))->with('success', 'دسته بندی مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Show sub item
     */
    public function showSubItem(string $id) {
        $user = auth()->user();

        $mergedCollection = ActCat::findOrFail($id)->activityGroup;
       
        // // use custom pagination
        $totalGroup = count($mergedCollection);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');
        $mergedCollection = new LengthAwarePaginator($mergedCollection->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        return view('dashboards.users.admin.pages.categories.index.index', compact('user', 'mergedCollection'));  
    }
}
