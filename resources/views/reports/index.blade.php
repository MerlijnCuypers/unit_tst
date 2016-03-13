@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- hotlist -->
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    HOT
                </div>
                <div class="panel-body">
                    @if (count($reportHot) > 0)
                    @foreach ($reportHot as $picture)
                    <div class="row">
                        <span class="col-xs-4" data-toggle="tooltip"
                              data-placement="right"
                              title='<img class="img-thumbnail" src="img/{{ $picture->file }}" />'
                              >
                            {{ $picture->name }}
                        </span>
                        <span class="col-xs-4" >{{ $picture->wins }}</span>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- notlist -->
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    NOT
                </div>
                <div class="panel-body">
                    @if (count($reportNot) > 0)
                    @foreach ($reportNot as $picture)
                    <div class="row">
                        <span class="col-xs-4" data-toggle="tooltip"
                              data-placement="right"
                              title='<img class="img-thumbnail" src="img/{{ $picture->file }}" />'
                              >
                            {{ $picture->name }}
                        </span>
                        <span class="col-xs-4" >{{ $picture->losses }}</span>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- popularity chart -->
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Popularity elections
                </div>
                <div class="panel-body">
                    <div id="popularityLineChart" style="height:350px; "></div>
                </div>
            </div>
        </div>


        <!-- total chart -->
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Total elections per picture
                </div>
                <div class="panel-body">
                    <div id="totalPiechart" style=" height:350px;" class="col-xs-12 align-center"></div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection