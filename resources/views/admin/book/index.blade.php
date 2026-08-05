@extends('layouts.app')

@section('title', 'Manage Books | Libooks')

@section('banner-title')
    Manage Books
@endsection

@section('banner-subtitle', 'Manage books available or add new one.')

@section('banner-actions')
    <div class="flex gap-2 flex-wrap w-full sm:w-auto">
        <a href="{{ route('admin.book.create') }}" class="w-full sm:w-auto">
            <button
                class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-primary text-sm font-semibold text-white shadow-md hover:-translate-y-0.5 hover:shadow-lg transition-all">
                <i class="ri-add-line text-lg"></i>Add Book
            </button>
        </a>
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

        {{-- Container Utama --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm animate-fade-up delay-2">
            <div class="px-5 sm:px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div class="text-[15px] font-bold text-gray-900" style="font-family:'Sora',sans-serif">
                    Daftar Buku
                </div>
            </div>

            {{-- 1. Tampilan MOBILE (Card View - Tampil di bawah md) --}}
            <div class="block md:hidden divide-y divide-gray-100">
                @forelse ($books as $item)
                    <div class="p-4 flex flex-col gap-3 hover:bg-gray-50/50 transition-colors">
                        <div class="flex items-start justify-between gap-2">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-mono text-gray-400">#{{ $loop->iteration }}</span>
                                <h4 class="text-sm font-bold text-gray-900 leading-snug">{{ $item->title }}</h4>
                            </div>
                            <code class="text-[11px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-md font-mono shrink-0">
                                {{ $item->category->name }}
                            </code>
                        </div>

                        <div class="flex items-center justify-between text-xs text-gray-500 pt-1">
                            <div class="flex items-center gap-1">
                                <i class="ri-user-3-line text-gray-400"></i>
                                <span>{{ $item->author }}</span>
                            </div>
                            <div
                                class="flex items-center gap-1 bg-blue-50 text-blue-600 px-2 py-0.5 rounded-lg font-semibold">
                                <span>Stok: {{ $item->stock }}</span>
                            </div>
                        </div>

                        {{-- Aksis Mobile --}}
                        <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-50">
                            <a href="{{ route('admin.book.detail', $item->id) }}"
                                class="flex-1 py-1.5 rounded-lg flex items-center justify-center gap-1 text-xs font-medium text-gray-600 bg-gray-50 border border-gray-200 hover:bg-blue-50 hover:text-blue-600 transition-all">
                                <i class="ri-eye-line text-sm"></i> Detail
                            </a>
                            <a href="{{ route('admin.book.edit', $item->id) }}"
                                class="flex-1 py-1.5 rounded-lg flex items-center justify-center gap-1 text-xs font-medium text-gray-600 bg-gray-50 border border-gray-200 hover:bg-yellow-50 hover:text-yellow-600 transition-all">
                                <i class="ri-file-edit-line text-sm"></i> Edit
                            </a>
                            <button onclick="openDeleteModal({{ $item->id }})"
                                class="px-3 py-1.5 rounded-lg flex items-center justify-center text-xs font-medium text-red-500 bg-red-50 border border-red-100 hover:bg-red-100 transition-all">
                                <i class="ri-delete-bin-line text-sm"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-gray-400">
                        <i class="ri-book-open-line text-3xl block mb-2 text-gray-300"></i>
                        Belum ada data buku.
                    </div>
                @endforelse
            </div>

            {{-- 2. Tampilan DESKTOP (Table View - Tampil di md ke atas) --}}
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full border-collapse" id="categoryTable">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th
                                class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3 w-10">
                                #</th>
                            <th class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Judul</th>
                            <th class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Kategori</th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Penulis</th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Stok</th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        @forelse ($books as $item)
                            <tr
                                class="border-b border-gray-50 hover:bg-gray-50 transition-colors duration-150 category-row">
                                <td class="px-6 py-4 text-xs text-gray-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-800">{{ $item->title }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <code class="text-xs bg-gray-100 text-gray-500 px-2.5 py-1 rounded-lg font-mono">
                                        {{ $item->category->name }}
                                    </code>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-sm font-semibold text-gray-800">{{ $item->author }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-center font-semibold text-gray-800">{{ $item->stock }}</p>
                                </td>
                                {{-- Aksi Desktop --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.book.detail', $item->id) }}"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-blue-50 hover:text-blue-500 hover:border-blue-200 transition-all"
                                            title="Detail">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <a href="{{ route('admin.book.edit', $item->id) }}"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-yellow-50 hover:text-yellow-500 hover:border-yellow-200 transition-all"
                                            title="Edit">
                                            <i class="ri-file-edit-line"></i>
                                        </a>
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
                                <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-400">
                                    <i class="ri-book-open-line text-2xl block mb-2 text-gray-300"></i>
                                    Belum ada data buku.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ════ MODAL HAPUS ════ --}}
    <div id="deleteModal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden animate-fade-up">
            <div class="px-6 pt-6 pb-4 text-center">
                <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-3">
                    <i class="ri-delete-bin-line text-2xl"></i>
                </div>
                <h3 class="text-base font-bold text-gray-900 mb-1">Hapus Buku Ini?</h3>
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
        /* ─── Modal helpers ─── */
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

        /* ─── Delete modal ─── */
        function openDeleteModal(id) {
            openModal('deleteModal');
            document.getElementById('deleteForm').action = `/book/destroy/${id}`;
        }
    </script>
@endsection
