<!DOCTYPE html>
<html>
<head>
	<title>Hasil Program Penurun Berat Badan</title>
</head>
<body>
	<h1>Hasil Program Penurun Berat Badan</h1>

	<?php
		$tinggi_badan = $_POST['tinggi_badan'];
		$berat_badan = $_POST['berat_badan'];
		$usia = $_POST['usia'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$aktivitas_fisik = $_POST['aktivitas_fisik'];

		// Rumus menghitung kebutuhan kalori dasar (BMR)
		if ($jenis_kelamin == 'Laki-laki') {
			$bmr = 66.5 + (13.75 * $berat_badan) + (5.003 * $tinggi_badan) - (6.75 * $usia);
		} else {
			$bmr = 655.1 + (9.5632 * $berat_badan) + (1.850 * $tinggi_badan) - (4.676 * $usia);
		}

	// Rumus menghitung kebutuhan kalori total (TDEE)
    $tdee = $bmr * $aktivitas_fisik;
	$kalori_tujuan = 500;
	$kalori_total = $tdee - $kalori_tujuan;

	if ($kalori_total <= 500) {
		$durasi = '20-30 menit';
		$olahraga = array('Squat Jump', 'Sit Up', 'Lompat Bintang');
	} elseif ($kalori_total > 500 && $kalori_total <= 750) {
		$durasi = '30-40 menit';
		$olahraga = array('Push Up', 'Pendaki Gunung', 'Lompat Tali');
	} else {
		$durasi = '40-60 menit';
		$olahraga = array('Jogging di tempat', 'Zumba', 'Aerobik');
	}

	echo "<p>Kebutuhan kalori dasar (BMR): " . round($bmr) . " kkal</p>";
	echo "<p>Kebutuhan kalori total (TDEE): " . round($tdee) . " kkal</p>";
	echo "<p>Untuk menurunkan berat badan sebanyak 0.5 kg per minggu, Anda perlu membakar " . $kalori_tujuan . " kkal dari kebutuhan kalori total.</p>";
	echo "<p>Olahraga yang direkomendasikan adalah: </p>";
	echo "<ul>";
	foreach ($olahraga as $item) {
		echo "<li>" . $item . "</li>";
	}
	echo "</ul>";
	echo "<p>Lakukan olahraga selama " . $durasi . " per sesi.</p>";
?>
</body>
</html>