<div class={{$adsType == "inquiry" ? '' : 'd-none'}}>
    <div class="row">
        <div class="col-sm-12 mb-4">
            <label class="form-label fw-bold">
                نوع آگهی استعلام قیمت را انتخاب نمایید
                <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-md" wire:model="inquiryAdsType" wire:change="changeInquiryAdsType($event.target.value)">
                <option value="" disabled="">انتخاب نوع استعلام قیمت</option>
                <option value="inquiry_buy">خرید</option>
                <option value="inquiry_project">اجرای پروژه</option>
            </select>
        </div>
    </div>

    @if($inquiryAdsType == "inquiry_buy")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.inquiry.inquiry_buy')
    @elseif($inquiryAdsType == "inquiry_project")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.inquiry.inquiry_project')
    @endif

</div>