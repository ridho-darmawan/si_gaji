
<div class="x_title">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: right;">Data Jabatan</h1><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl pull-right "><i class="glyphicon glyphicon-plus"></i></a>		
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
					<th width="25px">No</th>
					<th>Kode jabatan</th>
					<th>Nama Jabatan</th>
					<th>Tunjangan Jabatan</th>
					<th>Gaji Pokok</th>
					<th style="text-align: center;">Aksi</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 	$no=1;	foreach($jabatan as $jb) :?>
				<tr>
					<td align="center"><?= $no++; ?></td>
					<td align="center"><?= $jb->kode_jabatan; ?></td>
					<td align="center"><?= $jb->nama_jabatan; ?></td>
					<td><?= 'Rp. '.number_format($jb->tunjangan_jabatan); ?></td>
					<td><?= 'Rp. '.number_format($jb->gaji_pokok); ?></td>
					<td align="center">
						<a class="btn btn-primary" data-toggle="modal" data-target="#modal_edit<?= $jb->kode_jabatan;?>"><i class="fa fa-lg fa-edit"></i> </a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $jb->kode_jabatan;?>"><i class="fa fa-lg fa-trash"></i> </a>
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
				<h4 class="modal-title">Tambah Jabatan</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Jabatan/tambah_aksi'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">Kode Jabatan</label>
						<div class="col-md-8">
							<input class="form-control" name="kode_jabatan" type="text" placeholder="Kode Jabatan" value="<?= $kode_unik;?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Nama Jabatan</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="nama_jabatan"  required autofocus>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-3">Tunjangan (Rp)</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="tunjangan" placeholder="" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Gaji Pokok (Rp)</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="gapok"  required>
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

<?php 	foreach($jabatan as $jb): ?>
<div class="modal fade" id="modal_hapus<?php echo $jb->kode_jabatan;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Jabatan</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo base_url('Jabatan/hapus');?>">
				<div class="modal-body">
					<p>Anda yakin mau menghapus <b>Jabatan <?php echo $jb->nama_jabatan;?></b></p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="kode_jabatan" value="<?php echo $jb->kode_jabatan;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>

   									<!--END MODAL HAPUS-->



   									<!-- edit modal -->
<?php foreach($jabatan as $jb):  ?>
<div class="modal fade" id="modal_edit<?= $jb->kode_jabatan;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Jabatan</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Jabatan/edit'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">Kode Jabatan</label>
						<div class="col-md-8">
							<input class="form-control" name="kode_jabatan" type="text" placeholder="Kode Jabatan" value="<?= $jb->kode_jabatan?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Nama Jabatan</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="nama_jabatan"  value="<?= $jb->nama_jabatan ?>" required >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Tunjangan (Rp)</label>
						<div class="col-md-8">
							<input class="form-control" type="decimal" name="tunjangan" placeholder="" value="<?= $jb->tunjangan_jabatan; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Gaji Pokok (Rp)</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="gapok" value="<?= $jb->gaji_pokok; ?>" required>
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
