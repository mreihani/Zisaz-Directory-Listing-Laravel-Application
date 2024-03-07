<div>
    <!-- Account Activity details -->
    <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
        <h2 class="h5 font-vazir mb-4">
            <i class="fi-award text-primary fs-5 mt-n1 me-2"></i>
            مجوز ها
        </h2>
        
        <label class="form-label" for="pr-title">عنوان مجوز <span class="text-danger">*</span></label>
        <input class="form-control form-control-lg mb-4" type="text" id="pr-title" placeholder="عنوان مجوز خود را وارد نمایید" required="">
       
        <!-- Multiple file upload: Grid of files + File type, size and quantity validation (Gallery) -->
        <div class="mb-4">
            <label class="form-label" for="pr-description">
                بارگذاری تصویر مجوز
                <span class="text-danger">*</span>
            </label>
            <input class="file-uploader file-uploader-grid" type="file" multiple data-max-files="4" data-max-file-size="2MB" accept="image/png, image/jpeg, video/mp4, video/mov" data-label-idle='<div class="btn btn-primary mb-3"><i class="fi-cloud-upload me-1"></i>Upload photos / video</div><div>or drag them in</div>'>
        </div>

        <button class="btn btn-link btn-lg text-primary py-2 px-0 mb-md-n2" type="button"><i class="fi-plus fs-sm me-2"></i>ایجاد سابقه شغلی</button>
    </div>



    {{-- <div class="row">
        <!-- Sidebar-->
        <div class="col-md-3 mb-4 pb-3 pb-md-0">
          <div style="max-width: 13rem;">
            <ul class="list-unstyled fs-sm pb-1 pb-md-3 px-0">
              <li><a class="nav-link fw-normal d-flex align-items-center px-0 py-1" href="#"><i class="fi-file opacity-70 me-2"></i><span>منتشر شده</span><span class="text-muted ms-auto">(3)</span></a></li>
              <li><a class="nav-link fw-normal d-flex align-items-center px-0 py-1" href="#"><i class="fi-file-clean opacity-70 me-2"></i><span>پیش نویس</span><span class="text-muted ms-auto">(0)</span></a></li>
              <li><a class="nav-link fw-normal d-flex align-items-center px-0 py-1" href="#"><i class="fi-archive opacity-70 me-2"></i><span>آرشیو</span><span class="text-muted ms-auto">(0)</span></a></li>
            </ul><a class="btn btn-primary rounded-pill w-100" href="job-board-post-resume-1.html"><i class="fi-plus fs-sm me-2"></i>ثبت رزومه جدید</a>
          </div>
        </div>
        <!-- List of resumes-->
        <div class="col-md-9">
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="d-none d-sm-block" src="{{asset('assets/frontend/img/avatars/38.png')}}" width="100" alt="Resume picture">
                  <div class="ps-sm-3">
                    <h3 class="h6 card-title pb-1 mb-2"><a class="stretched-link text-nav text-decoration-none" href="#">کارشناس پشتیبانی</a></h3>
                    <div class="fs-sm">
                      <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</div>
                      <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>450000 تومان</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end justify-content-between">
                  <div class="dropdown position-relative zindex-10 mb-3">
                    <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                    <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>ویرایش</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-flame opacity-60 me-2"></i>بروزرسانی</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-download-file opacity-60 me-2"></i>دریافت نسخه PDF</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-power opacity-60 me-2"></i>غیرفعال</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>حذف</button>
                      </li>
                    </ul>
                  </div><strong class="fs-sm">80 بازدید</strong>
                </div>
              </div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="d-none d-sm-block" src="{{asset('assets/frontend/img/avatars/37.png')}}" width="100" alt="Resume picture">
                  <div class="ps-sm-3">
                    <h3 class="h6 card-title pb-1 mb-2"><a class="stretched-link text-nav text-decoration-none" href="#"><span class="me-3">گرافیست</span><span class="badge bg-faded-accent fs-sm rounded-pill">ویژه</span></a></h3>
                    <div class="fs-sm">
                      <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</div>
                      <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>20000 تومان - 205000 تومان</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end justify-content-between">
                  <div class="dropdown position-relative zindex-5 mb-3">
                    <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                    <ul class="dropdown-menu my-1" aria-labelledby="contextMenu2">
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>ویرایش</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-flame opacity-60 me-2"></i>بروزرسانی</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-download-file opacity-60 me-2"></i>دریافت نسخه PDF</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-power opacity-60 me-2"></i>غیرفعال</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>حذف</button>
                      </li>
                    </ul>
                  </div><strong class="fs-sm">203 بازدید</strong>
                </div>
              </div>
            </div>
          </div>

          <!-- Item-->
          <div class="card bg-secondary card-hover">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="d-none d-sm-block" src="{{asset('assets/frontend/img/avatars/37.png')}}" width="100" alt="Resume picture">
                  <div class="ps-sm-3">
                    <h3 class="h6 card-title pb-1 mb-2"><a class="stretched-link text-nav text-decoration-none" href="#">کارشناس سرورهای ماکروسافت</a></h3>
                    <div class="fs-sm">
                      <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</div>
                      <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>2500000 تومان</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-end justify-content-between">
                  <div class="dropdown position-relative zindex-1 mb-3">
                    <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu3" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                     <ul class="dropdown-menu my-1" aria-labelledby="contextMenu2">
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>ویرایش</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-flame opacity-60 me-2"></i>بروزرسانی</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-download-file opacity-60 me-2"></i>دریافت نسخه PDF</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-power opacity-60 me-2"></i>غیرفعال</button>
                      </li>
                      <li>
                        <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>حذف</button>
                      </li>
                    </ul>
                  </div><strong class="fs-sm">92 بازدید</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> --}}



    <!-- Action buttons-->
    <div class="row">
        <div class="col-lg-9">
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-primary rounded-pill px-3 px-sm-4" type="button">
                    ذخیره تغییرات
                </button>
            </div>
        </div>
    </div>
</div>








