<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Frontend\ReferenceData\Gender\Gender;
use App\Models\Frontend\ReferenceData\Academic\Academic;
use App\Models\Frontend\ReferenceData\AdsStatus\AdsStat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\City;
use App\Models\Frontend\ReferenceData\PaymentMethod\PaymntMtd;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;
use App\Models\Frontend\ReferenceData\ContractType\ContractType;
use App\Models\Frontend\ReferenceData\ProjectWelfareFacility\WelfareFacility;

class JabanUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // آرایه مربوط به صنف فروشگاه ها
        $typeOfActivity = config('jaban.profile.sector.construction.type_of_activity');
        foreach ($typeOfActivity as $typeOfActivityItem) {
            $conActObj = ActCat::create([
                'title' => $typeOfActivityItem['title']
            ]);
            foreach ($typeOfActivityItem['value'] as $gpr) {
                ActGrp::insert([
                    'act_cat_id' => $conActObj->id,
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

        // روش پرداخت
        $paymentMethodArr = config('jaban.payment_method');
        foreach ($paymentMethodArr as $paymentMethodItem) {
            $paymentMethodObj = PaymntMtd::create([
                'title' => $paymentMethodItem['title']
            ]);
        }

        // وضعیت آگهی
        $adsStatusArr = config('jaban.ads_status');
        foreach ($adsStatusArr as $adsStatusItem) {
            $adsStatusObj = AdsStat::create([
                'title' => $adsStatusItem['title']
            ]);
        }

        // نوع قرارداد
        $contractTypeArr = config('jaban.contract_type');
        foreach ($contractTypeArr as $contractTypeItem) {
            $contractTypeObj = ContractType::create([
                'title' => $contractTypeItem['title']
            ]);
        }

        // تحصیلات
        $academicArr = config('jaban.academic');
        foreach ($academicArr as $academicItem) {
            $academicObj = Academic::create([
                'title' => $academicItem['title']
            ]);
        }

        // جنسیت
        $genderArr = config('jaban.gender');
        foreach ($genderArr as $genderItem) {
            $genderObj = Gender::create([
                'title' => $genderItem['title']
            ]);
        }

        // اطلاعات لیست امکانات رفاهی پروژه ها در بخش 2 پروژه ها 
        $welfareFacilityArr = config('jaban.welfare_facility');
        foreach ($welfareFacilityArr as $welfareFacilityItem) {
            $welfareFacilityObj = WelfareFacility::create([
                'title' => $welfareFacilityItem['title']
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
            'phone_verified' => 1,
        ]);
        User::create(
        [
            'firstname' => 'سید خلیل',
            'lastname' => 'حسینی',
            'email' => 'seyedkhalilhosseini@gmail.com',
            'phone' => '09173119853',
            'password' => Hash::make(12345678),
            'role' => 'admin',
            'phone_verified' => 1,
        ]);

        // اضافه کردن کاربر معمولی
        User::create([
            'firstname' => 'امین',
            'lastname' => 'ریحانی',
            'email' => 'reihani.eng@gmail.com',
            'phone' => '09152024192',
            'password' => null,
            'role' => 'construction',
            'phone_verified' => 1,
        ]);
        User::create([
            'firstname' => 'سید خلیل',
            'lastname' => 'حسینی',
            'email' => 'seyedkhalilhosseini2@gmail.com',
            'phone' => '09900910073',
            'password' => null,
            'role' => 'construction',
            'phone_verified' => 1,
        ]);
    }
}
