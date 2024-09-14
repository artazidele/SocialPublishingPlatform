<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('layouts.head')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header class="header">
        @include('layouts.header')
    </header>

    <main class="inner-container">
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

</body>

</html>