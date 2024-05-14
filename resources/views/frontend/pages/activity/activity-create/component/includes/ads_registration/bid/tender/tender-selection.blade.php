<div class={{$adsType == "bid" ? '' : 'd-none'}}>
    <div class="row">
        <div class="col-sm-12 mb-4">
            <label class="form-label fw-bold">
                نوع مناقصه را انتخاب نمایید
                <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-md" wire:model="tenderAdsType" wire:change="changeTenderAdsType($event.target.value)">
                <option value="" disabled="">انتخاب نوع مناقصه</option>
                <option value="tender_buy">مناقصه خرید</option>
                <option value="tender_project">مناقصه اجرای پروژه</option>
            </select>
        </div>
    </div>

    @if($tenderAdsType == "tender_buy")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.bid.tender.tender-buy')
    @elseif($tenderAdsType == "tender_project")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.bid.tender.tender-project')
    @endif

</div>