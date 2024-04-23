<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create()
    {
        return view('gallery.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('photos', 'public');

        Photo::create([
            'name' => $request->file('image')->getClientOriginalName(),
            'path' => $imagePath,
        ]);

        return redirect()->route('photos.index')
                         ->with('success', 'Фотография успешно загружена.');
    }

    public function index()
    {
        $photos = Photo::all();
        return view('gallery.index', compact('photos'));
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->increment('views');
        return view('gallery.show', compact('photo'));
    }

     public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('gallery.edit', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $photo->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('photos.index')->with('success', 'Изображение успешно обновлено.');
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Изображение успешно удалено.');
    }
}