<!-- List of all ads-->
<div class="pb-2">
    <h5 class="pb-3 pt-3">کلیه آگهی ها</h5>
   
    @if(count($searchResults))
        <div class="row">
            @foreach ($searchResults as $searchResultItem)
                <!-- Item-->
                <div class="col-sm-3 mb-4">
                    <div class="card card-hover border-0 shadow-sm h-100">
                        <a class="card-img-top overflow-hidden position-relative" href="">
                            <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                            <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
                        </a>
                        <div class="card-body">
                            <a class="fs-sm text-uppercase text-decoration-none" href="">
                                {{$searchResultItem['item_title']}}
                            </a>
                            <h3 class="fs-base pt-1 mb-2">
                                <a class="nav-link" href="">
                                    {{$searchResultItem['item_description']}}
                                </a>
                            </h3>
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