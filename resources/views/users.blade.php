<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>

<body>
    <h1>User Page</h1>

    <form action="{{ route('createUser') }}" method="GET">
        <button type="submit"> Create User</button>
    </form>

    @foreach($users as $user)
    <div>Name: {{ $user->name }}</div>
    <div>Email: {{ $user->email }}</div>
    <div>Address: {{ $user->address }}</div>
    <div>Status: {{$user->status}}</div>

    <form action="{{ route('editUser', ['id' =>$user->id]) }}" method="GET">
        <button type="submit">Edit</button>
    </form>

    <form action="{{ route('viewUser', ['id' =>$user->id]) }}" method="GET">
        <button type="submit">View</button>
    </form>
    <hr>
    @endforeach

</body>

</html>