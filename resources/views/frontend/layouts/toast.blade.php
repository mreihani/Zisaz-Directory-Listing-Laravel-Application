<div>
    @if($showToaster)
        <div>
            <div id="toastBody" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header {{$type}} text-white">
                <i class="fi-check-circle me-2"></i>
                <span class="fw-bold me-auto">
                    {{$title}}
                </span>
                <button type="button" class="btn-close btn-close-white text-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-success">
                    {{$message}}
                </div>
            </div>
        </div>
    @endif
</div>


