<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body>

<h2>Tambah Kategori</h2>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama Kategori">

    <button type="submit">
        Simpan
    </button>

</form>

</body>
</html>