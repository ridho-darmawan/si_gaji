<body width="400px"><a href="<?= base_url('Laporan/data_gaji_karyawan') ?>">.</a>
<center>
	<img src="<?= base_url('assets/images/tribun1.jpg'); ?>">
		<h2>Slip Gaji</h2>
		<?php foreach ($gaji as $g) :?>
		<h4>Bulan : <?= per($g->periode_gaji) ?></h4>

	<table width="400px	">
		<tr>
			<td>NIP</td><!-- <td>:</td> --><td>: <?= $g->nip; ?></td>
		</tr>
		<tr>
			<td>NAMA</td><!-- <td>:</td> --><td>: <?= $g->nama; ?></td>
		</tr>
		<tr>
			<td>JABATAN</td><!-- <td>:</td> --><td>: <?= $g->nama_jabatan; ?></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<!-- <tr>
			<td></td><td>Jumlah Hari Kerja</td><td>: </td>
		</tr> -->
		<tr>
			<td></td><td>Gaji Pokok</td><td>: Rp.</td><td style="text-align: right"><?= number_format($g->gaji_pokok) ?></td>
		</tr>
		<tr>
			<td></td><td>Tunj. Jabatan</td><td>: Rp.</td><td style="text-align: right"> <?= number_format($g->tunjangan_jabatan) ?></b></td>
		</tr>
		<tr>
			<td></td><td>Tunj. Anak</td><td>: Rp.</td><td style="text-align: right"> <?= number_format($g->tunjangan_anak) ?></b></td>
		</tr>
		<tr>
			<td></td><td>Tunj. Makan</td><td>: Rp.</td><td style="text-align: right"> <?= number_format($g->tunjangan_makan) ?></b></td>
		</tr>
		<tr>
			<td></td><td>Tunj. Transportasi</td><td>: Rp.</td><td style="text-align: right"> <?= number_format($g->tunjangan_transportasi) ?></b></td>
		</tr>
		<tr>
			<td></td><td>Uang Lembur</td><td>: Rp.</td><td style="text-align: right"> <?= number_format($g->uang_lembur) ?></td>
		</tr>
		
		<tr>
			<td></td><td>Potongan Absensi</td><td>: Rp.</td><td style="text-align: right"> <?= number_format($g->potongan) ?></td>
		</tr>
		
		
		<tr>
			<td></td><td><b>Jumlah Terima</b></td><td style="border-top: solid;">: Rp.</td><td style="border-top: solid;text-align: right;"><b><?= number_format(($g->gaji_pokok + $g->tunjangan_jabatan + $g->uang_lembur +$g->tunjangan_anak + $g->tunjangan_makan + $g->tunjangan_transportasi) - $g->potongan) ?></b></td>
		</tr>
				
	</table>
	<br><br><br>
	<h2>Manager Keuangan</h2>
	<br><br>
	<h4><u>Ridho Darmawan</u></h4>
	<h4>NIP. 111001</h4>
</center>
</body>

<?php endforeach; ?>

<script>
	window.print();
</script>