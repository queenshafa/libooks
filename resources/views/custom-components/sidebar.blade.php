{{-- Sidebar --}}
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
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a :href="route('logout')"
                    onclick="event.preventDefault();
                        this.closest('form').submit();"
                    class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-500 transition-all">
                    <i class="ri-logout-box-r-line text-2xl"></i>
                </a>
            </form>
        </div>
    </div>
</aside>
