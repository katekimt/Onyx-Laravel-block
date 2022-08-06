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

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form  action="{{route('addPage-form')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div  class="form-group global">
        <label for="name">Input title</label>
        <input type="text" name="title" placeholder="Input title" id = "title" class="form-control">
    </div>
    <div  class="form-group global">
        <label>Input keywords</label>
        <input type="text" name="keywords" placeholder="Input keywords" id = "keywords" class="form-control">
    </div>
    <div  class="form-group global">
        <label>Input text</label>
        <input type="text" name="text" placeholder="Input text" id = "text" class="form-control">
    </div>
    <div  class="form-group global">
        <label>Download file</label>
        <input type="file" name="file" placeholder="Download file" id = "file" class="form-control">
    </div>
    <button type="submit" class="btn btn-success global">Send</button>
</form>
</body>
</html>
