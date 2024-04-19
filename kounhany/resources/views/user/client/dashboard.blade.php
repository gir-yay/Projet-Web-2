<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1>Dashboard Client</h1>
    <a href="{{route('user.client.profile')}}">profile</a>

  <form action="{{route("client.logout")}}" method="Post">
    @csrf
    <button>Logout</button>
  </form>
</body>
</html>
