<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data paket:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kode_paket</td>
    <th width="25%"><center>nama_paket</td>
    <th width="25%"><center>deskripsi</td>
    <th width="20%"><center>telp</td>
    <th width="5%"><center>status</td>
	<th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbpaket` order by `kode_paket` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_paket=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
				$deskripsi=$d["deskripsi"];
				$harga=$d["harga"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_paket</td>
				<td>$nama_paket</td>
				<td>$deskripsi</td>
				<td>$harga</td>
			
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_paket</td>
				<td>$nama_paket</td>
				<td>$deskripsi</td>
				<td>$harga</td>

				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data paket belum tersedia...</blink></td></tr>";}
		
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

