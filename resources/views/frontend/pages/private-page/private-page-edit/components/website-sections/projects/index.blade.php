<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید پروژه های خود را برای کاربران نمایش دهید.
                    </li>
                    <li>
                        این بخش اختیاری است بنابراین نمایش یا عدم نمایش آن را می توانید با چک باکس زیر کنترل کنید.
                    </li>
                </ul>
            </div>

            <!-- Display settins-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-eye-on text-primary fs-5 mt-n1 me-2"></i>
                تنظیمات نمایش بخش
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is-section-displayed" wire:model="isHidden" wire:change="changeDisplayStatus()">
                        <label class="form-check-label" for="is-section-displayed">
                            با تایید این گزینه این بخش در وبسایت شما مخفی خواهد شد
                        </label>
                    </div>
                </div>
            </div>

           <!-- About information-->
           <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات پروژه ها
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-description">
                        توضیحات
                    </label>
                    <span class="text-danger">*</span>
                    <textarea {{ $isHidden == true ? 'disabled' : '' }} class="form-control form-control-md" type="text" id="pr-business-header-description" placeholder="توضیحات مرتبط با پروژه های خود را وارد نمایید" wire:model="headerDescription"></textarea>
                    
                    @if($errors->has('headerDescription'))
                        <span class="text-danger">{{ $errors->first('headerDescription') }}</span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold">
                        انتخاب نوع پروژه برای نمایش در سامانه
                    </label>
                    <span class="text-danger">*</span>

                    @if($errors->has('projectValidation'))
                        <span class="text-danger">{{ $errors->first('projectValidation') }}</span>
                    @endif
                    <input type="hidden" wire:model="projectValidation">
                    
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-1-displayed" wire:model="isProjectType1">
                        <label class="form-check-label" for="is-project-type-1-displayed">
                            پروژه مسکونی
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-2-displayed" wire:model="isProjectType2">
                        <label class="form-check-label" for="is-project-type-2-displayed">
                            پروژه تجاری
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-3-displayed" wire:model="isProjectType3">
                        <label class="form-check-label" for="is-project-type-3-displayed">
                            پروژه تجاری مسکونی
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-4-displayed" wire:model="isProjectType4">
                        <label class="form-check-label" for="is-project-type-4-displayed">
                            پروژه تجاری اداری
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-5-displayed" wire:model="isProjectType5">
                        <label class="form-check-label" for="is-project-type-5-displayed">
                            پروژه تفریحی و ورزشی
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-6-displayed" wire:model="isProjectType6">
                        <label class="form-check-label" for="is-project-type-6-displayed">
                            پروژه پزشکی درمانی
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-7-displayed" wire:model="isProjectType7">
                        <label class="form-check-label" for="is-project-type-7-displayed">
                            پروژه آموزشی
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-8-displayed" wire:model="isProjectType8">
                        <label class="form-check-label" for="is-project-type-8-displayed">
                            پروژه کشاورزی و صنعتی
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-project-type-9-displayed" wire:model="isProjectType9">
                        <label class="form-check-label" for="is-project-type-9-displayed">
                            سایر پروژه ها
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
            <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" wire:click.prevent="back">
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