
@extends('layouts.app')

@section('content')
    <h1>Добавить новое блюдо</h1>
    <form action="{{ route('dishes.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Название блюда:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <!-- Другие поля блюда -->
        <button type="submit">Добавить</button>
    </form>
@endsection
