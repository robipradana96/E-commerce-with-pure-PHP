<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id".$separator ."kode_pemesanan".$separator ."kode_paket".$separator ."jumlah".$separator ."subtotal".$separator ."catatan".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id`,`kode_pemesanan`,`kode_paket`,`jumlah`,`subtotal`,`catatan` from `$tbpemesanandetail` order by `id` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kode_pemesanan"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kode_paket"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["jumlah"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["subtotal"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["catatan"];$buffer .= "\"".$value."\"".$separator; 
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
	/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	$rs->free();
	return $arr;
}

?>