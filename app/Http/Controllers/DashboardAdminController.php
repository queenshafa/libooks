<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index() {
        $totalBuku      = Book::count();
        $totalPeminjam  = Borrowing::distinct('name')->count('name');
        $sedangDipinjam = Borrowing::where('status', 'dipinjam')->count();

        $labels = [];
        $data   = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->translatedFormat('M');

            $total = Borrowing::whereMonth('borrow_date', $date->month)
                              ->whereYear('borrow_date', $date->year)
                              ->count();
            $data[] = $total;
        }

        return view('dashboard', compact(
            'totalBuku',
            'totalPeminjam',
            'sedangDipinjam',
            'labels',
            'data'
        ));
    }
}