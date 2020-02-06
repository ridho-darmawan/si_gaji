<div class="x_title">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: right;">Data Karyawan</h1><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 ">
			<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl pull-right "><i class="glyphicon glyphicon-plus"></i></a>		
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
					<th width="10px">No</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Jk</th>
					<th>Jabatan</th>
					<th style="text-align:center;">Aksi</th>
				</tr>
			</thead>
			
			
			<tbody>
				<?php $no=1; foreach($karyawan as $k): ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $k->nip; ?></td>
					<td><?= $k->nama; ?></td>
					<td><?= $k->jenis_kelamin; ?></td>
					<td><?= $k->nama_jabatan; ?></td>
					<td align="center">
						<a class="btn btn-primary" data-toggle="modal" data-target="#modal_detail<?= $k->nip;?>"><i class="fa fa-lg fa-info"></i> </a>
						<a class="btn btn-success" data-toggle="modal" data-target="#modal_edit<?= $k->nip;?>"><i class="fa fa-lg fa-edit"></i> </a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $k->nip;?>"><i class="fa fa-lg fa-trash"></i> </a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>

<!-- modal tambah -->


<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Karyawan</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('Karyawan/tambah_karyawan'); ?>">

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>NIP</label>		
								<input class="form-control" name="nip" type="text" value="<?= $kode_nip;  ?>" readonly>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<label>Jabatan</label>

								<select class="form-control" name="jabatan" required>
									<option value="">---Pilih jabatan---</option>
									<?php foreach($jabatan as $j): ?>
										<option value="<?= $j->kode_jabatan; ?>"><?= $j->kode_jabatan .' ( ' .$j->nama_jabatan.' )'; ?></option>

									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Nama Karyawan</label>
								<input class="form-control" type="text" name="nama_karyawan" placeholder="" required autofocus>
							</div>
						</div>
					</div><br>

					<div class="row">

						<div class="col-md-4">
							<div class="form-group">
								<label>Jenis Kelamin</label>		
								<select name="jk" class="form-control" required>
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input class="form-control" type="text" name="tempat_lahir" placeholder="" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input class="form-control" type="date" name="tanggal_lahir" placeholder="" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Agama</label>		
								<select name="agama" class="form-control" required>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Khatolik">Katholik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>		
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" type="text" name="alamat" placeholder="" required></textarea>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>No Telpon / HP</label>
								<input class="form-control" type="text" name="no_telp" placeholder="" required>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">

								<label>Password</label>
								<input class="form-control" type="text" name="pass" placeholder="" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<label>Level</label>

								<select class="form-control" name="level" required>
									<option value="">---Pilih Level---</option>
									<option value="1">1 </option>
									<option value="2">2 </option>
									<option value="3">3	</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							
							<div class="form-group">
								<label for="userfile">Foto </label>
								<div class="input-group col-xs-12">
									<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
									<input type="file" name="foto" class="form-control" required >

								</div>
							</div>
						</div>

					</div><br>


					<div class="modal-footer">
						<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>

<!-- end modal tambah -->


<!-- modal detail -->
<?php 	foreach($karyawan as $k): ?>
	<div class="modal fade" id="modal_detail<?php echo $k->nip;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" >
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 class="modal-title" id="myModalLabel">Detail Data Karyawan</h3>
				</div>



				<div class="row">
					<div class="col-md-5">
							<div class="modal-body">
								<center><img src="<?= base_url($k->foto) ; ?>"  alt="..." class="img-rounded" width="230" height="250"></center>
							</div>
					</div>
					<div class="col-md-7">

						<form class="form-horizontal" method="post" action="">
							<div class="modal-body">

								<table class="table table-bordered">
									<tbody>
										<tr>
											<td>Nama Karyawan</td>
											<td><?= $k->nama; ?></td>
										</tr>
										<tr>
											<td>NIP Karyawan</td>
											<td><?= $k->nip; ?></td>
										</tr>
										<tr>
											<td>Kode Jabatan</td>
											<td><?= $k->kode_jabatan; ?></td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td><?= $k->jenis_kelamin; ?></td>
										</tr>
										<tr>
											<td>TTL</td>
											<td><?= $k->tempat_lahir.','.tgl($k->tanggal_lahir); ?></td>
										</tr>
																				
										<tr>
											<td>Jabatan</td>
											<td><?= $k->nama_jabatan; ?></td>
										</tr>
										
										<tr>
											<td>Agama</td>
											<td><?= $k->agama; ?></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td><?= $k->alamat; ?></td>
										</tr>
										<tr>
											<td>No Telp</td>
											<td><?= $k->nomor_telpon; ?></td>
										</tr>
										<tr>
											<td>Password</td>
											<td><?= $k->password; ?></td>
										</tr>
										<tr>
											<td>Level</td>
											<td><?= $k->level; ?></td>
										</tr>
										</tbody>
									</table>

							</div>

						</form>
					</div>
				</div>
					<div class="modal-footer">
						<a class="btn btn-danger icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
					</div>

			</div>
		</div>
	</div>

	<?php 	endforeach; ?>

<!-- end modal detail -->



	<!-- modal edit -->


<?php foreach($karyawan as $k):  ?>
		<div class="modal fade" id="modal_edit<?= $k->nip;?>" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Karyawan</h4>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?= base_url('Karyawan/edit_karyawan'); ?>">
						
						<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>NIP</label>		
								<input class="form-control" name="nip" type="text" value="<?= $k->nip;  ?>" readonly>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<label>Jabatan</label>

								<select class="form-control" name="jabatan" required>
									<option value="<?= $k->kode_jabatan; ?>"><?= $k->nama_jabatan; ?></option>
									<?php foreach($jabatan as $j): ?>
										<option value="<?= $j->kode_jabatan; ?>"><?= $j->nama_jabatan; ?></option>

									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Nama Karyawan</label>
								<input class="form-control" type="text" name="nama_karyawan" value="<?= $k->nama;  ?>" required autofocus>
							</div>
						</div>
					</div><br>

					<div class="row">

						<div class="col-md-4">
							<div class="form-group">
								<label>Jenis Kelamin</label>		
								<select name="jk" class="form-control" required>
									<option value="<?= $k->jenis_kelamin; ?>"><?= $k->jenis_kelamin; ?></option>
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input class="form-control" type="text" name="tempat_lahir" value="<?= $k->tempat_lahir; ?>" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input class="form-control" type="date" name="tanggal_lahir" value="<?= $k->tanggal_lahir;?>" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Agama</label>	

								<select name="agama" class="form-control" required>
									<option value="<?= $k->agama; ?>"><?= $k->agama; ?></option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Khatolik">Katholik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>		
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Alamat</label>
								<input class="form-control" type="text" name="alamat" value="<?= $k->alamat; ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>No Telpon / HP</label>
								<input class="form-control" type="text" name="no_telp" value="<?= $k->nomor_telpon; ?>" required>
							</div>
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">

								<label>Password</label>
								<input class="form-control" type="text" name="pass" value="<?= $k->password; ?>" readonly>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<label>Level</label>

								<select class="form-control" name="level" required>
									<option value="<?= $k->level; ?>"><?= $k->level; ?></option>
									<option value="1">1 (Admin)</option>
									<option value="2">2 (keuangan)</option>
									<option value="3">3	(karyawan)</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							
							<div class="form-group">
								<label for="userfile">Foto </label>
								<div class="input-group col-xs-12">
									<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
									<input type="file" name="foto" class="form-control" value="<?= $k->foto; ?>" >

								</div>
							</div>
						</div>

					</div><br>

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


	<!-- modal hapus -->

	<?php 	foreach($karyawan as $k): ?>
		<div class="modal fade" id="modal_hapus<?php echo $k->nip;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						<h3 class="modal-title" id="myModalLabel">Hapus Data Karyawan</h3>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo base_url('Karyawan/hapus_data');?>">
						<div class="modal-body">
							<p>Anda yakin mau menghapus <b>Data Karyawan <?php echo $k->nama;?></b></p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="nip" value="<?php echo $k->nip;?>">
							<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	<?php 	endforeach; ?>

   									<!--END MODAL HAPUS-->