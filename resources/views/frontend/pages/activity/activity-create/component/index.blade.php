<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            @include('frontend.pages.activity.activity-create.component.includes.choose-activity')

            @include('frontend.pages.activity.activity-create.component.includes.resume.resume-goal-selection')
            @include('frontend.pages.activity.activity-create.component.includes.ads_registration.ads-registration-selection')

        </div>
    </form> 
</div>

