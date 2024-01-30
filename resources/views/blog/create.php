<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>Create Post</h1>

    <form action="{{route('blog.store') }}" method="POST">
        
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>
