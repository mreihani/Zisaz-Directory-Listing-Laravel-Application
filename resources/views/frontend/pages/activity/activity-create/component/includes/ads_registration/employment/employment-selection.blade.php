<div class={{$adsType == "employment" ? '' : 'd-none'}}>
    <div class="row">
        <div class="col-sm-12 mb-4">
            <label class="form-label fw-bold">
                 نوع آگهی استخدامی مورد نظر را انتخاب نمایید
                <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-md" wire:model="employmentAdsType" wire:change="changeEmploymentAdsType($event.target.value)">
                <option value="" disabled="">انتخاب نوع آگهی</option>
                <option value="employee">کارجو هستم</option>
                <option value="employer">کارفرما هستم</option>
            </select>
        </div>
    </div>

    @if($employmentAdsType == "employee")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.employment.employee')
    @elseif($employmentAdsType == "employer")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.employment.employer')
    @endif

</div>