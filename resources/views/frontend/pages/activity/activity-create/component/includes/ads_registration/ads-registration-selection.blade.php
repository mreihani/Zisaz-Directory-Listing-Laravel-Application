<div class="{{$section == "ads_registration" ? '' : 'd-none'}}">
    <div class="row">
        <div class="col-sm-12 mb-4">
            <label class="form-label fw-bold">
                 نوع آگهی مورد نظر را انتخاب نمایید
                <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-md" wire:model="adsType" wire:change="changeAdsType($event.target.value)">
                <option value="" disabled="">انتخاب نوع آگهی</option>
                <option value="selling">آگهی فروش</option>
                <option value="employment">آگهی استخدام</option>
                <option value="investment">آگهی شراکت و سرمایه گذاری</option>
            </select>
        </div>
    </div>
    
    @include('frontend.pages.activity.activity-create.component.includes.ads_registration.selling.selling-selection')
    @include('frontend.pages.activity.activity-create.component.includes.ads_registration.employment.employment-selection')
    @include('frontend.pages.activity.activity-create.component.includes.ads_registration.investment.investment-selection')

</div>