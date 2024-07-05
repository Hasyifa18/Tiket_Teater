<!DOCTYPE html>
<html>
<head>
    <title>Show User</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>User Details</h2>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <a href="{{ route('user.index') }}">Back to Users List</a>
    </div>
</body>
</html>
