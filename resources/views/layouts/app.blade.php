<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Libooks Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('/assets/vellum-logo.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="bg-white">

    <div class="flex min-h-screen min-w-0">
        @include('custom-components.sidebar')

        <div class="flex-1 flex flex-col">
            @include('custom-components.topbar')

            <main class="flex-1 flex flex-col overflow-auto">
                <div class="relative overflow-hidden shrink-0 rounded-tl-[3rem] bg-gray" style="height: 220px;">
                    {{-- <img src="{{ asset('/assets/sign-in-bg.png') }}" alt="Dashboard Background"
                        class="absolute inset-0 w-full h-full object-cover"> --}}

                    <div class="relative z-10 flex justify-between items-start h-full px-10 pb-8 mt-16">
                        <div>
                            <h1 class="text-3xl font-semibold text-white mb-1">@yield('banner-title')</h1>
                            <p class="text-white/80 text-sm tracking-tight">@yield('banner-subtitle')</p>
                        </div>
                        <div>
                            @yield('banner-actions')
                        </div>
                    </div>
                </div>

                <div
                    class="flex-1 flex flex-col bg-white rounded-tl-[3rem] -mt-12 relative z-10 border border-gray-200 px-4 overflow-hidden">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

</body>

</html>
