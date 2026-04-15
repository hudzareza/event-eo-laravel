<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Event EO Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    @include('backend.layouts.sidebar')

    <div class="lg:ml-64 min-h-screen flex flex-col">

        <header class="h-20 bg-white border-b border-gray-100 sticky top-0 z-40 flex items-center justify-between px-8">
            <h2 class="text-xl font-bold text-gray-800">@yield('title')</h2>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500 italic">Logged in as PJ Senior Programmer</span>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

    </div>

</body>
</html>