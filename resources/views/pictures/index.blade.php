@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- Add Picture -->
        <div class="about-section">
            <div class="text-content">
                <div class="span7 offset1">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload Picture
                        </div>
                        <div class="panel-body"> 
                            <form action="{{ url('picture/upload') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="control-group">
                                    <div class="controls">  
                                        <div class="col-xs-2">
                                            File
                                        </div>                                        
                                        <div class="col-xs-10" id="picUploadBox">
                                            <input type="file" name="picture" id="picture" />
                                        </div>
                                        <div class="col-xs-2">
                                            Name
                                        </div>                                        
                                        <div class="col-xs-10">
                                            <input type="text" name="name" id="name" />
                                        </div>                                        
                                        <div class="col-xs-12">
                                            <p class="errors">{!!$errors->first('image')!!}</p>
                                            @if(Session::has('error'))
                                            <p class="errors">{!! Session::get('error') !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    <input type="submit" value="Upload picture" name="submit">
                                </div>
                                <div id="success"> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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