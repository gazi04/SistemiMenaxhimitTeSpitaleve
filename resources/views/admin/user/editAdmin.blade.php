<h1>edit admin page</h1>
<form id="departament-form" action="{{ route('edit-admin') }}" method="POST">
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
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $adminName }}" required><br>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ $adminEmail }}" required><br>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
