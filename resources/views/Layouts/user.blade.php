<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>User - @yield('title')</title>

    @stack('styles')
</head>

<body>

    <nav>
        <h2>User Panel</h2>

        <a href="/user/dashboard">Dashboard</a>
        |
        <a href="/user/profile">Profile</a>
    </nav>

    <main>
        @yield('content')
    </main>

    @stack('scripts')

</body>

</html>