<!-- resources/views/reviews/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список отзывов</title>
</head>
<body>
    <h2>Список отзывов</h2>
    <ul>
        @foreach ($reviews as $review)
            <li>
                <strong>Автор:</strong> {{ $review->author }}<br>
                <strong>Дата:</strong> {{ $review->date }}<br>
                <strong>Отзыв:</strong> {{ $review->text }}<br>
                <strong>Оценка:</strong> {{ $review->rating }}
            </li>
            <hr>
        @endforeach
    </ul>
</body>
</html>
