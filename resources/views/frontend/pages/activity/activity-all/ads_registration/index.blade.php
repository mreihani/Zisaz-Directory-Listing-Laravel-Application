@extends('frontend.master')
@section('main')

<section class="position-relative" style="margin-top: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 position-relative mb-4 mt-5 pt-5" style="z-index: 1025;">
                <!-- List of selling ads-->
                <div class="pb-2">
                    <h5 class="pb-3">
                        آگهی ها
                    </h5>
                    <div class="pb-2">
                        @if(count($activities))
                            <div class="row">
                                @foreach ($activities as $activitiesItem)
                                    <!-- Item-->
                                    <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                                        <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                                            <a class="card-img-top" href="{{route('activity', $activitiesItem->subactivity->activity->slug)}}" style="background-image: url('{{$activitiesItem->subactivity->activity->adsImagesUrl()}}');"></a>
                                            <div class="d-flex flex-column justify-content-between p-3">
                                                <h4 class="fs-6 pt-1 mb-2">
                                                    <a class="nav-link" href="{{route('activity', $activitiesItem->subactivity->activity->slug)}}">
                                                        {{$activitiesItem->subactivity->item_title}}
                                                    </a>
                                                </h4>
                                                <a class="text-decoration-none" href="{{route('activity', $activitiesItem->subactivity->activity->slug)}}">
                                                    <div class="text-body fs-xs">
                                                        <span class="me-2 pe-1">
                                                            {{jdate($activitiesItem->subactivity->updated_at)->ago()}}
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                    
                                @endforeach
                            </div>
                        @else
                            <div class="mx-2">
                                <div class="alert alert-accent" role="alert">
                                    هیچ موردی یافت نشد!
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>    

@endsection

