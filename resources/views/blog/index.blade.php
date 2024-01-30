<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h1>Blog</h1>

    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small>Posted by {{ $post->user->name }} on {{ $post->created_at }}</small>
        </div>
    @endforeach
</body>
</html>

