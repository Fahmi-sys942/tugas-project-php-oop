# MVC Application - Website Manajemen Data Mahasiswa & Products

Website PHP dengan arsitektur MVC (Model-View-Controller) yang dilengkapi dengan sistem login admin dan user, serta fitur CRUD untuk data Mahasiswa dan Products.

## Fitur Utama

### 1. Sistem Autentikasi
- Login untuk Admin dan User
- Session management
- Role-based access control

### 2. Manajemen Mahasiswa
- Create: Semua user bisa menambah data mahasiswa
- Read: Melihat daftar mahasiswa
- Update: Hanya admin yang bisa mengedit (termasuk upload foto)
- Delete: Hanya admin yang bisa menghapus
- Upload foto mahasiswa
- Data: NIM, Nama, Jurusan, Foto, Alamat

### 3. Manajemen Products
- Create: Semua user bisa menambah data products
- Read: Melihat daftar products dengan fitur search
- Update: Hanya admin yang bisa mengedit
- Delete: Hanya admin yang bisa menghapus
- Data: Nama Product, Harga, Created At
- **Fitur Search**: Pencarian berdasarkan nama product

### 4. Dashboard
- Statistik total mahasiswa dan products
- Quick actions untuk akses cepat
- Informasi hak akses user

## Struktur Folder

```
mvc-app/
├── index.php                  # Front Controller (Router)
├── database.sql              # File SQL Database
├── config/
│   ├── database.php         # Konfigurasi database
│   └── app.php              # Konfigurasi aplikasi & helper functions
├── models/
│   ├── User.php             # Model untuk users
│   ├── Mahasiswa.php        # Model untuk mahasiswa
│   └── Product.php          # Model untuk products
├── controllers/
│   ├── AuthController.php   # Controller autentikasi
│   ├── HomeController.php   # Controller home/dashboard
│   ├── MahasiswaController.php  # Controller mahasiswa
│   └── ProductController.php    # Controller products
├── views/
│   ├── layouts/
│   │   ├── header.php       # Layout header & navbar
│   │   └── footer.php       # Layout footer
│   ├── auth/
│   │   └── login.php        # Halaman login
│   ├── home.php             # Halaman dashboard
│   ├── mahasiswa/
│   │   ├── index.php        # List mahasiswa
│   │   ├── create.php       # Form tambah mahasiswa
│   │   └── edit.php         # Form edit mahasiswa
│   └── products/
│       ├── index.php        # List products (dengan search)
│       ├── create.php       # Form tambah product
│       └── edit.php         # Form edit product
└── public/
    └── uploads/             # Folder untuk upload foto

```

## Instalasi

### 1. Persiapan Database

```sql
-- Import database.sql ke MySQL
-- Atau jalankan perintah berikut:

mysql -u root -p < database.sql
```

### 2. Konfigurasi Database

Edit file `config/database.php` sesuai dengan konfigurasi MySQL Anda:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvc_app');
```

### 3. Setup Folder Upload

Pastikan folder `public/uploads/` memiliki permission write:

```bash
chmod 777 public/uploads/
```

### 4. Akses Aplikasi

Buka browser dan akses:
```
http://localhost/mvc-app/
```

## Akun Default

### Admin
- Username: `admin`
- Password: `admin123`
- Hak Akses: Full access (Create, Read, Update, Delete)

### User
- Username: `user`
- Password: `user123`
- Hak Akses: Create & Read only

## Arsitektur MVC

### Model (models/)
Bertanggung jawab untuk:
- Interaksi dengan database
- Business logic
- Data validation

### View (views/)
Bertanggung jawab untuk:
- Menampilkan data ke user
- User interface
- Form input

### Controller (controllers/)
Bertanggung jawab untuk:
- Menerima request dari user
- Memanggil model untuk memproses data
- Mengirim data ke view

### Front Controller (index.php)
- Routing semua request
- Loading semua dependencies
- Menentukan controller mana yang harus dipanggil

## Teknologi yang Digunakan

- **Backend**: PHP 7.4+ (Native, no framework)
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **CSS Framework**: Bootstrap 5.3
- **Icons**: Bootstrap Icons
- **Architecture**: MVC Pattern

## Fitur Keamanan

1. **Password Hashing**: Menggunakan `password_hash()` dan `password_verify()`
2. **Session Management**: Secure session handling
3. **SQL Injection Prevention**: Prepared statements dengan MySQLi
4. **XSS Prevention**: `htmlspecialchars()` pada output
5. **File Upload Validation**: Validasi tipe file dan size
6. **Role-based Access Control**: Admin & User roles

## Role & Permissions

| Fitur | Admin | User |
|-------|-------|------|
| Lihat Dashboard | ✅ | ✅ |
| Lihat Data Mahasiswa | ✅ | ✅ |
| Tambah Mahasiswa | ✅ | ✅ |
| Edit Mahasiswa | ✅ | ❌ |
| Hapus Mahasiswa | ✅ | ❌ |
| Lihat Products | ✅ | ✅ |
| Tambah Products | ✅ | ✅ |
| Edit Products | ✅ | ❌ |
| Hapus Products | ✅ | ❌ |
| Search Products | ✅ | ✅ |

## Navigasi Menu

Menu utama tersedia di navbar:
- **Home**: Dashboard dengan statistik
- **Mahasiswa**: Manajemen data mahasiswa
- **Products**: Manajemen data products dengan fitur search
- **User Dropdown**: Logout

## Cara Penggunaan

### Menambah Mahasiswa
1. Klik menu "Mahasiswa"
2. Klik tombol "Tambah Mahasiswa"
3. Isi form (NIM, Nama, Jurusan, Upload Foto, Alamat)
4. Klik "Simpan"

### Menambah Product
1. Klik menu "Products"
2. Klik tombol "Tambah Product"
3. Isi form (Nama Product, Harga)
4. Klik "Simpan"

### Search Product
1. Klik menu "Products"
2. Masukkan kata kunci di kolom pencarian
3. Klik tombol "Cari"

### Edit/Hapus (Admin Only)
1. Pada tabel data, klik tombol Edit (kuning) atau Hapus (merah)
2. Untuk hapus, akan muncul konfirmasi terlebih dahulu

## Troubleshooting

### Error: Connection failed
- Pastikan MySQL server running
- Cek konfigurasi di `config/database.php`
- Pastikan database sudah di-import

### Upload foto tidak berfungsi
- Cek permission folder `public/uploads/` (chmod 777)
- Pastikan file yang diupload adalah gambar (JPG, PNG, GIF)
- Cek max upload size di php.ini

### Session error
- Pastikan session_start() dipanggil
- Cek folder temporary PHP memiliki write permission

## Pengembangan Selanjutnya

Fitur yang bisa ditambahkan:
- [ ] Pagination untuk tabel
- [ ] Export data ke Excel/PDF
- [ ] Multiple image upload
- [ ] Email notification
- [ ] Forget password functionality
- [ ] User profile management
- [ ] Advanced search & filter
- [ ] Dashboard analytics/charts

## Credits

Dibuat dengan:
- PHP Native
- Bootstrap 5
- Bootstrap Icons
- Love ❤️

---

**Catatan**: Aplikasi ini dibuat untuk tujuan pembelajaran. Untuk production, disarankan menggunakan framework seperti Laravel, CodeIgniter, atau Symfony.
