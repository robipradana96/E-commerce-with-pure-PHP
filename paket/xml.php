<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpaket`";
if(getJum($conn,$sql)>0){
	print "<paket>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_paket=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
				$deskripsi=$d["deskripsi"];
				$harga=$d["harga"];
				$gambar=$d["gambar"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <nama_paket>$nama_paket</nama_paket>\n";
				print "  <deskripsi>$deskripsi</deskripsi>\n";
				print "  <harga>$harga</harga>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <status>$status</status>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <kode_paket>$kode_paket</kode_paket>\n";
				print "</record>\n";
			}
	print "</paket>\n";
}
else{
	$null="null";
	print "<paket>\n";
				print "<record>\n";
				print "  <nama_paket>$null</nama_paket>\n";
				print "  <deskripsi>$null</deskripsi>\n";
				print "  <gambar>$null</gambar>\n";				
				print "  <harga>$null</harga>\n";
				print "  <status>$null</status>\n";				
				print "  <keterangan>$null</keterangan>\n";
				print "  <kode_paket>$null</kode_paket>\n";
				print "</record>\n";
	print "</paket>\n";

}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
?>
	