<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы на кухне</title>
</head>
<body>
    <h1>Заказы на кухне</h1>
    @foreach ($orders as $order)
        <div>
            <h2>Заказ №{{ $order->id }}</h2>
            <p>Статус: {{ $order->status }}</p>
            <form action="{{ route('kitchen.startPreparation', $order->id) }}" method="post">
                @csrf
                <button type="submit">Начать приготовление</button>
            </form>
        </div>
    @endforeach
</body>
</html>
