#include <bits/stdc++.h>
#include "petshop.cpp"

using namespace std;

int main() {
    int n, pilihan, id, harga; 
    string nama, kategori;
    list<petshop> daftar_produk;

    cout << "\nMenu :\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Produk\n";
        cout << "3. Edit Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk\n";
        cout << "6. Keluar\n";

    do{
        cout << "Pilihan Menu: ";
        cin >> pilihan;

        switch (pilihan){
            case 1:{
                cout << "Jumlah yang mau ditambahkan: ";
                cin >> n;

                for (int i = 0; i < n; i++){

                    cout << "Masukkan ID, Nama, Kategori, Harga: ";
                    cin >> id >> nama >> kategori >> harga;

                    petshop temp;
                    temp.tambah(id, nama, kategori, harga);
                    daftar_produk.push_back(temp);
                }
                break;
            }

            case 2:{
                cout << "\nDaftar produk dalam petshop:\n";
                if (daftar_produk.empty()){
                    cout << "Belum ada produk yang ditambahkan.\n";
                } else {
                    int i = 1;
                    for (list<petshop>::iterator it = daftar_produk.begin(); it != daftar_produk.end(); it++){
                        cout << i << ". ";
                        it->tampilkan();
                        cout << '\n';
                        i++;
                    }
                }
                break;
            }
            
            case 3:{
                cout << "\nID produk yang mau diedit: ";
                cin >> id;
                cout << "Masukkan Nama, Kategori, Harga: ";
                cin >> nama >> kategori >> harga;
                    
                bool ditemukan = false;
                for (list<petshop>::iterator it = daftar_produk.begin(); it != daftar_produk.end(); it++){
                    if (it->get_id() == id){  
                        it->edit(id, nama, kategori, harga);
                        ditemukan = true;
                        break;
                        }
                    }
                if (ditemukan == false){
                    cout << "ID tidak ditemukan!\n";
                }
                break;
            }
                
            case 4:{
                cout << "\nID produk yang mau dihapus: ";
                cin >> id;
                bool ditemukan = false;
                for (list<petshop>::iterator it = daftar_produk.begin(); it != daftar_produk.end(); it++){
                    if (it->get_id() == id){  
                        it->hapus(id);
                        ditemukan = true;
                        break;
                        }
                    }
                if (ditemukan == false){
                    cout << "ID tidak ditemukan!\n";
                }
            }   
            
            case 5:{
                cout << "\nID produk yang mau dicari: ";
                cin >> id;
                bool ditemukan = false;
                for (list<petshop>::iterator it = daftar_produk.begin(); it != daftar_produk.end(); it++){
                    if (it->get_id() == id){  
                        it->cari(id);
                        ditemukan = true;
                        break;
                        }
                    }
                if (ditemukan == false){
                    cout << "ID tidak ditemukan!\n";
                }
                break;
            }      
        }
    } while (pilihan != 6);

    return 0;
}
