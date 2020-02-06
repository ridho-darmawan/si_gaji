	<?php $d=date('d');
							$hari=$d; ?>
<div class="x_title">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: right;">Data Lembur</h1><br>
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
					<th>No</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Tanggal Lembur</th>
					<th>Lama Lembur (Jam)</th>
					<th>Nomor Surat</th>
					<th>Surat Lembur</th>
					<th align="center">Aksi</th>
					
				</tr>
			</thead>
			
			<tbody>
				<?php $no=1; foreach($lembur as $l):?>

					<tr>
						<td><?= $no++; ?></td>
						<td><?= $l->nip; ?></td>
						<td><?= $l->nama; ?></td>
						<td><?= tgl($l->tgl_lembur); ?></td>
						<td><?= $l->lama_lembur.' Jam'; ?></td>
						<td><?= $l->no_surat; ?></td>
						<td><center><img src="<?= base_url($l->surat_lembur) ; ?>"  alt="surat lembur" class="img-rounded" width="100" height="50"></center></td>
						<td align="center">
							<a class="btn btn-success" data-toggle="modal" data-target="#modal_edit<?= $l->no_surat;?>"><i class="fa fa-lg fa-edit"></i> </a>
							<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $l->no_surat;?>"><i class="fa fa-lg fa-trash"></i> </a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
 	</div>
</div>


<!-- modal hapus -->

<?php 	foreach($lembur as $l): ?>
	<div class="modal fade" id="modal_hapus<?php echo $l->no_surat;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 class="modal-title" id="myModalLabel">Hapus Lembur</h3>
				</div>
				<form class="form-horizontal" method="post" action="<?php echo base_url('Lembur/hapus');?>">
					<div class="modal-body">
						<p><b>Anda yakin mau menghapus ?</b></p>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="no_surat" value="<?php echo $l->no_surat;?>">
						<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php 	endforeach; ?>

<!--END MODAL HAPUS-->


<!-- modal tambah -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data Lembur</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="<?= base_url('Lembur/tambah'); ?>">
					  	
                    <div class="form-group">
						<label class="control-label col-md-2">Tanggal</label>
						<div class="col-md-2">
							<select name="hari" class="form-control">
								<option value="<?= $hari; ?>"><?= $hari; ?></option>
									<?php for ($i=1;$i<=31;$i++) :?>										
										<option value="<?= $i; ?>"><?= $i; ?></option>
									<?php endfor; ?>
							</select>
							
						</div>
						
						<label class="control-label col-md-1">Bulan</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="bulan" value="<?= date('m'); ?>" readonly>

						</div>
						
						<label class="control-label col-md-1">Tahun</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="tahun" value="<?= date('Y'); ?>" readonly>
						
						</div>
					</div>

					
					<div class="form-group">
						<label class="control-label col-md-2">NIP</label>
						<input name="id" type="hidden"> 
						<div class="col-md-10">
							<select class="form-control" name="nip" onchange="cariLembur(this.value)" required>
								<option value="">Pilih NIP</option>
								<?php foreach($karyawan as $j): ?>
									<option value="<?= $j->nip; ?>"><?= $j->nip .' ( ' .$j->nama.' )'; ?></option>
									
								<?php endforeach; ?>
							</select>
						</div>	
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Total Lembur</label>
						<div class="col-md-10">
							<input type="text" class="form-control" disabled="" id="jamlembur" name="">
						</div>
					</div>
					<br>

					<div class="form-group">
						<label class="control-label col-md-2">No Surat</label>
						<div class="col-md-10">
							<input class="form-control" name="no_surat" type="text" required>
						</div>
					</div>

					
					<div class="form-group">
						<label class="control-label col-md-2">Lama Lembur (Jam)</label>
						<div class="col-md-10">
							
							<select class="form-control" name="lama" required>
								<?php for($i=1;$i<=8;$i++) : ?>
								<option value="<?= $i; ?>"><?= $i; ?></option>
							<?php endfor ?>
							</select>
						</div>
					</div>

					
					<div class="form-group">
						<label class="control-label col-md-2">Upload Surat Lembur</label>
						<div class="col-md-10">
							<input class="form-control" name="surat_lembur" type="file" required>
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


	<!-- edit modal -->
<?php foreach($lembur as $l):  ?>
<div class="modal fade" id="modal_edit<?= $l->no_surat;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('Lembur/edit'); ?>">
				
					<div class="form-group">
						<label class="control-label col-md-2">Tanggal</label>
						<div class="col-md-2">
							
							<input type="text" class="form-control" name="hari" value="<?= date('d'); ?>" readonly>
						</div>
						
						<label class="control-label col-md-1">Bulan</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="bulan" value="<?= date('m'); ?>" readonly>

						</div>
						
						<label class="control-label col-md-1">Tahun</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="tahun" value="<?= date('Y'); ?>" readonly>
						
						</div>
					</div>

					
					<div class="form-group">
						<label class="control-label col-md-2">NIP</label>
						
						<div class="col-md-10">
							<input class="form-control" name="nip" type="text" value="<?= $l->nip;?>" readonly>
						</div>
						
					</div>

					<div class="form-group">
						<label class="control-label col-md-2">No Surat</label>
						<div class="col-md-10">
							<input class="form-control" name="no_surat" value="<?= $l->no_surat; ?>" type="text" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-2">Lembur  Hari Ini (Jam)</label>
						<div class="col-md-10">
							
							<input type=""  class="form-control" value="<?= $l->lama_lembur ?>" name="lama">
						</div>
					</div>


					
					<div class="form-group">
						<label class="control-label col-md-2">Total Lembur (Jam)</label>
						<div class="col-md-10">
							
							<input type="" disabled="" class="form-control" value="<?= $l->lama_lembur2 ?>" name="">
						</div>
					</div>

					
					<div class="form-group">
						<label class="control-label col-md-2">Upload Surat Lembur</label>
						<div class="col-md-10">
							<input class="form-control" name="surat_lembur" type="file" value="<?= $l->surat_lembur; ?>">
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

<script>
	function cariLembur(val){
		var nip = val;
		var tampil = document.getElementById('jamlembur');

		$.ajax({
		    method: "GET", 
		    url: "<?= base_url('ajax/getDataLembur.php?nip=') ?>"+val, 

		}).done(function( data ) {

			var hasil = $.parseJSON(data);
			$.each( hasil, function( key, value ) {
				tampil.value = value['lama'];
			});

		});

	}
</script>