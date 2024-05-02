<h2 class="h5 font-vazir mb-4">
    <i class="fi-list text-primary fs-5 mt-n1 me-2"></i>
    انتخاب نوع فعالیت
</h2>

<div class="row">
    <div class="col-sm-12 mb-4">
        <label class="form-label fw-bold" for="pr-country">
             فعالیت مورد نظر را انتخاب نمایید
            <span class="text-danger">*</span>
        </label>
        <select class="form-select form-select-md" wire:model="activityType" wire:change="changeActivityType($event.target.value)">
            <option value="" disabled="">انتخاب نوع فعالیت</option>
            <option value="resume">معرفی رزومه</option>
            <option value="custom_page">ساخت صفحه اختصاصی</option>
            <option value="ads_registration">ثبت آگهی</option>
            <option value="jaban_ads">تبلیغات در زی ساز</option>
        </select>
    </div>
</div>