<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasar extends CI_Controller {

    public function index() {
        // array
        $mahasiswa = [
            [
                "nama" => "Andi",
                "nim" => "220101",
                "jurusan" => "Informatika",
                "nilai" => [90, 85, 88]
            ],
            [
                "nama" => "Budi",
                "nim" => "220102",
                "jurusan" => "Sistem Informasi",
                "nilai" => [75, 80, 70]
            ],
            [
                "nama" => "Citra",
                "nim" => "220103",
                "jurusan" => "Teknik Komputer",
                "nilai" => [95, 92, 94]
            ]
        ];

        // simpan session
        $this->session->set_userdata('mahasiswa', $mahasiswa);
        // ambil session
        $session_mahasiswa = $this->session->userdata('mahasiswa');
        echo "<pre>";
        print_r ($session_mahasiswa);
        echo "</pre>";
        // hapus session
        $this->session->unset_userdata('mahasiswa');

        // login
        $auth['mahasiswa_nim']  = '12345';
        $auth['mahasiswa_nama'] = 'Fahry';

        $mahasiswa = $this->db->where($auth)->get('mahasiswa')->row_array();
        if (empty($mahasiswa)) {
            echo "Gagal";
        }
        else {
            $this->session->set_userdata('auth', $mahasiswa);
            echo "Berhasil";
        }

        // logout
        $this->session->sess_destroy();
        redirect('', 'refresh');

        // proteksi
        if (!$this->session->userdata('auth')) {
            redirect('', 'refresh');
        }
        
    }

    public function baru() {
        echo "Baru";
    }

    public function param($nama, $umur = 20) {
        echo "Nama saya $nama, umur saya $umur bulan";
    }

    public function Anda() {
        echo "Ini Anda gesss";
    }

    public function variable() {
        $nama = "Amel";
        $umur = 20;

        $umur *= 10;

        echo "Nama saya $nama, umur $umur tahun <br>";

        $p = 10;
        $l = 5;

        $L = $p * $l;
        echo "Luas = $L <br>";

        // >, <, >=, <=, !=, ==
        echo $p < $l ? 'Disini kalau Benar' : 'Ini Salah';
        echo "<br>";

        // AND (&&), OR (||)

        // TRUE || TRUE

        $nilai = 70;
        $hadir = "jarang";
        if($nilai > 80 && $hadir == "sering") {
            echo "Anda dapet A";
        }
        else if($nilai > 60 || $hadir == "sering") {
            echo "Anda dapet B";
        }
        else if($nilai > 40) {
            echo "Anda dapet C";
        }
        else {
            echo "Anda dapet E";
        }
        
        echo "<br>";
        for ($i=10; $i >= 0; $i-=5) { 
            echo $i;
            echo "<br>";
        }

        echo "<br>";
        $nilai = [10, 20, 30];
        echo $nilai[2];

        echo "<br>";
        $bio = ['nama' => 'Fahry', 'umur' => 21, 'Dompu'];
        echo $bio['nama'];

        $mahasiswa = [
			[
				"nama" => "Andi",
				"nim" => "220101",
				"jurusan" => "Informatika",
				"nilai" => [90, 85, 88]
			],
			[
				"nama" => "Budi",
				"nim" => "220102",
				"jurusan" => "Sistem Informasi",
				"nilai" => [75, 80, 70]
			],
			[
				"nama" => "Citra",
				"nim" => "220103",
				"jurusan" => "Teknik Komputer",
				"nilai" => [95, 92, 94]
            ],
            [
				"nama" => "Anda",
				"nim" => "220104",
				"jurusan" => "Bisnis Digital",
				"nilai" => [20, 12, 100]
            ],
		];

        echo "<br>";
        echo $mahasiswa[0]['jurusan'];
        echo $mahasiswa[2]['nim'];

        echo "<br>";
        echo "<br>";
        echo "<pre>";
        print_r($mahasiswa);
        echo "</pre>";

        echo "<br>";
        echo "<br>";
        foreach ($mahasiswa as $key => $value) {
            echo $value['nama'];
            echo " - ";
            echo $value['jurusan'];

            echo "<br>";
        }

        // Andi (Harian : 90 | UTS : 85 | UAS : 88)
        // Budi (Harian : 75 | UTS : 80 | UAS : 70)
        // Citra (Harian : 95 | UTS : 92 | UAS : 94)
        // Anda (Harian : 20 | UTS : 12 | UAS : 100)

        echo "<br>";
        echo "<br>";
        foreach ($mahasiswa as $key => $value) {
            echo $value['nama'];
            echo " (";
            
            echo "Harian : ";
            echo $value['nilai'][0];
            echo " | ";

            echo "UTS : ";
            echo $value['nilai'][1];
            echo " | ";

            echo "UAS : ";
            echo $value['nilai'][2];

            echo ")";

            echo "<br>";
        }
    }
}