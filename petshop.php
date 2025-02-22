<?php
    // ATRIBUT PRIVATE
    class petshop{
        private $id = 0;
        private $nama_produk = '';
        private $kategori_produk = '';
        private $harga_produk = 0;
        private $foto = '';

    // CONSTRUCTOR
    public function __construct($id= 0, $nama_produk = '', $kategori_produk = '', $harga_produk=0, $foto = ''){
        $this->id = $id;
        $this->nama_produk = $nama_produk;
        $this->kategori_produk = $kategori_produk;
        $this->harga_produk = $harga_produk;
        $this->foto = $foto;
    }

    // GETTER
    public function get_id(){
        return $this->id;
    }
    public function get_nama_produk(){
        return $this->nama_produk;
    }
    public function get_kategori_produk(){
        return $this->kategori_produk;
    }
    public function get_harga_produk(){
        return $this->harga_produk;
    }
    public function get_foto() {
        return $this->foto;
    }
    
    // SETTER
    public function set_id($id){
        $this->id = $id;
    }
    public function set_nama_produk($nama_produk){
        $this->nama_produk = $nama_produk;
    }
    public function set_kategori_produk($kategori_produk){
        $this->kategori_produk = $kategori_produk;
    }
    public function set_harga_produk($harga_produk){
        $this->harga_produk = $harga_produk;
    }
    public function set_foto($foto) {
        $this->foto = $foto;
    }

    // Fungsi untuk tampilkan produk
    public function tampilkan(){
        echo "ID: " . $this->id . "<br>";
        echo "Nama: " . $this->nama_produk . "<br>";
        echo "Kategori: " . $this->kategori_produk . "<br>";
        echo "Harga: " . $this->harga_produk . "<br>";
        echo "Foto: <img src='" . $this->foto . "' width='100'><br>";
    }
      
    // Fungsi untuk tambahkan produk
    public static function tambah(&$list, $id, $nama, $kategori, $harga, $foto) {
        $produk = new petshop(); // membuat objek 
        $produk->set_id($id); // set nama
        $produk->set_nama_produk($nama); // set nama
        $produk->set_kategori_produk($kategori); // set kategoi
        $produk->set_harga_produk($harga); // set harga
        $produk->set_foto($foto); // upload foto
        $list[] = $produk; // tambahkan ke daftar
        echo "Produk berhasil ditambahkan!<br>";
    }

    // Fungsi untuk edit produk
    public static function edit(&$list, $id, $nama, $kategori, $harga, $foto) {
        foreach ($list as &$p) { // looping list
            if ($p->get_id() == $id) { // jika id ditemukan
                $p->set_nama_produk($nama); // set nama baru
                $p->set_kategori_produk($kategori); // set kategori baru
                $p->set_harga_produk($harga); // set harga baru
                $p->set_foto($foto); // upload foto baru
                echo "Produk berhasil diperbarui!<br>";
                return;
            }
        }
        echo "Produk dengan ID $id tidak ditemukan!<br>";
    }

    // Fungsi untuk hapus produk
    public static function hapus(&$list, $id) {
        foreach ($list as $key => $p) { // looping list 
            if ($p->get_id() == $id) { // jika id ditemukan
                unset($list[$key]); // hapus menggunakan library dari php 
                echo "Produk berhasil dihapus!<br>";
                return;
            }
        }
        echo "Produk dengan ID $id tidak ditemukan!<br>";
    }

    // Fungsi untuk cari produk
    public static function cari($list, $id) {
        foreach ($list as $p) { // looping list 
            if ($p->get_id() == $id) { // jika id ditemukan
                $p->tampilkan(); // panggil fungsi tampilkan
                echo "Produk berhasil ditemukan!<br>";
                return;
            }
        }
        echo "Produk dengan ID $id tidak ditemukan!<br>";
    }
}
?>