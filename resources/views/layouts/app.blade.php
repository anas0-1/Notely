<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Notely')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('partials.header')
    <main class="container mx-auto mt-10">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        
        userMenuButton.addEventListener('click', function () {
            userMenu.classList.toggle('hidden');
        });
        
        // Hide the menu if clicked outside
        document.addEventListener('click', function (event) {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    });
</script>

</html>
