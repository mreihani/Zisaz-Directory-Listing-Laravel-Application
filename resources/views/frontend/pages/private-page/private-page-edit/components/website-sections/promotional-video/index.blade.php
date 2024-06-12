<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید یک ویدئو تبلیغاتی در مورد کسب و کار خود را برای کاربران نمایش دهید.
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
                اطلاعات خدمات ما
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-description">
                        توضیحات
                    </label>
                    <span class="text-danger">*</span>
                    <textarea {{ $isHidden == true ? 'disabled' : '' }} class="form-control form-control-md" type="text" id="pr-business-header-description" placeholder="توضیحات مرتبط با ویدئوی تبلیغاتی خود را وارد نمایید" wire:model="headerDescription"></textarea>
                    
                    @if($errors->has('headerDescription'))
                        <span class="text-danger">{{ $errors->first('headerDescription') }}</span>
                    @endif
                </div>
            </div>

            <div
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <!-- About information-->
                <h2 class="h5 font-vazir mb-4 mt-3">
                    <i class="fi-video text-primary fs-5 mt-n1 me-2"></i>
                    بارگذاری ویدئو
                </h2>

                <div class="row">
                    @if($isUploadAllowed)
                        @if(!is_null($promotionalVideo) && !is_null($promotionalVideo->video) && file_exists($promotionalVideo->video))
                            <template x-if="!progress">
                                <div class="col-md-12 mb-4 private-website-video-iframe d-flex justify-content-center">
                                    <video width="750" height="441" controls>
                                        <source src="{{asset($promotionalVideo->video)}}" type="video/mp4">
                                    </video>
                                </div>
                            </template>
                        @endif
                        
                        <div class="col-md-12 mb-4">
                            <label class="form-label fw-bold" for="pr-business-upload-video">
                                ویدئوی تبلیغاتی خود را بارگذاری نمایید
                            </label>
                            <span class="text-danger">*</span>

                            <label class="" for="pr-business-upload-video">
                                (حداکثر حجم مجاز 100 مگابایت و نوع فایل مجاز mp4 ،flv و mkv است)
                            </label>
                            
                            <input class="form-control form-control-md" {{ $isHidden == true ? 'disabled' : '' }} type="file" wire:model="video" accept=".mp4, .flv, .mkv">

                            <input type="hidden" wire:model="videoValidation">

                            @if($errors->has('videoValidation'))
                                <div class="text-danger">{{ $errors->first('videoValidation') }}</div>
                            @endif

                            <div class="mt-3 private-page">
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12 mb-4">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fi-check-circle me-2 me-sm-3 lead"></i>
                                <div>
                                    ویدئو با موفقیت بارگذاری گردید و پس از تأیید مدیریت در سامانه نمایش داده خواهد شد.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
            <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" wire:click.prevent="back">
                <i class="fi-chevron-left fs-sm me-2"></i>
                مرحله قبل
            </a>

            <button disabled type="button" class="btn btn-black btn-lg rounded-pill ms-sm-auto" wire:loading wire:target="video">
                <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
                در حال بارگذاری
            </button>

            <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto" wire:loading.remove wire:target="video">
                مرحله بعد
                <i class="fi-chevron-right fs-sm ms-2"></i>
            </button>
        </div>
    </form> 
</div>