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

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('admin/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
 $sql="select `kode_admin` from `$tbadmin` order by `kode_admin` desc";
  $jum= getJum($conn,$sql);
  $kd="USR";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['kode_admin'];	
				$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
		$kode_admin=$idmax;
?>
<?php
if($_GET["pro"]=="ubah"){
	$kode_admin=$_GET["kode"];
	$sql="select * from `$tbadmin` where `kode_admin`='$kode_admin'";
	$d=getField($conn,$sql);
				$kode_admin=$d["kode_admin"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
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
<h2><a href="#">Menu User</a></h2>
<div>
<form action="" method="post" enctype="multipart/form-data">
<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">
<tr>
<td width="66"><label for="kode_admin">Kode User</label>
<td width="9">:
<td colspan="2"><b><?php echo $kode_admin;?></b></tr>
<tr>
<td><label for="username">username</label>
<td>:<td width="213"><input name="username" type="text" id="username" value="<?php echo $username;?>" size="20" />
</td>
<td width="81" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"admin/zoom.php?id=$kode_admin\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="24"><label for="password">password</label>
<td>:<td><input name="password" type="password" id="password" value="<?php echo $password;?>" size="20" /></td>
</tr>


<tr>
<td height="24"><label for="telepon">telepon</label>
<td>:<td><input name="telepon" type="text" id="telepon" value="<?php echo $telepon;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="email">email</label>
<td>:<td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="status">status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Kasir" <?php if($status=="Kasir"){echo"checked";}?>/>Kasir 
<input type="radio" name="status" id="status" value="Owner" <?php if($status=="Owner"){echo"checked";}?>/>Owner

<input type="radio" name="status" id="status" value="Super Admin" <?php if($status=="Super Admin"){echo"checked";}?>/>Super Admin

</td></tr>

<tr>
  <td height="24">Foto User
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kode_admin;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" onClick="MM_validateForm('username','','R','password','','R','telepon','','RisNum','email','','NisEmail');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="kode_admin" type="hidden" id="kode_admin" value="<?php echo $kode_admin;?>" />
        <input name="kode_admin0" type="hidden" id="kode_admin0" value="<?php echo $kode_admin0;?>" />
        <a href="?mnu=admin"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

</div>
<h2><a href="#"> Data Admin</a></h2>
<div>
<br />
Data Admin: 
<!--| <a href="admin/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> -->
<!--| <a href="admin/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> -->
<!--| <a href="admin/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> -->
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">
  <tr bgcolor="#036">
    <th width="3%"><font color='white'>No</td>
    <th width="10%"><font color='white'>kode</td>
    <th width="20%"><font color='white'>username</td>
    <th width="30%"><font color='white'>status</td>
    <th width="20%"><font color='white'>telepon</td>
    <th width="10%"><font color='white'>gambar</td>
    <th width="15%"><font color='white'>Menu</font></td>
  </tr>
<?php  
  $sql="select * from `$tbadmin` order by `kode_admin` desc";
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
				$kode_admin=$d["kode_admin"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_admin</td>
				<td><a href='mailto:$email'>$username</a></td>
				<td>$status</td>
				<td>$telepon</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"admin/zoom.php?id=$kode_admin\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td><div align='center'>
<a href='?mnu=admin&pro=ubah&kode=$kode_admin'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=admin&pro=hapus&kode=$kode_admin'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data admin ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data admin belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=admin'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=admin'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=admin'>Next »</a></span>";
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
	$kode_admin=strip_tags($_POST["kode_admin"]);
	$kode_admin0=strip_tags($_POST["kode_admin"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$status=strip_tags($_POST["status"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbadmin` (
`kode_admin` ,
`username` ,
`password` ,
`telepon` ,
`email` ,
`status` ,
`gambar` 
) VALUES (
'$kode_admin', 
'$username',
'$password', 
'$telepon',
'$email',
'$status', 
'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $kode_admin berhasil disimpan !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $kode_admin gagal disimpan...');document.location.href='?mnu=admin';</script>";}
	}
	else{
	$sql="update `$tbadmin` set `username`='$username',`password`='$password',`telepon`='$telepon' ,`email`='$email',`status`='$status',
	`gambar`='$gambar'  where `kode_admin`='$kode_admin0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $kode_admin berhasil diubah !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $kode_admin gagal diubah...');document.location.href='?mnu=admin';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_admin=$_GET["kode"];
$sql="delete from `$tbadmin` where `kode_admin`='$kode_admin'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $kode_admin berhasil dihapus !');document.location.href='?mnu=admin';</script>";}
	else{echo"<script>alert('Data $kode_admin gagal dihapus...');document.location.href='?mnu=admin';</script>";}
}
?>

