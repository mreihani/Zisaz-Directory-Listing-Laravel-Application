@push('page-styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.css')}}"/>    
@endpush

@push('page-scripts-top')
    <script src="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.js')}}"></script>
@endpush

@if($activity->subactivity->type == 'selling')
    @include('frontend.pages.activity.activity-single.ads_registration.selling.selling')
@elseif($activity->subactivity->type == 'employee')
    @include('frontend.pages.activity.activity-single.ads_registration.employment.employee')
@elseif($activity->subactivity->type == 'employer')
    @include('frontend.pages.activity.activity-single.ads_registration.employment.employer')
@elseif($activity->subactivity->type == 'investor')
    @include('frontend.pages.activity.activity-single.ads_registration.investment.investor')
@elseif($activity->subactivity->type == 'invested')
    @include('frontend.pages.activity.activity-single.ads_registration.investment.invested')
@elseif($activity->subactivity->type == 'auction')
    @include('frontend.pages.activity.activity-single.ads_registration.bid.auction')
@elseif($activity->subactivity->type == 'tender_buy')
    @include('frontend.pages.activity.activity-single.ads_registration.bid.tender_buy')
@elseif($activity->subactivity->type == 'tender_project')
    @include('frontend.pages.activity.activity-single.ads_registration.bid.tender_project')
@elseif($activity->subactivity->type == 'inquiry_buy')
    @include('frontend.pages.activity.activity-single.ads_registration.inquiry.inquiry_buy')
@elseif($activity->subactivity->type == 'inquiry_project')
    @include('frontend.pages.activity.activity-single.ads_registration.inquiry.inquiry_project')
@elseif($activity->subactivity->type == 'contractor')
    @include('frontend.pages.activity.activity-single.ads_registration.contractor.contractor')
@endif    