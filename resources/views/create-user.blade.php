<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
 
<body>
    <h1>CREATE USER PAGE</h1>

    <form action="{{ route('storeUser') }}" method="POST">
        @method('POST')
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Create</button>
    </form>

    <form action="{{ route('showAllUsers') }}" method="GET">
        <button type="submit">Back</button>
    </form>


</body>

</html>