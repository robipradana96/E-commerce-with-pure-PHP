 <script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<h2><font color="red">Keranjang Belanja <?php echo $_SESSION["corder"];?></font></h2>
<div style="text-align:center; font-family: 'Comic Sans MS', cursive; font-weight: bold;"> 
      
   <p>&nbsp;</p>
   <table width="100%" border="0">
 <tr bgcolor="#999999">
 <th>Gambar
 <th>Nama Paket
 <th>Harga
 <th>Jumlah
 <th>Subtotal
  <th>Batal
 </tr>
 
 <?php  

 

  $sql="select * from `$tbpemesanandetail` where kode_pemesanan='".$_SESSION["corder"]."' order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
$no=1;
	$gab=0;									
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id=$d["id"];
				$kode_pemesanan=$d["kode_pemesanan"];
				$kode_paket=$d["kode_paket"];
				
				$jumlah=$d["jumlah"];
				$subtotal=$d["subtotal"];
					$catatan=$d["catatan"];
				$gab+=$subtotal;
				
				
			$sqld="select * from `$tbpaket` where `kode_paket`='$kode_paket'";
	$dd=getField($conn,$sqld);
				$kode_paket=$dd["kode_paket"];
				$nama_paket=$dd["nama_paket"];
				$deskripsi=$dd["deskripsi"];
				$harga=$dd["harga"];
				$keterangan=$dd["keterangan"];
				$status=$dd["status"];
				$gambar=$dd["gambar"];
				
				$gambar=$dd["gambar"];
				
					$color="#ffffea";	
					if($no %2==0){$color="#ffffb5";}
echo"<tr bgcolor='$color'>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"paket/zoom.php?id=$kode_paket\")'>
<img src='ypathfile/$gambar' width='40' height='40' /></a></div>
				<td align='left'>$nama_paket - $kode_paket</td>
				<td align='right'>Rp ".RP($harga).",-</td>
				<td align='center'>$jumlah</td>
				<td align='right'>Rp ".RP($subtotal).",-</td>
				<td align='center'>
<a href='?mnu=keranjang&id=$kode_pemesanan&pro=hapus'><img src='ypathicon/h.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kode_pemesanan pada data orderdetail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink><h1>Maaf, Data Transaksi Baru Anda belum tersedia...</h1></blink></td></tr>";}
?>
</table>
    <?php
	echo"Total Harga ".RP($gab).";";
	?> 
</div>

<br><br><div align="right">
<?php
if($jum > 0) 
{?>
<a href="?mnu=keranjang2"><img src="ypathicon/selesai.jpg" width="200" height="70"></a>
<?php
}
?>

</div>
<br><br><br>
<?php
if($_GET["pro"]=="hapus"){
$kode_pemesanan=$_GET["id"];
$sql="delete from `$tbpemesanandetail` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data orderdetail $id berhasil dihapus !');document.location.href='?mnu=keranjang';</script>";}
else{echo"<script>alert('Data orderdetail $id gagal dihapus...');document.location.href='?mnu=keranjang';</script>";}
}
?>

<?php
if($_GET["pro"]=="selesai"){
	$ido=$_SESSION["corder"];
$sql="update `$tbpemesanan` set status='Request' where `kode_pemesanan`='".$ido."'";
$hapus=process($conn,$sql);
$_SESSION["corder"]="";
unset($_SESSION["corder"]);
if($hapus) {echo "<script>alert('Data order detail ".$ido." berhasil Dikirim, Terima kasih atas pesanan anda, Team Kami Akan Segera Mengkonfirmasi Pesanan Anda.');document.location.href='index.php';</script>";}
else{echo"<script>alert('Data orderdetail $ido gagal Dikonfirmasikan...');document.location.href='?mnu=keranjang';</script>";}
}
?>
