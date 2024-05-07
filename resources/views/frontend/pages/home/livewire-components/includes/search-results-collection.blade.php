<!-- List of all ads-->
<div class="pb-2">
    <h5 class="pb-3">کلیه آگهی ها</h5>
   
    @if(count($searchResults))
        <div class="row row-cols-xl-3 row-cols-sm-2 row-cols-1 gy-4 gx-3 gx-xxl-4 py-4">
            @foreach ($searchResults as $searchResultItem)

                <!-- Item-->
                <div class="col pb-sm-2">
                    <div class="position-relative">
                        <div class="position-relative mb-3">
                            <button class="btn btn-icon btn-light-primary btn-xs text-primary rounded-circle position-absolute top-0 end-0 m-3 zindex-5" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="نشان کردن" data-bs-original-title="نشان کردن">
                                <i class="fi-bookmark"></i>
                            </button>
                            <img class="rounded-3" src="{{$searchResultItem->adsImagesUrl()}}" alt="Article img">
                        </div>
                        <h3 class="mb-2 fs-lg">
                            <a class="nav-link stretched-link" href="{{route('activity', $searchResultItem->slug)}}">
                                {{$searchResultItem->subactivity->item_title}}
                            </a>
                        </h3>
                        <ul class="list-inline mb-0 fs-sm">
                            <li class="list-inline-item pe-1">
                                <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                {{jdate($searchResultItem->updated_at)->ago()}}
                            </li>
                        </ul>
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