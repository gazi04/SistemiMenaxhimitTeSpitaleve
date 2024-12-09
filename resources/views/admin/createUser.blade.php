<h3 id="form-title">Create a new user</h3>
<form id="departament-form" action="{{ route('create-user') }}" method="POST">
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
