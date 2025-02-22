# Saya Faiz Bayu Erlangga dengan NIM 2311231 mengerjakan Tugas Praktikum 1 
# dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya 
# maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. 

class petshop:

    # ATRIBUT PRIVATE
    __id = 0
    __nama_produk = ""
    __kategori_produk = ""
    __harga_produk = 0

    # CONSTRUCTOR
    def __init__(self, id=0, nama_produk="", kategori_produk="", harga_produk=0):
        self.__id = id
        self.__nama_produk = nama_produk
        self.__kategori_produk = kategori_produk
        self.__harga_produk = harga_produk

    # GETTER
    def get_id(self):
        return self.__id

    def get_nama_produk(self):
        return self.__nama_produk

    def get_kategori_produk(self):
        return self.__kategori_produk

    def get_harga_produk(self):
        return self.__harga_produk

    # SETTER
    def set_id(self, id):
        self.__id = id

    def set_nama_produk(self, nama_produk):
        self.__nama_produk = nama_produk

    def set_kategori_produk(self, kategori_produk):
        self.__kategori_produk = kategori_produk

    def set_harga_produk(self, harga_produk):
        self.__harga_produk = harga_produk

    # Fungsi untuk tambahkan produk
    def tambah(self, id, nama_produk, kategori_produk, harga_produk):
        self.set_id(id)
        self.set_nama_produk(nama_produk)
        self.set_kategori_produk(kategori_produk)
        self.set_harga_produk(harga_produk)

    # Fungsi untuk tampilkan produk
    def tampilkan(self):
        print(f"ID: {self.__id}")
        print(f"Nama: {self.__nama_produk}")
        print(f"Kategori: {self.__kategori_produk}") 
        print(f"Harga: {self.__harga_produk}")

    # FUNGSI EDIT
    def edit(daftar_produk, id, nama_produk, kategori_produk, harga_produk):
        ketemu = 0 # menandai apakah produk ditemukan
        for produk in daftar_produk:
            if produk.get_id() == id: # jika id sama
                produk.set_nama_produk(nama_produk) # set nama baru
                produk.set_kategori_produk(kategori_produk) # set kategori baru
                produk.set_harga_produk(harga_produk) # set harga baru
                ketemu = 1 # tandai jika sudah ditemukan
                break
        if ketemu == 0:
            print("Produk dengan ID ", id, " tidak ditemukan!")


    # FUNGSI HAPUS
    def hapus(daftar_produk, id):
        ketemu = 0 # menandai apakah produk ditemukan
        for produk in daftar_produk:
            if produk.get_id() == id: # jika id sama
                daftar_produk.remove(produk) # menghapus produk menggunakan remove dari library
                print("Produk berhasil dihapus!")
                ketemu = 1 # tandai jika sudah ditemukan
                return
        
        if ketemu == 0:
            print("Produk dengan ID ", id, " tidak ditemukan!")


    # FUNGSI CARI
    def cari(daftar_produk, id):
        for produk in daftar_produk:
            if produk.get_id() == id: # jika id sama
                print("\nProduk ditemukan:")
                produk.tampilkan() # panggil fungsi untuk tampilkan
                return
        print("Produk dengan ID", id, "tidak ditemukan!")
