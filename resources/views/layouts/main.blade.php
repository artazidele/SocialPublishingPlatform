<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('layouts.head')
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