<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'text' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);
        
        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно добавлен');
    }
}
