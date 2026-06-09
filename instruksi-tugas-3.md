# Instruksi Tugas 3 — CRUD Fakultas & Program Studi

## Gambaran Umum

Pada tugas ini, anda akan membuat dua fitur CRUD baru (Fakultas dan Program Studi) dengan pola yang sama persis seperti fitur Mahasiswa yang sudah ada. Selain itu, fitur Program Studi memiliki relasi ke Fakultas (select/dropdown) dan memiliki radio button untuk memilih jenjang strata.

---

## Referensi Pola dari Fitur Mahasiswa

Sebelum memulai, pahami pola yang digunakan di fitur Mahasiswa:

### Struktur File Mahasiswa

```
controllers/Mahasiswa.php     → Controller dengan method: index, tambah, ubah, hapus
models/MahasiswaModel.php     → Model dengan method: getAll, getById, insert, update, delete
views/mahasiswa/index.php     → Halaman daftar data (tabel + DataTable)
views/mahasiswa/form.php      → Form tambah & ubah (satu view, dibedakan oleh variabel $button dan $action)
```

### Pola Controller (CRUD)

| Method   | Fungsi                                                                  |
|----------|-------------------------------------------------------------------------|
| `index`  | Mengambil semua data via Model, kirim ke view tabel                     |
| `tambah` | Tampilkan form. Jika POST & validasi lolos → insert → redirect + swal   |
| `ubah`   | Ambil data by ID. Jika POST & validasi lolos → update → redirect + swal |
| `hapus`  | Cek data by ID. Jika ada → delete → redirect + swal warning             |

### Pola Validasi (Server-Side)

- Validasi menggunakan `$this->form_validation->set_rules()`
- Setiap field punya rules (required, min_length, max_length, numeric, valid_email, dll)
- Jika validasi gagal, form ditampilkan ulang dengan:
  - **Border merah** (`is-invalid`) + pesan error di bawah field
  - **Border hijau** (`is-valid`) untuk field yang valid
  - **Isi form lama tetap muncul** via `set_value()`
- Jika validasi berhasil → simpan ke DB → redirect ke halaman index + SweetAlert success

### Pola View Form

- Satu view dipakai untuk tambah & ubah
- Variabel `$action` menentukan URL form action
- Variabel `$button` menentukan teks tombol ("Simpan" / "Update") dan judul card
- Variabel `$data['nama_entity']` berisi data lama (null untuk tambah, array untuk ubah)
- Class validasi pada input: `<?php echo form_error('field') ? 'is-invalid' : (isset($_POST['field']) ? 'is-valid' : ''); ?>`
- Repopulate value: `<?php echo set_value('field', isset($entity['field']) ? $entity['field'] : ''); ?>`

### Pola View Index (Tabel)

- Card dengan header (judul + tombol Tambah)
- Tabel dengan id `datatable` (otomatis di-init DataTable dari footer.php)
- Kolom aksi: tombol Edit (link ke ubah/$id) dan Hapus (class `btn-hapus`, otomatis SweetAlert konfirmasi dari footer.php)

### Pola Flashdata SweetAlert

```php
$this->session->set_flashdata('swal', [
    'icon'  => 'success',   // atau 'warning'
    'title' => 'Berhasil!',
    'text'  => 'Pesan detail.'
]);
redirect('nama_controller');
```

### Pola Penanganan Data Tidak Ditemukan

```php
$data = $this->Model->getById($id);
if (!$data) {
    $this->session->set_flashdata('swal', [
        'icon'  => 'warning',
        'title' => 'Tidak Ditemukan!',
        'text'  => 'Data tidak ditemukan.'
    ]);
    redirect('nama_controller');
}
```

---

## Fitur 1: CRUD Fakultas

### Struktur Database — Tabel `fakultas`

Sesuai file `tugas-3.sql`:

| Kolom           | Tipe         | Keterangan                                         |
|-----------------|--------------|----------------------------------------------------|
| `fakultas_id`   | INT, PK      | Primary key (manual ID)                            |
| `fakultas_name` | VARCHAR(100) | Nama fakultas                                      |

### File yang Dibuat

```
controllers/Fakultas.php
models/FakultasModel.php
views/fakultas/index.php
views/fakultas/form.php
```

### Controller `Fakultas.php`

Buat dengan pola yang sama seperti `Mahasiswa.php`:

- **`__construct`**: Cek session login (redirect ke `auth` jika belum login), load `FakultasModel`
- **`index`**: Ambil semua data fakultas, tampilkan di tabel
- **`tambah`**: Form tambah dengan validasi:
  - `fakultas_name`: required, min_length[3], max_length[100]
- **`ubah($id)`**: Form ubah, cek data ada atau tidak, validasi sama seperti tambah
- **`hapus($id)`**: Cek data ada atau tidak, lalu hapus

### Model `FakultasModel.php`

Method yang dibutuhkan:
- `getAll()` — return semua data fakultas
- `getById($id)` — return satu data berdasarkan `fakultas_id`
- `insert($data)` — insert data baru
- `update($id, $data)` — update berdasarkan `fakultas_id`
- `delete($id)` — hapus berdasarkan `fakultas_id`

### View `fakultas/index.php`

Tabel dengan kolom:
| No. | Nama Fakultas | Aksi |

- Tombol "Tambah" di header card
- Tombol Edit & Hapus di kolom aksi (pakai icon Bootstrap Icons: `bi-pencil-square`, `bi-trash`)
- Tambahkan class `btn-hapus` pada tombol hapus (SweetAlert konfirmasi otomatis dari footer)

### View `fakultas/form.php`

Form dengan field:
1. **Nama Fakultas** — `<input type="text">` name=`fakultas_name` dengan validasi is-invalid/is-valid

---

## Fitur 2: CRUD Program Studi

### Struktur Database — Tabel `prodi`

Sesuai file `tugas-3.sql`:

| Kolom           | Tipe         | Keterangan                                         |
|-----------------|--------------|----------------------------------------------------|
| `prodi_id`      | INT, PK      | Primary key (manual ID)                            |
| `fakultas_id`   | INT, FK      | Foreign key ke tabel fakultas (ON DELETE CASCADE)  |
| `prodi_name`    | VARCHAR(100) | Nama program studi                                 |
| `prodi_strata`  | VARCHAR(10)  | Jenjang strata (D3, S1, S2)                        |

### File yang Dibuat

```
controllers/Prodi.php
models/ProdiModel.php
views/prodi/index.php
views/prodi/form.php
```

### Controller `Prodi.php`

- **`__construct`**: Cek session login, load `ProdiModel` dan `FakultasModel`
- **`index`**: Ambil semua data prodi (JOIN dengan fakultas untuk tampilkan nama fakultas), tampilkan di tabel
- **`tambah`**: 
  - Ambil data semua fakultas untuk dropdown select
  - Validasi:
    - `fakultas_id`: required, numeric
    - `prodi_name`: required, min_length[3], max_length[100]
    - `prodi_strata`: required, in_list[D3,S1,S2]
- **`ubah($id)`**: Sama seperti tambah + ambil data lama untuk repopulate (tanpa `prodi_id`)
- **`hapus($id)`**: Cek data ada atau tidak, lalu hapus

### Model `ProdiModel.php`

Method yang dibutuhkan:
- `getAll()` — SELECT dengan JOIN ke tabel fakultas (agar bisa tampilkan nama fakultas)
- `getById($id)` — return satu data berdasarkan `prodi_id`
- `insert($data)` — insert data baru
- `update($id, $data)` — update berdasarkan `prodi_id`
- `delete($id)` — hapus berdasarkan `prodi_id`

Contoh `getAll()` dengan JOIN:
```php
public function getAll()
{
    $this->db->select('prodi.*, fakultas.fakultas_name');
    $this->db->from('prodi');
    $this->db->join('fakultas', 'fakultas.fakultas_id = prodi.fakultas_id', 'left');
    return $this->db->get()->result_array();
}
```

### View `prodi/index.php`

Tabel dengan kolom:
| No. | Nama Program Studi | Strata | Fakultas | Aksi |

### View `prodi/form.php`

Form dengan field:

1. **Fakultas** — **Select/Dropdown** yang diisi dari data tabel fakultas

   ```html
   <div class="mb-3">
       <label for="fakultas_id" class="form-label">Fakultas</label>
       <select name="fakultas_id" id="fakultas_id" class="form-select <?php echo form_error('fakultas_id') ? 'is-invalid' : (isset($_POST['fakultas_id']) ? 'is-valid' : ''); ?>">
           <option value="">-- Pilih Fakultas --</option>
           <?php foreach ($fakultas as $f): ?>
               <option value="<?php echo $f['fakultas_id']; ?>"
                   <?php echo set_select('fakultas_id', $f['fakultas_id'], (isset($prodi['fakultas_id']) && $prodi['fakultas_id'] == $f['fakultas_id'])); ?>>
                   <?php echo $f['fakultas_name']; ?>
               </option>
           <?php endforeach; ?>
       </select>
       <?php if (form_error('fakultas_id')): ?>
           <div class="invalid-feedback"><?php echo form_error('fakultas_id'); ?></div>
       <?php endif; ?>
   </div>
   ```

   Di controller, pastikan kirim data fakultas ke view:
   ```php
   $data['fakultas'] = $this->FakultasModel->getAll();
   ```

2. **Nama Program Studi** — `<input type="text">` name=`prodi_name` dengan validasi

3. **Strata** — **Radio Button** dengan pilihan D3, S1, S2

   ```html
   <div class="mb-3">
       <label class="form-label">Strata</label>
       <div>
           <?php
           $strata_options = ['D3', 'S1', 'S2'];
           foreach ($strata_options as $s): ?>
               <div class="form-check form-check-inline">
                   <input class="form-check-input <?php echo form_error('prodi_strata') ? 'is-invalid' : (isset($_POST['prodi_strata']) ? 'is-valid' : ''); ?>"
                       type="radio" name="prodi_strata" id="strata_<?php echo $s; ?>"
                       value="<?php echo $s; ?>"
                       <?php echo set_radio('prodi_strata', $s, (isset($prodi['prodi_strata']) && $prodi['prodi_strata'] === $s)); ?>>
                   <label class="form-check-label" for="strata_<?php echo $s; ?>"><?php echo $s; ?></label>
               </div>
           <?php endforeach; ?>
       </div>
       <?php if (form_error('prodi_strata')): ?>
           <div class="text-danger small mt-1"><?php echo form_error('prodi_strata'); ?></div>
       <?php endif; ?>
   </div>
   ```
---

## Checklist Sebelum Selesai

- [ ] Tabel `fakultas` dan `prodi` sudah dibuat di database (import `tugas-3.sql`)
- [ ] CRUD Fakultas berfungsi (index, tambah, ubah, hapus)
- [ ] CRUD Program Studi berfungsi (index, tambah, ubah, hapus)
- [ ] Form Program Studi memiliki **select dropdown** untuk memilih Fakultas
- [ ] Form Program Studi memiliki **radio button** untuk memilih Strata
- [ ] Validasi server-side berfungsi di semua form (merah jika salah, hijau jika benar)
- [ ] Isi form lama tetap muncul (repopulate) saat validasi gagal
- [ ] SweetAlert muncul setelah tambah/ubah berhasil (success) dan setelah hapus (warning)
- [ ] SweetAlert konfirmasi muncul sebelum hapus (otomatis dari class `btn-hapus`)
- [ ] Jika data tidak ditemukan → redirect + SweetAlert warning
- [ ] Sidebar menu Fakultas dan Program Studi aktif (bold) sesuai halaman yang dibuka
- [ ] DataTable aktif di halaman index Fakultas dan Program Studi (id `datatable`)

---

## SQL — Database

Gunakan file **`tugas-3.sql`** yang sudah disiapkan di root project. Import melalui phpMyAdmin atau terminal:

```
mysql -u root -p nama_database < tugas-3.sql
```

File tersebut berisi:
- Struktur tabel `fakultas` dan `prodi`
- Data awal 7 fakultas dan 22 program studi

> **Penting**: Perhatikan nama kolom di `tugas-3.sql` menggunakan bahasa Inggris (`fakultas_name`, `prodi_name`). Pastikan nama field di controller, model, dan view **sesuai** dengan nama kolom di database.

---

## Tips

- Kerjakan Fakultas dulu karena Program Studi bergantung pada data Fakultas (relasi FK)
- Gunakan file Mahasiswa sebagai template — copy lalu sesuaikan nama tabel, field, dan validasi
- Pastikan `FakultasModel` sudah di-load di controller Prodi agar bisa ambil data fakultas untuk dropdown
- Untuk radio button, gunakan `set_radio()` dari CI form helper agar repopulate benar
- Untuk select, gunakan `set_select()` dari CI form helper
- ID bersifat manual (bukan auto increment), jadi perlu input ID di form tambah

---

