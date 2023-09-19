<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Add CSS files here -->

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <!-- Your header content -->
    </header>

    <aside>
        @include('sidebar')
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
