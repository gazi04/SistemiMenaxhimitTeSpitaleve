@if (session('message'))
    <div>{{ session('message') }}</div>
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
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Admin user?')">Delete</button>
                    </form>
                    <a href="{{ route('edit-admin-view', $admin->id) }}">Edit</a>
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
                    <form action="{{ route('delete-doctor', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Doctor user?')">Delete</button>
                    </form>
                    <a href="{{ route('edit-doctor-view', $doctor->id) }}">Edit</a>
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
                    <form action="{{ route('delete-patient', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Patient User?')">Delete</button>
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
                    <form action="{{ route('delete-nurse', $nurse->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Nurse User?')">Delete</button>
                    </form>
                    <a href="{{ route('edit-nurse-view', $nurse->id) }}">Edit</a>
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
        @foreach ($receptionists as $receptionist)
            <tr>
                <td>{{ $receptionist->id_number }}</td>
                <td>{{ $receptionist->first_name }}</td>
                <td>{{ $receptionist->email }}</td>
                <td>
                    <form action="{{ route('delete-receptionist', $receptionist->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Receptionist User?')">Delete</button>
                    </form>
                    <a href="{{ route('edit-receptionist-view', $receptionist->id) }}">Edit</a>
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
                    <form action="{{ route('delete-technologist', $techno->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this technologist?')">Delete</button>
                    </form>
                    <a href="{{ route('edit-technologist-view', $techno->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
