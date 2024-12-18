<h3 id="form-title">Create a new admin</h3>
<form id="departament-form" action="{{ route('create-admin') }}" method="POST">
    @csrf
    <input type="hidden" name="id" id="form-id">
    <div>
        <label for="personal_id">Personal ID:</label>
        <input type="text" id="personal_id" name="personal_id" value="{{ old('personal_id') }}" required><br>
        @error('personal_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required><br>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" required><br>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
