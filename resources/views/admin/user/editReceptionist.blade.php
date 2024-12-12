<h1>edit receptionist page</h1>
<form id="departament-form" action="{{ route('edit-receptionist') }}" method="POST">
    @csrf
    <input type="hidden" name="id" id="form-id">
    <div>
        <label for="personal_id">Personal ID:</label>
        <input type="text" id="personal_id" name="personal_id" value="blaa" required><br>
        @error('personal_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $receptionistName }}" required><br>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ $receptionistEmail }}" required><br>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
