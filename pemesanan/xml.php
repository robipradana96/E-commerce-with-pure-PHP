<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpemesanan`";
if(getJum($conn,$sql)>0){
	print "<pemesanan>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_pemesanan=$d["kode_pemesanan"];
				$tgl_pemesanan=$d["tgl_pemesanan"];
				$jam_pemesanan=$d["jam_pemesanan"];
				$nama_pemesan=$d["nama_pemesan"];
			    $email=$d["email"];
				$telepon=$d["telepon"];
				$telepon=$d["status"];
				$telepon=$d["alamat_pengiriman"];
				$telepon=$d["keterangan"];
												
				print "<record>\n";
				print "  <tgl_pemesanan>$tgl_pemesanan</tgl_pemesanan>\n";
				print "  <jam_pemesanan>$jam_pemesanan</jam_pemesanan>\n";
				print "  <nama_pemesan>$nama_pemesan</nama_pemesan>\n";
				print "  <email>$email</email>\n";
				print "  <telepon>$telepon</telepon>\n";
				print "  <telepon>$status</telepon>\n";
				print "  <alamat_pengiriman>$alamat_pengiriman</alamat_pengiriman>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <kode_pemesanan>$kode_pemesanan</kode_pemesanan>\n";
				print "</record>\n";
			}
	print "</pemesanan>\n";
}
else{
	$null="null";
	print "<pemesanan>\n";
		print "<record>\n";
				print "  <tgl_pemesanan>$null</tgl_pemesanan>\n";
				print "  <jam_pemesanan>$null</jam_pemesanan>\n";
				print "  <nama_pemesan>$null</nama_pemesan>\n";
				print "  <email>$null</email>\n";
				print "  <telepon>$null</telepon>\n";
				print "  <status>$null</status>\n";
				print "  <alamat_pengiriman>$null</alamat_pengiriman>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <kode_pemesanan>$null</kode_pemesanan>\n";
		print "</record>\n";
	print "</pemesanan>\n";
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
	