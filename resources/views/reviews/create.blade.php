<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить отзыв</title>
</head>
<body>
    <h2>Добавить отзыв</h2>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <label for="author">Автор:</label><br>
        <input type="text" id="author" name="author" required><br><br>
        <label for="text">Отзыв:</label><br>
        <textarea id="text" name="text" required></textarea><br><br>
        <label for="rating">Оценка:</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>
        <button type="submit">Отправить отзыв</button>
    </form>
</body>
</html>
