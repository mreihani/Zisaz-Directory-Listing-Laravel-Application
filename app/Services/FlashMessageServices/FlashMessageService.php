<?php

function displayFlashMessage()
{
    if (Session::has('flash_message'))
    {
        list($type, $title, $message) = explode('|', Session::get('flash_message'));

        return sprintf('
            <div>
                <div id="toastBody" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                    <div class="toast-header bg-%s text-white">
                        <i class="fi-check-circle me-2"></i>
                        <span class="fw-bold me-auto">
                            %s
                        </span>
                        <button type="button" class="btn-close btn-close-white text-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-%s">
                        %s
                    </div>
                </div>
            </div>
            ', 
        $type, $title, $type, $message);
    }

    return '';
}

