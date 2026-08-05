@extends('layouts.app')

@section('title', 'Manage Loans | Libook')

@section('banner-title')
    List of Borrowers
@endsection

@section('banner-subtitle', 'Manage all book loan requests.')

@section('content')
    <div class="py-6 sm:py-10 px-4 sm:px-6 flex flex-col gap-5">
        {{-- Stats --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 animate-fade-up delay-2">
            <div class="bg-white rounded-2xl border border-gray-100 p-3.5 sm:p-4 flex items-center gap-3 shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-500 shrink-0">
                    <i class="ri-book-open-line text-lg"></i>
                </div>
                <div class="min-w-0">
                    <div class="font-extrabold text-lg sm:text-xl text-gray-900 truncate"
                        style="font-family:'Sora',sans-serif">
                        {{ $totalAll }}
                    </div>
                    <div class="text-[11px] sm:text-xs text-gray-400">Total</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-3.5 sm:p-4 flex items-center gap-3 shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center text-yellow-500 shrink-0">
                    <i class="ri-time-line text-lg"></i>
                </div>
                <div class="min-w-0">
                    <div class="font-extrabold text-lg sm:text-xl text-gray-900 truncate"
                        style="font-family:'Sora',sans-serif">
                        {{ $totalPending }}
                    </div>
                    <div class="text-[11px] sm:text-xs text-gray-400">Pending</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-3.5 sm:p-4 flex items-center gap-3 shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-500 shrink-0">
                    <i class="ri-book-2-line text-lg"></i>
                </div>
                <div class="min-w-0">
                    <div class="font-extrabold text-lg sm:text-xl text-gray-900 truncate"
                        style="font-family:'Sora',sans-serif">
                        {{ $totalDipinjam }}
                    </div>
                    <div class="text-[11px] sm:text-xs text-gray-400">Dipinjam</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-3.5 sm:p-4 flex items-center gap-3 shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-500 shrink-0">
                    <i class="ri-checkbox-circle-line text-lg"></i>
                </div>
                <div class="min-w-0">
                    <div class="font-extrabold text-lg sm:text-xl text-gray-900 truncate"
                        style="font-family:'Sora',sans-serif">
                        {{ $totalDikembalikan }}
                    </div>
                    <div class="text-[11px] sm:text-xs text-gray-400">Dikembalikan</div>
                </div>
            </div>
        </div>

        {{-- ── Alert Session ── --}}
        @if (session('success'))
            <div
                class="flex items-center gap-2 px-4 py-3.5 bg-green-50 border border-green-100 text-green-700 rounded-2xl text-sm font-medium">
                <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm animate-fade-up delay-2">
            <div
                class="px-5 sm:px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="text-[15px] font-bold text-gray-900" style="font-family:'Sora',sans-serif">
                    Daftar Peminjaman
                </div>
                {{-- Search Form --}}
                <form method="GET" action="{{ route('admin.borrowings') }}" class="flex gap-2 w-full sm:w-auto">
                    <input type="text" name="code" value="{{ request('code') }}" placeholder="Cari kode peminjaman..."
                        class="px-4 py-2 text-sm rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-400 outline-none transition-all placeholder:text-gray-300 w-full sm:w-56">
                    <button type="submit"
                        class="px-4 py-2 rounded-xl bg-primary text-white text-sm font-semibold hover:bg-blue-600 transition-all shrink-0">
                        Cari
                    </button>
                </form>
            </div>

            <div class="block md:hidden divide-y divide-gray-100">
                @forelse ($borrowings as $borrowing)
                    <div class="p-4 flex flex-col gap-3 hover:bg-gray-50/50 transition-colors">
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-mono text-gray-400">#{{ $loop->iteration }}</span>
                                <code
                                    class="text-xs bg-gray-100 text-gray-700 px-2.5 py-0.5 rounded-md font-mono font-semibold">
                                    {{ $borrowing->code }}
                                </code>
                            </div>
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-yellow-50 text-yellow-600 border-yellow-200',
                                    'dipinjam' => 'bg-blue-50 text-blue-600 border-blue-200',
                                    'returned' => 'bg-green-50 text-green-600 border-green-200',
                                    'dikembalikan' => 'bg-green-50 text-green-600 border-green-200',
                                ];
                                $badgeClass =
                                    $statusClasses[strtolower($borrowing->status)] ??
                                    'bg-gray-50 text-gray-600 border-gray-200';
                            @endphp
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-semibold border {{ $badgeClass }} capitalize">
                                {{ $borrowing->status }}
                            </span>
                        </div>
                        <div class="flex flex-col gap-1.5 pt-1">
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">{{ $borrowing->name }}</h4>
                                <p class="text-xs text-gray-400 flex items-center gap-1">
                                    <i class="ri-whatsapp-line text-green-500"></i> {{ $borrowing->whatsapp }}
                                </p>
                            </div>

                            <div class="p-2.5 rounded-xl bg-gray-50/80 border border-gray-100 mt-1">
                                <p class="text-xs font-semibold text-gray-800 line-clamp-1">
                                    <i class="ri-book-2-line text-blue-500 mr-1"></i>{{ $borrowing->book->title ?? '-' }}
                                </p>
                                <p class="text-[11px] text-gray-400 mt-0.5">Durasi: {{ $borrowing->duration }} Hari</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-xs text-gray-500 pt-2 border-t border-gray-50">
                            <div class="flex flex-col text-[11px]">
                                <span>Pinjam:
                                    <b>{{ \Carbon\Carbon::parse($borrowing->borrow_date)->translatedFormat('d M Y') }}</b></span>
                                <span
                                    class="{{ $borrowing->status === 'dipinjam' && now()->gt($borrowing->return_date) ? 'font-bold text-red-500' : '' }}">
                                    Kembali:
                                    <b>{{ \Carbon\Carbon::parse($borrowing->return_date)->translatedFormat('d M Y') }}</b>
                                </span>
                            </div>

                            <button onclick="openModal({{ $borrowing->id }}, '{{ $borrowing->status }}')"
                                class="px-3 py-1.5 rounded-lg flex items-center justify-center gap-1 text-xs font-semibold text-gray-700 bg-gray-100 border border-gray-200 hover:bg-blue-50 hover:text-blue-600 transition-all">
                                <i class="ri-edit-line text-sm"></i> Status
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-gray-400">
                        <i class="ri-book-open-line text-3xl block mb-2 text-gray-300"></i>
                        Belum ada data peminjaman.
                    </div>
                @endforelse
            </div>

            <div class="hidden md:block overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th
                                class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3 w-10">
                                #
                            </th>
                            <th class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Kode
                            </th>
                            <th class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Peminjam
                            </th>
                            <th class="text-left text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Buku
                            </th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Tgl Pinjam
                            </th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Tgl Kembali
                            </th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Status
                            </th>
                            <th
                                class="text-center text-[11px] font-semibold tracking-wide uppercase text-gray-400 px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($borrowings as $borrowing)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-xs text-gray-400">{{ $loop->iteration }}</td>

                                <td class="px-6 py-4">
                                    <code
                                        class="text-xs bg-gray-100 text-gray-600 px-2.5 py-1 rounded-lg font-mono font-semibold">
                                        {{ $borrowing->code }}
                                    </code>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-800">{{ $borrowing->name }}</div>
                                    <div class="text-xs text-gray-400 mt-0.5">{{ $borrowing->whatsapp }}</div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-800 max-w-[180px] truncate"
                                        title="{{ $borrowing->book->title ?? '-' }}">
                                        {{ $borrowing->book->title ?? '-' }}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-0.5">{{ $borrowing->duration }} hari</div>
                                </td>

                                <td class="px-6 py-4 text-center text-xs text-gray-600">
                                    {{ \Carbon\Carbon::parse($borrowing->borrow_date)->translatedFormat('d M Y') }}
                                </td>

                                <td class="px-6 py-4 text-center text-xs">
                                    <span
                                        class="{{ $borrowing->status === 'dipinjam' && now()->gt($borrowing->return_date) ? 'font-bold text-red-500' : 'text-gray-600' }}">
                                        {{ \Carbon\Carbon::parse($borrowing->return_date)->translatedFormat('d M Y') }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-50 text-yellow-600 border-yellow-200',
                                            'dipinjam' => 'bg-blue-50 text-blue-600 border-blue-200',
                                            'returned' => 'bg-green-50 text-green-600 border-green-200',
                                            'dikembalikan' => 'bg-green-50 text-green-600 border-green-200',
                                        ];
                                        $badgeClass =
                                            $statusClasses[strtolower($borrowing->status)] ??
                                            'bg-gray-50 text-gray-600 border-gray-200';
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold border {{ $badgeClass }} capitalize">
                                        {{ $borrowing->status }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <button onclick="openModal({{ $borrowing->id }}, '{{ $borrowing->status }}')"
                                        class="w-8 h-8 rounded-lg inline-flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-green-50 hover:text-green-500 hover:border-green-200 transition-all"
                                        title="Update Status">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-sm text-gray-400">
                                    <i class="ri-book-open-line text-3xl block mb-2 text-gray-300"></i>
                                    Belum ada data peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal"
        class="hidden fixed inset-0 z-50 items-center justify-center p-4 bg-black/40 backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden animate-fade-up">
            <div class="px-6 pt-6 pb-4">
                <h3 class="text-base font-bold text-gray-900 mb-1">Update Status Peminjaman</h3>
                <p class="text-xs text-gray-500">Pilih status terbaru untuk transaksi ini.</p>
            </div>

            <form id="modalForm" method="POST" class="px-6 pb-6">
                @method('PUT')
                @csrf
                <select name="status" id="modalSelect"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-900 mb-5 outline-none focus:border-blue-400 focus:bg-white focus:ring-2 focus:ring-blue-100 transition-all">
                    <option value="pending">Pending</option>
                    <option value="dipinjam">Dipinjam</option>
                    <option value="dikembalikan">Dikembalikan</option>
                </select>

                <div class="flex gap-2">
                    <button type="button" onclick="closeModal()"
                        class="flex-1 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary hover:bg-blue-600 text-white text-sm font-semibold transition-all shadow-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id, status) {
            const modal = document.getElementById('modal');
            document.getElementById('modalForm').action = '/borrowing/' + id + '/status';
            document.getElementById('modalSelect').value = status;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
@endsection
