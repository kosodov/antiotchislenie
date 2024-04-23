
@extends('layouts.app')

@section('content')
    <h1>Редактировать блюдо</h1>
    <form action="{{ route('dishes.update', $dish) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Название блюда:</label>
            <input type="text" name="name" id="name" value="{{ $dish->name }}" required>
        </div>
        <!-- Другие поля блюда -->
        <button type="submit">Сохранить</button>
    </form>
@endsection
