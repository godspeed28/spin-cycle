# Spin Cycle - Aplikasi Manajemen Laundry

**Spin Cycle** adalah solusi digital lengkap untuk membantu usaha laundry dalam mengelola layanan, pesanan pelanggan, laporan pendapatan, dan manajemen pengguna. Dengan antarmuka yang ramah pengguna dan fitur yang komprehensif, Spin Cycle mempermudah operasional laundry harian Anda.

---

## 📌 Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Instalasi](#instalasi)
- [Struktur Folder](#struktur-folder)
- [Akun Default](#akun-default)
- [Screenshot](#screenshot)
- [Lisensi](#lisensi)

---

## ✨ Fitur Utama

- ✅ Manajemen layanan laundry:
  - Wash & Fold
  - Ironing Service
  - Dry Cleaning
- ⚡ Layanan _Express_ (selesai dalam 6 jam)
- 🧺 Pemilihan kategori pakaian berdasarkan jenis
- ⚖️ Perhitungan berat otomatis per jenis pakaian
- 🧾 Checkout dan pembayaran otomatis
- 👥 Role user: Admin, Kasir, Pelanggan
- 🔐 Sistem login aman dengan hash bcrypt
- 📊 Laporan transaksi harian dan bulanan
- 📱 Antarmuka responsif (mobile-friendly)

---

## 🛠 Teknologi yang Digunakan

| Layer    | Teknologi                                |
| -------- | ---------------------------------------- |
| Backend  | PHP (CodeIgniter 4)                      |
| Frontend | HTML, CSS, Bootstrap, JavaScript         |
| Database | MySQL                                    |
| Tambahan | jQuery, DataTables, Select2, FontAwesome |

---

## ⚙️ Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/godspeed28/spin-cycle.git
cd spin-cycle
```

### 2. Setup File .env

```bash
app.baseURL = 'http://localhost:8080/'
database.default.hostname = localhost
database.default.database = spin_cycle_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

### 3. Setup Database

```bash
php spark migrate
php spark db:seed UserSeeder
```

### 4. Jalankan Aplikasi

```bash
php spark serve
```

## 🗂 Struktur Folder

```bash
spin-cycle/
├── app/
│   ├── Config/
│   ├── Controllers/
│   ├── Models/
│   └── Views/
├── public/
│   ├── assets/
│   └── index.php
├── writable/
├── .env
├── composer.json
└── README.md
```

## 📄 Lisensi

MIT License

Copyright (c) 2025 Albert Kolin

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights  
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell  
copies of the Software, and to permit persons to whom the Software is  
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR  
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,  
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE  
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER  
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN  
THE SOFTWARE.

## 🙌 Terima Kasih

Terima kasih telah menggunakan Spin Cycle. Semoga aplikasi ini membantu mempermudah pengelolaan usaha laundry Anda. 💙
