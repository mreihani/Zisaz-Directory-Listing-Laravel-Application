<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__.'/auth.php';

Route::get('/test', 
    function () {
        // echo App\Models\User::find(1)->employerProfile;

        // آرایه مربوط به زمینه فعالیت کاربر
        $typeOfActivityArray = config('jaban.profile.sector.construction.type_of_activity');
        foreach ($typeOfActivityArray as $typeOfActivityItem) {
            $conActObj = App\Models\Construction\ConAct::create([
                'title' => $typeOfActivityItem['title']
            ]);
            foreach ($typeOfActivityItem['value'] as $gpr) {
                App\Models\Construction\ConGrp::insert([
                    'con_act_id' => $conActObj->id,
                    'title' => $gpr['title'],
                ]);
            }
        }

        // آرایه مربوط به صنف فروشگاه ها
        $shopTypeOfActivity = config('jaban.profile.sector.construction.shop_type_of_activity');
        foreach ($shopTypeOfActivity as $shopTypeOfActivityItem) {
            $shopConActObj = App\Models\Profile\ShopActCat::create([
                'title' => $shopTypeOfActivityItem['title']
            ]);
            foreach ($shopTypeOfActivityItem['value'] as $gpr) {
                App\Models\Profile\ShopActGrp::insert([
                    'shop_act_cat_id' => $shopConActObj->id,
                    'title' => $gpr['title'],
                ]);
            }
        }

        // آرایه مربوط به استان ها و شهر های ایران
        $provinceArr = config('jaban.province');
        foreach ($provinceArr as $provinceItem) {
            $provinceObj = App\Models\ProvinceAndCity\Province::create([
                'title' => $provinceItem['title']
            ]);
            foreach ($provinceItem['value'] as $cityItem) {
                App\Models\ProvinceAndCity\City::insert([
                    'province_id' => $provinceObj->id,
                    'title' => $cityItem['title'],
                ]);
            }
        }
    }
);