<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
</head>
<body>
    <h1>Меню</h1>
    @foreach ($dishes as $dish)
        <div>
            <h2>{{ $dish->name }}</h2>
            <p>{{ $dish->description }}</p>
            
            <!-- Показываем количество добавленных товаров в корзину для текущего блюда -->
            @if(isset($cartItems[$dish->id]))
                <p>Добавлено в корзину: {{ $cartItems[$dish->id] }}</p>
            @else
                <p>Добавлено в корзину: 0</p>
            @endif

            <!-- Форма для добавления блюда в корзину -->
            <form action="{{ route('menu.addToCart', $dish->id) }}" method="post">
                @csrf
                <button type="submit">Добавить в корзину</button>
            </form>

            <hr>

            <!-- Форма для удаления блюда из корзины -->
            <form action="{{ route('menu.removeFromCart', $dish->id) }}" method="post">
                @csrf
                <button type="submit">Удалить из корзины</button>
            </form>
        </div>
    @endforeach

    <hr>

    <!-- Форма для обновления адреса доставки -->
    <form action="{{ route('menu.updateDeliveryAddress') }}" method="post">
        @csrf
        <label for="delivery_address">Адрес доставки:</label>
        <input type="text" id="delivery_address" name="delivery_address" required>
        <button type="submit">Обновить адрес доставки</button>
    </form>

    <!-- Форма для обновления времени доставки -->
    <form action="{{ route('menu.updateDeliveryTime') }}" method="post">
        @csrf
        <label for="delivery_time">Время доставки:</label>
        <input type="datetime-local" id="delivery_time" name="delivery_time" required>
        <button type="submit">Обновить время доставки</button>
    </form>
</body>
</html>
