<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Profile\ShopActCat;
use App\Models\Profile\ShopActGrp;
use App\Models\Construction\ConAct;
use App\Models\Construction\ConGrp;
use App\Models\ProvinceAndCity\City;
use Illuminate\Support\Facades\Hash;
use App\Models\ProvinceAndCity\Province;
use App\Models\ContractType\ContractType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabanUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // آرایه مربوط به زمینه فعالیت کاربر
        $typeOfActivityArray = config('jaban.profile.sector.construction.type_of_activity');
        foreach ($typeOfActivityArray as $typeOfActivityItem) {
            $conActObj = ConAct::create([
                'title' => $typeOfActivityItem['title']
            ]);
            foreach ($typeOfActivityItem['value'] as $gpr) {
                ConGrp::insert([
                    'con_act_id' => $conActObj->id,
                    'title' => $gpr['title'],
                ]);
            }
        }

        // آرایه مربوط به صنف فروشگاه ها
        $shopTypeOfActivity = config('jaban.profile.sector.construction.shop_type_of_activity');
        foreach ($shopTypeOfActivity as $shopTypeOfActivityItem) {
            $shopConActObj = ShopActCat::create([
                'title' => $shopTypeOfActivityItem['title']
            ]);
            foreach ($shopTypeOfActivityItem['value'] as $gpr) {
                ShopActGrp::insert([
                    'shop_act_cat_id' => $shopConActObj->id,
                    'title' => $gpr['title'],
                ]);
            }
        }

        // آرایه مربوط به استان ها و شهر های ایران
        $provinceArr = config('jaban.province');
        foreach ($provinceArr as $provinceItem) {
            $provinceObj = Province::create([
                'title' => $provinceItem['title']
            ]);
            foreach ($provinceItem['value'] as $cityItem) {
                City::insert([
                    'province_id' => $provinceObj->id,
                    'title' => $cityItem['title'],
                ]);
            }
        }

        // آرایه مربوط به انواع قرارداد
        $contractTypeArr = config('jaban.contract_type');
        foreach ($contractTypeArr as $contractTypeItem) {
            $contractTypeObj = ContractType::create([
                'title' => $contractTypeItem['title']
            ]);
        }

        // اضافه کردن مدیر ها
        User::create([
            'firstname' => 'محمد امین',
            'lastname' => 'ریحانی',
            'email' => 'mreihani@gmail.com',
            'phone' => '09922966614',
            'password' => Hash::make(12345678),
            'role' => 'admin',
            'phone_verified' => 0,
        ]);

        User::create(
        [
            'firstname' => 'سید خلیل',
            'lastname' => 'حسینی',
            'email' => 'seyedkhalilhosseini@gmail.com',
            'phone' => '09173119853',
            'password' => Hash::make(12345678),
            'role' => 'admin',
            'phone_verified' => 0,
        ]);

        // اضافه کردن کاربر معمولی
        $user = User::create([
            'firstname' => 'امین',
            'lastname' => 'ریحانی',
            'email' => 'reihani.eng@gmail.com',
            'phone' => '09152024192',
            'password' => null,
            'role' => 'construction',
            'phone_verified' => 1,
        ]);

        $user->userGroupType()->create([
            'user_id' => $user->id,
            'groupable_id' => 1,
            'groupable_type' => 'App\Models\Construction\ConGrp',
        ]);
    }
}
