<script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>

<script language="JavaScript">
	var tanggallengkap = new String();
	var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
	namahari = namahari.split(" ");
	var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
	namabulan = namabulan.split(" ");
	var tgl = new Date();
	var hari = tgl.getDay();
	var tanggal = tgl.getDate();
	var bulan = tgl.getMonth();
	var tahun = tgl.getFullYear();
	tanggallengkap = namahari[hari] + "- " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
		LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
		TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
		settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
		popupWindow = window.open(url,winName,settings)
	}
</script>
<div style="text-align: right">
<i>
	<script language="JavaScript">document.write(tanggallengkap);</script>
</i>
<i id="output"></i>	
</div>
<div id="notifications">
	<?php echo $this->session->flashdata('msg'); ?>
</div> 
<h1 align="center""><img src="<?= base_url('assets/images/tribun1.jpg'); ?>" width="500px;"></h1><br><br><br>

	  <div class="row">  
	      <div align="center" class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-user aero"></i></div>
	          
	          <div class="count"><?= $jumlah; ?></div>
	      
	          <h3>Jumlah Karyawan</h3>
	          <p>Tribun Pekanbaru</p>
	        </div>
	      </div>

              <div class="animated flipInY col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-tags"></i></div>
                  <div class="count" align="center">Visi & Misi</div>
                  
                  <p style="font-size: 18px; "><br>Visi dan misi tribun Pekanbaru menjadi agen perubahan dalam membangun komunitas yang lebih harmonis, toleran, aman, dan sejahtra mempertahankan tribun sebagai salah market leader di kawasan Riau melalui sumber daya dan sinergi bersama mitra strategis</p>
                </div>
              </div>
              </div><br><br><br><br><br><br><br><br><br><br>
          
            
