<?php

	$kode_admin=$_SESSION["cid"];
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

?>

<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>

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
<h2><a href="#">Update Profile</a></h2>
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
<td>:<td colspan="2"><?php echo $status;?>
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
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Update Profil" />
  <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <a href="?mnu=profil"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

</div>
</div>
<?php
if(isset($_POST["Simpan"])){
	$kode_admin0=strip_tags($_SESSION["cid"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
	$sql="update `$tbadmin` set `username`='$username',`password`='$password',`telepon`='$telepon' ,`email`='$email',
	`gambar`='$gambar'  where `kode_admin`='$kode_admin0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $kode_admin berhasil diubah !');document.location.href='?mnu=profil';</script>";}
		else{echo"<script>alert('Data $kode_admin gagal diubah...');document.location.href='?mnu=profil';</script>";}
}
?>