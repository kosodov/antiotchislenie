<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
</head>
<body>
    <h2>Upload Photo</h2>
    <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="image">Выберите изображение:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Загрузить</button>
    </form>
</body>
</html>
