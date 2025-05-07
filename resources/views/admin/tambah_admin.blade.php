<!-- resources/views/admin/tambah_admin.blade.php -->

<h2>Tambah Admin Baru</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.tambah') }}" method="POST">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Konfirmasi Password:</label>
    <input type="password" name="password_confirmation" required><br>

    <button type="submit">Tambah Admin</button>
</form>
