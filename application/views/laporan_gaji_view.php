<div class="x_title">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: right;">Laporan Gaji</h1><br>
		</div>
	</div>

	<div class="row">
			<form method="post" action="<?= base_url('Laporan/laporan_gaji') ?>"">
				
				
					<div class="form-group">
						<div class="col-md-3">
							<label>Pilih bulan</label>
							<select name="bulan" class="form-control">
								<?php
								foreach(bulanGaji() as $b => $c):
								?>
								<option value="<?= $b ?>"><?= $c ?></option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-3">
							<label>Pilih tahun</label>
							<select name="tahun" class="form-control">
								<?php
								for($x = date('Y'); $x >= date('Y') - 10; $x--):
								?>
								<option value="<?= $x ?>"><?= $x ?></option>
							<?php endfor; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-1">
							
							<input type="submit" class="form-control btn btn-primary" value="Cari" style="margin-top: 24px">			
						</div>
					</div>
				
				
			</form>
		</div>
	<!-- <?php $bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun'); ?> -->
		 
<br>
		<div class="clearfix"></div>
		<a href="<?= base_url('Cetak_pdf/cetak_laporan/'.$bulan."/".$tahun)  ?>" class="btn btn-success" data-toggle="tooltip" title="Cetak gaji"><i class="fa fa-lg fa-print"> CETAK</i></a>
</div>

<div id="notifications">
	<?php echo $this->session->flashdata('msg'); ?>
</div> 
<br>

<div class="card">
	<div class="" ss="card-body">

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
					<th >jabatan</th>
					<th>Anak</th>
					<th>Makan</th>
					<th style="border-right: solid;">Transportasi</th>
					
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
					<td>Rp. <?= number_format($gajiBersih)  ?></td>
					
				</tr>
				
				<?php endforeach; ?> 
				<tr>
					<td colspan="11" align="center">TOTAL</td>
					<td>Rp.   <?= number_format($totalGaji) ?></td>
					
				</tr>
				
			</tbody>
					
		</table>

		

	</div>
</div>