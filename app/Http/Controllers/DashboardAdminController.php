<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index() {
        $totalBuku      = Book::count();
       $totalPeminjam  = Borrowing::distinct('name')->count('name');
       $sedangDipinjam = Borrowing::where('status', 'dipinjam')->count();


       $chartData = Borrowing::selectRaw('MONTH(borrow_date) as bulan, COUNT(*) as total')
    ->whereYear('borrow_date', now()->year)
    ->whereRaw('borrow_date >= ?', [now()->subMonths(5)->startOfMonth()])
    ->groupBy('bulan')
    ->orderBy('bulan')
    ->get()
    ->map(fn ($item) => [
        'bulan' => (int) $item->bulan,
        'total' => (int) $item->total,
    ])
    ->values()
    ->toArray();



       return view('dashboard', compact(
           'totalBuku',
           'totalPeminjam',
           'sedangDipinjam',
           'chartData'
       ));

    }
}
