<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/landing.css', 'resources/js/frontend.js'])
    <link rel="shortcut icon" href="{{ asset('/assets/vellum-logo.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="h-screen p-5 font-[Poppins] min-h-screen flex items-center justify-center overflow-y-auto">
    <div
        class="group w-1/2 hover:w-[55%] transition-all duration-500 h-full relative rounded-[30px] overflow-hidden animate-left hidden lg:block">
        <div class="absolute inset-0">
            <img src="{{ asset('/assets/sign-in-bg.png') }}" alt="Login Background" class="h-full w-full">
        </div>
        <div class="relative h-full flex flex-col justify-between p-6 text-white">
            <div class="text-6xl font-light">
                <img src="{{ asset('/assets/vellum-logo.svg') }}" alt="Vellum Logo" class="h-20 object-contain">
            </div>
            <div>
                <h1 class="text-4xl font-black leading-tight mb-2">Welcome back!</h1>
                <p class="text-lg tracking-tight font-light">Create an account to get started <br> and explore more,</p>
            </div>

        </div>
    </div>

    <div
        class="w-full lg:w-1/2 lg:hover:w-[55%] transition-all duration-500 flex items-center justify-center px-6 lg:px-16 animate-right">

        <div class="w-full max-w-lg">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-[#333] mb-3">Glad to see you again!</h2>
                <p class="text-gray-400 text-lg">Create an account to get started
                    and explore more.</p>
            </div>

            <form class="w-full max-w-lg" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="email@gmail.com" required
                        class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-primary focus:bg-white">
                </div>
                <div class="mb-5">
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-600 text-gray-700">Password</label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                            <i class="ri-lock-2-line text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Input password" required
                            autocomplete="current-password"
                            class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-primary focus:bg-white">
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-3.5 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}">
                    <button type="submit" class="bg-primary text-white px-4 py-3 rounded-lg w-full">
                        Login
                    </button>
                </a>

                <p class="text-gray-400 text-center mt-4">Don't have an account? <a href="{{ route('register') }}"
                        class="text-primary font-medium">Register</a></p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>

</html>
