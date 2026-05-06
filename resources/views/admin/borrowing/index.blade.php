@extends('base')
@section('title', 'Daftar Peminjaman')


@section('content')
    <div class="p-6 max-w-7xl mx-auto flex flex-col gap-5">


        {{-- ── Heading ── --}}
        <div class="flex items-center justify-between flex-wrap gap-3 animate-fade-up">
            <div>
                <h1 class="text-[22px] font-extrabold text-gray-900 leading-tight" style="font-family:'Sora',sans-serif">
                    Daftar Peminjaman
                </h1>
                <p class="text-sm text-gray-400 mt-0.5">Kelola semua pengajuan peminjaman buku</p>
            </div>


        </div>


        {{-- ── Stats ── --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 animate-fade-up delay-2">


            <div class="bg-white rounded-2xl border border-gray-100 p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-500">
                    <i class="ri-book-open-line text-lg"></i>
                </div>
                <div>
                    <div class="font-extrabold text-xl text-gray-900" style="font-family:'Sora',sans-serif">
                        <div>{{ $totalAll }}</div>
                    </div>
                    <div class="text-xs text-gray-400">Total</div>
                </div>
            </div>


            <div class="bg-white rounded-2xl border border-gray-100 p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center text-yellow-500">
                    <i class="ri-time-line text-lg"></i>
                </div>
                <div>
                    <div class="font-extrabold text-xl text-gray-900" style="font-family:'Sora',sans-serif">
                        <div>{{ $totalPending }}</div>
                    </div>
                    <div class="text-xs text-gray-400">Pending</div>
                </div>
            </div>


            <div class="bg-white rounded-2xl border border-gray-100 p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-500">
                    <i class="ri-book-2-line text-lg"></i>
                </div>
                <div>
                    <div class="font-extrabold text-xl text-gray-900" style="font-family:'Sora',sans-serif">
                        <div>{{ $totalDipinjam }}</div>
                    </div>
                    <div class="text-xs text-gray-400">Dipinjam</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-500">
                    <i class="ri-checkbox-circle-line text-lg"></i>
                </div>
                <div>
                    <div class="font-extrabold text-xl text-gray-900" style="font-family:'Sora',sans-serif">
                        <div>{{ $totalDikembalikan }}</div>
                    </div>
                    <div class="text-xs text-gray-400">Dikembalikan</div>
                </div>
            </div>
        </div>


        {{-- ── Alert ── --}}
        @if (session('success'))
            <div
                class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-50 border border-green-100 text-green-700 text-sm font-medium">
                <i class="ri-checkbox-circle-line"></i> {{ session('success') }}
            </div>
        @endif


        {{-- ── Table card ── --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden animate-fade-up delay-2">


            {{-- Table header --}}
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between gap-3 flex-wrap">
                <div class="text-[15px] font-bold text-gray-900" style="font-family:'Sora',sans-serif">
                    Daftar Peminjaman
                </div>
                {{-- Search by kode --}}
                <form method="GET" action="{{ route('admin.borrowings') }}" class="flex gap-2">
                    <input type="text" name="code" value="{{ request('code') }}" placeholder="Cari kode peminjaman..."
                        class="px-4 py-2 text-sm rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-400 outline-none transition-all placeholder:text-gray-300 w-56">
                    <button type="submit"
                        class="px-4 py-2 rounded-xl bg-blue-500 text-white text-sm font-semibold hover:bg-blue-600 transition-all">
                        Cari
                    </button>
                </form>
            </div>


            {{-- Table --}}
            <div class="overflow-x-auto">
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


                    @forelse ($borrowings as $borrowing)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 text-xs text-gray-400">{{ $loop->iteration }}</td>


                            <td class="px-6 py-4">
                                <code
                                    class="text-xs bg-gray-100 text-gray-500 px-2.5 py-1 rounded-lg font-mono">{{ $borrowing->code }}</code>
                            </td>


                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-800">{{ $borrowing->name }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ $borrowing->whatsapp }}</div>
                            </td>


                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-800 max-w-[180px] truncate">
                                    {{ $borrowing->book->title ?? '-' }}</div>
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
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold">
                                    {{ $borrowing->status }}
                                </span>
                            </td>


                            <td class="px-6 py-4 text-center">
                                <button onclick="openModal({{ $borrowing->id }}, '{{ $borrowing->status }}')"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 bg-gray-50 border border-gray-200 hover:bg-green-50 hover:text-green-500 transition-all">
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
                </table>
            </div>
        </div>
    </div>






    {{-- MODAL EDIT STATUS --}}
    <div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40">
        <div class="bg-white rounded-2xl p-6 w-full max-w-sm">
            <h2 class="font-bold text-gray-900 mb-4">Update Status</h2>


            <form id="modalForm" method="POST">
                @method('PUT')
                @csrf
                <select name="status" id="modalSelect"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm mb-4 outline-none">
                    <option value="pending">Pending</option>
                    <option value="borrowed">Dipinjam</option>
                    <option value="returned">Dikembalikan</option>
                </select>


                <div class="flex gap-2">
                    <button type="submit" class="flex-1 py-2.5 rounded-xl bg-blue-500 text-white text-sm font-semibold">
                        Simpan
                    </button>
                    <button type="button" onclick="document.getElementById('modal').classList.add('hidden')"
                        class="flex-1 py-2.5 rounded-xl bg-gray-100 text-gray-600 text-sm font-semibold">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>




    <script>
        function openModal(id, status) {
            document.getElementById('modalForm').action = '/borrowing/' + id + '/status';
            document.getElementById('modalSelect').value = status;
            document.getElementById('modal').classList.remove('hidden');
        }
    </script>
@endsection
