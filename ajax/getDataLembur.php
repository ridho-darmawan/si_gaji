<?php

$con = mysqli_connect("localhost","root","","db_gaji");

$nip = $_GET['nip'];

$query = mysqli_query($con,"SELECT SUM(lama_lembur) as lama FROM lembur WHERE EXTRACT(MONTH FROM tgl_lembur) = 10 AND nip = '$nip'");

$hasil = [];

while($row = mysqli_fetch_assoc($query)){
	array_push($hasil,$row);
}

echo json_encode($hasil);


