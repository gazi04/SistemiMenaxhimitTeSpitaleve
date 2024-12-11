@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@elseif (session('test'))
    <div style="color: red;">{{ session('test') }}</div>
@endif

<a href='{{ route("create-admin") }}'>Create Admin</a>
<a href='{{ route("create-doctor") }}'>Create Doctor</a>
<a href='{{ route("create-nurse") }}'>Create Nurse</a>
<a href='{{ route("create-receptionist") }}'>Create Receptionist</a>
<a href='{{ route("create-technologist") }}'>Create Technologist</a>
<br>
<h2>Admin</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->id_number }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <form action="{{ route('delete-admin', $admin->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this departament?')">Delete</button>
                        <button type="button" onclick="populateForm({{ $admin }})">Edit</button>
                    </form>
                </td>

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
                <td>
                    <form action="{{ route('delete-departament', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this departament?')">Delete</button>
                        <button type="button" onclick="populateForm({{ $doctor }})">Edit</button>
                    </form>
                </td>
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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->id_number }}</td>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->email }}</td>
                <td>
                    <form action="{{ route('delete-departament', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this departament?')">Delete</button>
                        <button type="button" onclick="populateForm({{ $patient }})">Edit</button>
                    </form>
                </td>
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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nurses as $nurse)
            <tr>
                <td>{{ $nurse->id_number }}</td>
                <td>{{ $nurse->first_name }}</td>
                <td>{{ $nurse->email }}</td>
                <td>
                    <form action="{{ route('delete-departament', $nurse->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this departament?')">Delete</button>
                        <button type="button" onclick="populateForm({{ $nurse }})">Edit</button>
                    </form>
                </td>
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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($receptionists as $receptionst)
            <tr>
                <td>{{ $receptionst->id_number }}</td>
                <td>{{ $receptionst->first_name }}</td>
                <td>{{ $receptionst->email }}</td>
                <td>
                    <form action="{{ route('delete-departament', $receptionst->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this departament?')">Delete</button>
                        <button type="button" onclick="populateForm({{ $receptionst }})">Edit</button>
                    </form>
                </td>
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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($technologists as $techno)
            <tr>
                <td>{{ $techno->id_number }}</td>
                <td>{{ $techno->first_name }}</td>
                <td>{{ $techno->email }}</td>
                <td>
                    <form action="{{ route('delete-departament', $techno->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this departament?')">Delete</button>
                        <button type="button" onclick="populateForm({{ $techno }})">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
