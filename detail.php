<?php
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
				//$gambar0=$d["gambar"];

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
				

<h2><?php echo $nama_paket;?></h2>
        <div class="img_frame img_frame_12 img_nom img_fl"><span></span>
          <img src="ypathfile/<?php echo $gambar;?>" title="<?php echo $nama_paket;?>"  width="450" height="250"/>
        </div> 
        <div class="half right">
        <p><em><?php echo $nama_paket;?><a href="#" target="_blank"><br>Kode :<?php echo $kode_paket;?></a> 
		<br>Deskripsi:
		<br><?php echo $deskripsi;?>
		<br><?php echo $keterangan;?>
		
		<br><h3>Harga :<?php echo RP($harga);?></h3>

		<form action="" method="post" enctype="multipart/form-data">
		Jumlah : <input name="jumlah" type="text" id="jumlah" value="" size="20" />
		<br>
		Catatan:
		<textarea name="catatan" cols="45" id="catatan">-</textarea>
		
		<input name="OrderNow" type="submit" class="more" id="OrderNow" onclick="MM_validateForm('jumlah','','RisNum');return document.MM_returnValue" value="Order Now"/>
		<input name="kode_paket" type="hidden" id="kode_paket" value="<?php echo $kode_paket;?>"/>
		</form>
        </div>  
        
        <div class="clear h40"></div>
		
		
		
		

<?php
//$_SESSION["corder"]="PMS1805001";
if(isset($_POST["OrderNow"])){
	
	if(!isset($_SESSION["corder"])){
		
	
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
  $_SESSION["corder"]=$kode_pemesanan;
  
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
'".date("Y-m-d")."', 
'".date("H:i:s")."',
'',
'',
'',
'Request',
'',
''
)";
	
$simpan=process($conn,$sql);
	}

	
	$kode_pemesanan=strip_tags($_SESSION["corder"]);
	$kode_paket=strip_tags($_POST["kode_paket"]);
	$catatan=strip_tags($_POST["catatan"]);
    $jumlah=strip_tags($_POST["jumlah"]);
	
	$sql="select * from `$tbpaket` where `kode_paket`='$kode_paket'";
	$d=getField($conn,$sql);
				$kode_paket=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
				$harga=$d["harga"];
				
				
	$subtotal=$harga*$jumlah;

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

echo "<script>alert('Data  berhasil ditambahkan di ".$_SESSION["corder"]."!');document.location.href='?mnu=keranjang';</script>";
}
?>
