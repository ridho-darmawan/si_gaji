
<div class="x_title">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: right;">Data Jenis Tunjangan</h1><br>
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
					<th>Jenis Tunjangan</th>
					<th style="text-align: center;">Aksi</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 	$no=1;	foreach($jenis_tunjangan as $j) :?>
				<tr>
					<td align="center"><?= $no++; ?></td>
					<td align="center"><?= $j->nama_tunjangan; ?></td>
					<td align="center">
						<a class="btn btn-primary" data-toggle="modal" data-target="#modal_edit<?= $j->id_tunjangan;?>"><i class="fa fa-lg fa-edit"></i> </a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $j->id_tunjangan;?>"><i class="fa fa-lg fa-trash"></i> </a>
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
				<h4 class="modal-title">Tambah Jenis Tunjangan</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('jenis_tunjangan/tambah'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">Jenis Tunjangan</label>
						<div class="col-md-8">

							<input class="form-control" name="jenis" type="text" required>
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

<?php 	foreach($jenis_tunjangan as $j): ?>
<div class="modal fade" id="modal_hapus<?php echo $j->id_tunjangan;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Jenis Tunjangan</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo base_url('jenis_tunjangan/hapus');?>">
				<div class="modal-body">
					<p>Anda yakin mau menghapus <b>Jenis Tunjangan <?php echo $j->nama_tunjangan;?></b></p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" value="<?php echo $j->id_tunjangan;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>

   									<!--END MODAL HAPUS-->



   									<!-- edit modal -->
<?php foreach($jenis_tunjangan as $j):  ?>
<div class="modal fade" id="modal_edit<?= $j->id_tunjangan;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit jenis tunjangan</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Jenis_tunjangan/edit'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">Jenis Tunjangan</label>
						<div class="col-md-8">
							<input type="hidden" name="id" value="<?php echo $j->id_tunjangan;?>">x_title
							<input class="form-control" name="jenis" type="text" value="<?= $j->nama_tunjangan; ?>" required>
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
