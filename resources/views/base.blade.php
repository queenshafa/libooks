<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perpusnas</title>


   {{-- goggle font --}}
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">


   <!-- Styles / Scripts -->
           @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F0F2F8] overflow-x-hidden">
   <!-- Mobile overlay -->
   <div id="overlay" onclick="toggleSidebar()" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-35 md:hidden"></div>

   {{-- Sidebar --}}
   @include('custom-components.sidebar')

   {{-- Main content --}}
   <div class="md:ml-64 min-h-screen transition-all duration-300">

        {{-- Top Bar --}}
        @include('custom-components.topbar')

        @yield('content')
</body>
</html>