<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Catalog::all();
        return view('catalog.index', compact('catalog'));
    }

    public function create()
    {
        return view('catalog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // Добавьте валидацию для других полей каталога
        ]);

        Catalog::create($request->all());

        return redirect()->route('catalog.index')->with('success', 'Элемент каталога успешно создан');
    }

    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalog.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // добавьте необходимые правила валидации для изображения
        ]);

        $data = [
            'name' => $request->input('name'),
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('photos', 'public');
            $data['path'] = $imagePath;
        }

        $photo->update($data);

        return redirect()->route('photos.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy($id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();

        return redirect()->route('catalog.index')->with('success', 'Элемент каталога успешно удален');
    }
}
