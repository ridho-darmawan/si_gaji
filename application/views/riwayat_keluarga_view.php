	<div class="x_title">
		<div class="row">
			<div class="col-md-12">
				<h1 align="right">Data Riwayat Keluarga</h1><br>
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
					<th>nama Karyawan</th>
					<th>Status</th>
					<th>No Akta Nikah</th>
					<th>Nama Istri/Suami</th>
					<th>Tanggal Pernikahan</th>
					
					<th>Jumlah Anak</th>
					
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php 	$no=1;	foreach($data as $a) :?>  
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $a->nip; ?></td>
					<td><?= $a->nama; ?></td>
					<td><?= $a->status; ?></td>
					<td><?= $a->no_akta_nikah; ?></td>
					<td><?= $a->nm_pasangan; ?></td>
					<td><?= tgl($a->tgl_nikah); ?></td>
					<?php 
						$data_anak = $this->Data_anak_model->jumlah_anak($a->nip);	
					?>
					<td><?php echo $data_anak->num_rows();?></td>
					<td align="center">
						<a href="#"  data-toggle="modal" data-target="#modal_edit<?= $a->id;?>" class="btn btn-primary btn-sl "><i class="glyphicon glyphicon-edit"></i></a>

						<a href="#" data-toggle="modal" data-target="#modal_tambah_anak<?= $a->nip;?>" class="btn btn-primary btn-sl "><i class="glyphicon glyphicon-plus"></i></a>

						 <a href="<?= base_url('Data_anak/index/'); ?><?php echo $a->nip;?>" class="btn btn-primary btn-sl " data-toggle="tooltip" title="Data Anak"><i class="glyphicon glyphicon-eye-open" ></i></a>

						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $a->id;?>"><i class="fa fa-lg fa-trash"></i></a>
							
					</td>
				</tr>
			<?php endforeach; ?> 
		</tbody>
	</table>
</div>
</div>

<!-- edit modal -->
	<?php foreach($data as $a):  ?>
<div class="modal fade" id="modal_edit<?= $a->id;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Riwayat Keluarga</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Riwayat_keluarga/edit'); ?>">
					<input type="hidden" name="id" value="<?php echo $a->id;?>">
					<div class="form-group">
						<label class="control-label col-md-3">NIP</label>
						 
						<div class="col-md-8">
							<input type="text" class="form-control" name="nip" value="<?= $a->nip;?>" readonly>
							
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Status</label>
						 
						<div class="col-md-8">
							<input type="text" class="form-control" name="status" value="<?= $a->status;?>" readonly>
							
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">No Akta Pernikahan</label>
						<div class="col-md-8">
							<input  type="text"  name="no_akta"  class="form-control" value="<?= $a->no_akta_nikah ?>" >

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Nama Istri/Suami</label>
						 
						<div class="col-md-8">
							<input  type="text" name="pasangan" class="form-control" value="<?= $a->nm_pasangan; ?>">	
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Tgl Nikah</label>
						 
						<div class="col-md-8">
							<input  type="date" name="tgl_nikah" class="form-control" value="<?= $a->tgl_nikah  ?>">	
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
<div class="modal fade" id="modal_hapus<?php echo $a->id;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Data Riwayat</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo base_url('Riwayat_keluarga/hapus');?>">
				<div class="modal-body">
					<p>Anda Yakin Mau Menghapus Data?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" value="<?php echo $a->id;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>

<!-- end modal hapus -->

									<!-- modal tambah riwayat -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data Riwayat Keluarga</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('Riwayat_keluarga/tambah'); ?>">
					
					<div class="form-group">
						<label class="control-label col-md-3">NIP</label>
						<input name="id" type="hidden"> 
						<div class="col-md-8">
							<select class="form-control" name="nip"  required>
								<option value="">Pilih NIP</option>
								<?php foreach($karyawan as $j): ?>
									<option value="<?= $j->nip; ?>"><?= $j->nip .' ( ' .$j->nama.' )'; ?></option>
									
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">No Akta Pernikahan</label>
						<div class="col-md-8">
							<input  type="text"  name="no_akta"  class="form-control" value="" >

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Nama Istri/Suami</label>
						 
						<div class="col-md-8">
							<input  type="text" name="pasangan" class="form-control">	
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Tgl Nikah</label>
						 
						<div class="col-md-8">
							<input  type="date" name="tgl_nikah" class="form-control">	
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

									<!-- end modal tambah -->

									 <!-- modal tambah anak -->
    <?php 	foreach($data as $a): ?>
    <div class="modal fade" id="modal_tambah_anak<?= $a->nip;?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Anak</h4>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?= base_url('Data_anak/tambah'); ?>">


                        <div class="form-group">
                            <label class="control-label col-md-3">No Akta Anak</label>
                            <input type="hidden" name="nip" value="<?= $a->nip;?>">
                            <div class="col-md-8">
                                <input class="form-control" name="no_akta_anak" type="text"  value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" >Nama Anak</label>
                            <div class="col-md-8">
                                <input  type="text"  name="nama_anak" class="form-control col-md-12"  value="" required>

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
    <?php 	endforeach; ?>
    									<!-- end modal tambah anak -->


