<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>
    <h1>All Posts</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Publish At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <!-- <td>{{ $post->status ? 'Published' : 'Not Published' }}</td> -->
                    <td>{{ $post->status }}</td>
                    <td>{{ $post->publish_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
