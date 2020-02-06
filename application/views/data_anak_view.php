	<div class="x_title">
		<div class="row">
			<div class="col-md-12">
				<h1 align="right">Data Anak</h1><br>
			</div>
		</div>


	<i class="glyphicon glyphicon-forward"></i><a href="<?= base_url('Riwayat_keluarga/index') ?>" style="font-size: 20px;">  Data Riwayat Keluarga /</a><a> Data Anak</a>
		<div class="clearfix"></div>
	</div>

<div id="notifications">
	<?php echo $this->session->flashdata('msg'); ?>
</div> 
<br>

<div class="card">
	<div class="card-body">
		<table class="table table-hover table-bordered" >
			<thead>

				<tr>
					<th width="25px">No</th>
                    <th>No Akta Anak</th>
					<th>Nama Anak</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php 	$no=1;	foreach($data as $a) :?>  
				<tr>
					<td><?= $no++; ?></td>
                    <td><?= $a->no_akta_anak; ?></td>
                    <td><?= $a->nama_anak; ?></td>
					<td align="center">
							<a href="#"  data-toggle="modal" data-target="#modal_edit<?= $a->id_anak;?>" class="btn btn-primary btn-sl "><i class="glyphicon glyphicon-edit"></i></a>
							<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $a->id_anak;?>"><i class="fa fa-lg fa-trash"></i></a>
							
					</td>
				</tr>
			<?php endforeach; ?> 
		</tbody>
	</table>
</div>
</div>

<!-- edit modal -->
	<?php foreach($data as $a):  ?>
<div class="modal fade" id="modal_edit<?= $a->id_anak;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Riwayat Keluarga</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Data_anak/edit'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">No Akta Anak</label>
                        <input type="hidden" name="id" value="<?= $a->id_anak?>" >
                        <input type="hidden" name="nip" value="<?= $a->nip?>" >
						<div class="col-md-8">
							<input class="form-control" name="no_akta" type="text"  value="<?= $a->no_akta_anak?>" >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" >Nama Anak</label>
						<div class="col-md-8">
							<input  type="text"  name="nama_anak" class="form-control col-md-12"  value="<?= $a->nama_anak; ?>">

						</div>
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
<!-- end edit modal -->

<!-- modal hapus -->

<?php 	foreach($data as $a): ?>
<div class="modal fade" id="modal_hapus<?php echo $a->id_anak;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Data Riwayat</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo base_url('Data_anak/hapus');?>">
				<div class="modal-body">
					<p>Anda Yakin Mau Menghapus Data?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" value="<?php echo $a->id_anak;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>

<!-- end modal hapus -->





