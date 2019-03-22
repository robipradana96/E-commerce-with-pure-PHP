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


<!-- Data Pemesanan Detail: --> 
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
</div>