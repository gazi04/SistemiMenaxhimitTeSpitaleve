@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@elseif (session('test'))
    <div style="color: red;">{{ session('test') }}</div>
@endif

<a href='{{ route("create-user") }}'>Create a new user</a>
<br>
<h2>Admin</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->id_number }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>Doctors</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id_number }}</td>
                <td>{{ $doctor->first_name }}</td>
                <td>{{ $doctor->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>Patients</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->id_number }}</td>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>Nurses</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nurses as $nurse)
            <tr>
                <td>{{ $nurse->id_number }}</td>
                <td>{{ $nurse->first_name }}</td>
                <td>{{ $nurse->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>Receptionists</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($receptionists as $receptionst)
            <tr>
                <td>{{ $receptionst->id_number }}</td>
                <td>{{ $receptionst->first_name }}</td>
                <td>{{ $receptionst->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>Technologists</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($technologists as $techno)
            <tr>
                <td>{{ $techno->id_number }}</td>
                <td>{{ $techno->name }}</td>
                <td>{{ $techno->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
