{{-- Sidebar
<aside id="sidebar"
    class="w-64 h-screen fixed top-0 left-0 bg-white border-r border-gray-100 flex flex-col z-40 transition-transform duration-300 ease-in-out -translate-x-full md:translate-x-0">
    <!-- Logo -->
    <div class="flex items-center gap-2.5 px-5 py-6 border-b border-gray-100">
        <div class="w-9.5 h-9.5 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md"
            style="background:linear-gradient(135deg,#4285F4,#0F9D58)">
            <i class="ri-book-ai-line text-white text-2xl"></i>
        </div>
        <div>
            <div class="font-display font-bold text-sm text-gray-900 leading-tight" style="font-family:'Sora',sans-serif">
                E-Library</div>
            <div class="text-[11px] text-gray-400 font-medium">Admin Panel</div>
        </div>
    </div>


    <!-- Nav -->
    <div class="flex-1 overflow-y-auto">
        <div class="px-3 pt-4 pb-2">
            <p class="text-[10px] font-semibold tracking-widest uppercase text-gray-400 px-2 mb-1">Menu Utama</p>

            <a href=""
                class="sidebar-active relative flex items-center gap-2.5 px-3 py-2.5 rounded-xl mb-0.5 text-sm font-semibold text-blue-500 cursor-pointer"
                style="background:linear-gradient(135deg,#EFF6FF,#F0FDF4)">
                <i class="ri-home-2-line"></i>Dashboard
            </a>

            <a href="{{ route('admin.book.index') }}"
                class="relative flex items-center gap-2.5 px-3 py-2.5 rounded-xl mb-0.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 cursor-pointer transition-all">
                <i class="ri-book-open-line"></i>Kelola Buku
            </a>

            <a href="{{ route('categories') }}"
                class="relative flex items-center gap-2.5 px-3 py-2.5 rounded-xl mb-0.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 cursor-pointer transition-all">
                <i class="ri-price-tag-3-line"></i>Kategori
            </a>

            <a href="{{ route('admin.borrowings') }}"
                class="relative flex items-center gap-2.5 px-3 py-2.5 rounded-xl mb-0.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 cursor-pointer transition-all">
                <i class="ri-todo-line"></i>Peminjaman
            </a>
        </div>
    </div>


    <!-- User footer -->
    <div class="p-3 border-t border-gray-100">
        <div
            class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-gray-50 hover:bg-blue-50 cursor-pointer transition-all">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white font-bold text-sm flex-shrink-0"
                style="background:linear-gradient(135deg,#DB4437,#F4B400);font-family:'Sora',sans-serif">W</div>
            <div class="flex-1 min-w-0">
                <div class="text-sm font-semibold text-gray-800 truncate">Eula</div>
                <div class="text-[11px] text-gray-400 truncate">eulawrence@gmail.com</div>
            </div>

            {{-- logout --}}
{{-- <form method="POST" action="{{ route('logout') }}">
    @csrf
    <a :href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();"
        class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-500 transition-all">
        <i class="ri-logout-box-r-line text-2xl"></i>
    </a>
</form>
</div>
</div>
</aside> --}}

<aside id="sideBar" class="hidden w-64 bg-white rounded-4xl md:flex flex-col justify-between p-6 text-primary shrink-0">
    <div>
        <div class="flex items-center justify-center gap-2 px-3 py-4 mb-8">
            {{-- <img src="{{ asset('assets/vellum-logo.png') }}" alt="Vellum logo" class="h-10 bg-primary p-1 rounded-lg"> --}}
            <span class="font-bold text-xl uppercase tracking-wide">Libooks.</span>
        </div>

        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('dashboard')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-[#F5F6FA] hover:text-[#7B5DFE]' }}">
                <i class="ri-dashboard-line"></i>Dashboard
            </a>

            <a href="{{ route('admin.book.index') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('admin.book.*')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-[#F5F6FA] hover:text-[#7B5DFE]' }}">
                <i class="ri-menu-search-line"></i>Manage Books
            </a>

            <a href="{{ route('categories') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('categories')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-[#F5F6FA] hover:text-[#7B5DFE]' }}">
                <i class="ri-pushpin-line"></i>Categories
            </a>

            <a href="{{ route('admin.borrowings') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('admin.borrowings')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-[#F5F6FA] hover:text-[#7B5DFE]' }}">
                <i class="ri-pushpin-line"></i>Loans
            </a>
        </nav>
    </div>

    <div class="relative border-t border-gray-100 px-4 py-5 rounded-lg overflow-hidden bg-primary"
        style="min-height: 180px;">
        {{-- <img src="{{ asset('assets/sign-in-bg.png') }}" alt="Login Background"
            class="absolute inset-0 w-full h-full object-cover"> --}}
        <div class="relative z-10 flex flex-col gap-3">
            <div
                class="w-8 h-8 rounded-full bg-white/20 border border-white/40 flex items-center justify-center text-white text-xs font-semibold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <p class="text-white font-extrabold text-base leading-tight">
                    {{ Str::before(auth()->user()->name, ' ') }}
                </p>
                <p class="text-white/60 text-xs mt-0.5">
                    @if (Str::contains(auth()->user()->name, ' '))
                        {{ Str::afterLast(auth()->user()->name, ' ') }}
                    @else
                        No Last Name
                    @endif
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full py-2.5 mt-1 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 hover:bg-white/30 text-white text-sm font-semibold transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>Logout
                </button>
            </form>
        </div>
    </div>
</aside>
