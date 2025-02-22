/*Saya Faiz Bayu Erlangga dengan NIM 2311231 mengerjakan Tugas Praktikum 1 
dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.*/ 

import java.util.ArrayList;

public class petshop{
    private int id;
    private String nama_produk;
    private String kategori_produk;
    private int harga_produk;
    
        // CONSTRUCTOR
        public petshop(){
            this.id = 0;
            this.nama_produk = "";
            this.kategori_produk = "";
            this.harga_produk = 0;
        }

        // CONSTRUCTOR dengan parameter
        public petshop(int id, String nama_produk, String kategori_produk, int harga_produk){
            this.id = id;
            this.nama_produk = nama_produk;
            this.kategori_produk = kategori_produk;
            this.harga_produk = harga_produk;
        }

        // GETTER
        public int get_id(){
            return id; 
        }
        public String get_nama_produk(){
            return this.nama_produk; 
        }
        public String get_kategori_produk(){
            return this.kategori_produk; 
        }
        public int get_harga_produk(){
            return this.harga_produk; 
        }

        // SETTER
        public void set_id(int id){
            this.id = id;
        }
        public void set_nama_produk(String nama_produk){
            this.nama_produk = nama_produk;
        }
        public void set_kategori_produk(String kategori_produk){
            this.kategori_produk = kategori_produk;
        }
        public void set_harga_produk(int harga_produk){
            this.harga_produk = harga_produk;
        }

        // Fungsi untuk tampilkan produk
        public void tampilkan(){
            System.out.println("ID : " + get_id());
            System.out.println("Nama : " + get_nama_produk());
            System.out.println("Kategori : " + get_kategori_produk());
            System.out.println("Harga : " + get_harga_produk());
        }    

        // Fungsi untuk tambahkan produk
        public void tambah(int id, String nama, String kategori, int harga){
            set_id(id);
            set_nama_produk(nama);
            set_kategori_produk(kategori);
            set_harga_produk(harga);
            System.out.println("Produk berhasil ditambahkan!");
        }

        // Fungsi untuk edit produk
        public static void edit(ArrayList<petshop> list, int id, String nama, String kategori, int harga) {
            int ketemu = 0; // untuk penanda jika id ketemu
            for (petshop p : list) { // looping list
                if (p.get_id() == id) { // jika id sama
                    p.set_nama_produk(nama); // set nama baru
                    p.set_kategori_produk(kategori); // set kategori baru
                    p.set_harga_produk(harga); // set produk baru
                    System.out.println("Produk berhasil diperbarui!");
                    ketemu = 1;
                    return; 
                }
            }   
            if(ketemu == 0){
                System.out.println("Produk dengan ID " + id + " tidak ditemukan!");
            }
        }
        
        // Fungsi untuk hapus produk
        public static void hapus(ArrayList<petshop> list, int id) {
            int ketemu = 0; // untuk penanda jika id ketemu
            for (petshop p : list) { // looping list
                if (p.get_id() == id) { // jika id sama
                    list.remove(p); // fungsi untuk menghapus dari library java
                    ketemu = 1; // set ketemu menjadi 
                    System.out.println("Produk berhasil dihapus!");
                    return;
                }
            }
            if(ketemu == 0){
                System.out.println("Produk dengan ID " + id + " tidak ditemukan!");
            }
        }

        // Fungsi untuk cari produk
        public static void cari(ArrayList<petshop> list, int id){
            int ketemu = 0; // untuk penanda jika id ketemu
            for (petshop p : list) { // looping list
                if (p.get_id() == id) { // jika id sama
                    p.tampilkan(); // tampilkan
                    System.out.println("Produk berhasil ditemukan!");
                    ketemu = 1; // set ketemu menjadi 1
                    return; 
                }
            }
            if(ketemu == 0){
                System.out.println("Produk dengan ID " + id + " tidak ditemukan!");
            }
        }  
};

