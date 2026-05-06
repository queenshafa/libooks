<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Categories::all();
        return view('admin.category.index', compact('categories'));
    }

    // Menambahkan data kategori

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
        'name' => 'required|string|max:225'
        ],
        [
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Maksimal 225 karakter',
        ]
        );

        // Proses menyimpan dalam database
        Categories::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name)
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Update data

     public function update(Request $request, $id) {
        $request->validate([
        'name' => 'required|string|max:225'
        ],
        [
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Maksimal 225 karakter',
        ]
        );

        // Pengecekan id, apakah datanya ada atau tidak
        $categori = Categories::findOrFail($id);

        // Proses menyimpan dalam database
        $categori->update([
        'name' => $request->name,
        'slug' => Str::slug($request->name)
        ]);

        return back()->with('success', 'Kategori berhasil diubah!');
    }

    // Hapus Kategori

    public function destroy($id) {
        // Cek data
        $category = Categories::findOrFail($id);
        // menghapus data
        $category->delete();

        return back()->with('success', 'Kategori berhasil dihapus!');

    }
};

