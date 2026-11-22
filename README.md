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

Jalankan seluruh *Feature Test* (uji halaman utama, unduh CV, kirim email kontak, validasi input, blokir spam honeypot, serta export statis GitHub Pages):

```bash
php artisan test
```

---

## Cara Deploy ke GitHub Pages (Menggunakan Branch `deploy`)

Proyek ini sudah dilengkapi **Static Site Exporter** (`php artisan portfolio:export-static`) dan **GitHub Actions Workflow** (`.github/workflows/deploy-pages.yml`) agar Anda bisa men-*deploy* ke **`https://gstianichn.github.io`** menggunakan metode **Deploy from a branch (`deploy`)**.

### Langkah 1: Buat Repository & Push Source Code ke Branch `main`
1. Buat repository publik di GitHub dengan nama **`gstianichn.github.io`**.
2. Jalankan perintah berikut di terminal proyek (`d:\laravel\portofolio`):
   ```bash
   git init
   git add .
   git commit -m "feat: initial web portfolio Cantika Gustiani"
   git branch -M main
   git remote add origin https://github.com/gstianichn/gstianichn.github.io.git
   git push -u origin main
   ```

### Langkah 2: Aktifkan Izin Workflow & Branch `deploy` di GitHub
1. Buka repository di GitHub → **Settings → Actions → General** → bagian *Workflow permissions*, pilih **Read and write permissions** lalu klik **Save**.
2. Tunggu 1–2 menit hingga workflow **Deploy Portfolio to GitHub Pages (branch deploy)** di tab **Actions** selesai (centang hijau). Workflow ini otomatis membuat dan mengisi branch **`deploy`** dengan file statis (`index.html`, `build/`, `images/`, `cv/`).
3. Buka **Settings → Pages → Build and deployment**:
   - **Source:** Pilih **Deploy from a branch**
   - **Branch:** Pilih **`deploy`** dan folder **`/ (root)`**, lalu klik **Save**.
4. Website Anda akan langsung aktif di **`https://gstianichn.github.io`**.

### Langkah 3 (Opsional tapi Disarankan): Aktifkan Pengiriman Email Form Kontak
Agar pesan dari formulir kontak di GitHub Pages langsung masuk ke inbox `gstianichan.dev@gmail.com` tanpa membuka aplikasi email:
1. Kunjungi [web3forms.com](https://web3forms.com/), masukkan `gstianichan.dev@gmail.com`, lalu salin **Access Key** yang dikirim ke email Anda.
2. Di repository GitHub, buka **Settings → Secrets and variables → Actions → New repository secret**:
   - **Name:** `WEB3FORMS_ACCESS_KEY`
   - **Secret:** *(tempel Access Key dari Web3Forms)*
3. Jalankan ulang workflow di tab **Actions** (atau lakukan `git push` baru ke `main`).

### Build & Uji Versi Statis di Lokal
Anda juga bisa membuat folder `dist/` secara manual di komputer lokal kapan saja:
```bash
npm.cmd run build
php artisan portfolio:export-static
```

