<div>
    <!-- Body -->
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">
            <form wire:submit.prevent="save" class="needs-validation" novalidate>
                <!-- Page title-->
                <div class="text-center pb-4 mb-3"></div>

                <!-- Steps-->
                @livewire('frontend.pages.profile.profile-pages.my-resume.con-grp' . auth()->user()->userGroupType->groupable->id . '.sections.layouts.header', ['resumeSectionNumber' => $resumeSectionNumber])
                
                <!-- Step 3: Work experience-->
                <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                    <h2 class="h5 font-vazir mb-4"><i class="fi-briefcase text-primary fs-5 mt-n1 me-2 pe-1"></i>سوابق شغلی</h2>
                    <div class="mb-4">
                        <label class="form-label" for="pr-description">توضیحات</label>
                        <span>(اختیاری)</span>
                        @if($errors->has('workExperience'))
                            <span class="text-danger">{{ $errors->first('workExperience') }}</span>
                        @endif 
                        <textarea wire:model="workExperience" class="form-control" rows="5" id="pr-description" placeholder="درباره سابقه کار و نوع فعالیت های خود بنویسید"></textarea>
                    </div>
                    
                </div>
                <!-- Navigation-->
                <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5 mb-4">
                    <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" wire:click="backward">
                        <i class="fi-chevron-left fs-sm me-2"></i>
                        مرحله قبل
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                        ذخیره رزومه
                        <i class="fi-chevron-right fs-sm ms-2"></i>
                    </button>
                </div>
            <form> 
        </div>
      </div>
    <!--End of Body -->
</div>