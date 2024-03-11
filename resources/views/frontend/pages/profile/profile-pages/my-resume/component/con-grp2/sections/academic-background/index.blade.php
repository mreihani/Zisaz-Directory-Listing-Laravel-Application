<div>
    <!-- Body -->
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">

            <form wire:submit.prevent="save" class="needs-validation" novalidate>
                <!-- Page title-->
                <div class="text-center pb-4 mb-3"></div>

                <!-- Steps-->
                @livewire('frontend.pages.profile.profile-pages.my-resume.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.layouts.header', ['resumeSectionNumber' => $resumeSectionNumber])
            
                <!-- Step 2: Education-->
                <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                    <h2 class="h5 font-vazir mb-4"><i class="fi-education text-primary fs-4 mt-n1 me-2 pe-1"></i>
                        سوابق تحصیلی
                    </h2>

                    @foreach ($inputs as $key => $value)
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="pr-education-level">مقطع تحصیلی <span class="text-danger">*</span></label>
                                        @if($errors->has('academicLevel'))
                                            <span class="text-danger">{{ $errors->first('academicLevel') }}</span>
                                        @endif 
                                        <select class="form-select form-select-lg" id="pr-education-level" wire:model="academicLevel.{{$value}}">
                                            <option value="msd">سیکل</option>
                                            <option value="hsd">دیپلم</option>
                                            <option value="ad">کاردانی</option>
                                            <option value="ba">کارشناسی ارشد</option>
                                            <option value="ms">کارشناسی ارشد</option>
                                            <option value="phd">دکترا و بالاتر</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="pr-study-field">رشته تحصیلی <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-lg" type="text" id="pr-study-field" placeholder="رشته تحصیلی" wire:model="fieldOfStudy.{{$value}}">
                                        @error('fieldOfStudy.'.$value) <span class="text-danger error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="pr-college">نام دانشگاه / موسسه آموزشی <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-lg" type="text" id="pr-college" placeholder="نام دانشگاه/ موسسه آموزشی" wire:model="universityName.{{$value}}">
                                        @error('universityName.'.$value) <span class="text-danger error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="pr-country">
                                                آدرس دانشگاه یا موسسه آموزشی
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" id="pr-country" placeholder="کشور و شهر محل تحصیل" wire:model="universityAddress.{{$value}}">
                                        @error('universityAddress.'.$value) <span class="text-danger error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm btn-outline-danger" type="button" wire:click="remove({{$key}})">
                                    <i class="fi-trash fs-sm me-2"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    @endforeach

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="still-visiting" wire:model="relocateForInterview">
                        <label class="form-check-label" for="still-visiting">به شهر مورد نظر برای مصاحبه می روم.</label>
                    </div>
                    <button class="btn btn-link btn-lg text-primary py-2 px-0 mb-md-n2" type="button" wire:click="add({{$i}})">
                        <i class="fi-plus fs-sm me-2"></i>
                        ایجاد سابقه تحصیلی
                    </button>
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