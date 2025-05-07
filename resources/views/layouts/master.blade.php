<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? $dynamicTitle ?? 'Dashboard - SABAR' }}</title>

    @include('include.style')
</head>

<body>
    <div id="app">

        @include('include.sidebar')

    </div>
        <div id="main">
            {{-- <div class="page-heading">
                <h3>Dashboard</h3>
            </div> --}}
                @yield('content')
                
                @include('include.footer')
        </div>
    </div>
</div>

@include('include.script')

</body>

</html>