<div>
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">
            <form wire:submit.prevent="save" class="needs-validation" novalidate>
                <!-- Page title-->
                <div class="text-center pb-4 mb-3"></div>
                
                <!-- Step 3: Work experience-->
                <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                    <h2 class="h5 font-vazir mb-4"><i class="fi-shop text-primary fs-5 mt-n1 me-2 pe-1"></i>
                        درباره فروشگاه
                    </h2>
                    <div class="mb-4">
                        <label class="form-label" for="pr-description">توضیحات</label>
                        <span class="text-danger">*</span>
                        @if($errors->has('workExperience'))
                            <span class="text-danger">{{ $errors->first('workExperience') }}</span>
                        @endif 
                        <textarea wire:model="workExperience" class="form-control" rows="5" id="pr-description" placeholder="درباره فروشگاه بنویسید مانند نوع کالا ها، شغل فروشگاه"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                        ذخیره
                        <i class="fi-chevron-right fs-sm ms-2"></i>
                    </button>
                </div>
              
            <form> 
        </div>
      </div>
</div>