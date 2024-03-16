<div>
    <!-- Body -->
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">

            <form wire:submit.prevent="save" class="needs-validation" novalidate>
                <!-- Page title-->
                <div class="text-center pb-4 mb-3"></div>
               
                <!-- Steps-->
                @livewire('frontend.pages.profile.profile-pages.my-resume.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.layouts.header', ['resumeSectionNumber' => $resumeSectionNumber])

                <!-- Step 1: Basic Info-->
                <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                    <h2 class="h5 font-vazir mb-4"><i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>اطلاعات فردی</h2>
                    <div class="row">
                        <div class="col-sm-6 mb-4">
                            <label class="form-label" for="pr-fn">نام</label>
                            <input disabled class="form-control form-control-lg" type="text" id="pr-fn" value="{{auth()->user()->firstname}}" placeholder="نام خود را وارد کنید">
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label class="form-label" for="pr-sn">نام خانوادگی</label>
                            <input disabled class="form-control form-control-lg" type="text" id="pr-sn" value="{{auth()->user()->lastname}}" placeholder="نام خانوادگی خود را وارد کنید">
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label class="form-label" for="pr-phone">شماره تماس</label>
                            <input disabled class="form-control form-control-lg" type="text" id="pr-phone" value="{{auth()->user()->phone}}" placeholder="تلفن خود را وارد کنید">
                        </div>
                    </div>

                    <div class="border-top pt-4">
                        <label class="form-label fw-bold pb-2 mb-2">
                            استان و شهر هایی که می توانید در پروژه شاغل بشوید را انتخاب نمایید
                        </label>
                        <span class="text-danger">*</span>
                        <div class="d-flex flex-column mb-3">
                            @if($errors->has('selectedProvinceId'))
                                <span class="text-danger">{{ $errors->first('selectedProvinceId') }}</span>
                            @endif 
                        </div>
                        @foreach ($inputs as $key => $value)
                            <div class="row mb-3">                          
                                <div class="col-md-5">
                                    <div>
                                        <div class="select-box">
                                            <select class="form-select form-select-md" wire:model="selectedProvinceId.{{$value}}" wire:change="provinceIdSelected({{$value}})">
                                                <option value="" selected disabled>انتخاب استان</option>
                                                @foreach ($provinces as $provinceItem)
                                                    <option value="{{ $provinceItem->id }}">
                                                        {{ $provinceItem->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div>
                                        <select wire:model="selectedCityId.{{$value}}" class="form-select form-select-md">
                                            <option value="" selected disabled>انتخاب شهر</option>
                                            @foreach ($cities[$value] as $cityItem)
                                                <option value="{{ $cityItem->id }}">
                                                    {{ $cityItem->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-link btn-lg text-danger py-2 px-0 mb-md-n2" type="button" wire:click="remove({{$key}})">
                                        <i class="fi-trash fs-sm me-2"></i>
                                        حذف
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <div class="mb-4 mt-2">
                            <button class="btn btn-link btn-lg text-primary py-2 px-0 mb-md-n2" type="button" wire:click="add({{$i}})">
                                <i class="fi-plus fs-sm me-2"></i>
                                افزودن استان و شهر
                            </button>
                        </div>
                    </div>
                </div>
            
                <!-- Navigation-->
                <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5 mb-4">
                    <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" wire:click="backward">
                        <i class="fi-chevron-left fs-sm me-2"></i>
                        مرحله قبل
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                        مرحله بعد
                        <i class="fi-chevron-right fs-sm ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
      </div>
    <!--End of Body -->
</div>