<div>
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">
            <form wire:submit.prevent="save" class="needs-validation" novalidate>
                <!-- Page title-->
                <div class="text-center pb-4 mb-3"></div>
                
                <!-- Step 3: Work experience-->
                <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                    <h2 class="h5 font-vazir mb-4">
                        <svg width="15px" height="15px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#454865" stroke="#454865"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M0 0h48v48H0z" fill="none"></path> <g id="Shopicon"> <polygon points="8,10 26,10 26,6 4,6 4,42 30,42 30,38 8,38 "></polygon> <polygon points="35,14 41,14 44,14 44,6 32,6 32,14 "></polygon> <polygon points="41,18 35,18 32,18 32,34.701 38,42.201 44,34.701 44,18 "></polygon> <polygon points="21,13.856 17.229,17.627 15.343,15.742 12.516,18.571 17.229,23.283 23.828,16.685 "></polygon> <polygon points="15.343,25.742 12.516,28.571 17.229,33.283 23.828,26.685 21,23.856 17.229,27.627 "></polygon> </g> </g></svg>
                        اطلاعات پروژه
                    </h2>
                    <div class="mb-4">
                        <label class="form-label" for="pr-description">توضیحات</label>
                        <span class="text-danger">*</span>
                        @if($errors->has('workExperience'))
                            <span class="text-danger">{{ $errors->first('workExperience') }}</span>
                        @endif 
                        <textarea wire:model="workExperience" class="form-control" rows="5" id="pr-description" placeholder="لطفا در باره پروژه هایی که انجام می دهید بنویسید"></textarea>
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

