<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index() {
        $books = Book::with('category')->latest()->get();
        return view('admin.book.index', compact('books'));
    }

    public function create() {
        $categories = Categories::all();
        return view('admin.book.create', compact('categories'));
    }

    public function upload(BookRequest $request) {
        // dd($request->all());

        // data cover berupa image
        $coverPath = null;

        // cek apakah ada data gambar
        if($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('cover', 'public');
        }

        Book::create([
            'category_id'  => $request->category_id,
            'title'        => $request->title,
            'author'       => $request->author, 
            'publisher'    => $request->publisher,
            'year'         => $request->year,
            'stock'        => $request->stock,
            'cover'        => $coverPath,
            'description'  => $request->description
        ]);

        return redirect(route('admin.book.index'))->with('success', 'Buku berhasil ditambahkan!');
    }

    public function detail($id) {
        $book = Book::with('category')->findOrFail($id);
        return view('admin.book.detail', compact('book'));
    }

    public function edit($id) {
        $categories = Categories::all();
        $book = Book::with('category')->findOrFail($id);
        return view('admin.book.edit', compact('categories', 'book'));
    }

    public function update(BookRequest $request, $id) {
        $book = Book::findOrFail($id);

        // Handle Cover
        if($request->hasFile('cover')) {
            // Menghapus cover lama (jika ada perubahan)
            if($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }

            // Upload cover baru
            $coverPath = $request->file('cover')->store('cover', 'public');
        } else {
            // kalau gaada upload cover baru, pakai yang lama
            $coverPath = $book->cover;
        }
        // Update data book
        $book->update([
            'category_id'  => $request->category_id,
            'title'        => $request->title,
            'author'       => $request->author, 
            'publisher'    => $request->publisher,
            'year'         => $request->year,
            'stock'        => $request->stock,
            'cover'        => $coverPath,
            'description'  => $request->description
        ]);

        return redirect(route('admin.book.index'))->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);

         // Menghapus cover lama (jika ada perubahan)
        if($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();
        return back()->with('success', 'Buku berhasil dihapus!');

    }

    
}
