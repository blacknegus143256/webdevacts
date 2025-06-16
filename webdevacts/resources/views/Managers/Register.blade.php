<!DOCTYPE html>
<html>
<head>
    <title>Manager Register</title>
</head>
<body>
    <h1>Manager Registration</h1>

    <form method="POST" action="{{ route('manager.register.submit') }}">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <div>{{ $message }}</div> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div>{{ $message }}</div> @enderror

        <label>Password:</label>
        <input type="password" name="password" required>
        @error('password') <div>{{ $message }}</div> @enderror

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>
