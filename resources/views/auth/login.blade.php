<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login — E-Library</title>
   {{-- CSS & JS --}}
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <!-- {{-- Google Fonts: Sora (display) + DM Sans (body) --}} -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden bg-slate-50">

   <!-- {{-- Animated background blobs --}} -->
   <div class="blob blob-1"></div>
   <div class="blob blob-2"></div>
   <div class="blob blob-3"></div>

   <!-- {{-- Background grid pattern --}} -->
   <div class="absolute inset-0 opacity-[0.03]"
        style="background-image: linear-gradient(#000 1px, transparent 1px), linear-gradient(90deg, #000 1px, transparent 1px); background-size: 40px 40px;">
   </div>

   <!-- {{-- Main card --}} -->
   <div class="card-enter relative w-full max-w-md z-10">
       <!-- {{-- Glassmorphism card --}} -->
       <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl shadow-blue-200/40 border border-white/60 overflow-hidden">
           <!-- {{-- Top gradient bar --}} -->
           <div class="h-1.5 bg-animated"></div>
           <div class="p-8">
               <!-- {{-- Logo & Header --}} -->
               <div class="text-center mb-8">
                   <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-green-500 mb-4 shadow-lg shadow-blue-300/40 logo-icon">
                       <i class="ri-book-shelf-line text-white text-3xl"></i>
                   </div>
                   <h1 class="font-display text-2xl font-800 text-gray-900 leading-tight">
                       Selamat datang! 👋
                   </h1>
                   <p class="text-gray-500 text-sm mt-1">Masuk ke akun E-Library kamu</p>
               </div>

               <!-- {{-- Login Form --}} -->
               <form action="{{ route('login') }}" method="POST" class="space-y-4">
                   <!-- @csrf -->
                   <!-- {{-- Email --}} -->
                   <div>
                       <label for="email" class="block text-sm font-600 text-gray-700 mb-1.5">
                           Email
                       </label>
                       <div class="relative">
                           <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                               <i class="ri-mail-line text-gray-400"></i>
                           </div>
                           <input type="email" id="email" name="email" value="" placeholder="nama@sekolah.sch.id" required autocomplete="email" class="input-field w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-blue-400 focus:bg-white">
                       </div>
                   </div>

                   <!-- {{-- Password --}} -->
                   <div>
                       <div class="flex items-center justify-between mb-1.5">
                           <label for="password" class="block text-sm font-600 text-gray-700">
                               Password
                           </label>
                           <a href="#" class="text-xs text-blue-500 hover:text-blue-700 font-500 transition-colors">
                               Lupa password?
                           </a>
                       </div>
                       <div class="relative">
                           <div class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                               <i class="ri-lock-2-line text-gray-400"></i>
                           </div>
                           <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="current-password" class="input-field w-full pl-10 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 text-sm placeholder-gray-400 transition-all duration-200 hover:border-blue-300 focus:border-blue-400 focus:bg-white">
                           <!-- {{-- Toggle password visibility --}} -->
                           <button type="button" onclick="togglePassword('password', this)"
                               class="absolute inset-y-0 right-3.5 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                               <svg id="eye-password" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                               </svg>
                           </button>
                       </div>
                   </div>

                   <!-- {{-- Remember Me --}} -->
                   <div class="flex items-center gap-2">
                       <input type="checkbox" id="remember" name="remember"
                           class="w-4 h-4 rounded border-gray-300 text-blue-500 focus:ring-blue-400 focus:ring-offset-0 cursor-pointer">
                       <label for="remember" class="text-sm text-gray-600 cursor-pointer select-none">
                           Ingat saya
                       </label>
                   </div>

                   <!-- {{-- Submit Button --}} -->
                   <button type="submit"
                       class="bg-green-300 w-full py-3.5 rounded-xl text-white font-display font-700 text-sm tracking-wide shadow-lg shadow-blue-300/40 mt-2">
                       <span>Masuk Sekarang →</span>
                   </button>
               </form>

               <!-- {{-- Divider --}} -->
               <div class="divider my-5">
                   <span class="text-xs text-gray-400 font-500">atau</span>
               </div>

               <!-- {{-- Register Link --}} -->
               <p class="text-center text-sm text-gray-500">
                   Belum punya akun?
                   <a href="{{ route('register') }}"
                       class="font-display font-700 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-green-500 hover:opacity-80 transition-opacity ml-1">
                       Daftar gratis
                   </a>
               </p>
           </div>
       </div>

       <!-- {{-- Floating card decoration --}} -->
       <div class="absolute -top-3 -right-3 w-6 h-6 rounded-full bg-yellow-400 shadow-lg"></div>
       <div class="absolute -bottom-2 -left-2 w-4 h-4 rounded-full bg-blue-400 shadow-lg"></div>
       <div class="absolute top-1/2 -right-4 w-3 h-3 rounded-full bg-green-400 shadow-lg"></div>
   </div>

   <script>
       function togglePassword(fieldId, btn) {
           const field = document.getElementById(fieldId);
           const isPassword = field.type === 'password';
           field.type = isPassword ? 'text' : 'password';
           const icon = btn.querySelector('svg');
           icon.innerHTML = isPassword
               ? `<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
               : `<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
       }
   </script>
</body>
</html>

