<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Details</title>
</head>
<body>
    <h2>Photo Details</h2>
    <div>
	<a href="{{ route('photos.edit', $photo->id) }}">Edit Photo</a>

        <img src="{{ asset($photo->path) }}" alt="{{ $photo->name }}">
        <div>Likes: {{ $photo->likes }}</div>
        <div>Views: {{ $photo->views }}</div>
    </div>
</body>
</html>
