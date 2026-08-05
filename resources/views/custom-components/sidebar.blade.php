<div class="md:hidden fixed top-4 left-4 z-40">
    <button id="toggleSidebar" type="button" class="p-2.5 rounded-xl text-primary">
        <i class="ri-menu-line text-2xl"></i>
    </button>
</div>

<div id="sidebarOverlay"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden transition-opacity duration-300 md:hidden"></div>
<aside id="sideBar"
    class="fixed inset-y-0 left-0 z-50 -translate-x-full md:translate-x-0 md:static w-64 bg-white rounded-r-4xl md:rounded-4xl flex flex-col justify-between p-6 text-primary shrink-0 transition-transform duration-300 ease-in-out shadow-2xl md:shadow-none">
    <div>
        <div class="flex items-center justify-between md:justify-center px-3 py-4 mb-8">
            <div class="flex items-center gap-2">
                <img src="{{ asset('assets/logo-libooks.png') }}" alt="Libooks logo" class="h-10 p-1 rounded-lg">
                <span class="font-bold text-xl uppercase tracking-wide">Libooks</span>
            </div>
            <button id="closeSidebar" class="md:hidden text-gray-400 hover:text-gray-600 focus:outline-none">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('dashboard')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-primary/20 hover:text-primary' }}">
                <i class="ri-dashboard-line"></i>Dashboard
            </a>

            <a href="{{ route('admin.book.index') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('admin.book.*')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-primary/20 hover:text-primary' }}">
                <i class="ri-menu-search-line"></i>Manage Books
            </a>

            <a href="{{ route('categories') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('categories')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-primary/20 hover:text-primary' }}">
                <i class="ri-list-check"></i>Categories
            </a>

            <a href="{{ route('admin.borrowings') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('admin.borrowings')
                    ? 'bg-primary text-white shadow-sm'
                    : 'text-gray-500 hover:bg-primary/20 hover:text-primary' }}">
                <i class="ri-user-line"></i>Loans
            </a>
        </nav>
    </div>

    <div class="relative border-t border-gray-100 px-4 py-5 rounded-lg overflow-hidden bg-primary"
        style="min-height: 180px;">
        <div class="relative z-10 flex flex-col gap-3">
            <div
                class="w-8 h-8 rounded-full bg-white/20 border border-white/40 flex items-center justify-center text-white text-xs font-semibold">
                A
            </div>
            <div>
                <p class="text-white font-extrabold text-base leading-tight">
                    Admin
                </p>
                <p class="text-white/60 text-xs mt-0.5">
                    Libooks Admin
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

{{-- Mobile Script --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('toggleSidebar');
        const closeBtn = document.getElementById('closeSidebar');
        const sideBar = document.getElementById('sideBar');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sideBar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sideBar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);
    });
</script>
