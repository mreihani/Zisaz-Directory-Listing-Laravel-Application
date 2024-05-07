<div class="mb-2 mb-lg-0">
    <!-- Search form-->
    <form class="form-group d-block rounded-lg-pill py-0" wire:submit.prevent="search">
        <div class="d-flex align-items-center search-from-header">
            <div>
                <div class="input-group input-group-lg border-end-xl border-light">
                    <input class="form-control" type="text" placeholder="عنوان شغلی، مهارت یا..." wire:model="searchQuery">
                </div>
            </div>
            
            <div class="d-none d-lg-block">
                <div class="dropdown border-light btn-group" data-bs-toggle="select" wire:ignore x-on:click="
                    let category = $('.search-category span').html();
                    @this.searchCategory = category;
                ">
                    <button class="btn btn-link dropdown-toggle search-category" type="button" aria-expanded="false" aria-haspopup="true" >
                        <span class="dropdown-toggle-label">دسته بندی</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light my-3" style="top:25px;">
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
           
            <div class=" d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-primary w-lg-auto rounded-pill" type="submit">
                    <i class="fi-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

