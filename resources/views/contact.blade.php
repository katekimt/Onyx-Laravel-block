<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])

    <title>Contact</title>
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

<form  action="{{route('contact-form')}}" method="post" >
    @csrf
    <div  class="form-group global">
        <label for="name">Input name</label>
        <input type="text" name="name" placeholder="Input name" id = "name" class="form-control">
    </div>
    <div  class="form-group global">
        <label for="email">Input email</label>
        <input type="email" name="email" placeholder="Input email" id = "email" class="form-control">
    </div>
    <div  class="form-group global">
        <label for="password">Input password</label>
        <input type="password" name="password" placeholder="Input password" id = "password" class="form-control">
    </div>
    <div  class="form-group global">
        <label for="password">Input password confirmation</label>
        <input type="password" name="password_confirmation" placeholder="Input password confirmation" id = "password_confirmation" class="form-control">
    </div>
    <button type="submit" class="btn btn-success global">Send</button>
</form>
</body>
</html>
