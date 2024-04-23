<div>
    @if($showPhone)
        <a class="text-decoration-none" href="tel:{{$phone}}">
            <span>
                {{$phone}}
            </span>
        </a>
    @else
        برای نمایش اطلاعات تماس ابتدا باید
        <a class="text-decoration-none" href="" wire:click.prevent="openLoginModal">
            وارد 
        </a>
        سامانه شوید
    @endif
</div>