
@extends('layouts.app')

@section('content')
    <h1>Список заказов</h1>
    <table>
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @if ($order->status == 'Новый')
                            <form action="{{ route('orders.take', $order) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Принять в работу</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
