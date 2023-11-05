-- Buat database
CREATE DATABASE IF NOT EXISTS tugas_akhir;

-- Pilih database yang baru dibuat
USE tugas_akhir;

-- Tabel untuk data admin
CREATE TABLE IF NOT EXISTS admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_telp VARCHAR(15) NOT NULL
);

-- Tabel untuk data dosen
CREATE TABLE IF NOT EXISTS dosen (
    id_dosen INT AUTO_INCREMENT PRIMARY KEY,
    NIP VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL,
    nama_dosen VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_telp VARCHAR(15) NOT NULL
);

-- Tabel untuk data mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
    id_mahasiswa INT AUTO_INCREMENT PRIMARY KEY,
    NIM VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL,
    nama_mahasiswa VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_telp VARCHAR(15) NOT NULL
);

-- Tabel untuk monitoring tugas akhir
CREATE TABLE IF NOT EXISTS progress_bimbingan (
    id_progress INT AUTO_INCREMENT PRIMARY KEY,
    id_mahasiswa INT NOT NULL,
    id_dosen INT NOT NULL,
    sampul TINYINT(1) DEFAULT 0,
    l_judul TINYINT(1) DEFAULT 0,
    l_pengesahan TINYINT(1) DEFAULT 0,
    abstrak TINYINT(1) DEFAULT 0,
    katpeng TINYINT(1) DEFAULT 0,
    dafis TINYINT(1) DEFAULT 0,
    daftab TINYINT(1) DEFAULT 0,
    dafgam TINYINT(1) DEFAULT 0,
    latbel TINYINT(1) DEFAULT 0,
    rumusan TINYINT(1) DEFAULT 0,
    batasan TINYINT(1) DEFAULT 0,
    tujuan TINYINT(1) DEFAULT 0,
    manfaat TINYINT(1) DEFAULT 0,
    sistematika_penulisan TINYINT(1) DEFAULT 0,
    teoritis TINYINT(1) DEFAULT 0,
    empiris TINYINT(1) DEFAULT 0,
    metopen TINYINT(1) DEFAULT 0,
    desain_sistem TINYINT(1) DEFAULT 0,
    desain_evaluasi TINYINT(1) DEFAULT 0,
    proses_kumpul_data TINYINT(1) DEFAULT 0,
    implementasi_sistem TINYINT(1) DEFAULT 0,
    implementasi_evaluasi TINYINT(1) DEFAULT 0,
    kesimpulan TINYINT(1) DEFAULT 0,
    saran TINYINT(1) DEFAULT 0,
    dafpus TINYINT(1) DEFAULT 0,
    lampiran TINYINT(1) DEFAULT 0,
    file_revisi_pendahuluan VARCHAR(255),
    file_revisi_bab1 VARCHAR(255),
    file_revisi_bab2 VARCHAR(255),
    file_revisi_bab3 VARCHAR(255),
    file_revisi_bab4 VARCHAR(255),
    file_revisi_bab5 VARCHAR(255),
    file_revisi_akhir VARCHAR(255)
);

-- Hubungan antara tabel monitoring dan mahasiswa
ALTER TABLE progress_bimbingan
ADD CONSTRAINT fk_progress_mahasiswa
FOREIGN KEY (id_mahasiswa) REFERENCES mahasiswa(id_mahasiswa);

-- Hubungan antara tabel monitoring dan dosen
ALTER TABLE progress_bimbingan
ADD CONSTRAINT fk_progress_dosen
FOREIGN KEY (id_dosen) REFERENCES dosen(id_dosen);
