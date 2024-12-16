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
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->id_number }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->is_employed == 1 ? 'Employed' : 'Fired'; }}</td>
                <td>
                    @if ($admin->is_employed)
                        <form action="{{ route('fire-admin', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $admin->id }}">
                            <button type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Fire Employee</button>
                        </form>
                    @else
                        <form action="{{ route('hire-admin', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $admin->id }}">
                            <button type="submit" onclick="return confirm('Deshironi te punesoni punetorin')">Hire Employee</button>
                        </form>
                    @endif
                    <a href="{{ route('edit-admin-view', $admin->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>hallo</td>
            <td>test</td>
            <td>aasdlfas</td>
            <td>fired</td>
            <td>
                <form action="{{ route('hire-admin') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="id" id="form-id" value="7">
                    <button type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Hire Employee</button>
                </form>
                <a href="{{ route('edit-admin-view', $admin->id) }}">Edit</a>
            </td>
        </tr>
    </tbody>
</table>
<h2>Doctors</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id_number }}</td>
                <td>{{ $doctor->first_name }}</td>
                <td>{{ $doctor->last_name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->phone_number }}</td>
                <td>{{ $doctor->is_employed == 1 ? 'Employed' : 'Fired'; }}</td>
                <td>
                    @if ($doctor->is_employed)
                        <form action="{{ route('fire-doctor', $doctor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $doctor->id }}">
                            <button type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Fire Employee</button>
                        </form>
                    @else
                        <form action="{{ route('hire-doctor', $doctor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $doctor->id }}">
                            <button type="submit" onclick="return confirm('Deshironi te punesoni punetorin')">Hire Employee</button>
                        </form>
                    @endif
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
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->id_number }}</td>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->phone_number }}</td>
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
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nurses as $nurse)
            <tr>
                <td>{{ $nurse->id_number }}</td>
                <td>{{ $nurse->first_name }}</td>
                <td>{{ $nurse->last_name }}</td>
                <td>{{ $nurse->email }}</td>
                <td>{{ $nurse->phone_number }}</td>
                <td>{{ $nurse->is_employed == 1 ? 'Employed' : 'Fired'; }}</td>
                <td>
                    @if ($nurse->is_employed)
                        <form action="{{ route('fire-nurse', $nurse->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $nurse->id }}">
                            <button type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Fire Employee</button>
                        </form>
                    @else
                        <form action="{{ route('hire-nurse', $nurse->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $nurse->id }}">
                            <button type="submit" onclick="return confirm('Deshironi te punesoni punetorin')">Hire Employee</button>
                        </form>
                    @endif
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
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($receptionists as $receptionist)
            <tr>
                <td>{{ $receptionist->id_number }}</td>
                <td>{{ $receptionist->first_name }}</td>
                <td>{{ $receptionist->last_name }}</td>
                <td>{{ $receptionist->email }}</td>
                <td>{{ $receptionist->phone_number }}</td>
                <td>{{ $receptionist->is_employed == 1 ? 'Employed' : 'Fired'; }}</td>
                <td>
                    @if ($receptionist->is_employed)
                        <form action="{{ route('fire-receptionist', $receptionist->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $receptionist->id }}">
                            <button type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Fire Employee</button>
                        </form>
                    @else
                        <form action="{{ route('hire-receptionist', $receptionist->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $receptionist->id }}">
                            <button type="submit" onclick="return confirm('Deshironi te punesoni punetorin')">Hire Employee</button>
                        </form>
                    @endif
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
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($technologists as $techno)
            <tr>
                <td>{{ $techno->id_number }}</td>
                <td>{{ $techno->first_name }}</td>
                <td>{{ $techno->last_name }}</td>
                <td>{{ $techno->email }}</td>
                <td>{{ $techno->phone_number }}</td>
                <td>{{ $techno->is_employed == 1 ? 'Employed' : 'Fired'; }}</td>
                <td>
                    @if ($techno->is_employed)
                        <form action="{{ route('fire-technologist', $techno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $techno->id }}">
                            <button type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Fire Employee</button>
                        </form>
                    @else
                        <form action="{{ route('hire-technologist', $techno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" id="form-id" value="{{ $techno->id }}">
                            <button type="submit" onclick="return confirm('Deshironi te punesoni punetorin')">Hire Employee</button>
                        </form>
                    @endif
                    <a href="{{ route('edit-technologist-view', $techno->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
