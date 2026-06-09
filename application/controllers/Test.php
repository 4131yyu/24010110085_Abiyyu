<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    public function index()
    {
        // =====================================
        // 1. VARIABEL
        // =====================================
        echo "<h2>1. Variabel</h2>";
        
        $nama = "Dina";
        $umur = 21;
        
        echo "Nama saya adalah $nama<br>";
        echo "Umur saya $umur tahun<br><br>";
        
        // =====================================
        // 2. TIPE DATA
        // =====================================
        echo "<h2>2. Tipe Data</h2>";
        
        $tipeString = "Ini string";
        $tipeInteger = 100;
        $tipeFloat = 3.14;
        $tipeBoolean = true;
        
        echo "String: $tipeString<br>";
        echo "Integer: $tipeInteger<br>";
        echo "Float: $tipeFloat<br>";
        echo "Boolean: " . ($tipeBoolean ? "true" : "false") . "<br><br>";
        
        // =====================================
        // 3. OPERATOR
        // =====================================
        echo "<h2>3. Operator</h2>";
        
        $a = 10;
        $b = 4;
        
        echo "Aritmatika: $a + $b = " . ($a + $b) . "<br>";
        echo "Perbandingan: $a > $b = " . ($a > $b ? "true" : "false") . "<br>";
        
        $login = true;
        $passwordBenar = false;
        echo "Logika AND (&&): " . ($login && $passwordBenar ? "true" : "false") . "<br><br>";
        
        // =====================================
        // 4. PERCABANGAN
        // =====================================
        echo "<h2>4. Percabangan (if-elseif-else)</h2>";
        
        $nilai = 83;
        
        if ($nilai >= 90) {
            echo "Nilai: A<br>";
        } elseif ($nilai >= 80) {
            echo "Nilai: B<br>";
        } elseif ($nilai >= 70) {
            echo "Nilai: C<br>";
        } else {
            echo "Nilai: D<br>";
        }
        echo "<br>";
        
        // =====================================
        // 5. PERULANGAN
        // =====================================
        echo "<h2>5. Perulangan</h2>";
        
        // FOR loop
        echo "FOR loop:<br>";
        for ($i = 1; $i <= 3; $i++) {
            echo "Baris ke-$i<br>";
        }
        
        echo "<br>WHILE loop:<br>";
        // WHILE loop
        $j = 1;
        while ($j <= 3) {
            echo "Baris ke-$j<br>";
            $j++;
        }


        // +===========================
        $nama = "Fahry";
		$umur = 26;

		echo "Nama saya $nama, umur $umur tahun <br>";

		$panjang = 5;
		$lebar = 4;

		$luas = $panjang - $lebar;
		$luas += 5;
		echo $luas . "<br>";

		if ($panjang == 5 && $lebar == 4) {
			echo "TRUE <br>";
		}
		elseif ($panjang == 5) {
			echo "Panjang = $panjang <br>";
		}
		else {
			echo "FALSE <br>";
		}

		for ($i = 1; $i <= $panjang; $i+=2) { 
			echo "Urutan ke-$i <br>";
		}

		$array = ['Merah', 'Kuning', 'Hijau'];
		foreach ($array as $key => $value) {
			$key++;
			echo $key . ". " . $value . "<br>";
		}

		$array1 = ['Fahry', 25];
		$array2 = ['nama' => 'Fahry', 'umur' => 25];

		echo $array1[0] . "<br>";
		echo $array2['umur'] . "<br>";

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

		// 278 : 5
		echo $mahasiswa[2]['nim'] . "<br>";
		// 225, 268, 242 : 5
		echo $mahasiswa[1]['nilai'][2] . "<br>";

		foreach ($mahasiswa as $key => $value) {
			// if($key >= 1 && $key <= 2) {
			// 	echo $value['nama'] . "<br>";
			// }

			echo $value['nama'] . " : ";
			
			foreach ($value['nilai'] as $idx => $val) {
				echo $val . ', ';
			}

			echo "<br>";
		}
        
    }
}
