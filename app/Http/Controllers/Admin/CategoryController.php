<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:categories,name',
            ],
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Kategori tersebut sudah tersedia.',
            'name.max' => 'Nama kategori maksimal 100 karakter.',
        ]);

        // Membuat slug kategori.
        $slug = Str::slug($validated['name']);

        $originalSlug = $slug;
        $counter = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Menyimpan kategori.
        $category = Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => null,
            'is_active' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan.',
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
            ],
        ], 201);
    }
}
