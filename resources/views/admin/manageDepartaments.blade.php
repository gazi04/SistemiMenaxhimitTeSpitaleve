@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@elseif (session('test'))
    <div style="color: red;">{{ session('test') }}</div>
@endif

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
        @foreach ($departaments as $dep)
            <tr>
                <td>{{ $dep->id }}</td>
                <td>{{ $dep->name }}</td>
                <td>{{ $dep->description }}</td>
                <td>
                    <form action="{{ route('delete-departament', $dep->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this departament?')">Delete</button>
                        <button type="button" onclick="populateForm({{ $dep }})">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3 id="form-title">Add Departament</h3>
<form id="departament-form" action="{{ route('save-departament') }}" method="POST">
    @csrf
    <input type="hidden" name="id" id="form-id">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
    </div>
    <div>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br>
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('departament-form');
        form.reset();
    });

    function populateForm(departament) {
        document.getElementById('form-title').innerText = 'Edit Departament';
        document.getElementById('form-id').value = departament.id;
        document.getElementById('name').value = departament.name;
        document.getElementById('description').value = departament.description;
        document.getElementById('departament-form').action = "{{ route('update-departament') }}";
    }
</script>
