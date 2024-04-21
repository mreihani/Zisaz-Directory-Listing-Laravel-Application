<div class={{$adsType == "investment" ? '' : 'd-none'}}>
    <div class="row">
        <div class="col-sm-12 mb-4">
            <label class="form-label fw-bold">
                 نوع آگهی شراکت و سرمایه گذاری مورد نظر را انتخاب نمایید
                <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-md" wire:model="investmentAdsType" wire:change="changeInvestmentAdsType($event.target.value)">
                <option value="" disabled="">انتخاب نوع آگهی</option>
                <option value="investor">سرمایه گذار هستم</option>
                <option value="invested">سرمایه پذیر هستم</option>
            </select>
        </div>
    </div>

    @if($investmentAdsType == "investor")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.investment.investor')
    @elseif($investmentAdsType == "invested")
        @include('frontend.pages.activity.activity-create.component.includes.ads_registration.investment.invested')
    @endif
</div>

