<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заказов для доставки</title>
</head>
<body>
    <h1>Список заказов для доставки</h1>
    @foreach ($orders as $order)
        <div>
            <h2>Заказ №{{ $order->id }}</h2>
            <p>Статус: {{ $order->status }}</p>
            <form action="{{ route('courier.takeOrder', $order->id) }}" method="post">
                @csrf
                <button type="submit">Взять на доставку</button>
            </form>
        </div>
    @endforeach
</body>
</html>
