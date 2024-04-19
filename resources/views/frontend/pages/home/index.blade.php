@extends('frontend.master')
@section('main')

@push('page-styles')
<style>
    .picture-upload {
        display: block !important;
    }
</style>
@endpush


@push('page-scripts-top')
    <script src="{{asset('assets/frontend/vendor/collapsible-checkable-hierarchical-tree/jquery.checktree.js')}}"></script>
@endpush


<div>
    @livewire('frontend.pages.home.components.main-content')
</div>
           
<form action="/upload-img" method="post" enctype="multipart/form-data">
    @csrf
    Select image to upload:
    <input class="picture-upload" type="file" name="fileToUpload" id="fileToUpload">
    <button class="btn btn-primary" type="submit">
</form>

@endsection