<h2>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(isset($student))
    <form method="POST" action="/students/{{ $student->id }}/update">
@else
    <form method="POST" action="/students">
@endif
    @csrf
    <input type="text" name="name" placeholder="Name" value="{{ old('name', $student->name ?? '') }}" required><br>
    <input type="number" name="age" placeholder="Age" value="{{ old('age', $student->age ?? '') }}" required><br>
    <input type="text" name="gender" placeholder="Gender" value="{{ old('gender', $student->gender ?? '') }}" required><br>
    <input type="text" name="year_level" placeholder="Year Level" value="{{ old('year_level', $student->year_level ?? '') }}" required><br>

    <button type="submit">{{ isset($student) ? 'Update Student' : 'Add Student' }}</button>
</form>

@if(isset($student))
    <form method="GET" action="/students">
        <button type="submit">Cancel Edit</button>
    </form>
@endif

<hr>

<h3>Student List</h3>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Year Level</th>
        <th>Actions</th>
    </tr>
    @foreach($students as $s)
    <tr>
        <td>{{ $s->name }}</td>
        <td>{{ $s->age }}</td>
        <td>{{ $s->gender }}</td>
        <td>{{ $s->year_level }}</td>
        <td>
            <a href="/students/{{ $s->id }}/edit">Edit</a>
            <form action="/students/{{ $s->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete student?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
