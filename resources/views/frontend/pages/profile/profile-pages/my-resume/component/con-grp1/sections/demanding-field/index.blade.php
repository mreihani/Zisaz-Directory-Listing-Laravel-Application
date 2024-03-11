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

                        <label class="form-label fw-bold pb-1 mb-2">مشاغل مورد نیاز</label>
                        <span class="text-danger">*</span>
                        <div class="d-flex flex-column mb-3">
                            @if($errors->has('selectedWorkExpIds'))
                                <span class="text-danger">{{ $errors->first('selectedWorkExpIds') }}</span>
                            @endif 
                        </div>  
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4 skills">
                            @foreach($workExpArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="workexp_{{$chunkItem['id']}}"
                                                wire:model="selectedWorkExpIds.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="workexp_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
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