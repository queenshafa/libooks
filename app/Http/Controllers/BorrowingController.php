<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index(Request $request)
   {
       $query = Borrowing::with('book')->latest();


       if ($request->filled('code')) {
           $query->where('code', 'like', '%' . $request->code . '%');
       }


       $borrowings        = $query->paginate(10);
       $totalAll          = Borrowing::count();
       $totalPending      = Borrowing::where('status', 'pending')->count();
       $totalDipinjam     = Borrowing::where('status', 'borrowed')->count();
       $totalDikembalikan = Borrowing::where('status', 'returned')->count();


       return view('admin.borrowing.index', compact(
           'borrowings',
           'totalAll',
           'totalPending',
           'totalDipinjam',
           'totalDikembalikan'
       ));
   }




   public function updateStatus(Request $request, $id)
   {
       $borrowing = Borrowing::findOrFail($id);
       $borrowing->status = $request->status;
       $borrowing->save();


       // Kalau status dikembalikan, tambah stok buku
       if ($request->status == 'selesai') {
           $borrowing->book->increment('stock');
       }

        return redirect()->back()->with('success', 'Status berhasil diupdate!');
   }
}

