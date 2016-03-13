@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- Add Picture -->
        
        <!-- Pictures -->
        @if (count($pictures) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Pictures list
            </div>

            <div class="panel-body"> 
                @foreach ($pictures as $picture)
                <div class="col-xs-3 text-center">
                    <img class="col-xs-12 img-thumbnail" src="img/{{ $picture->file }}" />
                    <span class="col-xs-12" >{{ $picture->name }}</span>
                </div>
                @endforeach 
            </div>
        </div>
        @endif
    </div>
</div>
@endsection