<div>
    <!-- Search form-->
    <form class="form-group form-group-light d-block rounded-lg-pill p-0" wire:submit.prevent="search">
        <div class="row align-items-center search-from-header">
            <div class="col-lg-6">
                <div class="input-group input-group-lg border-end-xl border-light">
                    <span class="input-group-text text-light rounded-pill opacity-50 pe-3">
                        <i class="fi-search"></i>
                    </span>
                    <input class="form-control" type="text" placeholder="عنوان شغلی، مهارت یا..." wire:model="searchQuery">
                </div>
            </div>
            <hr class="hr-light d-lg-none my-2">
            <div class="col-lg-3">
                <div class="dropdown border-light btn-group" data-bs-toggle="select" wire:ignore x-on:click="
                    let category = $('.search-category span').html();
                    @this.searchCategory = category;
                ">
                    <button class="btn btn-link dropdown-toggle search-category" type="button" aria-expanded="false" aria-haspopup="true" >
                        <span class="dropdown-toggle-label">دسته بندی</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark my-3" style="top:25px;">
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="dropdown-item-label">آگهی ها</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="dropdown-item-label">کسب و کار ها</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="dropdown-item-label">پروژه ها</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="dropdown-item-label">مزایده و مناقصه</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="hr-light d-lg-none my-2">
            <div class="col-lg-3 d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-primary w-50 w-lg-auto rounded-pill" type="submit">
                    جستجو
                </button>
            </div>
        </div>
    </form>
</div>

