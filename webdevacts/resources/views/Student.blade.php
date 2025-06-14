<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>
    <h1>Students</h1>

   @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<ul>
    @foreach($students as $student)
        <li>{{ $student->name }} - {{ $student->age }} years old - {{ $student->gender }} - {{ $student->year_level }}</li>
    @endforeach
</ul>

<h2>Add New Student</h2>
<form method="POST" action="/students">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="number" name="age" placeholder="Age" required><br>
    <input type="text" name="gender" placeholder="Gender" required><br>
    <input type="text" name="year_level" placeholder="Year Level" required><br>
    <button type="submit">Add Student</button>
</form>

</body>
</html>
