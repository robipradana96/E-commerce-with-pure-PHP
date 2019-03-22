<?php
$pro="simpan";
$jumlah="1";
$catatan="-";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    


<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pemesanandetail/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, catatan=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<?php
	$kode_pemesanan=$_GET["id"];
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
<link href="js/jquery-ui.css" rel="stylesheet">
	   <script src="js/jquery-1.8.2.js"></script>
	   <script src="js/jquery-ui-1.9.0.custom.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
          $("#isi").accordion({
  		        animated: "easeOutBounce"     
          });
      });
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
<h2><a href="#">Menu Pemesanan</a></h2>
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
<td>:<td colspan="2"><?php echo $nama_pemesan;?></td>
</tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:<td colspan="2"><?php echo $email;?>
</td>
</tr>

<tr>
<td><label for="telepon">Telepon</label>
<td>:<td colspan="2"><?php echo $telepon;?></td></tr>

<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2"><?php echo $status;?>
</td></tr>
<tr>
<td><label for="alamat_pengiriman">Alamat pemesanan</label>
<td>:<td colspan="2"><?php echo $alamat_pengiriman;?></td></tr>

<tr>
<td><label for="keterangan">Keterangan</label>
<td>:<td colspan="2"><?php echo $keterangan;?></td></tr>

</table>



<?php
if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbpemesanandetail` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$kode_pemesanan=$d["kode_pemesanan"];
				$kode_paket=$d["kode_paket"];
				$jumlah=$d["jumlah"];
				$subtotal=$d["subtotal"];
				$catatan=$d["catatan"];
				$pro="ubah";		
}
?>

<form action="" method="post" enctype="multipart/form-data">
<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">




<tr>
<td height="24"><label for="kode_paket">Pilih Paket</label>
<td>:<td colspan="2"><select name="kode_paket" id="kode_paket">
  <option>-</option>
  <?php  
  $sql="select * from `$tbpaket`";
$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kode_paket0=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
		echo"<option value='$kode_paket0' ";if($kode_paket0==$kode_paket){echo"selected";} echo">$nama_paket</option>";
		}
?>
</select></td>
</tr>

<tr>
<td height="24"><label for="jumlah">Jumlah</label>
<td>:
<td><input name="jumlah" type="text" id="jumlah" value="<?php echo $jumlah;?>" size="30" />
  <label for="kode_barang"></label></td>
</tr>


<tr>
<td><label for="catatan">Catatan</label>
<td>:<td colspan="2"><textarea name="catatan" cols="45" id="catatan"><?php echo $catatan;?></textarea></td></tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onClick="MM_validateForm('jumlah','','RisNum');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
        <input name="kode_pemesanan" type="hidden" id="kode_pemesanan" value="<?php echo $kode_pemesanan;?>" />
        <a href="?mnu=pemesanandetail&id<?php echo $kode_pemesanan;?>"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data pemesanan detail: 
<!-- | <a href="pemesanandetail/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> -->
<!-- | <a href="pemesanandetail/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> -->
<!-- | <a href="pemesanandetail/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> -->
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center><font color='white'>no</th>
    <th width="5%"><center><font color='white'>Gambar</th>
      <th width="10%"><center><font color='white'>Kode</th>
    <th width="30%"><center><font color='white'>Paket</th>
    <th width="5%"><center><font color='white'>Harga</th>
    <th width="5%"><center><font color='white'>Jumlah</th>
    <th width="5%"><center><font color='white'>Subtotal</th>
    <th width="30%"><center><font color='white'>Catatan</th>
    <th width="15%"><center><font color='white'>Menu</font></th>
  </tr>
<?php 
$tot=0; 
  $sql="select * from `$tbpemesanandetail` where kode_pemesanan='$kode_pemesanan' order by `id` desc";
  $jum=getJum($conn,$sql);
  $no=1;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id=$d["id"];
				$kode_pemesanan=$d["kode_pemesanan"];
				$kode_paket=$d["kode_paket"];
				$jumlah=$d["jumlah"];
				$subtotal=RP($d["subtotal"]);
				$catatan=$d["catatan"];
				$tot+=$d["subtotal"];
				
				$sqld="select * from `$tbpaket` where `kode_paket`='$kode_paket'";
	$dd=getField($conn,$sqld);
				$nama_paket=$dd["nama_paket"];
				$deskripsi=$dd["deskripsi"];
				$harga=RP($dd["harga"]);
				$keterangan=$dd["keterangan"];
				$statuspaket=$dd["status"];
				$gambar=$dd["gambar"];
				
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
			<td><div align='center'>";
echo"<a href='#' onclick='buka(\"paket/zoom.php?id=$kode_paket\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td>$kode_paket</td>
					<td>$nama_paket</td>
				<td>$harga</td>
				<td>$jumlah</td>
				<td>$subtotal</td>
				<td>$catatan</td>
				<td align='center'>
<a href='?mnu=pemesanandetail&id=$kode_pemesanan&pro=ubah&kode=$id'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pemesanandetail&id=$kode_pemesanan&pro=hapus&kode=$id'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kode_pemesanan pada data pemesanandetail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pemesanandetail belum tersedia...</blink></td></tr>";}
?>
</table>
<?php
echo "Total Tagihan Rp.".RP($tot).";";
?>
</div>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id=strip_tags($_POST["id"]);
	$id0=strip_tags($_POST["id0"]);
	$kode_pemesanan=strip_tags($_POST["kode_pemesanan"]);
	$kode_paket=strip_tags($_POST["kode_paket"]);
	$jumlah=strip_tags($_POST["jumlah"]);
		$catatan=strip_tags($_POST["catatan"]);
	
	$sql="select harga,nama_paket from `$tbpaket` where `kode_paket`='$kode_paket'";
	$d=getField($conn,$sql);
				$nama_paket=$d["nama_paket"];
				$harga=$d["harga"];
			$subtotal=$harga * $jumlah;			
				
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpemesanandetail` (
`id` ,
`kode_pemesanan` ,
`kode_paket` ,
`jumlah` ,
`subtotal` ,
`catatan` 
) VALUES (
'', 
'$kode_pemesanan', 
'$kode_paket',
'$jumlah',
'$subtotal',
'$catatan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id berhasil disimpan !');document.location.href='?mnu=pemesanandetail&id=$kode_pemesanan';</script>";}
		else{echo"<script>alert('Data $id gagal disimpan...');document.location.href='?mnu=pemesanandetail&id=$kode_pemesanan';</script>";}
	}
	else{
		//
		//http://localhost/webcatering/index.php?mnu=pemesanandetail&id=PMS1807010&pro=ubah&kode=132
 $sql="update `$tbpemesanandetail` set 
`kode_paket`='$kode_paket' ,
`jumlah`='$jumlah',
`catatan`='$catatan',
`subtotal`='$subtotal' where `id`='$id0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id0 berhasil diubah !');document.location.href='?mnu=pemesanandetail&id=$kode_pemesanan';</script>";}
	else{echo"<script>alert('Data $id0 gagal diubah...');document.location.href='?mnu=pemesanandetail&id=$kode_pemesanan';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$kode_pemesanan=$_GET["id"];
$sql="delete from `$tbpemesanandetail` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pemesanandetail $id berhasil dihapus !');document.location.href='?mnu=pemesanandetail&id=$kode_pemesanan';</script>";}
else{echo"<script>alert('Data pemesanandetail $id gagal dihapus...');document.location.href='?mnu=pemesanandetail&id=$kode_pemesanan';</script>";}
}
?>

