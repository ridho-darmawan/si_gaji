<div class="x_title">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: right;">Data Gaji Karyawan</h1><br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl pull-right"><i class="glyphicon glyphicon-plus"></i></a>		
		</div>
	</div>
		<!-- <div class="col-md-4"> -->
		<div class="row">
			<form method="post" action="<?= base_url('Pembayaran/getByDate') ?>">
				
				
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
		<!-- </div> -->
	</div>

		
<br>
	<div class="clearfix"></div>
</div>

<div id="notifications">
	<?php echo $this->session->flashdata('msg'); ?>
</div> 
<br>

<div class="card">
	<div class="card-body">
		<table class="table table-hover table-bordered" id="sampleTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Periode</th>
					<th>NIP</th>
					<th>Nama Karyawan</th>
					<th>Jabatan</th>
					<th>Gaji Bersih</th>
					<th>Status</th>
					<th align="center">Aksi</th>
					
				</tr>
			</thead>
			
			
			<tbody>
				<?php $no=1; foreach($gaji as $g): ?>

				<tr>
					<td><?= $no++; ?></td>
					<td><?= per($g->periode_gaji); ?></td>
					<td><?= $g->nip; ?></td>
					<td><?= $g->nama; ?></td>
					<td><?= $g->nama_jabatan; ?></td>
					<td>Rp.<?= number_format(($g->gaji_pokok + $g->tunjangan_jabatan + $g->uang_lembur +$g->tunjangan_anak + $g->tunjangan_makan + $g->tunjangan_transportasi) - $g->potongan) ?></td>
					<td align="center"><?php if ($g->status==1): ?>
							<a><i class="glyphicon glyphicon-ok"></i></a>	
						<?php endif ?></td>
					<td align="center">
						
						
						<a href="<?= base_url('Cetak_pdf/cetak_hrga/'.$g->id_gaji)  ?>" class="btn btn-success"><i class="fa fa-lg fa-print"></i></a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $g->id_gaji;?>"><i class="fa fa-lg fa-trash"></i> </a>
					
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>



<!-- modal tambah -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Transaksi Penggajian</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Pembayaran/tambah'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">No Penggajian</label>
						<div class="col-md-8">
							<input class="form-control" name="id" type="text"  value="<?= $kode_unik;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">NIP Karyawan</label>
						<div class="col-md-8">
							<select name="nip" class="form-control" required> -->
								<?php foreach($content as $c): ?>
									<option value="<?= $c->nip; ?>"><?= $c->nip. ' ( '. $c->nama .' )'; ?> </option>
								<?php endforeach;  ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Tanggal Penggajian</label>
						<div class="col-md-8">
							<input  type="date" name="tanggal" value=""  class="form-control"  required>
						</div>
					</div>

				
					<div class="form-group">
						<label class="control-label col-md-3">Bulan Gaji</label>
						<div class="col-md-6">
							<select name="bulan" class="form-control">
								<option disabled>===Pilih Bulan===</option>
								<?php
								foreach(bulanGaji() as $b => $c):
								?>
								<option value="<?= $b ?>"><?= $c ?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" name="tahun" value="<?= date("Y") ?>" readonly>
						</div>
					</div>
					
					<div class="modal-footer">
						<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>

									<!-- end modal tambah -->

<!-- modal hapus -->
<?php 	foreach($gaji as $g): ?>
	<div class="modal fade" id="modal_hapus<?php echo $g->id_gaji;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 class="modal-title" id="myModalLabel">Hapus Lembur</h3>
				</div>
				<form class="form-horizontal" method="post" action="<?php echo base_url('Pembayaran/hapus');?>">
					<div class="modal-body">
						<p>Anda yakin mau menghapus ? </b></p>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_gaji" value="<?php echo $g->id_gaji;?>">
						<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php 	endforeach; ?>

<!--END MODAL HAPUS-->

	