<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpemesanandetail`";
if(getJum($conn,$sql)>0){
	print "<pemesanandetail>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id=$d["id"];
				$kode_pemesanan=$d["kode_pemesanan"];
				$kode_paket=$d["kode_paket"];
				$jumlah=$d["jumlah"];
			    $subtotal=$d["subtotal"];
				$catatan=$d["catatan"];
												
				print "<record>\n";
				print "  <kode_pemesanan>$kode_pemesanan</kode_pemesanan>\n";
				print "  <kode_paket>$kode_paket</kode_paket>\n";
				print "  <jumlah>$jumlah</jumlah>\n";
				print "  <subtotal>$subtotal</subtotal>\n";
				print "  <catatan>$catatan</catatan>\n";
				print "  <id>$id</id>\n";
				print "</record>\n";
			}
	print "</pemesanandetail>\n";
}
else{
	$null="null";
	print "<pemesanandetail>\n";
		print "<record>\n";
				print "  <kode_pemesanan>$null</kode_pemesanan>\n";
				print "  <kode_paket>$null</kode_paket>\n";
				print "  <jumlah>$null</jumlah>\n";
				print "  <subtotal>$null</subtotal>\n";
				print "  <catatan>$null</catatan>\n";
				print "  <id>$null</id>\n";
		print "</record>\n";
	print "</pemesanandetail>\n";
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
	