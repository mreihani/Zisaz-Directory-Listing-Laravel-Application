<div>
    @if($activity->subactivity->type == 'resume' && in_array($activity->subactivity->resume_goal, [1,2,3,4,5,6]))
        @livewire('frontend.pages.activity.activity-edit.resume.goal' . $activity->subactivity->resume_goal . '.index', ['activity' => $activity])
    @endif
</div>