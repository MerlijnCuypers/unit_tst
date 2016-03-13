<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Unit-t Hot or Not</title>

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default"  style="margin-bottom:65px ">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="col-sm-11" src="img/logo.png" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('/report') }}">
                                <img height="30" width="30" src="img/clock.png" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/pictures') }}">
                                <img height="30" width="30"  src="img/settings.png" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        @if (isset($election))
        <script src="{{ url('/js/election.js') }}"></script>
        @endif
        @if (isset($pictures))
        <script src="{{ url('/js/picture.js') }}"></script>
        @endif
        @if (isset($reportHot))
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script language="javascript" type="text/javascript" src="http://www.flotcharts.org/flot/jquery.flot.js"></script>
        <script language="javascript" type="text/javascript" src="http://www.flotcharts.org/flot/jquery.flot.time.js"></script>
        <script language="javascript" type="text/javascript" src="http://www.flotcharts.org/flot/jquery.flot.resize.js"></script>
        <script src="{{ url('/js/report.js') }}"></script>
        @endif
    </body>
</html>