@extends('layouts.app')

@section('title', 'Update Book | Libook')

@section('banner-title')
    Update Book
@endsection

@section('banner-subtitle', 'Update book information completely and correctly')

@section('banner-actions')
    <a href="{{ route('admin.book.index') }}"
        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-600 border border-gray-200 bg-white hover:bg-gray-50 transition-all">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back
    </a>
@endsection

@section('content')
    <div class="p-6">
        <div>
            <div class="lg:col-span-2 flex flex-col gap-5">
                <form action="{{ route('admin.book.update', $book->id) }}" method="POST" enctype="multipart/form-data"
                    class="p-6 flex flex-col gap-5">
                    @method('PUT')
                    @csrf
                    <!-- Title -->
                    <div>
                        <label class="form-label">Book Title</label>
                        <input value="{{ old('title', $book->title) }}" name="title" type="text" class="form-input"
                            placeholder="Example: The Let Them Theory">
                        @error('title')
                            <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Author + Publisher -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Author</label>
                            <input value="{{ old('author', $book->author) }}" name="author" type="text"
                                class="form-input" placeholder="Author Name">
                            @error('author')
                                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Publisher</label>
                            <input value="{{ old('publisher', $book->publisher) }}" name="publisher" type="text"
                                class="form-input" placeholder="Publisher name">
                            @error('publisher')
                                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Category + Year -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-input">
                                <option value="">Choose Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('category_id', $book->category_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Publishing Year</label>
                            <input value="{{ old('year', $book->year) }}" name="year" type="number" class="form-input"
                                placeholder="2024" min="1900" max="2099">
                            @error('year')
                                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Cover -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Cover</label>
                            <input name="cover" class="form-input" type="file">
                            @error('cover')
                                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-20 mt-3">
                        </div>
                        <div>
                            <label class="form-label">Stock</label>
                            <input value="{{ old('stock', $book->stock) }}" name="stock" type="number"
                                class="form-input">
                            @error('stock')
                                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Description -->
                    <div>
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-input" rows="4"
                            placeholder="Write a synopsis or description of the book's content...">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-[11px] text-gray-400 mt-1.5">Max. 500 characters</p>
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-primary inline-flex items-center gap-1.5 px-6 py-2.5 rounded-xl text-sm font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-lg">
                            Save Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
