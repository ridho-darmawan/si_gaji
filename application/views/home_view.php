<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>Home Admin</title>
	
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/fonts/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/nprogress.css');?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/green.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/custom.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/responsive.bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/scroller.bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
	
	
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">


			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="" class="site_title"><i class="fa fa-paw"></i>
							<span>Tribun Pekanbaru</span>
						</a>
					</div>

					<div class="profile clearfix">
						<div class="profile_pic">
							<img height="60px" src="<?=  base_url($this->session->userdata('ses_foto')); ?>" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome</span>
							<h2><?= $this->session->userdata('ses_nama'); ?></h2>
						</div>
					</div>	
					<br />

					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<ul class="nav side-menu">
								<?php if($this->session->userdata('akses')=='1' ):?>
								<li>
									<a href="<?= base_url('Home/index'); ?>"><i class="fa fa-home"></i>Beranda</a>
								</li>
								
								<li>
									<a><i class="fa fa-desktop"></i>Data Master
										<span class="fa fa-chevron-down"></span>
									</a>
									<ul class="nav child_menu">

										<li>
											<a href="<?= base_url('Karyawan/index'); ?>">Data Karyawan</a>
										</li>
										<li>
											<a href="<?= base_url('Jabatan/index'); ?>">Data Jabatan</a>
										</li>
										
									</ul>
								</li> 		
								
								<li>
									<a href="<?= base_url('Riwayat_keluarga/index'); ?>"><i class="fa fa-child"></i>Riwayat Keluarga</a>
								</li>

								<li>
									<a href="<?= base_url('Lembur/index'); ?>"><i class="fa fa-clock-o"></i>Lembur</a>
								</li>
								<li>
									<a href="<?= base_url('Absensi/index'); ?>"><i class="fa fa-book"></i>Absensi</a>
								</li>
								<li>
									<a href="<?= base_url('Pembayaran/index'); ?>"><i class="fa fa-paypal"></i>Pembayaran Gaji</a>
								</li>

								<li>
									<a><i class="fa fa-file"></i>Laporan
										<span class="fa fa-chevron-down"></span>
									</a>
									<ul class="nav child_menu">
										<li>
											<a href="<?= base_url('Laporan/all_rekap_gaji'); ?>">Rekap Gaji</a>
										</li> 
									</ul>
								</li>
								<?php elseif ($this->session->userdata('akses')=='2') :?>
									<li>
									<a href="<?= base_url('Home/index'); ?>"><i class="fa fa-home"></i>Beranda</a>
									</li>

									<li>
									<a href="<?= base_url('Laporan/data_gaji_keuangan'); ?>"><i class="fa fa-paypal"></i>Data Gaji</a>
									</li>

									<li>
									<a href="<?= base_url('Laporan/all_rekap_gaji'); ?>"><i class="fa fa-book"></i>Rekap Gaji</a>
									</li>

								<?php elseif ($this->session->userdata('akses')=='3') :?>
									<li>
									<a href="<?= base_url('Home/index'); ?>"><i class="fa fa-home"></i>Beranda</a>
									</li>

									<li>
									<a href="<?= base_url('Laporan/data_gaji_karyawan'); ?>"><i class="fa fa-paypal"></i>Data Gaji</a>
									</li>							


							<?php else: ?>
							<?php endif; ?>

							</ul>
						</div>
					</div>

				</div>
			</div>

			
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">

								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="<?=  base_url($this->session->userdata('ses_foto')); ?>" alt=""> <?php echo $this->session->userdata('ses_nama'); ?>
									<span class=" fa fa-angle-down"></span>
								</a>
							
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									
									<li><a onclick="window.location='<?= base_url('Login/keluar'); ?>'"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>


			

			<div class="right_col" role="main">				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<?php $this->load->view($main_view); ?>
							
						</div>
					</div>
				</div>
			</div>
		

		
		<footer>
			<div class="pull-right">
				Copyright @ ridho darmawan
			</div>
			<div class="clearfix"></div>
		</footer>
		</div>
	</div>

<script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/fastclick.js');?>"></script>
<script src="<?= base_url('assets/js/nprogress.js');?>"></script>
<script src="<?= base_url('assets/js/icheck.min.js');?>"></script>
<script src="<?= base_url('assets/js/custom.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.smartWizard.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js');?>"></script>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

<script>$(document).ready(function(){
		$('#sampleTable').DataTable();
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

<script>
	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>

<script>   
    $('#notifications').slideDown('slow').delay(4000).slideUp('slow');
</script>

<script src="<?= base_url('assets/js/jquery.validate.js');?>"></script>


</body>
</html>