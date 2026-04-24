# AAI Profile - Sistem Profil Perusahaan

Sistem profil perusahaan berbasis Laravel untuk manajemen konten website perusahaan lengkap.

## ✨ Fitur Yang Tersedia

### 🌐 Halaman Publik (Landing Page)
- **Halaman Utama** - Homepage perusahaan
- **Tentang Kami** - Profil dan misi perusahaan
- **Layanan** - Daftar dan detail layanan perusahaan dengan slug
- **Proyek** - Daftar dan detail portofolio proyek
- **Klien** - Daftar klien perusahaan
- **Peralatan** - Daftar peralatan perusahaan
- **Blog / Artikel** - Publikasi artikel berita dan informasi
- **Komentar** - Pengunjung dapat memberikan komentar pada artikel
- **Form Kontak** - Formulir pengiriman pesan
- **Harga / Paket** - Informasi harga dan paket layanan
- **FAQ** - Halaman FAQ
- **Lowongan Pekerjaan** - Daftar lowongan dan formulir pendaftaran kerja
- **Kebijakan Perusahaan**:
  - Pengendalian Dampak Lingkungan
  - Aturan Berkendara Aman
  - Audit K3LL
  - Kesehatan Karyawan
  - Kebijakan Rokok, Alkohol & Narkoba

### 🔐 Sistem Autentikasi
- Login Admin
- Logout
- Middleware autentikasi untuk akses dashboard

### 📊 Dashboard Admin
- **Dashboard Utama** - Statistik ringkas:
  - Total Pengguna
  - Total Proyek
  - Total Klien
  - Total Artikel
  - Kontak Terbaru
  - Proyek Terbaru
  - Artikel Terbaru

### 📝 Manajemen Konten (CMS):
- **Manajemen Pengguna** (CRUD)
- **Manajemen Kategori** (CRUD)
- **Manajemen Layanan** (CRUD)
- **Manajemen Proyek** (CRUD)
- **Manajemen Klien** (CRUD)
- **Manajemen Artikel / Blog** (CRUD)
- **Manajemen Komentar** (CRUD)
- **Manajemen Kontak Masuk** (CRUD)
- **Manajemen Slider** (CRUD)
- **Manajemen Peralatan** (CRUD)
- **Manajemen Sertifikasi** (CRUD)
- **Manajemen Lowongan Pekerjaan** (CRUD)
- **Manajemen Lamaran Pekerjaan** (Lihat dan Hapus)

## 🛠 Teknologi
- Laravel Framework
- MySQL Database
- Blade Templating Engine
- MVC Architecture

## ⚙️ Instalasi

```bash
# Clone repository
git clone <repository-url>

# Masuk direktori
cd AAI-Profile

# Install dependensi
composer install

# Copy environment file
cp .env.example .env

# Generate key
php artisan key:generate

# Konfigurasi database di file .env

# Jalankan migrasi
php artisan migrate

# Jalankan server
php artisan serve
```

## 📄 Lisensi
Sistem ini dikembangkan menggunakan Laravel Framework yang berlisensi [MIT license](https://opensource.org/licenses/MIT).
