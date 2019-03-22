
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
     

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pemesanan/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, telepon=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


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
<!-- | <a href="pemesanan/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a>  -->
<!-- | <a href="pemesanan/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a>  -->
<!-- | <a href="pemesanan/xml.php"><img src='ypathicon/xml.png' alt='XML'></a>  -->
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table  class="table table-bordered table-striped table-hover js-basic-example dataTable" width="100%">
  <tr bgcolor="#036">
    <th width="3%"><center><font color='white'>No</th>
    <th width="85%"><center><font color='white'>Uraian Pemesanan</th>
    <th width="15%"><center><font color='white'>Detail</a></th>
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
				<a href='?mnu=upemesanandetail&id=$kode_pemesanan'><img src='ypathicon/xls.png' alt='ubah'></a></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=upemesanan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=upemesanan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=upemesanan'>Next »</a></span>";
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