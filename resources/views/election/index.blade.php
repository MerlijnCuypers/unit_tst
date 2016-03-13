@extends('layouts.app')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="pictureContainer">
    <div class="col-sm-offset-2 col-sm-8 col-xs-12">
        <!-- Display Images -->
        <div class="pictureBox row text-center">
            @include('election.pictures')
        </div> 
    </div>
</div>
@endsection