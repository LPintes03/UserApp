<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>User Page</h1>

    <div>Name: {{ $user->name }}</div>
    <div>Email: {{ $user->email }}</div>
    <div>Address: {{ $user->address }}</div>
    <div>Status: {{$user->status}}</div>
    <hr>

    <form action="{{ route('editUser', ['id' =>$user->id]) }}" method="GET">
        <button type="submit">Edit</button>
    </form>

    <form action="{{ route('deleteUser', ['id' =>$user->id]) }}" method="POST"
        onsubmit="return confirm('Are you sure?')">
        @method('DELETE')
        @csrf
        <button type="submit"> Delete</button>
    </form>

    <form action="{{ route('showAllUsers') }}" method="GET">
        <button type="submit">Back</button>
    </form>

    
</body>

</html>