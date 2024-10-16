<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
</head>

<body>
    <form action="{{ route('updateUser', ['id' =>$user->id]) }}" method="POST">
        @method('PUT')
        @csrf

        <label for="name">Names:</label>
        <input type="text" id="name" name="name" value="{{$user->name}}" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$user->email}}" required><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" value="{{$user->birthdate}}" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status" value="{{$user->status}}" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{$user->address}}" required><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" value="{{$user->contact_number}}" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{$user->password}}" required><br>

        <button type="submit"> Update </button>
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