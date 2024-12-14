<h1>edit doctor page</h1>
<form id="departament-form" action="{{ route('edit-doctor') }}" method="POST">
    @csrf
    <input type="hidden" name="id" id="form-id" value="{{ $id }}">
    <div>
        <label for="personal_id">Personal ID:</label>
        <input type="text" id="personal_id" name="personal_id" value="{{ $personal_id }}" required><br>
        @error('personal_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="first_name">Name:</label>
        <input type="text" id="first_name" name="first_name" value="{{ $doctorName }}" required><br>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="last_name">Lastname:</label>
        <input type="text" id="last_name" name="last_name" value="{{ $doctorLastName }}" required><br>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ $phoneNumber }}" required><br>
        @error('phoneNumber')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ $doctorEmail }}" required><br>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="departaments">Departament:</label>
        <select name="departament_id">
            <option value="">-- Select Departament --</option>
            @foreach ($departaments as $departament)
                <option value="{{ $departament['id'] }}" {{ $departament_id == $departament['id']? 'selected' : '' }}>{{ $departament['name'] }}</option>
            @endforeach
        </select>
        @error('departament_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
