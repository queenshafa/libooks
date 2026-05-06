<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'   =>'required',
            'title'         =>'required',
            'author'        =>'required',
            'publisher'     =>'required',
            'year'          =>'required|integer',
            'stock'         =>'required|integer',
            'cover'         => 'mimes:jpg,jpeg,png|max:2048',
            'description'   =>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required'   =>'Kategori wajib dipilih',
            'title.required'         =>'Judul buku wajib diisi',
            'author.required'        =>'Penulis wajib diisi',
            'publisher.required'     =>'Penerbit wajib diisi',
            'year.required'          =>'Tahun wajib diisi',
            'year.integer'           =>'Tahun wajib angka',
            'stock.required'         =>'Stok wajib diisi',
            'stock.integer'          =>'Stok wajib angka',
            'cover.image'            =>'Cover harus dalam gambar',
            'cover.mimes'            =>'Format cover harus jpg, jpeg dan png',
            'cover.max'              =>'Ukuran cover maksimal 2MD',
            'description.required'   =>'Deskripsi wajib diisi'
        ];
    }
}
