<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>  
    
    <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
   tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
   }); 
</script>  

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('paket/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `kode_paket` from `$tbpaket` order by `kode_paket` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PKT".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_paket"];
   
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
  $kode_paket=$idmax;
?>
<?php
if($_GET["pro"]=="ubah"){
	$kode_paket=$_GET["kode"];
	$sql="select * from `$tbpaket` where `kode_paket`='$kode_paket'";
	$d=getField($conn,$sql);
				$kode_paket=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
				$deskripsi=$d["deskripsi"];
				$harga=$d["harga"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
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
<h2><a href="#">Menu Paket</a></h2>
<div>
<form action="" method="post" enctype="multipart/form-data">
<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">
<tr>
<td width="154"><label for="kode_paket">Kode Paket</label>
<td width="13">:
<td colspan="2"><b><?php echo $kode_paket;?></b></tr>
<tr>
<td><label for="nama_paket">Nama paket</label>
<td>:<td width="167"><input name="nama_paket" type="text" id="nama_paket" value="<?php echo $nama_paket;?>" size="20" />
</td>
<td width="168" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"paket/zoom.php?id=$kode_paket\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="24"><label for="deskripsi">Deskripsi</label>
<td>:<td><textarea name="deskripsi" cols="25" id="deskripsi"><?php echo $deskripsi;?></textarea>
</td>
</tr>

<tr>
<td height="24"><label for="harga">Harga</label>
<td>:<td><input name="harga" type="text" id="harga" value="<?php echo $harga;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td><textarea name="keterangan" cols="25" id="keterangan"><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Tersedia" <?php if($status=="Tersedia"){
	echo"checked";}?>/>Tersedia 

<input type="radio" name="status" id="status" value="Tidak Tersedia" <?php if($status=="Tidak Tersedia"){
	echo"checked";}?>/>Tidak Tersedia
</td></tr>

<tr>
  <td height="24">Gambar
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("paket/zoom.php?id=<?php echo $kode_paket;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" onClick="MM_validateForm('nama_paket','','R','harga','','RisNum','deskripsi','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="kode_paket" type="hidden" id="kode_paket" value="<?php echo $kode_paket;?>" />
        <input name="kode_paket0" type="hidden" id="kode_paket0" value="<?php echo $kode_paket0;?>" />
        <a href="?mnu=paket"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

</div>
<h2><a href="#"> Data Paket</a></h2>
<div>

Data paket: 
<!-- | <a href="paket/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> -->
<!-- | <a href="paket/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> -->
<!-- | <a href="paket/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> -->
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">
  <tr bgcolor="#036">
    <th width="3%"><font color='white'>No</td>
    <th width="30%"><font color='white'>Nama paket</td>
    <th width="10%"><font color='white'>Harga</td>
    <th width="45%"><font color='white'>Deskripsi</td>
    <th width="10%"><font color='white'>Gambar</td>
    <th width="15%"><font color='white'>Menu</dont></td>
  </tr>
<?php  
  $sql="select * from `$tbpaket` order by `kode_paket` desc";
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
				$kode_paket=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
				$deskripsi=$d["deskripsi"];
				$harga=RP($d["harga"]);
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td valign='top'>$no</td>
				<td valign='top'>$nama_paket ($kode_paket) </td>
				<td valign='top'>$harga</td>
				<td  valign='top'><p align 'justify'>$deskripsi $keterangan</p></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"paket/zoom.php?id=$kode_paket\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td><div align='center'>
<a href='?mnu=paket&pro=ubah&kode=$kode_paket'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=paket&pro=hapus&kode=$kode_paket'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data paket ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data paket belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=paket'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=paket'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=paket'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>
</div>
</div> 
	
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kode_paket=strip_tags($_POST["kode_paket"]);
	$kode_paket0=strip_tags($_POST["kode_paket"]);
	$nama_paket=strip_tags($_POST["nama_paket"]);
	$deskripsi=($_POST["deskripsi"]);
	$harga=strip_tags($_POST["harga"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$status=strip_tags($_POST["status"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpaket` (
`kode_paket` ,
`nama_paket` ,
`deskripsi` ,
`harga` ,
`keterangan` ,
`status` ,
`gambar` 
) VALUES (
'$kode_paket', 
'$nama_paket',
'$deskripsi', 
'$harga',
'$keterangan',
'$status', 
'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $kode_paket berhasil disimpan !');document.location.href='?mnu=paket';</script>";}
		else{echo"<script>alert('Data $kode_paket gagal disimpan...');document.location.href='?mnu=paket';</script>";}
	}
	else{
	$sql="update `$tbpaket` set `nama_paket`='$nama_paket',`deskripsi`='$deskripsi',`harga`='$harga' ,`keterangan`='$keterangan',`status`='$status',
	`gambar`='$gambar'  where `kode_paket`='$kode_paket0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $kode_paket berhasil diubah !');document.location.href='?mnu=paket';</script>";}
		else{echo"<script>alert('Data $kode_paket gagal diubah...');document.location.href='?mnu=paket';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_paket=$_GET["kode"];
$sql="delete from `$tbpaket` where `kode_paket`='$kode_paket'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $kode_paket berhasil dihapus !');document.location.href='?mnu=paket';</script>";}
	else{echo"<script>alert('Data $kode_paket gagal dihapus...');document.location.href='?mnu=paket';</script>";}
}
?>

