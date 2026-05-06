<div class="sticky top-0 z-30 px-7 py-3.5 flex items-center gap-4 border-b border-gray-200/80"
    style="background:rgba(240,242,248,0.85);backdrop-filter:blur(16px)">
    <!-- Hamburger (mobile) -->
    <button onclick="toggleSidebar()" id="hamburger"
        class="md:hidden w-9 h-9 flex items-center justify-center rounded-xl border border-transparent hover:bg-white hover:border-gray-200 text-gray-500 transition-all">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>


    <!-- Search -->
    <div
        class="flex-1 max-w-sm flex items-center gap-2 bg-white border border-gray-200 rounded-xl px-3.5 py-2 focus-within:border-blue-400 focus-within:ring-3 focus-within:ring-blue-100 transition-all">
        <i class="ri-search-line text-gray-400"></i>
        <input type="text" placeholder="Cari buku, anggota, peminjaman..."
            class="border-none outline-none bg-transparent text-sm text-gray-700 w-full placeholder-gray-400"
            style="font-family:'DM Sans',sans-serif">
        <span
            class="text-[11px] text-gray-300 border border-gray-200 rounded px-1.5 py-0.5 font-mono flex-shrink-0">⌘K</span>
    </div>

    <div class="flex items-center gap-2 ml-auto">
        {{-- notif --}}
        <button
            class="relative w-9 h-9 flex items-center justify-center rounded-xl border border-transparent hover:bg-white hover:border-gray-200 text-gray-500 transition-all">
            <i class="ri-notification-2-line"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>


        <!-- Date -->
        <div
            class="hidden sm:flex items-center gap-2 bg-white border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-500 font-medium">
            <i class="ri-calendar-line"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('j F Y') }}
        </div>
    </div>
</div>
