<?php
session_start(); // 
?>
<table width=100% border=0 cellspacing=0 cellpadding=1 bgcolor=#B19B68>
<tr><td class=textp>&nbsp;&nbsp;Otentikasi</td></tr>
<tr><td><table width=100% cellspacing=5 cellpadding=0 bgcolor=#F8EED7>
<tr><td align="center" class=textblack>
<b>Otentikasi Data </b> 
<form name="formLogin" method="post" action="">
  <table width="284" border="0">
    <tr>
      <th colspan="2"  bgcolor="#FF00FF"><marquee>
      Silakan Tulis Data Login Anda / Hubungi Administrator Web Anda
      </marquee></th>
    </tr>

    <tr>
      <td width="67">Username</td>
      <td width="207">:
      <input type="text" name="user" id="user" /></td>
    </tr>
   
    <tr>
      <td>Password:</td>
      <td>:
      <input type="password" name="pass" id="pass">
      </td>
    </tr>

    <tr>
      <td colspan="2" align="right" valign="middle">
      <input type="submit" name="Login" id="Login" value="Login"> 
      <input type="Reset" name="Reset" id="Reset" value="Reset">
      </td>
    </tr>
  </table>
  
</form>
</table></td></tr></table><br>
<?php
if(isset($_POST["Login"])){ // fungsi post utk masuk ke database
	$usr=$_POST["user"];
	$pas=$_POST["pass"];
	
		$sql1="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' ";
		
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["kode_admin"];
				$nama=$d["username"];
				$status=$d["status"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]=$status;
		echo "<script>alert('Otentikasi ".$_SESSION["cstatus"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
		//elseif(getJum($conn,$sql2)>0){
			
		//	}
		else{
			session_destroy();
			echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='index.php?mnu=login';</script>";
		}
}


?>
