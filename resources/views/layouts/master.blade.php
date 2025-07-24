<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Master-Blade</title> --}}

    <title>@yield('title', 'External-Life')</title>

    {{-- Css  --}}
    @include('partials.css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        {{-- Here include the header  --}}
        @include('partials.header')
        @include('partials.sidebar')

        <main class="container-fluid">
            {{-- here automatic take the main content  --}}
            @yield('content')
        </main>

        {{-- Here include the footer  --}}
        @include('partials.footer')


        {{-- Here include js  --}}
        @include('partials.js')
    </div>



</body>

</html>
