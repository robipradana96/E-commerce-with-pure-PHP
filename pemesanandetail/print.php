<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data pemesanan detail:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id</td>
    <th width="25%"><center>kode_pemesanan</td>
    <th width="25%"><center>kode_paket</td>
    <th width="20%"><center>jumlah</td>
    <th width="10%"><center>subtotal</td>
    <th width="5%"><center>catatan</td>
  </tr>
<?php  
  $sql="select * from `$tbpemesanandetail` order by `id` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id=$d["id"];
				$kode_pemesanan=$d["kode_pemesanan"];
				$kode_paket=$d["kode_paket"];
				$jumlah=$d["jumlah"];
				$subtotal=$d["subtotal"];
				$catatan=$d["catatan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id</td>
				<td>$kode_pemesanan</td>
				<td>$kode_paket</td>
				<td>$jumlah</td>
				<td>$subtotal</td>
				<td>$catatan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id</td>
				<td>$kode_pemesanan</td>
				<td>$kode_paket</td>
				<td>$jumlah</td>
				<td>$subtotal</td>
				<td>$catatan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pemesanandetail belum tersedia...</blink></td></tr>";}
		
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

