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
                        <div class="col-sm-6 mb-4">
                            <label class="form-label" for="pr-birth-date">تاریخ تولد </label>
                            <div class="input-group input-group-lg">
                            <input disabled class="form-control rounded pe-5" placeholder="انتخاب تاریخ" 
                            value="{{auth()->user()->userProfile && auth()->user()->userProfile->userProfileInformation && auth()->user()->userProfile->userProfileInformation->birth_date
                                ? auth()->user()->userProfile->userProfileInformation->birth_date : ''}}">
                                <i class="fi-calendar text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
                            </div>
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

                    <div class="border-top pt-4">

                        <label class="form-label fw-bold pb-1 mb-2">سوابق شغلی و تجربه کاری</label>
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
                        
                        <label class="form-label fw-bold pb-1 mb-2">نوع قرارداد</label>
                        <span class="text-danger">*</span>
                        <div class="d-flex flex-column mb-3">
                            @if($errors->has('selectedContractType'))
                                <span class="text-danger">{{ $errors->first('selectedContractType') }}</span>
                            @endif 
                        </div>
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4">
                            @foreach ($contractTypeArray as $contractTypeChunk)
                            <div class="col">
                                @foreach ($contractTypeChunk as $contractTypeItem)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="contract_type_{{$contractTypeItem['id']}}"
                                         wire:model="selectedContractType.{{$contractTypeItem['id']}}">
                                        <label class="form-check-label" for="contract_type_{{$contractTypeItem['id']}}">
                                            {{$contractTypeItem['title']}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>

                        <label class="form-label fw-bold pb-1 mb-2">حداقل حقوق درخواستی</label>
                        <span class="text-danger">*</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="payment_by_agreement"
                             wire:model="isPaymentByAgreement" wire:click="setPaymentByAgreement($event.target.checked)">
                            <label class="form-check-label" for="payment_by_agreement">
                                حقوق توافقی
                            </label>
                        </div>
                        
                        @if(!$isPaymentByAgreement)
                            <div wire:transition>
                                <div class="d-flex flex-column mb-3">
                                    @if($errors->has('paymentAmountFrom'))
                                        <span class="text-danger mb-2">{{ $errors->first('paymentAmountFrom') }}</span>
                                    @endif 
                                    @if($errors->has('paymentAmountTo'))
                                        <span class="text-danger mb-2">{{ $errors->first('paymentAmountTo') }}</span>
                                    @endif 
                                    @if($errors->has('paymentAmountType'))
                                        <span class="text-danger mb-2">{{ $errors->first('paymentAmountType') }}</span>
                                    @endif 
                                </div>

                                <div class="row gx-2 gx-lg-3 gx-xl-4">
                                    <div class="col-md-2 mb-3 mb-md-0">
                                        <select disabled class="form-select form-select-lg">
                                            <option value="usd">تومان</option>
                                        </select>
                                    </div>
                                    <div class="col-md-7 mb-3 mb-md-0">
                                        <div class="d-flex align-items-center">
                                            <input class="form-control form-control-lg" type="number" step="100" min="300" placeholder="از" wire:model="paymentAmountFrom">
                                            <div class="mx-2">—</div>
                                            <input class="form-control form-control-lg" type="number" step="100" min="500" placeholder="تا" wire:model="paymentAmountTo">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select form-select-lg" wire:model="paymentAmountType">
                                            <option value="monthly">ماهیانه</option>
                                            <option value="hourly">ساعتی</option>
                                            <option value="weekly">هفتگی</option>
                                            <option value="annually">سالیانه</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
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