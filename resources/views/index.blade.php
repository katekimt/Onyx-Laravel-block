<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])

    <title>Add Page</title>
</head>
<body>

<section>
    <nav class="navbar bg-light">
        <form class="container-fluid justify-content-start">
            <a type="button" class="btn btn-outline-primary me-2" href="/login">Log in</a>
            <a type="button" class="btn btn-outline-secondary me-2" href="/register">Register</a>
            <a type="button" class="btn btn-outline-success me-2" href="/logout">Log out</a>
            <a type="button" class="btn btn-outline-danger me-2" href="/add/page">Add post</a>
        </form>
    </nav>
</section>

<section class="posts posts__block">
    <h1 class="container_posts posts__title ">Posts</h1>
    @foreach($posts as $post)
        <div class="card container_posts posts__block" style="width: 30rem;">
            <img src="{{ asset($post->file) }}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title posts__title">Title of post: {{$post->title}}</h5>
                <p class="card-text">Text of post: {{$post->text}}</p>
                <p class="card-text">Key words of post: {{$post->keywords}}</p>
                <a type="button" class="btn btn-outline-warning me-2" href="{{route('post-data-one', $post->id)}}">In detail</a>
            </div>
        </div>
    @endforeach
</section>


{{$posts->links()}}

</body>
</html>
