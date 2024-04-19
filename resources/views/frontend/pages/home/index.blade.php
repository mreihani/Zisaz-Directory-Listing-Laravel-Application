@extends('frontend.master')
@section('main')

@push('page-scripts-top')
    <script src="{{asset('assets/frontend/vendor/collapsible-checkable-hierarchical-tree/jquery.checktree.js')}}"></script>
@endpush


<div>
    @livewire('frontend.pages.home.components.main-content')
</div>

@endsection