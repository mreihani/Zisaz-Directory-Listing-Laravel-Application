<div>
    <div class="card mb-4">
        <h5 class="card-header">
            تغییر شماره تلفن
        </h5>
        <div class="card-body">
            @if($confirmationCode)
                @livewire('dashboards.users.admin.pages.account-settings.security.two-factor-auth.component.sms-verification')
            @else 
                @livewire('dashboards.users.admin.pages.account-settings.security.two-factor-auth.component.change-phone')
            @endif

            <hr class="mt-5 mb-4">

            @livewire('dashboards.users.admin.pages.account-settings.security.two-factor-auth.component.two-factor-auth')
        </div>
    </div>
</div>