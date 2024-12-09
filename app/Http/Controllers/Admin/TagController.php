<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Menampilkan daftar tag
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    // Menampilkan form untuk membuat tag baru
    public function create()
    {
        return view('admin.tags.create');
    }

    // Menyimpan tag baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);

        Tag::create($request->only('name'));

        return redirect()->route('admin.tags.index')->with('success', 'Tag berhasil dibuat!');
    }

    // Menampilkan form untuk mengedit tag
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    // Memperbarui tag yang ada
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id . '|max:255',
        ]);

        $tag->update($request->only('name'));

        return redirect()->route('admin.tags.index')->with('success', 'Tag berhasil diperbarui!');
    }

    // Menghapus tag
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Tag berhasil dihapus!');
    }
}
