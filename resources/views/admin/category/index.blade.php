@extends('layouts.app')

@section('title', 'Manage Categories | Libook')

@section('banner-title')
    Manage Categories
@endsection

@section('banner-subtitle', 'Manage categories for books.')

@section('banner-actions')
    <div class="flex gap-2 flex-wrap w-full sm:w-auto">
        <button onclick="openAddModal()"
            class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-primary text-sm font-semibold text-white shadow-md hover:-translate-y-0.5 hover:shadow-lg transition-all">
            <i class="ri-add-line text-lg"></i>
            Tambah Kategori
        </button>
    </div>
@endsection

@section('content')
    <div class="px-4 sm:px-6 py-6 sm:py-10 flex flex-col gap-5">
        {{-- Alert Session --}}
        @if (session('success'))
            <div
                class="flex items-center px-4 py-3.5 bg-green-50 border border-green-100 text-green-700 rounded-2xl text-sm font-medium">
                <i class="ri-checkbox-circle-line text-lg mr-2 flex-shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm animate-fade-up delay-2">
            <div class="px-5 sm:px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div class="text-[15px] font-bold text-gray-900" style="font-family:'Sora',sans-serif">
                    Daftar Kategori
                </div>
            </div>

            <div class="block md:hidden divide-y divide-gray-100">
                @forelse ($categories as $item)
                    <div class="p-4 flex items-center justify-between gap-3 hover:bg-gray-50/50 transition-colors">
                        <div class="flex flex-col gap-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-mono text-gray-400">#{{ $loop->iteration }}</span>
                                <h4 class="text-sm font-bold text-gray-900 leading-snug truncate">{{ $item->name }}</h4>
                            </div>
                            <div>
                                <code class="text-[11px] bg-gray-100 text-gray-500 px-2 py-0.5 rounded-md font-mono">
                                    {{ $item->slug }}
                                </code>
                            </div>
                        </div>

                        <div class="flex items-center gap-1.5 shrink-0">
                            <button onclick="openEditModal({{ $item->id }}, '{{ $item->name }}')"
                                class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-500 bg-gray-50 border border-gray-200 hover:bg-yellow-50 hover:text-yellow-600 transition-all">
                                <i class="ri-file-edit-line"></i>
                            </button>
                            <button onclick="openDeleteModal({{ $item->id }})"
                                class="w-8 h-8 rounded-lg flex items-center justify-center text-red-500 bg-red-50 border border-red-100 hover:bg-red-100 transition-all">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-gray-400">
                        <i class="ri-price-tag-3-line text-3xl block mb-2 text-gray-300"></i>
                        Belum ada data kategori.
                    </div>
                @endforelse
            </div>
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full border-collapse" id="categoryTable">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th
                                class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3 w-10">
                                #</th>
                            <th class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Nama Kategori</th>
                            <th class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Slug</th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse ($categories as $item)
                            <tr
                                class="border-b border-gray-50 hover:bg-gray-50 transition-colors duration-150 category-row">
                                <td class="px-6 py-4 text-xs text-gray-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-800">{{ $item->name }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <code
                                        class="text-xs bg-gray-100 text-gray-500 px-2.5 py-1 rounded-lg font-mono">{{ $item->slug }}</code>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- edit --}}
                                        <button onclick="openEditModal({{ $item->id }}, '{{ $item->name }}')"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-yellow-50 hover:text-yellow-500 hover:border-yellow-200 transition-all"
                                            title="Edit">
                                            <i class="ri-file-edit-line"></i>
                                        </button>
                                        {{-- delete --}}
                                        <button onclick="openDeleteModal({{ $item->id }})"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition-all"
                                            title="Hapus">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-sm text-gray-400">
                                    <i class="ri-price-tag-3-line text-2xl block mb-2 text-gray-300"></i>
                                    Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Empty search state --}}
            <div id="emptySearch" class="hidden px-6 py-12 text-center">
                <div class="flex flex-col items-center text-gray-400">
                    <p class="text-sm font-medium">Kategori tidak ditemukan</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div id="addModal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden animate-fade-up">
            <div class="flex items-center justify-between px-6 py-4 bg-primary/10 border-b border-blue-50">
                <h3 class="text-sm font-bold text-gray-900">Tambah Kategori</h3>
                <button onclick="closeModal('addModal')"
                    class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-gray-100 cursor-pointer hover:text-gray-600 transition-all">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>

            {{-- Form --}}
            <form action="{{ route('categories.store') }}" method="POST" class="px-6 py-5 flex flex-col gap-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Kategori</label>
                    <input id="addName" name="name" type="text" placeholder="Contoh: Pemrograman"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-900 placeholder-gray-400 outline-none focus:border-blue-400 focus:bg-white focus:ring-2 focus:ring-blue-100 transition-all">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="closeModal('addModal')"
                        class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-all">Batal</button>
                    <button type="submit"
                        class="flex-1 px-4 py-2.5 rounded-xl bg-primary hover:opacity-90 cursor-pointer text-white text-sm font-semibold transition-all flex items-center justify-center gap-1.5">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="editModal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden animate-fade-up">
            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-4 bg-yellow-50 border-b border-yellow-100">
                <h3 class="text-sm font-bold text-gray-900">Ubah Nama Kategori</h3>
                <button onclick="closeModal('editModal')"
                    class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-yellow-100/50 cursor-pointer hover:text-gray-600 transition-all">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>

            {{-- Form --}}
            <form id="editForm" method="POST" class="px-6 py-5 flex flex-col gap-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Kategori</label>
                    <input type="text" id="editName" name="name"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-900 outline-none focus:border-yellow-400 focus:bg-white focus:ring-2 focus:ring-yellow-100 transition-all">
                </div>
                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="closeModal('editModal')"
                        class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-2.5 rounded-xl bg-primary hover:opacity-90 cursor-pointer text-white text-sm font-semibold transition-all flex items-center justify-center gap-1.5">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Hapus --}}
    <div id="deleteModal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden animate-fade-up">
            <div class="px-6 pt-6 pb-4 text-center">
                <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-3">
                    <i class="ri-delete-bin-line text-2xl"></i>
                </div>
                <h3 class="text-base font-bold text-gray-900 mb-1">Hapus Kategori?</h3>
                <p class="text-xs text-gray-500">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="px-6 pb-6 flex gap-2">
                <button type="button" onclick="closeModal('deleteModal')"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-all">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-red-500 hover:bg-red-600 transition-all flex items-center justify-center gap-1.5 shadow-sm">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            const m = document.getElementById(id);
            m.classList.remove('hidden');
            m.classList.add('flex');
        }

        function closeModal(id) {
            const m = document.getElementById(id);
            m.classList.add('hidden');
            m.classList.remove('flex');
        }

        function openAddModal() {
            openModal('addModal');
            setTimeout(() => {
                const input = document.getElementById('addName');
                if (input) input.focus();
            }, 100);
        }

        function openEditModal(id, name) {
            openModal('editModal');
            document.getElementById('editName').value = name;
            document.getElementById('editForm').action = `/categories/update/${id}`;
        }

        function openDeleteModal(id) {
            openModal('deleteModal');
            document.getElementById('deleteForm').action = `/categories/destroy/${id}`;
        }
    </script>

    @if ($errors->has('name'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                openModal('addModal');
            });
        </script>
    @endif
@endsection
