<?php
$pro="simpan";
$tgl_pemesanan=WKT(date("Y-m-d"));
$jam_pemesanan=date("H:i:s");
$status="Aktif";
?>

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pemesanan/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, telepon=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
 
	$kode_pemesanan=$_SESSION["corder"];
	$sql="select * from `$tbpemesanan` where `kode_pemesanan`='$kode_pemesanan'";
	$d=getField($conn,$sql);
				$kode_pemesanan=$d["kode_pemesanan"];
				$kode_pemesanan0=$d["kode_pemesanan"];
				$tgl_pemesanan=WKT($d["tgl_pemesanan"]);
				$jam_pemesanan=$d["jam_pemesanan"];
				$nama_pemesan=$d["nama_pemesan"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$alamat_pengiriman=$d["alamat_pengiriman"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];

?>

<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<body style="font-size:65%;">
      <div id="isi">
<h2><a href="#">Form Pemesanan</a></h2>
<div>
<form action="" method="post" enctype="multipart/form-data">
<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">


<tr>
<td width="187"><label for="kode_pemesanan">Kode Pemesanan</label>
<td width="22">:
<td width="291" colspan="2"><b><?php echo $kode_pemesanan;?></b>
</tr>

<tr>
<td><label for="tgl_pemesanan">Tanggal pemesanan</label>
<td>:
<td colspan="2"><?php echo $tgl_pemesanan;?></td>
</tr>

<tr>
<td height="24"><label for="jam_pemesanan">Jam pemesanan</label>
<td>:<td colspan="2"><?php echo $jam_pemesanan;?>
</td>
</tr>

<tr>
<td height="24"><label for="nama_pemesan">Nama pemesan</label>
<td>:
<td><input name="nama_pemesan" type="text" id="nama_pemesan" value="<?php echo $nama_pemesan;?>" size="30" />
  <label for="kode_barang"></label></td>
</tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:<td colspan="2"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="30" /></td>
</tr>

<tr>
<td><label for="telepon">Telepon</label>
<td>:<td colspan="2"><input name="telepon" type="text" id="telepon" value="<?php echo $telepon;?>" size="30" /></td></tr>


<tr>
<td><label for="alamat_pengiriman">Alamat pemesanan</label>
<td>:<td colspan="2"><textarea name="alamat_pengiriman" cols="45" id="alamat_pengiriman"><?php echo $alamat_pengiriman;?></textarea></td></tr>

<tr>
<td><label for="keterangan">Catatan Tambahan</label>
<td>:<td colspan="2"><textarea name="keterangan" cols="45" id="keterangan"><?php echo $keterangan;?></textarea></td></tr>
<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2"><?php echo $status;?>
</td></tr>
<tr>
<td>
<td>
<td colspan="2">	<input name="UPDATE" type="submit" id="Simpan" onClick="MM_validateForm('nama_pemesan','','R','email','','RisEmail','telepon','','RisNum','alamat_pengiriman','','R');return document.MM_returnValue" value="Konfirmasi Pemesanan" />
        <a href="?mnu=keranjang2&pro=batal"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<hr>
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
<a href='?mnu=keranjang2&id=$kode_pemesanan&pro=hapus'><img src='ypathicon/h.png' title='hapus' 
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
<hr> 
</div>

</div>

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


<?php
if(isset($_POST["UPDATE"])){
	$kode_pemesanan=strip_tags($_SESSION["corder"]);

	$nama_pemesan=strip_tags($_POST["nama_pemesan"]);
	$email=strip_tags($_POST["email"]);
	$telepon=strip_tags($_POST["telepon"]);
	$alamat_pengiriman=strip_tags($_POST["alamat_pengiriman"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
$sql="update `$tbpemesanan` set 
`nama_pemesan`='$nama_pemesan',
`telepon`='$telepon',
`email`='$email',
`alamat_pengiriman`='$alamat_pengiriman' ,
`keterangan`='$keterangan'  
where `kode_pemesanan`='$kode_pemesanan'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>document.location.href='?mnu=keranjang&pro=selesai';</script>";}
	else{echo"<script>document.location.href='?mnu=keranjang&pro=selesai;</script>";}

}
?>

<?php
if($_GET["pro"]=="batal"){
	$kode_pemesanan=strip_tags($_SESSION["corder"]);
$sql="delete from `$tbpemesanan` where `kode_pemesanan`='$kode_pemesanan'";
$hapus=process($conn,$sql);
$sql="delete from `$tbpemesanandetail` where `kode_pemesanan`='$kode_pemesanan'";
$hapus=process($conn,$sql);

if($hapus) {echo "<script>alert('Data pemesanan $kode_pemesanan berhasil dihapus !');document.location.href='?mnu=keranjang';</script>";}
else{echo"<script>alert('Data pemesanan $kode_pemesanan gagal dihapus...');document.location.href='?mnu=keranjang';</script>";}
}
?>

