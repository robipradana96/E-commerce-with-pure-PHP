<?php
$pro="simpan";
$tgl_pemesanan=WKT(date("Y-m-d"));
$jam_pemesanan=date("H:i:s");
$status="Aktif";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_pemesanan").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pemesanan/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, telepon=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `kode_pemesanan` from `$tbpemesanan` order by `kode_pemesanan` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PMS".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_pemesanan"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $kode_pemesanan=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$kode_pemesanan=$_GET["kode"];
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
				$pro="ubah";		
}
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
<td colspan="2"><input name="tgl_pemesanan" type="text" id="tgl_pemesanan" value="<?php echo $tgl_pemesanan;?>" size="30" /></td>
</tr>

<tr>
<td height="24"><label for="jam_pemesanan">Jam pemesanan</label>
<td>:<td colspan="2"><input name="jam_pemesanan" type="text" id="jam_pemesanan" value="<?php echo $jam_pemesanan;?>" size="15" />
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
<td>:<td colspan="2"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="telepon">Telepon</label>
<td>:<td colspan="2"><input name="telepon" type="text" id="telepon" value="<?php echo $telepon;?>" size="15" /></td></tr>

<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status" value="Request" checked="checked" <?php if($status=="Request"){echo"checked";}?>/>Request


<input type="radio" name="status" id="status"   value="Deal" <?php if($status=="Deal"){echo"checked";}?>/>Deal
<input type="radio" name="status" id="status"   value="Cancel" <?php if($status=="Cancel"){echo"checked";}?>/>Cancel

</td></tr>
<tr>
<td><label for="alamat_pengiriman">Alamat pemesanan</label>
<td>:<td colspan="2"><textarea name="alamat_pengiriman" cols="45" id="alamat_pengiriman"><?php echo $alamat_pengiriman;?></textarea></td></tr>

<tr>
<td><label for="keterangan">Keterangan</label>
<td>:<td colspan="2"><textarea name="keterangan" cols="45" id="keterangan"><?php echo $keterangan;?></textarea></td></tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onClick="MM_validateForm('tgl_pemesanan','','R','jam_pemesanan','','R','nama_pemesan','','R','email','','NisEmail','telepon','','NisNum','alamat_pengiriman','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kode_pemesanan" type="hidden" id="kode_pemesanan" value="<?php echo $kode_pemesanan;?>" />
        <input name="kode_pemesanan0" type="hidden" id="kode_pemesanan0" value="<?php echo $kode_pemesanan0;?>" />
        <a href="?mnu=pemesanan"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
<?php

 $sqld="select distinct(status) from `$tbpemesanan` order by `status` asc";
 	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$status=($dd["status"]);
$no=1;				
				?>
<h2><a href="#">Data Pemesanan status <?php echo $status;?></a></h2>
<div>
Data pemesanan: 
<!-- | <a href="pemesanan/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> -->
<!-- | <a href="pemesanan/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> --> 
<!-- | <a href="pemesanan/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> -->
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">
  <tr bgcolor="#036">
    <th width="3%"><center><font color='white'>No</th>
    <th width="85%"><center><font color='white'>Uraian Pemesanan</th>
    <th width="15%"><center><font color='white'>Menu</a></th>
  </tr>
<?php  
  $sql="select * from `$tbpemesanan` where status='$status' order by `kode_pemesanan` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$kode_pemesanan=$d["kode_pemesanan"];
				$tgl_pemesanan=WKT($d["tgl_pemesanan"]);
				$jam_pemesanan=$d["jam_pemesanan"];
				$nama_pemesan=$d["nama_pemesan"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$status=$d["status"];
				$alamat_pengiriman=$d["alamat_pengiriman"];
				$keterangan=$d["keterangan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td valign='top'>$no</td>
				<td valign='top'>$kode_pemesanan =>$tgl_pemesanan - $jam_pemesanan
				<br>Pemesan :<a href='mailto:$email'>$nama_pemesan </a>,Alamat: $alamat_pengiriman $telepon $keterangan</td>
				<td align='center'>
<a href='?mnu=pemesanandetail&id=$kode_pemesanan'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pemesanan&pro=ubah&kode=$kode_pemesanan'><img src='ypathicon/12.png' alt='ubah'></a>
<a href='?mnu=pemesanan&pro=hapus&kode=$kode_pemesanan'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tgl_pemesanan pada data pemesanan ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pemesanan belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pemesanan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pemesanan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pemesanan'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
</div>
<?php } ?>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kode_pemesanan=strip_tags($_POST["kode_pemesanan"]);
	$kode_pemesanan0=strip_tags($_POST["kode_pemesanan0"]);
	$tgl_pemesanan=BAL(strip_tags($_POST["tgl_pemesanan"]));
	$jam_pemesanan=strip_tags($_POST["jam_pemesanan"]);
	$nama_pemesan=strip_tags($_POST["nama_pemesan"]);
	$email=strip_tags($_POST["email"]);
	$telepon=strip_tags($_POST["telepon"]);
	$status=strip_tags($_POST["status"]);
	$alamat_pengiriman=strip_tags($_POST["alamat_pengiriman"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpemesanan` (
`kode_pemesanan` ,
`tgl_pemesanan` ,
`jam_pemesanan` ,
`nama_pemesan` ,
`email` ,
`telepon` ,
`status` ,
`alamat_pengiriman`,
`keterangan`
) VALUES (
'$kode_pemesanan', 
'$tgl_pemesanan', 
'$jam_pemesanan',
'$nama_pemesan',
'$email',
'$telepon',
'$status',
'$alamat_pengiriman',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_pemesanan berhasil disimpan !');document.location.href='?mnu=pemesanan';</script>";}
		else{echo"<script>alert('Data $kode_pemesanan gagal disimpan...');document.location.href='?mnu=pemesanan';</script>";}
	}
	else{
$sql="update `$tbpemesanan` set 
`tgl_pemesanan`='$tgl_pemesanan',
`jam_pemesanan`='$jam_pemesanan' ,
`nama_pemesan`='$nama_pemesan',
`telepon`='$telepon',
`status`='$status',
`email`='$email',
`alamat_pengiriman`='$alamat_pengiriman' ,
`keterangan`='$keterangan'  
where `kode_pemesanan`='$kode_pemesanan0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_pemesanan berhasil diubah !');document.location.href='?mnu=pemesanan';</script>";}
	else{echo"<script>alert('Data $kode_pemesanan gagal diubah...');document.location.href='?mnu=pemesanan';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_pemesanan=$_GET["kode"];
$sql="delete from `$tbpemesanan` where `kode_pemesanan`='$kode_pemesanan'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pemesanan $kode_pemesanan berhasil dihapus !');document.location.href='?mnu=pemesanan';</script>";}
else{echo"<script>alert('Data pemesanan $kode_pemesanan gagal dihapus...');document.location.href='?mnu=pemesanan';</script>";}
}
?>

