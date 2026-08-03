@extends('layouts.app')

@section('title', 'Manage Books | Libooks')

@section('banner-title')
    Manage Books
@endsection

@section('banner-subtitle', 'Manage books available or add new one.')

@section('banner-actions')
    <div class="flex gap-2 flex-wrap">
        <a href="{{ route('admin.book.create') }}">
            <button
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-primary text-sm font-semibold text-white shadow-md hover:-translate-y-0.5 hover:shadow-lg transition-all">
                <i class="ri-add-line"></i>Tambah Buku
            </button>
        </a>
    </div>
@endsection

@section('content')
    <div class="px-6 py-10 flex flex-col gap-5">

        {{-- Alert Session --}}
        @if (session('success'))
            <div
                class="flex items-center px-4 py-4 bg-green-50 border-green-100 text-green-700 rounded-2xl text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- ── Table ── --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden animate-fade-up delay-2">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div class="text-[15px] font-bold text-gray-900" style="font-family:'Sora',sans-serif">
                    Daftar Buku
                </div>
            </div>

            <div class="overflow-x-auto">
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
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-semibold text-gray-800">{{ $item->title }}</span>
                                    </div>
                                </td>
                                <td class="px-6
                                        py-4">
                                    <code class="text-xs bg-gray-100 text-gray-500 px-2.5 py-1 rounded-lg font-mono">
                                        {{ $item->category->name }}
                                    </code>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-800">{{ $item->author }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-800">{{ $item->stock }}</span>
                                </td>
                                {{-- Aksi --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.book.detail', $item->id) }}"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-blue-50 hover:text-blue-500 hover:border-blue-200 transition-all">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <a href="{{ route('admin.book.edit', $item->id) }}"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-yellow-50 hover:text-yellow-500 hover:border-yellow-200 transition-all">
                                            <i class="ri-file-edit-line"></i>
                                        </a>
                                        <button onclick="openDeleteModal({{ $item->id }})"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition-all">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <p>Tidak ada data buku</p>
                        @endforelse
                        {{-- @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-400">
                                    <i class="ri-book-open-line text-2xl block mb-2"></i>
                                    Belum ada buku yang ditambahkan.
                                </td>
                            </tr>
                            @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- ════ MODAL HAPUS ════ --}}
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden">
            <div class="px-6 pt-6 pb-5">
                <h3 class="text-base font-bold text-gray-900 text-center mb-1">Hapus Kategori?</h3>
            </div>
            <div class="px-6 pb-6 flex gap-2">
                <button onclick="closeModal('deleteModal')"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-all">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-red-500 hover:bg-red-600 transition-all flex items-center justify-center gap-1.5">
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
