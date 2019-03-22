<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data pemesanan:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kode_pemesanan</td>
    <th width="25%"><center>tgl_pemesanan</td>
    <th width="25%"><center>jam_pemesanan</td>
    <th width="20%"><center>nama_pemesan</td>
    <th width="10%"><center>email</td>
    <th width="5%"><center>telepon</td>
    <th width="5%"><center>status</td>
    <th width="5%"><center>alamat_pengiriman</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbpemesanan` order by `kode_pemesanan` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_pemesanan=$d["kode_pemesanan"];
				$tgl_pemesanan=$d["tgl_pemesanan"];
				$jam_pemesanan=$d["jam_pemesanan"];
				$nama_pemesan=$d["nama_pemesan"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$status=$d["status"];
				$alamat_pengiriman=$d["alamat_pengiriman"];
				$keterangan=$d["keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_pemesanan</td>
				<td>$tgl_pemesanan</td>
				<td>$jam_pemesanan</td>
				<td>$nama_pemesan</td>
				<td>$email</td>
				<td>$telepon</td>
				<td>$status</td>
				<td>$alamat_pengiriman</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_pemesanan</td>
				<td>$tgl_pemesanan</td>
				<td>$jam_pemesanan</td>
				<td>$nama_pemesan</td>
				<td>$email</td>
				<td>$telepon</td>
				<td>$status</td>
				<td>$alamat_pengiriman</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pemesanan belum tersedia...</blink></td></tr>";}
		
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

</table>

