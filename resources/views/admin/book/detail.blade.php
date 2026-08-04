@extends('layouts.app')

@section('title', 'Book Detail | Libooks')

@section('banner-title')
    <div class="px-6 pb-6">
        <!-- Cover book + title row -->
        <div class="flex gap-5 -mt-12 mb-5">
            <!-- Book cover -->
            <div
                class="w-24 h-36 flex items-center justify-center bg-primary flex-shrink-0 shadow-xl relative z-10 border-4 border-white">
                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}">
            </div>
            <!-- Title block -->
            <div class="flex-1 min-w-0 pt-12">
                <div class="flex items-start gap-2 flex-wrap">
                    <span
                        class="text-[11px] font-semibold px-2.5 py-1 rounded-full bg-primary text-white">{{ $book->category->name }}</span>
                    <span
                        class="text-[11px] font-semibold px-2.5 py-1 rounded-full bg-gray-100 text-gray-500">{{ $book->year }}</span>
                </div>
                <h1 class="text-xl font-extrabold text-white mt-2 leading-snug">
                    {{ $book->title }}
                </h1>
                <p class="text-sm text-white font-medium mt-1">
                    oleh <span class="font-semibold text-white">{{ $book->author }}</span>
                    · {{ $book->category->name }}
                </p>
            </div>
        </div>
    @endsection

    @section('banner-actions')
        <a href="{{ route('admin.book.index') }}"
            class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-600 border border-gray-200 bg-white hover:bg-gray-50 transition-all">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d=" M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    @endsection

    @section('content')
        <div class="p-10 flex flex-col gap-5">
            <div class="grid grid-cols-1 gap-5">
                <div class="lg:col-span-2 flex flex-col gap-5">
                    <div class="bg-white rounded-2xl overflow-hidden animate-fade-up delay-1">
                        <div class="grid grid-cols-2 sm:grid-cols-2 gap-3 mb-5">
                            <div class="bg-blue-50 rounded-xl p-3 text-center">
                                <div class="text-2xl font-extrabold text-blue-600" style="font-family:'Sora',sans-serif">
                                    {{ $book->stock }}
                                </div>
                                <div class="text-[11px] text-blue-400 font-medium mt-0.5">Stok Tersedia</div>
                            </div>
                            <div class="bg-yellow-50 rounded-xl p-3 text-center">
                                <div class="text-2xl font-extrabold text-yellow-600" style="font-family:'Sora',sans-serif">0
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
