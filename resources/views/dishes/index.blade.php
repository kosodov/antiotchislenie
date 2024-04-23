
@extends('layouts.app')

@section('content')
    <h1>Список блюд</h1>
    <a href="{{ route('dishes.create') }}">Добавить блюдо</a>
    <ul>
        @foreach ($dishes as $dish)
            <li>{{ $dish->name }} <a href="{{ route('dishes.edit', $dish) }}">Редактировать</a></li>
        @endforeach
    </ul>
@endsection
