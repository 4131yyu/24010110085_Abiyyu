-- MEMBUAT TABEL FAKULTAS
CREATE TABLE fakultas (
    fakultas_id INT PRIMARY KEY,
    fakultas_name VARCHAR(100) NOT NULL
);

-- MEMBUAT TABEL PRODI
CREATE TABLE prodi (
    prodi_id INT PRIMARY KEY,
    fakultas_id INT,
    prodi_name VARCHAR(100) NOT NULL,
    prodi_strata VARCHAR(10),
    FOREIGN KEY (fakultas_id) REFERENCES fakultas(fakultas_id) ON DELETE CASCADE
);

-- MENGISI TABEL FAKULTAS
INSERT INTO fakultas (fakultas_id, fakultas_name) VALUES
(1, 'Fakultas Teknik'),
(2, 'Fakultas Humaniora, Hukum & Pariwisata'),
(3, 'Fakultas Kedokteran'),
(4, 'Fakultas Kesehatan'),
(5, 'Fakultas Ekonomi & Bisnis'),
(6, 'Fakultas Seni & Desain'),
(7, 'Fakultas Pendidikan');

-- MENGISI TABEL PRODI
INSERT INTO prodi (prodi_id, fakultas_id, prodi_name, prodi_strata) VALUES
-- 1. Fakultas Teknik
(1, 1, 'Ilmu Komputer', 'S1'),
(2, 1, 'Teknologi Informasi', 'S1'),
(3, 1, 'Rekayasa Perangkat Lunak', 'S1'),
(4, 1, 'Teknologi Pangan', 'S1'),
(5, 1, 'Rekayasa Perangkat Lunak', 'D3'),
(6, 1, 'Sistem Informasi', 'D3'),
(7, 1, 'Ilmu Komputer', 'S2'),

-- 2. Fakultas Humaniora, Hukum & Pariwisata
(8, 2, 'Sastra Inggris', 'S1'),
(9, 2, 'Pariwisata', 'S1'),
(10, 2, 'Hukum', 'S1'),
(11, 2, 'Sastra Inggris', 'S2'),

-- 3. Fakultas Kedokteran
(12, 3, 'Kedokteran', 'S1'),
(13, 3, 'Profesi Pendidikan Kedokteran', 'S1'),

-- 4. Fakultas Kesehatan
(14, 4, 'Gizi', 'S1'),
(15, 4, 'Farmasi', 'S1'),

-- 5. Fakultas Ekonomi & Bisnis
(16, 5, 'Manajemen', 'S1'),
(17, 5, 'Akuntansi', 'S1'),
(18, 5, 'Bisnis Digital', 'S1'),

-- 6. Fakultas Seni & Desain
(19, 6, 'Desain Komunikasi Visual', 'S1'),
(20, 6, 'Seni Pertunjukan', 'S1'),

-- 7. Fakultas Pendidikan
(21, 7, 'Pendidikan Teknologi Informasi', 'S1'),
(22, 7, 'Pendidikan Kepelatihan Olahraga', 'S1');