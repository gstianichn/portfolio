# Web Portofolio & Layanan Freelance — Cantika Gustiani (`gstianichn`)

Website portofolio personal dan *showcase* layanan jasa pembuatan website freelance untuk **Cantika Gustiani** (*Informatics Engineering Student* UNPI Cianjur & *Full-Stack Web Developer*).

Mengusung konsep desain **Warm Sage & Glass** (*Warm Cream, Sage Emerald, Soft Terracotta, dan Glassmorphism*).

---

## Fitur Utama
1. **Sticky Glassmorphism Navbar** — Navigasi responsif dengan menu mobile interaktif dan tombol CTA **Unduh CV**.
2. **Hero Section Interaktif** — Status badge *Open for Projects & Opportunities*, animasi ketik **Typed.js**, tombol CTA, dan kartu profil modern.
3. **Tentang Saya & Tech Stack** — Ringkasan profil akademik/profesional serta pengelompokan teknologi (*Languages & Frameworks* dan *Database, Cloud & Integration*).
4. **Featured Projects + Filter Kategori** — Menampilkan proyek (*ResepKu*, *Travelku*, *Hotel Booking System*, *Sistem Manajemen Kost*) dengan filter interaktif (*Semua*, *Web App*, *AI Integration*) menggunakan **Alpine.js**.
5. **Paket Harga Jasa Freelance (Pricing Cards)** — 3 pilihan paket (*Paket Starter*, *Paket PRO [Paling Populer]*, dan *Paket CUSTOM*). Klik tombol **"Pilih Paket / Konsultasi"** otomatis memilih paket pada formulir kontak.
6. **Unduh CV (`GET /download-cv`)** — Mengunduh file PDF CV dari `storage/app/public/cv/CV-Cantika-Gustiani.pdf`.
7. **Form Kontak Langsung (`POST /contact`)** — Mengirim pesan ke `gstianichan.dev@gmail.com` menggunakan Laravel Mail (`ContactMail`) lengkap dengan validasi server-side, sanitasi XSS, *honeypot* anti-spam, dan *rate limiting* (`throttle:5,1`).

---

## Cara Menjalankan di Lokal

1. **Instal Dependensi PHP & Frontend:**
   ```bash
   composer install
   npm.cmd install
   ```

2. **Build Aset Frontend (Vite):**
   ```bash
   npm.cmd run build
   ```

3. **Jalankan Server Laravel:**
   ```bash
   php artisan serve
   ```
   Buka `http://localhost:8000` di browser.

---

## Kustomisasi Data & Aset

* **Ubah Data Profil, Proyek, atau Harga Paket:**
  Edit file [`config/portfolio.php`](config/portfolio.php).
* **Ganti File CV Asli:**
  Ganti file PDF di `storage/app/public/cv/CV-Cantika-Gustiani.pdf` (atau simpan di `public/cv/CV-Cantika-Gustiani.pdf`).
* **Tambahkan Foto Profil & Screenshot Proyek:**
  * Foto profil: Simpan di `public/images/profile-cantika.webp` (atau `.jpg`).
  * Screenshot proyek: Simpan di `public/images/projects/resepku.webp`, `travelku.webp`, `hotel-booking.webp`, dan `manajemen-kost.webp`.
* **Konfigurasi SMTP Gmail untuk Production (`.env`):**
  ```env
  MAIL_MAILER=smtp
  MAIL_HOST=smtp.gmail.com
  MAIL_PORT=587
  MAIL_USERNAME=gstianichan.dev@gmail.com
  MAIL_PASSWORD="app-password-gmail-anda"
  MAIL_ENCRYPTION=tls
  MAIL_FROM_ADDRESS="gstianichan.dev@gmail.com"
  MAIL_FROM_NAME="Portofolio Cantika Gustiani"
  MAIL_TO_ADDRESS="gstianichan.dev@gmail.com"
  ```

---

## Pengujian Otomatis (PHPUnit)

Jalankan seluruh *Feature Test* (uji halaman utama, unduh CV, kirim email kontak, validasi input, dan blokir spam honeypot):

```bash
php artisan test
```
