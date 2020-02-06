
	<div class="x_title">
		<div class="row">
			<div class="col-md-12">
				<h1 align="right">Data Absensi</h1><br><a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl "><i class="glyphicon glyphicon-plus"></i></a>
			</div>
		</div>
	
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
					<th>NIP</th>
					<th>Bulan Absen</th>
					<th>jumlah Hadir (Hari)</th>
					<th>jumlah Sakit (Hari)</th>
					<th>jumlah Alfa (Hari)</th>
					<th>jumlah izin (Hari)</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php 	$no=1;	foreach($absen as $a) :?> 
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $a->nip; ?></td>
					<td><?= $a->bulan; ?></td>
					<td><?= $a->jumlah_hadir; ?></td>
					<td><?= $a->jumlah_sakit; ?></td>
					<td><?= $a->jumlah_alfa; ?></td>
					<td><?= $a->jumlah_izin; ?></td>
					<td align="center">
						<!-- 	<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl "><i class="glyphicon glyphicon-plus"></i></a>	 -->	
							
							<a class="btn btn-info" data-toggle="modal" data-target="#modal_edit<?=$a->nip;?>"><i class="fa fa-lg fa-edit"></i></a>
							<!-- <a class="btn btn-success" data-toggle="modal" data-target="#modal_hapus>"><i class="fa fa-lg fa-print"></i></a> -->

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
				<h4 class="modal-title">Tambah Data Absen</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Absensi/tambah'); ?>">
					
					<div class="form-group">
						<label class="control-label col-md-3">NIP Karyawan</label>
						<div class="col-md-8">
							<select name="nip" class="form-control" required>
								<?php foreach($karyawan as $c): ?>
									<option value="<?= $c->nip; ?>"><?= $c->nip. ' ( '. $c->nama .' )'; ?> </option>
								<?php endforeach;  ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Bulan</label>
						<div class="col-md-8">

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
						<label class="control-label col-md-3">Tahun</label>
						<div class="col-md-8">
							<?php
								for($x = date('Y'); $x >= date('Y'); $x--):
								?>
						<input type="text" name="tahun" class="form-control" value="<?= $x ?>" readonly>
								<?php endfor; ?>
						<!-- <select name="tahun" class="form-control">
								<?php
								for($x = date('Y'); $x >= date('Y') - 10; $x--):
								?>
								<option value="<?= $x ?>"><?= $x ?></option>
							<?php endfor; ?>
							</select> -->
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Hadir</label>
						<div class="col-md-7">
							<input type="number" name="hari_kerja" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Sakit</label>
						<div class="col-md-7">
							<input type="number" name="hari_sakit" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Alfa</label>
						<div class="col-md-7">
							<input type="number" name="hari_alfa" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah izin</label>
						<div class="col-md-7">
							<input type="number" name="hari_izin" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
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

<!-- edit -->

<?php foreach($absen as $a): ?>
<div class="modal fade" id="modal_edit<?=$a->nip;?>" role="dialog">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Absen</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Absensi/edit'); ?>">
					
					<div class="form-group">
						<label class="control-label col-md-3">NIP Karyawan</label>
						<div class="col-md-8">
							<input type="text" name="nip" value="<?= $a->nip; ?>" class="form-control">
							
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Bulan</label>
						<div class="col-md-8">

							<select name="bulan" class="form-control">
								<option value="<?= $a->bulan ?>"><?= $a->bulan; ?></option>
								<?php
								foreach(bulanGaji() as $b => $c):
								?>

								<option value="<?= $b ?>"><?= $c ?></option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tahun</label>
						<div class="col-md-8">
								<?php
								for($x = date('Y'); $x >= date('Y'); $x--):
								?>
						<input type="text" name="tahun" class="form-control" value="<?= $x ?>" readonly>
								<?php endfor; ?>
					
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Jumlah hadir</label>
						<div class="col-md-7">
							<input type="number" name="hari_kerja" value="<?= $a->jumlah_hadir; ?>" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Sakit</label>
						<div class="col-md-7">
							<input type="number" name="hari_sakit" value="<?= $a->jumlah_sakit; ?>" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Alfa</label>
						<div class="col-md-7">
							<input type="number" name="hari_alfa" value="<?= $a->jumlah_alfa; ?>" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah izin</label>
						<div class="col-md-7">
							<input type="number" name="hari_izin" value="<?= $a->jumlah_izin; ?>" class="form-control">
						</div>
						<div class="col-md-1">
							<label>Hari</label>
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
<?php endforeach; ?>
<!-- end edit -->


