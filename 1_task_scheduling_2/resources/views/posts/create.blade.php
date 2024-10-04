<!DOCTYPE html>
<html>
<head>
    <title>Schedule Post</title>
</head>
<body>
    <h1>Schedule a New Post</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <br>

        <label for="content">Content:</label>
        <textarea name="content" id="content" required></textarea>
        <br>

        <label for="publish_at">Publish At:</label>
        <input type="datetime-local" name="publish_at" id="publish_at" required>
        <br>

        <button type="submit">Schedule Post</button>
    </form>
</body>
</html>
