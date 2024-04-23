<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    public function create()
    {
        return view('dishes.create');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            // Другие правила валидации для других полей блюда
        ]);

        // Создание нового блюда
        Dish::create($request->all());

        return redirect()->route('dishes.index')->with('success', 'Блюдо успешно добавлено');
    }

    public function edit(Dish $dish)
    {
        return view('dishes.edit', compact('dish'));
    }

    public function update(Request $request, Dish $dish)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            // Другие правила валидации для других полей блюда
        ]);

        // Обновление данных блюда
        $dish->update($request->all());

        return redirect()->route('dishes.index')->with('success', 'Блюдо успешно обновлено');
    }

    public function destroy(Dish $dish)
    {
        // Удаление блюда
        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'Блюдо успешно удалено');
    }
}
