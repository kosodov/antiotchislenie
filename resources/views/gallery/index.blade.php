<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
        }
        .photo {
            margin: 10px;
        }
        .thumbnail {
            width: 200px; /* Ширина превью */
            height: auto; /* Автоматическая высота */
        }
    </style>
</head>
<body>

    <h2>Gallery</h2>
    <div class="gallery">
        @foreach ($photos as $photo)
            <div class="photo">
                <a href="/photos/{{ $photo->id }}">
                    <img class="thumbnail" src="{{ asset($photo->path) }}" alt="{{ $photo->name }}">
                </a>
                <div>Likes: {{ $photo->likes }}</div>
                <div>Views: {{ $photo->views }}</div>
            </div>
        @endforeach
    </div>
</body>
</html>
