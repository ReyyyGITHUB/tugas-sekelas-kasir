```md
# Sistem Kasir Sederhana

Project ini berisi hasil integrasi function dari beberapa kelompok untuk tugas LKPD Pengembangan Perangkat Lunak kelas X PPLG.

Tema tugas: Function dan Modularitas Program.

## Struktur Folder

```text
tugas-sekolah/
│
├── diskon.php
├── input-data.php
├── pajak.php
├── pembayaran.php
├── total-harga.php
│
└── hasil-gabungan/
    └── gabungan-kasir.php
```

## Keterangan Folder

### Root Folder

File yang berada langsung di folder utama adalah file asli dari masing-masing kelompok.

Contoh:

- `input-data.php` = fitur input data barang
- `total-harga.php` = fitur hitung total
- `diskon.php` = fitur diskon
- `pajak.php` = fitur pajak
- `pembayaran.php` = fitur pembayaran

File-file ini berasal dari kelompok berbeda dan belum sepenuhnya menjadi satu sistem.

### Folder `hasil-gabungan`

Folder `hasil-gabungan` berisi file hasil integrasi.

File utama:

- `gabungan-kasir.php`

File ini digunakan untuk melihat hasil akhir sistem kasir sederhana yang sudah digabung.

## Cara Menjalankan

1. Buka Laragon.
2. Pastikan Apache sudah berjalan.
3. Simpan project di folder:

```text
C:\laragon\www\tugas-sekolah
```

4. Buka browser.
5. Jalankan file hasil gabungan:

```text
http://localhost/tugas-sekolah/hasil-gabungan/gabungan-kasir.php
```

## Fitur Sistem Kasir

Sistem kasir sederhana ini memiliki 6 fitur utama:

1. Input Data Barang
2. Hitung Total
3. Diskon
4. Pajak
5. Pembayaran
6. Cetak Struk

## Penjelasan Modularitas

Program dibuat modular karena setiap fitur dipisahkan berdasarkan tugasnya.

Contoh function:

- `inputKasir()` untuk input data barang
- `hitungDiskon()` untuk menghitung diskon
- `hitungPajak()` untuk menghitung pajak
- `cetakStruk()` untuk menampilkan struk

Dengan modularitas, program lebih mudah dibaca, diperbaiki, dan digabung dengan kode dari kelompok lain.

## Catatan

File di root folder adalah file dari kelompok lain.

File di folder `hasil-gabungan` adalah file yang digunakan untuk melihat hasil akhir integrasi.
```
