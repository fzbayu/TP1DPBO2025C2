from petshop import petshop # mengimpor kelas petshop dari petshop.py

# tampilkan menu untuk dipilih oleh user
print("Menu :")
print("1. Tambah Produk")
print("2. Tampilkan Produk")
print("3. Edit Produk")
print("4. Hapus Produk")
print("5. Cari Produk")
print("6. Keluar")

daftar_produk = [] # list untuk menyimpan objek produk

while True:
    try:
        while True:
            pilihan = int(input("\nPilih menu: "))  # input angka

            if pilihan == 6: # jika inputan 6 maka keluar program
                print("Keluar dari program!")
                break  

            elif pilihan == 1: # JIKA PILIHAN 1   
                n = int(input("Jumlah yang mau ditambahkan: ")) # input jumlah yang mau ditambahkan

                for i in range(n): # looping sebanyak inputan n
                    id = int(input("Masukkan ID: ")) # input id
                    nama_produk = input("Masukkan Nama: ") # input nama
                    kategori_produk = input("Masukkan Kategori: ") # input kategori
                    harga_produk = int(input("Masukkan Harga: ")) #input harga

                    produk = petshop() # membuat objek baru dari kelas petshop
                    produk.tambah(id, nama_produk, kategori_produk, harga_produk) # memanggil fungsi tambah pada class petshop
                    daftar_produk.append(produk) # menambahkan produk ke daftar

            elif pilihan == 2: # JIKA PILIHAN 2
                if not daftar_produk: # jika list kosong
                    print("Belum ada produk yang ditambahkan.")
                else:
                    print("\nDaftar Produk:")
                    for produk in daftar_produk: # tampilkan produk dengan memanggil fungsi tampilkan pada class petshop
                        produk.tampilkan()

            elif pilihan == 3: # JIKA PILIHAN 3
                id_edit = int(input("\nID produk yang mau diedit: ")) # input id yang mau diedit
                nama_edit = input("Masukkan Nama: ") # input nama baru
                kategori_edit = input("Masukkan Kategori: ") # input kategori baru
                harga_edit = int(input("Masukkan Harga: ")) # input harga baru
                petshop.edit(daftar_produk, id_edit, nama_edit, kategori_edit, harga_edit) # memanggil fungsi edit pada class petshop
                
            elif pilihan == 4: # JIKA PILIHAN 4
                id_hapus = int(input("\nID produk yang mau dihapus: ")) # input id yang mau dihapus
                petshop.hapus(daftar_produk, id_hapus) # memanggil fungsi hapus pada class petshop
            
            elif pilihan == 5:  # JIKA PILIHAN 5
                id_cari = int(input("\nID produk yang mau dicari: ")) # input id yang mau dicari
                petshop.cari(daftar_produk, id_cari) # memanggil fungsi cari pada class petshop
    
    except ValueError: # jika pilihan selain angka di atas maka tampilkan pesan
        print("Pilih angka dari 1 - 6")
