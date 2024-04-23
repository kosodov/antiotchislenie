<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Photo</title>
</head>
<body>
    <h2>Edit Photo</h2>
    <!-- Форма для редактирования фото -->
    <form action="{{ route('photos.update', $photo->id) }}" method="post">
        @csrf
        @method('PUT')
        <!-- Поля для редактирования данных фото -->
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $photo->name }}">
        </div>
        <div>
            <label for="image">Select Image:</label>
            <input type="file" id="image" name="image">
        </div>
        <!-- Кнопка для сохранения изменений -->
        <button type="submit">Save</button>
    </form>
</body>
</html>
