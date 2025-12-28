# 📚 Library Borrowing Tracker (LMS)

> **Sistem Informasi Manajemen Perpustakaan Berbasis Web (Native PHP)**


<img width="1892" height="903" alt="image" src="https://github.com/user-attachments/assets/25fa96f9-2b9b-49e0-89db-b0ffca331482" />


## 📖 Tentang Proyek

]**Library Borrowing Tracker** adalah aplikasi web yang dirancang untuk mendigitalisasi proses manual di perpustakaan[cite: 11, 15]. [cite_start]Sistem ini bertujuan untuk meningkatkan efisiensi pencatatan buku, mempermudah pelacakan peminjaman, dan memberikan transparansi ketersediaan buku bagi anggota secara *real-time*[cite: 16].

Dikembangkan menggunakan **Native PHP** untuk memahami siklus hidup permintaan HTTP (*Request Lifecycle*) dan manajemen database secara mendalam tanpa ketergantungan pada framework[cite: 149, 150].

---

## 👥 Anggota Kelompok 1

Proyek ini disusun sebagai Laporan Akhir Proyek Basis Data oleh:

| NIM | Nama Mahasiswa | Peran |
| :--- | :--- | :--- |
| **24/538363/PA/22841** | **Davi Ezra Syandana** | Fullstack Developer |
| **24/537757/PA/22793** | **Andra Kusnaedi Ilyaz** | Database Engineer |
[cite_start][cite: 8]

---

## 🚀 Fitur Utama

[cite_start]Sistem ini menerapkan **Role-Based Access Control (RBAC)** dengan dua hak akses[cite: 18]:

### 👨‍💼 Administrator (Staff)
* [cite_start]**Login Aman:** Verifikasi password (Plain text/Hash ready)[cite: 270].
* [cite_start]**Dashboard CRUD:** Mengelola data buku (Tambah, Edit, Hapus)[cite: 31].
* **Manajemen Status:** Mengubah status buku (*Available* / *Borrowed*).
* [cite_start]**Monitoring:** Melihat daftar lengkap buku beserta ID dan Penulis dalam bentuk tabel[cite: 333].

### 🙋‍♂️ User (Anggota)
* [cite_start]**Katalog Visual:** Melihat daftar buku dalam tampilan *Grid Card* yang responsif[cite: 311].
* [cite_start]**Pencarian Pintar:** Mencari buku berdasarkan Judul atau Penulis[cite: 24, 329].
* [cite_start]**Cek Ketersediaan:** Indikator visual (Badge) untuk status *Available* atau *Borrowed*[cite: 313].
* [cite_start]**Navigasi Intuitif:** Landing page modern dengan *User Experience* (UX) yang ramah[cite: 243].

---

## 🛠️ Teknologi yang Digunakan

* [cite_start]**Backend:** PHP (Native/Procedural Style)[cite: 148].
* [cite_start]**Database:** MySQL (Relational DB, 3rd Normal Form)[cite: 140].
* [cite_start]**Frontend:** HTML5, CSS3 (Custom Styles, Flexbox & Grid, No Bootstrap)[cite: 244].
* **Server:** Apache (via XAMPP/Laragon).

---

## 💾 Desain Database (ERD)

[cite_start]Sistem ini menggunakan struktur database relasional yang telah dinormalisasi hingga **3NF** untuk menangani integritas data[cite: 140].


[cite_start]*Tabel Utama:* `Users`, `Books`, `Loans` (Future impl.), `Staff`[cite: 91].

---

## ⚙️ Cara Instalasi & Menjalankan (Setup)

Ikuti langkah ini untuk menjalankan proyek di komputer lokal:

### 1. Persiapan Lingkungan
Pastikan kamu sudah menginstal **XAMPP** atau aplikasi server lokal sejenis.

### 2. Clone Repository
Buka terminal/git bash di folder `htdocs` kamu:
```bash
git clone [https://github.com/username-kamu/library-borrowing-tracker.git](https://github.com/username-kamu/library-borrowing-tracker.git)
```

### 3. Setup Database
Agar aplikasi dapat berjalan, kamu perlu menyiapkan basis data sesuai konfigurasi berikut:

1.  Buka **phpMyAdmin** (`http://localhost/phpmyadmin`).
2.  [cite_start]Buat database baru dengan nama: `libraryborrowingtracker`[cite: 165].
3.  Klik menu **Import**, lalu pilih file `.sql` database (sediakan file hasil ekspor dari phpMyAdmin kamu).
4.  Klik **Go** untuk migrasi tabel dan data dummy.

### 4. Konfigurasi Koneksi
[cite_start]File `connection.php` berfungsi sebagai jembatan antara aplikasi PHP dan server database MySQL menggunakan ekstensi `mysqli`[cite: 153, 157, 158].

Jika kamu menggunakan pengaturan default XAMPP, tidak perlu ada perubahan. Namun, jika ada password pada database lokalmu, sesuaikan baris berikut di `connection.php`:

```php
$host = "localhost";
$user = "root";      // Default XAMPP user
$pass = "";          // Isi jika database memiliki password
$db   = "libraryborrowingtracker"; // Jangan diubah [cite: 165]

$conn = mysqli_connect($host, $user, $pass, $db);
```

### 5. Jalankan Aplikasi
Setelah konfigurasi database selesai, buka browser favoritmu (Chrome, Edge, atau Firefox) dan akses alamat lokal berikut:

`http://localhost/library-borrowing-tracker/`

*(Catatan: Sesuaikan bagian `library-borrowing-tracker` dengan nama folder proyek yang kamu simpan di dalam folder `htdocs`)*.

---

## 🔐 Akun Demo

Gunakan kredensial berikut untuk masuk dan menguji fitur sistem berdasarkan hak akses yang berbeda:

| Role | Username | Password | Deskripsi Hak Akses |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin` | `admin123` | **Full Access**: Mengelola data buku (CRUD), mengubah status peminjaman, dan manajemen user. |
| **User** | `davi` | `davi123` | **Limited Access**: Melihat katalog buku, menggunakan fitur pencarian, dan cek ketersediaan stok. |

> **Info Penting**: 
> Password saat ini disimpan dalam bentuk *plain-text* (belum dienkripsi) untuk keperluan demonstrasi dan pembelajaran alur data dasar. Pada lingkungan produksi, password wajib di-hash menggunakan `password_hash()`.
