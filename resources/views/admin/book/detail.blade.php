@extends('base')

@section('content')
    <div class="p-6 max-w-6xl mx-auto flex flex-col gap-5">


        <!-- Back + action row -->
        <div class="flex items-center justify-between flex-wrap gap-3 animate-fade-up">
            <a href="{{ route('admin.book.index') }}"
                class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-blue-500 font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Buku
            </a>
        </div>


        <!-- Main grid: hero card + sidebar info -->
        <div class="grid grid-cols-1 gap-5">
            <!-- ── LEFT: Cover hero + Info ── -->
            <div class="lg:col-span-2 flex flex-col gap-5">
                <!-- Hero card -->
                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden animate-fade-up delay-1">
                    <!-- Colored top banner -->
                    <div class="h-28 relative" style="background:linear-gradient(135deg,#4285F4,#0F9D58)">
                        <div class="absolute inset-0 opacity-10"
                            style="background-image:radial-gradient(circle at 20% 50%, white 1px, transparent 1px),radial-gradient(circle at 80% 20%, white 1px, transparent 1px);background-size:30px 30px">
                        </div>
                        <!-- Status badge top-right -->
                        <div class="absolute top-4 right-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-white/20 text-white backdrop-blur-sm border border-white/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-300 inline-block"></span>
                                Tersedia
                            </span>
                        </div>
                    </div>


                    <div class="px-6 pb-6">
                        <!-- Cover book + title row -->
                        <div class="flex gap-5 -mt-10 mb-5">
                            <!-- Book cover -->
                            <div class="w-24 h-36 flex items-center justify-center flex-shrink-0 shadow-xl relative z-10 border-4 border-white"
                                style="background:#4285F4;box-shadow:0 8px 24px #4285F455">
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}">
                            </div>
                            <!-- Title block -->
                            <div class="flex-1 min-w-0 pt-12">
                                <div class="flex items-start gap-2 flex-wrap">
                                    <span
                                        class="text-[11px] font-semibold px-2.5 py-1 rounded-full bg-blue-50 text-blue-600">{{ $book->category->name }}</span>
                                    <span
                                        class="text-[11px] font-semibold px-2.5 py-1 rounded-full bg-gray-100 text-gray-500">{{ $book->year }}</span>
                                </div>
                                <h1 class="text-xl font-extrabold text-gray-900 mt-2 leading-snug">
                                    {{ $book->title }}
                                </h1>
                                <p class="text-sm text-gray-500 mt-1">
                                    oleh <span class="font-semibold text-gray-700">{{ $book->author }}</span>
                                    · {{ $book->category->name }}
                                </p>
                            </div>
                        </div>


                        <!-- 4 quick stats -->
                        <div class="grid grid-cols-2 sm:grid-cols-2 gap-3 mb-5">
                            <div class="bg-blue-50 rounded-xl p-3 text-center">
                                <div class="text-xl font-extrabold text-blue-600" style="font-family:'Sora',sans-serif">
                                    {{ $book->stock }}
                                </div>
                                <div class="text-[11px] text-blue-400 font-medium mt-0.5">Stok Tersedia</div>
                            </div>
                            <div class="bg-yellow-50 rounded-xl p-3 text-center">
                                <div class="text-xl font-extrabold text-yellow-600" style="font-family:'Sora',sans-serif">0
                                </div>
                                <div class="text-[11px] text-yellow-400 font-medium mt-0.5">Sedang Dipinjam</div>
                            </div>
                        </div>


                        <!-- Deskripsi -->
                        <div>
                            <h3 class="text-[13px] font-bold text-gray-700 uppercase tracking-wide mb-2">Deskripsi</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                {{ $book->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
