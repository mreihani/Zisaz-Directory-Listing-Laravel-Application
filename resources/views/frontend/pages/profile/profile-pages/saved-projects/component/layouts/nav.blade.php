<ul class="nav nav-tabs border-bottom mb-4" role="tablist">
    <li class="nav-item mb-3">
        <a class="nav-link {{ !request()->has('type') ? 'active' : '' }}" href="{{ route('user.dashboard.saved-projects.index') }}" role="tab" aria-selected="true">
            <i class="fi-file fs-base me-2"></i>
            منتشر شده
        </a>
    </li>
    <li class="nav-item mb-3">
        <a class="nav-link {{ request('type') === 'pending' ? 'active' : '' }}" href="{{ route('user.dashboard.saved-projects.index', ['type' => 'pending']) }}" role="tab" aria-selected="false">
            <i class="fi-rotate-right fs-base me-2"></i>
            در انتظار تأیید
        </a>
    </li>
    <li class="nav-item mb-3">
        <a class="nav-link {{ request('type') === 'rejected' ? 'active' : '' }}" href="{{ route('user.dashboard.saved-projects.index', ['type' => 'rejected']) }}" role="tab" aria-selected="false">
            <i class="fi-x fs-base me-2"></i>
            رد شده
        </a>
    </li>
    <li class="nav-item mb-3">
        <a class="nav-link {{ request('type') === 'trashed' ? 'active' : '' }}" href="{{ route('user.dashboard.saved-projects.index', ['type' => 'trashed']) }}" role="tab" aria-selected="false">
            <i class="fi-trash fs-base me-2"></i>
            حذف شده
        </a>
    </li>
</ul>
