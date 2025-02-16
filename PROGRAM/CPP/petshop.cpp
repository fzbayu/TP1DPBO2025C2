#include <bits/stdc++.h>
#include <iostream>
#include <string>

using namespace std;

class petshop{
    private:
        int id;
        string nama_produk;
        string kategori_produk;
        int harga_produk;
    
    public:
        petshop(){
            this->id = 0;
            this->nama_produk = "";
            this->kategori_produk = "";
            this->harga_produk = 0;
        }

        petshop(int id, string nama_produk, string kategori_produk, int harga_produk){
            this->id = id;
            this->nama_produk = nama_produk;
            this->kategori_produk = kategori_produk;
            this-> harga_produk = harga_produk;
        }

        void tampilkan(){
            cout << "ID : " << get_id() << '\n';
            cout << "Nama : " << get_nama_produk() << '\n';
            cout << "Kategori : " << get_kategori_produk() << '\n';
            cout << "Harga : " << get_harga_produk() << '\n';
        }    

        void tambah(int id, string nama, string kategori, int harga){
            set_id(id);
            set_nama_produk(nama);
            set_kategori_produk(kategori);
            set_harga_produk(harga);
            cout << "Produk berhasil ditambahkan!" << '\n';
        }

        void edit(int id, string nama, string kategori, int harga){
            set_nama_produk(nama);
            set_kategori_produk(kategori);
            set_harga_produk(harga);
            cout << "Produk berhasil diperbarui!" << '\n';
        }

        void hapus(int id){
            set_id(0);
            set_nama_produk("");
            set_kategori_produk("");
            set_harga_produk(0);
            cout << "Produk berhasil dihapus!" << '\n'; 
        }

        void cari(int id){
            tampilkan();
            cout << "Produk berhasil ditemukan!" << '\n';
        }

        ~petshop(){
        }

    // getter
    int get_id(){
        return id; 
    }

    string get_nama_produk(){
        return nama_produk; 
    }

    string get_kategori_produk(){
        return kategori_produk; 
    }

    int get_harga_produk(){
        return harga_produk; 
    }

    // setter
    void set_id(int id){
        this->id = id;
    }

    void set_nama_produk(string nama_produk){
        this->nama_produk = nama_produk;
    }

    void set_kategori_produk(string kategori_produk){
        this->kategori_produk = kategori_produk;
    }

    void set_harga_produk(int harga_produk){
        this->harga_produk = harga_produk;
    }
};
