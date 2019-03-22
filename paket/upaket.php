<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('paket/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
    <th width="10%"><font color='white'>Gambar</td>
    <th width="30%"><font color='white'>Nama paket</td>
    <th width="10%"><font color='white'>Harga</td>
    <th width="45%"><font color='white'>Deskripsi</td>
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
					<td><div align='center'>";
echo"<a href='#' onclick='buka(\"paket/zoom.php?id=$kode_paket\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td valign='top'>$nama_paket ($kode_paket) </td>
				<td valign='top'>$harga</td>
				<td  valign='top'><p align 'justify'>$deskripsi $keterangan</p></td>
			
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=upaket'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=upaket'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=upaket'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>
</div>
</div>