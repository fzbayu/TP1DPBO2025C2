<?php
include 'petshop.php'; // menyertakan file petshop.php
session_start();

// dalam formulir HTML, $_POST untuk menyimpan data yang dikirim melalui metode POST. 
// contohnya fungsi isset($_POST['nama']) akan mengembalikan true jika ada input dengan name="nama" yang dikirim melalui formulir, dan mengembalikan false jika tidak ada.

// jika tombol reset ditekan maka refresh session
if (isset($_GET['reset'])) {
session_destroy();
header("Location: ".$_SERVER['PHP_SELF']); 
exit();
}
    
// menggunakan session untuk menyimpan data
if (!isset($_SESSION['daftar_produk'])) {
    $_SESSION['daftar_produk'] = [];
}

// menggunakan referensi untuk manipulasi data
$daftar_produk = &$_SESSION['daftar_produk'];

// Tambah Produk
if (isset($_POST['tambah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    
    // untuk upload Foto
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = "upload/" . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/" . basename($_FILES['foto']['name']));;
    } else {
        $foto = ''; // isi kosong jika tidak ada foto
    }
    petshop::tambah($daftar_produk, $id, $nama, $kategori, $harga, $foto);
}

// Edit Produk
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // untuk upload Foto
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = "upload/" . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/" . basename($_FILES['foto']['name']));
    } else {
        $foto = ''; // isi kosong jika tidak ada foto baru
    }
    petshop::edit($daftar_produk, $id, $nama, $kategori, $harga, $foto);
}

// Hapus Produk
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    petshop::hapus($daftar_produk, $id);
}

// Cari Produk
if (isset($_POST['cari'])) {
    $id = $_POST['id'];
    petshop::cari($daftar_produk, $id);
}

// Tampilkan produk
$tampilkan_produk = isset($_POST['tampilkan']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Petshop Management</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST" enctype="multipart/form-data">
        ID: <input type="number" name="id" required><br>
        Nama: <input type="text" name="nama" required><br>
        Kategori: <input type="text" name="kategori" required><br>
        Harga: <input type="number" name="harga" required><br>
        Foto: <input type="file" name="foto" required><br>
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <h2>Edit Produk</h2>
    <form method="POST" enctype="multipart/form-data">
        ID Produk yang Ingin Diedit: <input type="number" name="id" required><br>
        Nama Baru: <input type="text" name="nama" required><br>
        Kategori Baru: <input type="text" name="kategori" required><br>
        Harga Baru: <input type="number" name="harga" required><br>
        Foto Baru: <input type="file" name="foto"><br>
        <button type="submit" name="edit">Edit</button>
    </form>

    <h2>Hapus Produk</h2>
    <form method="POST">
        ID Produk yang Ingin Dihapus: <input type="number" name="id" required><br>
        <button type="submit" name="hapus">Hapus</button>
    </form>

    <h2>Cari Produk</h2>
    <form method="POST">
        ID Produk yang Ingin Dicari: <input type="number" name="id" required><br>
        <button type="submit" name="cari">Cari</button>
    </form>

    <h2>Tampilkan Produk</h2>
    <form method="POST">
        <button type="submit" name="tampilkan">Tampilkan Produk</button>
    </form>

    <form method="GET">
        <button type="submit" name="reset" value="1">Refresh Session</button>
        </form>

    <?php if ($tampilkan_produk) { ?>
    <h2>Daftar produk dalam petshop</h2>
    <?php if (!empty($daftar_produk)) { ?>
        <?php foreach ($daftar_produk as $produk) { ?>
            <p><?php $produk->tampilkan(); ?></p>
        <?php } ?>
    <?php } else { ?>
        <p>Belum ada produk yang ditambahkan.</p>
    <?php } ?>
<?php } ?> 
</body>
</html>