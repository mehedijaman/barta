<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Upload</title>
</head>
<body>
    {{ Form::open(['url' => route('posts.store'), 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <input type="text" name="content">
        <input type="file" name="image">
        <input type="submit" value="Post">
    {{ Form::close() }}
</body>
</html>
