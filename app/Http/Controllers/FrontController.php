<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        // Get Data Book
        $books = Book::latest()->take(6)->get();
        return view('welcome', compact('books'));
    }

    public function allBooks() {
       $books = Book::with('category')->latest()->get();
        return view('front.all-books', compact('books'));
    }

    public function detail($id) {
        $book = Book::findOrFail($id);
        return view('front.detail', compact('book'));
    }

    public function borrow($id, Request $request) {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:225',
            'phone' => 'required|string|max:20',
            'duration' => 'required|integer|in:3,7,14'
        ]);

        // Data durasi diubah ke jenis data integer
        $duration = (int) $request->input('duration');
        $borrowDate = now();
        $returnDate = now()->addDays($duration);
        $code = strtoupper(uniqid('BRW-'));

        // Cek stok buku
        $book = Book::findOrFail($id);
        if($book->stock <= 0) {
            return redirect()->back()->with('error', 'Sorry, this book is out of stock!');
        }

        // Simpan data peminjaman ke database
        Borrowing::create([
            'book_id'       => $id,
            'name'          => $request->input('name'),
            'phone'         => $request->input('phone'),
            'duration'      => $duration,
            'borrow_date'   => $borrowDate,
            'return_date'   => $returnDate,
            'code'          => $code,
            'status'        => 'pending'
        ]);

        // Mengurangi stok buku
        $book->decrement('stock');
        return redirect()->route('front.detail', $book->id)->with([
            'borrow_success'    => true,
            'borrow_code'       => $code,
            'borrow_name'       => $request->input('name'),
            'borrow_duration'   => $duration,
            'borrow_return'     => $returnDate->translatedFormat('d F Y')
        ]);
    }
}
