<h2>Users List</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{$user->gender}}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
</table>
