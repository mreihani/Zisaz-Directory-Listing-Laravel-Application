<div class={{$adsType == "bid" ? '' : 'd-none'}}>
    <div class="row">
        <div class="col-sm-12 mb-4">
            <label class="form-label fw-bold">
                آگهی مزایده یا مناقصه را انتخاب نمایید
                <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-md" wire:model="bidAdsType" wire:change="changeBidAdsType($event.target.value)">
                <option value="" disabled="">انتخاب مزایده یا مناقصه</option>
                <option value="auction">مزایده</option>
                <option value="tender">مناقصه</option>
            </select>
        </div>
    </div>

    @if($bidAdsType == "auction")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.bid.auction')
    @elseif($bidAdsType == "tender")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.bid.tender.tender-selection')
    @endif

</div>