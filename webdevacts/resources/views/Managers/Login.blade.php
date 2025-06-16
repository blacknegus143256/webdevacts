<!DOCTYPE html>
<html>
<head>
    <title>Manager Login</title>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('manager.login.submit') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <button type="submit">Login</button>
    </form>
    <a href="{{ route('manager.register') }}">
    <button type="button">Register as Manager</button>
</a>

</body>
</html>
