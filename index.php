<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php"; // untuk memanggil halaman dari konmysqli.php 

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $header;?></title> <!-- untuk menampilkan title -->
<meta name="keywords" content="<?php echo $header;?>" />
<meta name="description" content="<?php echo $header;?>" />

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />	

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">
</script> <!-- memanggil type text javascript dari folder js -->

<script language="javascript" type="text/javascript"> 

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> <!-- memanggil slimbox2.js pada file js-->

</head>

<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
    	<div id="site_title"><a href=""></a></div>
   
    </div><!-- END of templatemo_header -->
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <?php
if($_SESSION["cstatus"]=="Super Admin"){ // jika status login super admin akan menampilkan menu home user paket pemesanan dan logout
      echo"
	  <li><a href='index.php?mnu=home'>Home</a></li>
      <li><a href='index.php?mnu=admin'>User</a></li>
	  <li><a href='index.php?mnu=paket'>Paket</a></li>
	  <li><a href='index.php?mnu=pemesanan'>Pemesanan</a></li>
      <li><a href='index.php?mnu=logout'>Logout</a></li>";
}

else if($_SESSION["cstatus"]=="Owner"){	
      echo"
	  <li><a href='index.php?mnu=home'>Home</a></li>
      <li><a href='index.php?mnu=profil'>Profil</a></li>
	  <li><a href='index.php?mnu=upaket'>Paket</a></li>
	  <li><a href='index.php?mnu=upemesanan'>Pemesanan</a></li>
      <li><a href='index.php?mnu=logout'>Logout</a></li>";
}
else if($_SESSION["cstatus"]=="Kasir"){	
      echo"
	  <li><a href='index.php?mnu=home'>Home</a></li>
      <li><a href='index.php?mnu=profil'>Profil</a></li>
	  <li><a href='index.php?mnu=upaket'>Paket</a></li>
	  <li><a href='index.php?mnu=pemesanan'>Pemesanan</a></li>
      <li><a href='index.php?mnu=logout'>Logout</a></li>";
}
else{ // berfungsi menampilkan menu home dan dropdown pada produk lalu menghungbungkan ke setiap halaman phpnya 
	 echo"<li><a href='index.php?mnu=home'>Home</a></li>"; // hapus saja menu=home
	 echo"<li><a href='index.php?mnu=produk'>Produk</a> 
	 			<ul>
	 				<li><a href='index.php?mnu=produk&menu=Menu Buffet'>Menu Buffet</a></li>
	 				<li><a href='index.php?mnu=produk&menu=Tradisonal'>Menu Tradisional</a></li>
	 				<li><a href='index.php?mnu=produk&menu=Nasi'>Menu Gubukan</a></li>
					<li><a href='index.php?mnu=produk&menu=Rice Box'>Rice Box</a></li>
					<li><a href='index.php?mnu=produk&menu=Snack'>Snack-Box</a></li>
					<li><a href='index.php?mnu=produk&menu=Coffee Break'>Coffee Break</a></li> 
	 </ul>
	 </li>
	  <li><a href='index.php?mnu=keranjang'>Keranjang</a></li>";
	 echo"<li><a href='index.php?mnu=kontak'>Hubungi Kami</a></li>"; 
	 
	}
      ?> 
              	</ul>
            </li>
                    </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
<?php
// header font color pada setiap menu 
if($mnu=="admin"){echo"<h1><font color='blue'><br><br><br>Menu Admin</font></h1>";}
else if($mnu=="paket"){echo"<h1><font color='blue'><br><br><br>Menu Paket</font></h1>";}
else if($mnu=="pemesanan"){echo"<h1><font color='blue'><br><br><br>Menu Pemesanan</font></h1>";}
else if($mnu=="pemesanandetail"){echo"<h1><font color='blue'><br><br><br>Menu Pemesanan Detail</font></h1>";}
else if($mnu=="profil"){echo"<h1><font color='blue'><br><br><br>Menu Profile</font></h1>";}
else if($mnu=="upaket"){echo"<h1><font color='blue'><br><br><br>Menu Paket</font></h1>";}
else if($mnu=="upemesanan"){echo"<h1><font color='blue'><br><br><br>Menu Pemesanan</font></h1>";}
else if($mnu=="upemesanandetail"){echo"<h1><font color='blue'><br><br><br>Menu Pemesanan Detail</font></h1>";}


else if($mnu=="produk"){}


else if ($mnu=="" || $mnu=="home" ) {
require_once"slider.php"; // menampilkan slider dari halaman slider.php 
}
?>
    <div id="templatemo_main">
    	
        <?php 
// menghubungkan seluruh menu ke folder halaman php	nya			
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="profil"){require_once"admin/profil.php";}
else if($mnu=="paket"){require_once"paket/paket.php";}
else if($mnu=="upaket"){require_once"paket/upaket.php";}
else if($mnu=="pemesanan"){require_once"pemesanan/pemesanan.php";}
else if($mnu=="pemesanandetail"){require_once"pemesanandetail/pemesanandetail.php";}
else if($mnu=="upemesanan"){require_once"pemesanan/upemesanan.php";}
else if($mnu=="upemesanandetail"){require_once"pemesanandetail/upemesanandetail.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else if($mnu=="produk"){require_once"produk.php";}
else if($mnu=="detail"){require_once"detail.php";}
else if($mnu=="keranjang"){require_once"keranjang.php";}
else if($mnu=="keranjang2"){require_once"pemesanan/keranjang2.php";}
else if($mnu=="kontak"){require_once"kontak.php";}

else {require_once"home.php";}
	
 ?>
        </div>  

        <div class="clear"></div>
        
    </div><!-- END of templatemo_main -->
</div><!-- END of templatemo_wrapper -->
<div id="templatemo_bottom_wrapper">
	<div id="templatemo_bottom">
    	<div class="col one_fourth">
            <h4 align="center">Sekilas Tentang Kami</h4>
            <p>
<i><b>CV. Dapur Samara</b></i> menyediakan layanan pemesanan berbagai macam masakan baik untuk acara pesta pernikahan, seminar, konferensi, maupun untuk instansi.

		   </p>
        </div>
    	<div class="col one_fourth">
            <h4 align="center">Menu Galeri</h4>
            <ul class="footer_gallery">
			
			<?php  
  $sql="select * from `$tbpaket` order by rand() limit 0,9";
								
	$arr=getData($conn,$sql); 
		foreach($arr as $d) {						
				$kode_paket=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
				$deskripsi=$d["deskripsi"];
				$harga=RP($d["harga"]);
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				//images/templatemo_image_06_l.jpg
            	echo"<li><a href='index.php?mnu=detail&kode=$kode_paket' >
				<img src='ypathfile/$gambar' title='$nama_paket'   width='58' height='58'/></a></li>";
		}
?>		
			 </ul>
            <div class="clear"></div>
            <a href="index.php?mnu=produk" class="more">lainnya</a>
        </div>
    	<div class="col one_fourth">
    	<h4 align="center">Pemesanan terahir</h4>
        
            
		<?php
		//<ul class="no_bullet">    </ul>
		
		$gabs="";
$sql="select * from `$tbpemesanan`  order by rand() ";
  	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kode_pemesanan=$d["kode_pemesanan"];
				$tgl_pemesanan=WKTP($d["tgl_pemesanan"]);
				$jam_pemesanan=$d["jam_pemesanan"];
				$nama_pemesan=$d["nama_pemesan"];
				$email=$d["email"];
				$telepon=$d["telepon"];$tel=substr($telepon,0,5)."*******";
				$status=$d["status"];
				$alamat_pengiriman=$d["alamat_pengiriman"];

				$gab="";
	$sqlc="select * from `$tbpemesanandetail` where kode_pemesanan='$kode_pemesanan' order by `id` desc";
  	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {		
		$kode_paket=$dc["kode_paket"];
				$jumlah=$dc["jumlah"];
				
				$sqld="select * from `$tbpaket` where `kode_paket`='$kode_paket'";
	$dd=getField($conn,$sqld);
				$nama_paket=$dd["nama_paket"];
				$gab.="$nama_paket ($jumlah),";
		}
		$gab=strtolower($gab);
		$gabs.="<b>$nama_pemesan #$tgl_pemesanan $jam_pemesanan</b><br><i>$gab</i><hr>";
			//echo"<li><span class='header'><a href='#'>$nama_pemesan #$tgl_pemesanan $jam_pemesanan</a></span>$gab</li>";
		}
		
		echo'<marquee onmouseover=this.stop() onmouseout=this.start() scrollamount=2 scrolldelay=90 direction=up width=100% height=150>'.$gabs.'</marquee>';
		
		?>
		
		
    </div>
    <div class="col one_fourth no_margin_right">
    	<h4 align="center"> Head Office </h4>
      <ul class="no_bullet">
        <p align="center"> Office
Jl. Dirgantara H-26 Curug Permai Bogor 16113 <br>
Phone: 0251-7537973 / 08128751275 </br>
Email: dapurshamara@gmail.com </p>
       	  <li>
          <!-- membuat logo ig dan fb lalu menghubungkan kehalaman fb,ig dapur shamara-->
        	  <div align="center"><a href="https://www.instagram.com/dapur_shamara" target="_blank"><img src="images/instagram.png" width="40" height="40" /></a> 
        	    <a href="https://www.facebook.com/profile.php?id=100009027988793" target="_blank"><img src="images/facebook.png" width="40" height="40" /></a>
        	    
      	    </div>
       	</ul>
    </div>
        
        <div class="clear"></div>
    </div>
    </div>   
<div id="templatemo_footer_wrapper">    
    <div id="templatemo_footer">
    	<p>Copyright &copy; Dapur Shamara<a href="#"> <?php echo date("Y");?></a></p>
    </div>
</div>
</body>
</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php // untuk format tanggal pemesanan pembeli
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"){$bul="01";}
	else if($arr[1]=="Februari"){$bul="02";}
	else if($arr[1]=="Maret"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Juni"){$bul="06";}
	else if($arr[1]=="Juli"){$bul="07";}
	else if($arr[1]=="Agustus"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php // untuk format tanggal pemberitahuan pemesanan terakhir
function BALP($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	function getPaket($conn,$kode){
$field="nama_paket";
$sql="SELECT `$field` FROM `tb_paket` where `kode_paket`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	function getPemesananTgl($conn,$kode){
$field="tgl_pemesanan";
$sql="SELECT `$field` FROM `tb_pemesanan` where `kode_pemesanan`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
function getPemesanan($conn,$kode){
$field="nama_pemesan";
$sql="SELECT `$field` FROM `tb_pemesanan` where `kode_pemesanan`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>