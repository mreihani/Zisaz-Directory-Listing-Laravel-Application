<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="projectId">

            <!-- Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش بایستی امکانات و نقشه های پروژه خود را وارد نمایید.
                    </li>
                </ul>
            </div>

           <!-- Business Type-->
           <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                امکانات پروژه
            </h2>
           
            <!-- Project Description-->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-project-description">
                        توضیحات پروژه
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    <textarea class="form-control form-control-md" type="text" id="pr-business-project-description" placeholder="توضیحات پروژه را وارد نمایید" wire:model="projectDescription"></textarea>
                    
                    @if($errors->has('projectDescription'))
                        <span class="text-danger">{{ $errors->first('projectDescription') }}</span>
                    @endif
                </div>
            </div>

            <!-- Project welfare facilities-->
            <div class="row">
                <div class="col mb-4">
                    <label class="form-label fw-bold">
                        امکانات رفاهی موجود در پروژه را تعیین نمایید
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    <div class="row">
                        @foreach($projectWelfareFacilitiesArray as $chunkArray)
                            <div class="col">
                                @foreach($chunkArray as $chunkItem)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="welfare_facility_{{$chunkItem['id']}}"
                                            wire:model="welfareFacility.{{$chunkItem['id']}}">
                                        <label class="form-check-label" for="welfare_facility_{{$chunkItem['id']}}">
                                            {{$chunkItem['title']}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Project Plan Images -->
            <div>
                @foreach ($projectInputs as $projectKey => $projectValue)
                    @if(count($projectPlanImages) && isset($projectPlanImages[$projectValue]) && is_string($projectPlanImages[$projectValue]))
                        <div class="row mt-3">
                            <div class="col-sm-10">

                                <!-- File uploader -->
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="pr-description">
                                        نقشه های پروژه را بارگذاری نمایید
                                        <span class="fw-bold">(اختیاری)</span>
                                    </label>

                                    <label>
                                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                    </label>

                                    @error('projectPlanImages.'.$projectValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <input disabled class="form-control image-input-selector" type="file" wire:model="projectPlanImages.{{$projectValue}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12 d-flex justify-content-center">
                                                    <div class="border rounded-3 p-1" style="width: 150px;">
                                                        <div class="d-flex justify-content-center p-1">
                                                            <img src="{{asset($projectPlanImages[$projectValue])}}">    
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeProjectImage({{$projectKey}})">
                                    <i class="fi-trash fs-sm me-2"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="row mt-3">
                            <div class="col-sm-10">

                                <!-- File uploader -->
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="pr-description">
                                        نقشه های پروژه را بارگذاری نمایید
                                        <span class="">(اختیاری)</span>
                                    </label>

                                    <label>
                                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                    </label>

                                    @error('projectPlanImages.'.$projectValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <input class="form-control" type="file" wire:model="projectPlanImages.{{$projectValue}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            @if(count($projectPlanImages) && isset($projectPlanImages[$projectValue])) 
                                                <div class="row">
                                                    <div class="col-sm-12 d-flex justify-content-center">
                                                        <div class="border rounded-3 p-1" style="width: 150px;">
                                                            <div class="d-flex justify-content-center p-1">
                                                                <img src="{{$projectPlanImages[$projectValue]->temporaryUrl()}}">    
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeProjectImage({{$projectKey}})">
                                    <i class="fi-trash fs-sm me-2"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addProjectImage({{$projectIteration}})">
                    <i class="fi-image fs-sm me-2"></i>
                    افزودن تصویر دیگر
                </button>
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