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
        'name.required' => 'Name cannot be blank',
        'name.max' => 'Max. 225 characters',
        ]
        );

        // Proses menyimpan dalam database
        Categories::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name)
        ]);

        return back()->with('success', 'Category successfully added!');
    }

    // Update data

     public function update(Request $request, $id) {
        $request->validate([
        'name' => 'required|string|max:225'
        ],
        [
        'name.required' => 'Name cannot be blank',
        'name.max' => 'Max. 225 characters',
        ]
        );

        // Pengecekan id, apakah datanya ada atau tidak
        $categori = Categories::findOrFail($id);

        // Proses menyimpan dalam database
        $categori->update([
        'name' => $request->name,
        'slug' => Str::slug($request->name)
        ]);

        return back()->with('success', 'Category successfully updated!');
    }

    // Hapus Kategori

    public function destroy($id) {
        // Cek data
        $category = Categories::findOrFail($id);
        // menghapus data
        $category->delete();

        return back()->with('success', 'Category successfully deleted!');

    }
};

