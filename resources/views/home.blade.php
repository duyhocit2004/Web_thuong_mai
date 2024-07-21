<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    đây là trang Admin
    {{Auth::user() -> name}}
    <form action="{{route('Logout')}}" method="POST">
        @csrf
        <button type="submit">log out</button>
    </form>
</body>
</html>