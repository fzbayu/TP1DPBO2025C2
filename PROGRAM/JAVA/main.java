import java.util.ArrayList; 
import java.util.Scanner; 

public class main {
    public static void main(String[] args){

        // variabel untuk jumlah inputan dan untuk looping
        int i, n = 0; 

        // variabel data untuk inputan sementara
        int id, harga_produk; 
        String nama_produk, kategori_produk;

        // menampilkan menu untuk user
        System.out.println("Menu :");
        System.out.println("1. Tambah Produk");
        System.out.println("2. Tampilkan Produk");
        System.out.println("3. Edit Produk");
        System.out.println("4. Hapus Produk");
        System.out.println("5. Cari Produk");
        System.out.println("6. Keluar");

        int pilihan; // variabel untuk angka pilihan user
        Scanner sc = new Scanner(System.in); // inputan user berupa angka 1-6 sesuai menu di atas
        ArrayList<petshop> list = new ArrayList<>(); // buat list untuk menyimpan produk

        do{ // looping selama inputan pilihan menu bukan 6
            System.out.println("\nPilihan Menu: ");
            pilihan = sc.nextInt();

            switch (pilihan){
                case 1:{ // JIKA PILIHAN 1
                    System.out.print("\nJumlah yang mau ditambahkan: ");
                    n = sc.nextInt(); // inputan untuk berapa jumlah barang yang ingin ditambahkan

                    for (i = 0; i < n; i++){
                        System.out.print("Masukkan ID: "); 
                        id = sc.nextInt(); // masukkan ID barang
                        sc.nextLine();
                        System.out.print("Masukkan Nama: "); 
                        nama_produk = sc.nextLine(); // masukkan nama barang
                        System.out.print("Masukkan Kategori: "); 
                        kategori_produk = sc.nextLine(); // masukkan kategori barang
                        System.out.print("Masukkan Harga: "); 
                        harga_produk = sc.nextInt(); // masukkan harga barang
                        petshop temp = new petshop(); // membuat objek produk baru
                        temp.tambah(id, nama_produk, kategori_produk, harga_produk); // menambahkan data ke objek `petshop` dengan memanggil fungsi tambah pada class
                        list.add(temp); // menambahkan objek ke dalam list
                    }
                    break;
                }
                case 2:{ // JIKA PILIHAN 2
                    System.out.println("\nDaftar produk dalam petshop:");
                    if (list.isEmpty()){ // cek apakah list kosong
                        System.out.println("Belum ada produk yang ditambahkan.");
                    }
                    else{ // jika tidak tampilkan semua
                        int nomor = 1; // untuk variabel nomor
                        for (petshop p : list) { // looping semua list
                            System.out.println(nomor + "."); // untuk nomor misal 1.
                            p.tampilkan(); // memanggil fungsi tampilkan pada class
                            nomor++; // iterasi variabel nomor agar angka terus bertambah
                        }
                    }
                    break;
                }
                case 3:{ // JIKA PILIHAN 3
                    System.out.print("\nID produk yang mau diedit: ");
                    id = sc.nextInt(); // input id yang mau diedit
                    sc.nextLine();
                    System.out.print("Masukkan Nama: ");
                    nama_produk = sc.nextLine(); // input nama baru
                    System.out.print("Masukkan Kategori: ");
                    kategori_produk = sc.nextLine(); // input kategori baru
                    System.out.print("Masukkan Harga: ");
                    harga_produk = sc.nextInt(); // input harga baru
                    sc.nextLine();
                    petshop.edit(list, id, nama_produk, kategori_produk, harga_produk); // memanggil fungsi edit pada class
                    break;
                }
                case 4:{ // JIKA PILIHAN 4
                    System.out.print("\nID produk yang mau dihapus: ");
                    id = sc.nextInt(); // input id yang mau dihapus
                    sc.nextLine();
                    petshop.hapus(list, id); // memanggil fungsi hapus pada class
                    break;
                }
                case 5:{ // JIKA PILIHAN 5
                    System.out.print("\nID produk yang mau dicari: ");
                    id = sc.nextInt(); // input id yang mau dicari
                    sc.nextLine();
                    petshop.cari(list, id); // memanggil fungsi cari pada class
                    break;
                }
                case 6 :{ // JIKA PILIHAN 6
                    System.out.print("Keluar Program!\n"); // tampilkan pesan keluar
                }
            }

        } while (pilihan != 6); // keluar program jika inputan adalah 6
    }
}
