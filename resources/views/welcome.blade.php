<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body>
    <h1>Hello Laravel12😎</h1>
    <a href="{{ route('guestprofile', ['name' => 'flook']) }}">Show my profile</a><br>
    <a href="{{ route('guestprofile', ['name' => 'py']) }}">Show my profile</a>
    {{-- <h2>{{$myname}}</h2> --}}

    <img src="https://cdn-icons-png.flaticon.com/256/9791/9791194.png" alt="">

</body>

</html>
