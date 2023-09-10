<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Add CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <header>
        <!-- Your header content -->
    </header>

    <aside>
        @yield('sidebar')
    </aside>

    <main>

        @yield('content')
    </main>

    <footer>
        <!-- Your footer content -->
    </footer>

    <!-- Add JS files here -->

</body>

</html>