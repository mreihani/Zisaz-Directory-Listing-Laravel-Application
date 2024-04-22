@push('page-styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.css')}}"/>    
@endpush

@push('page-scripts-top')
    <script src="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.js')}}"></script>
@endpush

@if($activity->subactivity->ads_type == 'selling')
    @include('frontend.pages.activity.activity-single.ads_registration.selling')
@elseif($activity->subactivity->ads_type == 'employee')
    @include('frontend.pages.activity.activity-single.ads_registration.employment.employee')
@elseif($activity->subactivity->ads_type == 'employer')
    @include('frontend.pages.activity.activity-single.ads_registration.employment.employer')
@elseif($activity->subactivity->ads_type == 'investor')
    @include('frontend.pages.activity.activity-single.ads_registration.investment.investor')
@elseif($activity->subactivity->ads_type == 'invested')
    @include('frontend.pages.activity.activity-single.ads_registration.investment.invested')
@endif    