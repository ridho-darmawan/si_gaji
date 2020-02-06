<div class="x_title">
	<div class="row">
		<div class="col-md-12">
			<h1><i class="fa fa-table fa-lg"> Data Gaji Pokok</i></h1><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl "><i class="glyphicon glyphicon-plus"></i> Tambah Gaji</a>		
		</div>
	</div>	

	<div class="clearfix"></div>
</div>

<div id="notifications">
	<?php echo $this->session->flashdata('msg'); ?>
</div> 

<div class="card">
	<div class="card-body">
		<table class="table table-hover table-bordered" id="sampleTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Gaji</th>
					<th>Kode Jabatan</th>
					<th>Gaji Pokok</th>
					<th>Aksi</th>

				</tr>
			</thead>
			
			<tbody>
				<?php $no=1; foreach($gapok as $g): ?>
				
				<tr>
					<td width="20px" align="center"><?= $no++; ?></td>
					<td align="center"><?= $g->kode_gaji; ?></td>
					<td align="center"><?= $g->kode_jabatan ; ?></td>
					<td align="center"><?= 'Rp '.number_format($g->gaji_pokok); ?></td>
					<td align="center">
						<a class="btn btn-primary" data-toggle="modal" data-target="#modal_edit<?= $g->kode_gaji;?>"><i class="fa fa-lg fa-edit"></i> Edit</a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $g->kode_gaji;?>"><i class="fa fa-lg fa-trash"></i> Hapus</a>
					</td>
				</tr>
				
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

											
											<!-- modal tambah -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Gaji Pokok</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Gapok/tambah'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">Kode Gaji</label>
						<div class="col-md-8">
							<input class="form-control" name="kode_gaji" type="text" placeholder="Kode Gaji" value="<?= $kode_unik; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Kode Jabatan</label>
						<div class="col-md-8">
							<select class="form-control" name="kode_jabatan" required>
								<option value="">---Pilih Kode jabatan---</option>
								<?php foreach($jabatan as $j): ?>
									<option value="<?= $j->kode_jabatan; ?>"><?= $j->kode_jabatan.'  ('. $j->nama_jabatan.')'; ?></option>
									
								<?php endforeach; ?>
							</select>
							
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Gaji Pokok</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="gaji_pokok" placeholder="Gaji Pokok..." required>
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

<?php 	foreach($gapok as $g): ?>

<div class="modal fade" id="modal_hapus<?php echo $g->kode_gaji;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Jabatan</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo base_url('Gapok/hapus');?>">
				<div class="modal-body">
					<p>Anda yakin mau menghapus <b>Gaji Pokok <?= 'Rp '.number_format($g->gaji_pokok); ?></b></p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="kode_gaji" value="<?php echo $g->kode_gaji;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>


										<!-- end modal Hapus -->


										<!-- modal edit -->


<?php foreach($gapok as $g):  ?>

<div class="modal fade" id="modal_edit<?= $g->kode_gaji;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Gaji Pokok</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Gapok/edit'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">Kode Gaji</label>
						<div class="col-md-8">
							<input class="form-control" name="kode_gaji" type="text" placeholder="Kode Jabatan" value="<?= $g->kode_gaji?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Kode Jabatan</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="kode_jabatan" placeholder="Nama Jabatan..." value="<?= $g->kode_jabatan ?>" readonly >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Gaji Pokok (Rp.)</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="gaji_pokok" placeholder="Gaji Pokok..." required value="<?=number_format($g->gaji_pokok) ; ?>">
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





										<!-- end modal edit -->