<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- TailwindCSS -->
    <link rel="stylesheet" href="/src/output.css" />
    <!-- Remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/logo-libooks.png" type="image/x-icon" />
    <title>✦ – Libooks</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/landing.css', 'resources/js/frontend.js'])
</head>

<body class="font-helvetica">
    <!-- Navbar -->
    <button id="open-menu"
        class="fixed bottom-6 right-6 z-2100 bg-white text-gray w-14 h-14 rounded-full flex flex-col items-center justify-center gap-1.25">
        <span class="burger-line block w-5 h-0.5 bg-current transition-all duration-500"></span>
        <span class="burger-line block w-5 h-0.5 bg-current transition-all duration-500"></span>
    </button>
    <nav id="mega-menu" class="fixed inset-0 w-screen h-screen text-white pointer-events-none" style="z-index: 2000">
        <div id="menu-bg" class="absolute inset-0 bg-black"
            style="
          transform: scaleY(0);
          transform-origin: bottom;
          transition: transform 0.7s ease-in-out;
        ">
        </div>

        <div id="menu-content" class="relative z-10 h-full flex flex-col justify-between px-6 py-10"
            style="opacity: 0; transition: opacity 0.3s ease 0.3s">
            <div class="text-2xl font-medium tracking-tight">Libooks ✦</div>

            <!-- Nav -->
            <ul class="flex flex-col gap-2">
                <li>
                    <a href="index.html"
                        class="text-6xl font-instrument-serif opacity-50 hover:opacity-100 transition-opacity duration-300 py-2 block">Home</a>
                </li>

                <li>
                    <a href="all-books.html"
                        class="text-6xl font-instrument-serif opacity-50 hover:opacity-100 transition-opacity duration-300 py-2 block">Collection</a>
                </li>

                <li>
                    <a href="#booksBorrowing"
                        class="text-6xl font-instrument-serif opacity-50 hover:opacity-100 transition-opacity duration-300 py-2 block">Books
                        Borrowing</a>
                </li>
                <li>
                    <a href="#contact"
                        class="text-6xl font-instrument-serif opacity-50 hover:opacity-100 transition-opacity duration-300 py-2 block">Contact</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="text-6xl font-instrument-serif opacity-50 hover:opacity-100 transition-opacity duration-300 py-2 block">Login
                        Admin</a>
                </li>
            </ul>

            <!-- Bottom info -->
            <div
                class="border-t border-white/20 pt-4 flex justify-between items-end text-sm font-light tracking-tight opacity-60">
                <p>Mon - Fri: 07:30 - 18:30</p>
                <p class="pr-16">hello@libooks.com</p>
            </div>
        </div>
    </nav>


    @yield('content')


    <!-- Footer -->
    <footer class="bg-gray text-white">
        <!-- Mobile -->
        <div class="lg:hidden min-h-screen px-4 py-4 text-center">
            <p class="text-5xl mt-45"><i class="ri-asterisk"></i></p>
            <div class="bg-primary w-full">
                <h2 class="text-9xl text-gray mt-8">libooks</h2>
            </div>
            <div class="flex flex-col">
                <div class="border-b border-b-white py-4 mt-8">
                    <p class="text-2xl px-20 text-white tracking-tight font-medium">
                        <a href="#">Your Entire <br />World, Indexed.</a>
                    </p>
                </div>
                <div class="border-b border-b-white py-4">
                    <p class="text-2xl px-20 text-white tracking-tight font-medium">
                        <a href="#">More Info About <br />Libooks</a>
                    </p>
                </div>
                <div class="border-b border-b-white py-4">
                    <p class="text-2xl px-20 text-white tracking-tight font-medium">
                        Instagram <br />@itslibooks
                    </p>
                </div>
                <div class="py-4">
                    <p class="text-2xl px-20 text-white tracking-tight font-medium">
                        Facebook <br />@itslibooks
                    </p>
                </div>
            </div>
        </div>

        <!-- Desktop -->
        <div class="hidden lg:flex sticky bottom-0 lg:flex-col lg:justify-end lg:pt-20">
            <div class="flex-1 flex items-end mb-8 justify-center">
                <p class="text-5xl"><i class="ri-asterisk"></i></p>
            </div>
            <div class="bg-primary w-full overflow-hidden">
                <h2
                    class="text-gray font-medium text-[165px] py-4 text-center tracking-tighter leading-none whitespace-nowrap">
                    The Libooks E-Library
                </h2>
            </div>
            <div class="flex items-stretch" style="min-height: 100px">
                <div class="flex-1 flex items-center justify-center border-r border-white/30 px-8 py-6">
                    <p class="text-lg text-white tracking-tight font-medium text-center leading-snug">
                        <a href="#">Your Entire<br />World, Indexed.</a>
                    </p>
                </div>
                <div class="flex-1 flex items-center justify-center border-r border-white/30 px-8 py-6">
                    <p class="text-lg text-white tracking-tight font-medium text-center leading-snug">
                        <a href="#">More Info About<br />Libooks</a>
                    </p>
                </div>
                <div class="flex-1 flex items-center justify-center border-r border-white/30 px-8 py-6">
                    <p class="text-lg text-white tracking-tight font-medium text-center leading-snug">
                        Instagram<br />@itslibooks
                    </p>
                </div>
                <div class="flex-1 flex items-center justify-center px-8 py-6">
                    <p class="text-lg text-white tracking-tight font-medium text-center leading-snug">
                        Facebook<br />@itslibooks
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cursor -->
    {{-- <div id="cursor"
        class="fixed top-0 left-0 w-2 h-2 bg-white rounded-full pointer-events-none -translate-x-1/2 -translate-y-1/2 z-9999 mix-blend-difference">
    </div> --}}
    {{-- <div id="follower"
        class="fixed top-0 left-0 w-7.5 h-7.5 border-2 border-white rounded-full opacity-50 pointer-events-none -translate-x-1/2 -translate-y-1/2 z-9999 mix-blend-difference transition-[transform,width,height] duration-150 ease-out">
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="/js/index.js"></script>
</body>

</html>
