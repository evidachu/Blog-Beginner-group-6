<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController2 extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        // Ambil semua artikel beserta kategori dan tag yang terkait
        $articles = Article::with(['category', 'tags'])->get();
        return view('admin.articles2.index', compact('articles'));
    }

    // Menampilkan form untuk membuat artikel baru
    public function create()
    {
        // Ambil semua kategori dan tag untuk dropdown
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles2.create', compact('categories', 'tags'));
    }

    // Menyimpan artikel yang baru dibuat
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validasi gambar
        ]);

        // Membuat artikel baru
        $article = Article::create([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(), // Menggunakan ID user yang sedang login
        ]);

        // Menambahkan tags jika ada
        if ($request->tags) {
            $article->tags()->attach($request->tags);
        }

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->image = $imagePath;
            $article->save();
        }

        return redirect()->route('admin.articles2.index')->with('success', 'Article created successfully!');
    }

    // Menampilkan form untuk mengedit artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all(); // Untuk dropdown kategori
        $tags = Tag::all(); // Untuk dropdown tag
        return view('admin.articles2.edit', compact('article', 'categories', 'tags'));
    }

    // Memperbarui artikel yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validasi gambar
        ]);

        // Menemukan artikel yang ingin diupdate
        $article = Article::findOrFail($id);

        // Update artikel
        $article->update([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'category_id' => $request->category_id,
        ]);

        // Update tags jika ada
        if ($request->has('tags')) {
            $article->tags()->sync($request->tags);  // Sinkronkan tag yang dipilih
        }

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image) {
                Storage::disk('public')->delete($article->image);  // Menghapus gambar lama
            }

            // Menyimpan gambar baru dan mendapatkan path-nya
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->image = $imagePath;  // Simpan path gambar baru
        }

        // Simpan perubahan artikel ke database
        $article->save();

        return redirect()->route('admin.articles2.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
{
    $article = Article::findOrFail($id);
    $article->delete();

    return redirect()->route('admin.articles2.index')->with('success', 'Article deleted successfully');
}

}
