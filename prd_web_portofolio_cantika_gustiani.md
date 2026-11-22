# Product Requirements Document (PRD)
## Web Portofolio & Layanan Freelance — Cantika Gustiani

| Informasi Dokumen | Detail |
| :--- | :--- |
| **Nama Proyek** | Web Portofolio & Freelance Showcase (`gstianichn`) |
| **Pemilik Produk** | Cantika Gustiani |
| **Versi Dokumen** | 1.0 |
| **Tanggal** | 20 November 2026 |
| **Tech Stack Utama** | Laravel (Blade), Tailwind CSS, Alpine.js, AOS, Typed.js |

---

## 1. Ringkasan Eksekutif & Tujuan
Website ini berfungsi sebagai pusat identitas digital (*personal branding*) untuk **Cantika Gustiani** sebagai *Informatics Engineering Student* dan *Full-Stack Web Developer*. Website dirancang untuk melayani dua kebutuhan utama secara seimbang:
1. **Kredibilitas Karier:** Memudahkan HRD dan rekruter melihat keahlian, portofolio proyek nyata, serta mengunduh CV dengan cepat.
2. **Konversi Freelance:** Memudahkan calon klien (mahasiswa, UMKM, sekolah, maupun instansi) memahami pilihan paket jasa pembuatan website dan langsung menghubungi pemilik melalui formulir email.

---

## 2. Target Pengguna (*Target Audience*)
* **HRD / Rekruter / Tech Lead:** Mencari bukti kompetensi teknis (*tech stack*, proyek nyata, tautan GitHub/Live Demo) dan akses cepat ke dokumen CV (PDF).
* **Calon Klien Freelance (Mahasiswa, UMKM, Sekolah, Instansi):** Mencari kejelasan layanan, estimasi harga yang transparan, contoh hasil karya, serta cara konsultasi yang mudah.

---

## 3. Konsep Desain & Sistem Visual (*Theme: Warm Sage & Glass*)
Website mengusung kesan **Warm & Friendly** yang tetap profesional, dipadukan dengan efek **Glassmorphism** dan animasi interaktif yang halus.

### 3.1 Palet Warna
| Peran | Nama Warna | Kode Hex / RGBA | Penggunaan |
| :--- | :--- | :--- | :--- |
| **Background Utama** | Warm Cream | `#FAF9F6` | Latar belakang utama halaman |
| **Surface / Card** | Translucent White | `rgba(255, 255, 255, 0.75)` | Kartu proyek & pricing (`backdrop-blur-md`) |
| **Primary** | Sage Emerald | `#4C8B6E` | Tombol CTA utama, ikon, aksen aktif |
| **Secondary / Accent** | Soft Terracotta | `#E08E79` | Badge *Recommended*, sorotan visual hangat |
| **Text Primary** | Charcoal | `#1F2933` | Judul dan teks utama |
| **Text Secondary** | Slate | `#52606D` | Deskripsi, subjudul, dan metadata |

### 3.2 Tipografi
* **Heading:** `Plus Jakarta Sans` (Bold / SemiBold)
* **Body:** `Inter` (Regular / Medium)

### 3.3 Animasi & Interaktivitas
* **Scroll Reveal:** Menggunakan **AOS (Animate On Scroll)** untuk memunculkan *section* dan kartu secara halus saat di-scroll.
* **Typing Effect:** Menggunakan **Typed.js** pada *Hero Section* untuk menampilkan variasi peran/keahlian.
* **UI State:** Menggunakan **Alpine.js** untuk menu mobile, filter proyek, auto-select paket pada form kontak, serta notifikasi *toast/alert*.

---

## 4. Kebutuhan Fungsional (*Functional Requirements*)

### 4.1 Navigasi (Sticky Glassmorphism Navbar)
* Tetap menempel (*sticky*) di bagian atas saat halaman di-scroll dengan efek transparan buram (*glassmorphism*).
* Menampilkan logo/nama (`Cantika.`), tautan navigasi (*Tentang*, *Proyek*, *Paket Jasa*, *Kontak*), dan tombol CTA **Unduh CV**.
* Responsif dengan *hamburger menu* interaktif pada layar mobile.

### 4.2 Hero Section
* Menampilkan *status badge* (contoh: `Open for Projects & Opportunities`).
* Judul utama dengan animasi ketik (*Typed.js*), misalnya: *Full-Stack Web Developer*, *Laravel & React Builder*, *AI & Workflow Automation Enthusiast*.
* Subjudul singkat mengenai fokus pengembangan aplikasi web yang rapi dan fungsional.
* Dua tombol utama:
  * **Lihat Proyek** (scroll halus ke *section* proyek).
  * **Unduh CV** (mengunduh file PDF CV secara langsung melalui route khusus Laravel).
* Foto profil dengan bingkai modern dan aksen dekoratif lembut.

### 4.3 Tentang Saya & Tech Stack
* Ringkasan profil singkat (Mahasiswa Teknik Informatika UNPI Cianjur & Full-Stack Web Developer).
* Grid *badge/icon* teknologi yang dikelompokkan secara rapi:
  * **Languages & Frameworks:** PHP, Laravel, React, JavaScript, Tailwind CSS, Python.
  * **Database, Cloud & Integration:** MySQL, SQLite, Vercel, Git, n8n, Gemini API.

### 4.4 Featured Projects (Fokus Visual — Gallery Cards)
* Menampilkan proyek dalam bentuk *gallery cards* (grid 2 kolom di desktop, 1 kolom di mobile) dengan **screenshot besar** sebagai fokus utama.
* Dilengkapi tombol filter kategori interaktif (*Semua*, *Web App*, *AI Integration*).
* Setiap kartu memuat: Thumbnail/Screenshot, Judul Proyek, Deskripsi singkat (1–2 baris), *Tag* teknologi, serta tombol **Live Demo** dan/atau **GitHub**.
* **Daftar Proyek Awal:**
  1. **ResepKu** — Aplikasi web resep masakan berbasis React yang terintegrasi dengan Gemini API. *(Live Demo: `https://resep-ku-tawny.vercel.app/`)*
  2. **Travelku** — Sistem pemesanan tiket shuttle multi-role (Superadmin, Customer, Staff, Driver, CS) dengan pemilihan kursi, QR e-ticket, dan integrasi pembayaran Midtrans.
  3. **Hotel Booking System** — Aplikasi web pemesanan kamar hotel dengan fitur pencarian ketersediaan kamar, reservasi online, dan manajemen data tamu.
  4. **Sistem Manajemen Kost** — Aplikasi pengelolaan properti kost yang mencakup pendataan kamar, data penghuni, pencatatan tagihan sewa, dan laporan pembayaran.

### 4.5 Daftar Paket Harga Jasa Freelance (Pricing Cards)
Menampilkan 3 kartu paket sejajar dengan gaya *glassmorphism*. Setiap kartu memiliki tombol **"Pilih Paket / Konsultasi"** yang mengarahkan pengguna ke *section* Kontak dan otomatis mengisi pilihan paket pada formulir.

#### 1. Paket Starter *(Untuk Mahasiswa & Project Kecil)*
* **Harga:** `Rp 500k - Rp 1,5 Juta`
* **Cocok untuk:**
  * Tugas akhir / skripsi / UAS
  * Landing page
  * Website sederhana
  * Sistem CRUD basic
* **Ketentuan:**
  * Maksimal 1–2 role
  * Maksimal 5 menu utama
  * Maksimal 3x revisi
  * Domain & hosting tidak termasuk
  * Maintenance tidak termasuk

#### 2. Paket PRO *(Untuk Sekolah, Bisnis, & Instansi)* — `[Highlight: Paling Populer]`
* **Harga:** `Rp 3 Juta - Rp 7 Juta`
* **Cocok untuk:**
  * Website sekolah
  * Website perusahaan
  * Sistem informasi
  * Web app bisnis
  * Dashboard & manajemen data
* **Ketentuan:**
  * Scope berdasarkan kesepakatan
  * Revisi sesuai kesepakatan
  * Domain & hosting tidak termasuk
  * Maintenance dapat dibicarakan

#### 3. Paket CUSTOM *(Untuk Sistem Khusus)*
* **Harga:** `Harga Menyesuaikan`
* **Cocok untuk:**
  * Sistem informasi khusus
  * Workflow kompleks
  * Integrasi API
  * Sistem berskala sedang
  * Kebutuhan khusus
* **Ketentuan:**
  * Scope & timeline menyesuaikan
  * Revisi sesuai kesepakatan
  * Fitur tambahan di luar scope dikenakan biaya
  * Maintenance sesuai kebutuhan

### 4.6 Fitur Unduh CV
* File CV disimpan di penyimpanan publik/privat Laravel (misalnya `storage/app/public/cv/CV-Cantika-Gustiani.pdf`).
* Diakses melalui endpoint `GET /download-cv` yang mengembalikan *download response* dengan nama file yang rapi.

### 4.7 Form Kontak Langsung (Laravel Mail)
* **Tujuan Email:** `gstianichan.dev@gmail.com`
* **Field Formulir:**
  * Nama Lengkap *(wajib)*
  * Alamat Email *(wajib, format email valid)*
  * Subjek / Pilihan Keperluan *(Dropdown: Paket Starter, Paket PRO, Paket CUSTOM, Tawaran Kerja/Magang, Lainnya)*
  * Pesan / Detail Kebutuhan *(wajib, minimal 10 karakter)*
* **Mekanisme Pengiriman:**
  * Validasi sisi server menggunakan Laravel Form Request.
  * Pengiriman email menggunakan `Mailable` (`ContactMail`) via SMTP (Gmail App Password / Mailtrap saat development).
  * Notifikasi umpan balik (*flash session*) sukses atau gagal ditampilkan di halaman tanpa membingungkan pengguna.
* **Informasi Kontak Pendamping:** Tombol salin email (`gstianichan.dev@gmail.com`), tautan GitHub, dan LinkedIn.

### 4.8 Footer
* Hak cipta dinamis (`© {{ date('Y') }} Cantika Gustiani`).
* Tautan sosial:
  * GitHub: `https://github.com/gstianichn`
  * LinkedIn: `https://www.linkedin.com/in/cantika-gustiani-cacan-3b9b94412`
  * Email: `gstianichan.dev@gmail.com`

---

## 5. Kebutuhan Non-Fungsional (*Non-Functional Requirements*)
* **Responsivitas:** Tampilan optimal di perangkat mobile (`< 640px`), tablet (`768px`), dan desktop (`>= 1024px`).
* **Performa:** Optimasi gambar proyek (format WebP/kompresi ringan) dan *lazy loading* (`loading="lazy"`) agar waktu muat halaman cepat.
* **Keamanan:**
  * Proteksi CSRF (`@csrf`) pada form kontak.
  * *Rate limiting* pada endpoint pengiriman email (`throttle:5,1`) serta *honeypot field* sederhana untuk mencegah spam bot.
  * Sanitasi input untuk mencegah XSS.
* **SEO Dasar:** Meta tag `title`, `description`, dan Open Graph (`og:title`, `og:description`, `og:image`) agar tautan terlihat rapi saat dibagikan di LinkedIn atau WhatsApp.

---

## 6. Arsitektur Teknis & Struktur Folder (Laravel Blade)

### 6.1 Routing (`routes/web.php`)
| Method | Endpoint | Controller / Action | Deskripsi |
| :--- | :--- | :--- | :--- |
| `GET` | `/` | `PortfolioController@index` | Menampilkan halaman utama portofolio |
| `GET` | `/download-cv` | `PortfolioController@downloadCv` | Mengunduh file PDF CV |
| `POST` | `/contact` | `ContactController@send` | Memvalidasi dan mengirim email ke `gstianichan.dev@gmail.com` |

### 6.2 Struktur Folder View
```text
resources/views/
├── layouts/
│   └── app.blade.php          # Master layout (Meta SEO, Google Fonts, Tailwind, Alpine, AOS)
├── components/
│   ├── navbar.blade.php       # Sticky glassmorphism navbar + tombol Unduh CV
│   ├── project-card.blade.php # Komponen kartu proyek visual
│   ├── pricing-card.blade.php # Komponen kartu paket freelance
│   └── footer.blade.php       # Footer & social links
├── emails/
│   └── contact-mail.blade.php # Template email HTML untuk pesan masuk
└── home.blade.php             # Halaman utama (Hero, About, Projects, Pricing, Contact)
```

### 6.3 Pengelolaan Data Proyek & Paket
Untuk tahap awal (*MVP*), data proyek dan paket harga dapat disimpan secara terstruktur di file konfigurasi (`config/portfolio.php`) atau di dalam `PortfolioController` agar tidak memerlukan database tambahan dan sangat cepat dimuat. Ke depannya dapat dengan mudah dimigrasikan ke tabel MySQL/SQLite jika diperlukan panel admin.

---

## 7. Rencana Pengembangan (*Milestones*)
1. **Tahap 1 — Setup & Konfigurasi:** Inisialisasi proyek Laravel, integrasi Tailwind CSS, Alpine.js, AOS, Typed.js, serta konfigurasi warna tema *Warm Sage & Glass*.
2. **Tahap 2 — Layout & Komponen UI:** Pembuatan `app.blade.php`, Navbar, Hero Section, About & Tech Stack, serta Footer.
3. **Tahap 3 — Showcase & Pricing:** Implementasi `project-card.blade.php` dengan filter kategori dan `pricing-card.blade.php` lengkap dengan 3 paket jasa.
4. **Tahap 4 — Integrasi Fitur Backend:** Implementasi endpoint Unduh CV dan form kontak dengan Laravel Mail (`ContactMail`) + validasi + proteksi spam.
5. **Tahap 5 — Pengujian & Deployment:** Uji responsivitas mobile, uji pengiriman email ke `gstianichan.dev@gmail.com`, optimasi aset gambar, dan deployment.