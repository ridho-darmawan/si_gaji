<!DOCTYPE html>
<html>
<head>
	<title>rekap gaji</title>
		<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	
</head>
<body>
	<a href="<?= base_url('Laporan/all_rekap_gaji') ?>">.</a>
<center><br><br>
	<img src="<?= base_url('assets/images/tribun1.jpg'); ?>">
		<h4>Rekapitulasi Gaji</h4>
		<?= "Bulan : ".$this->uri->segment(3).'-'.$this->uri->segment(4) ?>
		<table class="table table-hover table-bordered" id="sampleTable">
			<thead>


				<tr>
					<th rowspan="2" style="text-align: center;">No</th>
					<th rowspan="2" style="text-align: center;">NIP</th>
					<th rowspan="2" style="text-align: center;">Periode</th>
					<th rowspan="2" style="text-align: center;">Nama</th>				
					<th colspan="4" style="text-align:center;">Tunjangan</th>
					<th rowspan="2" style="text-align: center;">Uang Lembur</th>
					<th rowspan="2" style="text-align: center;">Potongan</th>
					<th rowspan="2" style="text-align: center;">Gaji Pokok</th>
					<th rowspan="2" style="text-align: center;">Gaji Bersih</th>
				</tr>

				<tr>
					<th style="text-align: center;">jabatan</th>
					<th style="text-align: center;">Anak</th>
					<th style="text-align: center;">Makan</th>
					<th style="text-align: center;">Transportasi</th>
					
				</tr>

			</thead>
				
			<tbody>
				

				<?php $no=1; $totalGaji = 0; foreach($gaji as $g): ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $g->nip; ?></td>
					<td><?= per($g->periode_gaji); ?></td>
					<td><?= $g->nama; ?></td>
					<td>Rp. <?= number_format($g->tunjangan_jabatan) ?></td>
					<td>Rp. <?= number_format($g->tunjangan_anak) ?></td>
					<td>Rp. <?= number_format($g->tunjangan_makan) ?></td>
					<td>Rp. <?= number_format($g->tunjangan_transportasi) ?></td>
					<td>Rp. <?= number_format($g->uang_lembur) ?></td>
					<td>Rp. <?= number_format($g->potongan) ?></td>
					<!-- <td></td> -->
					<td>Rp. <?= number_format($g->gaji_pokok) ?></td>
					<?php
					$gajiBersih = ($g->gaji_pokok + $g->tunjangan_jabatan + $g->uang_lembur +$g->tunjangan_makan + $g->tunjangan_transportasi + $g->tunjangan_anak) - $g->potongan;
					$totalGaji += $gajiBersih;
					?>
					<td>Rp. <?= number_format(($g->gaji_pokok + $g->tunjangan_jabatan + $g->uang_lembur) - $g->potongan)  ?></td>
					
				</tr>
				
				<?php endforeach; ?>
				<tr>
					<td colspan="11" align="center">TOTAL</td>
					<td>Rp.  <?= number_format($totalGaji); ?> </td>
					
				</tr>
				
			</tbody>
					
		</table>


		
		

	</div>
</div>

	<br><br><br>
	<h3>Manager Keuangan</h3>
	<br><br>
	<h4><u>Ridho Darmawan</u></h4>
	<h4>NIP. 005</h4>
</center>
</body>
</html>


<script>
	window.print();
</script>