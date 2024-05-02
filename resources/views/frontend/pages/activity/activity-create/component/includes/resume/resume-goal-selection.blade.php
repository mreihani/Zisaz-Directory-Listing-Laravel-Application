<div class="{{$section == "resume" ? '' : 'd-none'}}">   
    <div class="row">
        <div class="col-sm-12 mb-4">
            <label class="form-label fw-bold" for="pr-country">
                لطفا هدف خود از ایجاد رزومه در زی ساز را تعیین نمایید
                <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-md" wire:model="resumeGoal" wire:change="changeResumeGoal($event.target.value)">
                <option value="" disabled="">انتخاب هدف ایجاد رزومه</option>
                <option value="1">معرفی تخصص، تجربیات و پروژه های شخصی</option>
                <option value="2">معرفی فروشگاه</option>
                <option value="3">معرفی شرکت ساختمانی</option>
                <option value="4">معرفی دفتر  طراحی و مهندسی</option>
                <option value="5">معرفی آزمایشگاه مصالح ساختمانی</option>
                <option value="6">معرفی کارخانه تولیدی</option>
            </select>
        </div>
    </div>

    @if($resumeGoal == 1)
        @include('frontend.pages.activity.activity-create.component.includes.resume.resume-goal-form-1')
    @elseif($resumeGoal == 2)
        @include('frontend.pages.activity.activity-create.component.includes.resume.resume-goal-form-2')
    @elseif($resumeGoal == 3)
        @include('frontend.pages.activity.activity-create.component.includes.resume.resume-goal-form-3')
    @elseif($resumeGoal == 4)
        @include('frontend.pages.activity.activity-create.component.includes.resume.resume-goal-form-4')
    @elseif($resumeGoal == 5)
        @include('frontend.pages.activity.activity-create.component.includes.resume.resume-goal-form-5')
    @elseif($resumeGoal == 6)
        @include('frontend.pages.activity.activity-create.component.includes.resume.resume-goal-form-6')
    @endif
</div>