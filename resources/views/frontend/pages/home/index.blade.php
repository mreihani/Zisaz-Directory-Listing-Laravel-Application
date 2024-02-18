@extends('frontend.master')
@section('main')

<div>
    <!-- Hero-->
    @livewire('frontend.pages.home.components.hero')

    @livewire('frontend.pages.home.components.main-content')
</div>
            
@endsection