<h2>Produk Kami</h2>
    	<div id="gallery">
		
<?php  
$no=0;
$menu=$_GET['menu'];
if ($menu=="box"){
 $sql="select * from `$tbpaket` where nama_paket like '%$menu%'  and nama_paket  not like '%BOX%' order by `nama_paket` asc";
}else{
	 $sql="select * from `$tbpaket` where nama_paket like '%$menu%'   order by `kode_paket` asc";

	}
$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$kode_paket=$d["kode_paket"];
				$nama_paket=$d["nama_paket"];
				$deskripsi=$d["deskripsi"];if(strlen($deskripsi)>50){$deskripsi=substr($deskripsi,0,50)."...";}
				$harga=RP($d["harga"]);
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];	
$no++;				
		$class="";
		if($no%4==0){$class="no_margin_right";}
		
            echo"<div class='col one_fourth gallery_box $class'>
                <div class='img_frame img_frame_14 img_nom'><span></span>
                    <a href='ypathfile/$gambar' rel='lightbox[new_gallery]'><img src='ypathfile/$gambar' alt='$nama_paket' width='203' height='108' /></a>
                </div>
                <h4>$nama_paket</h4>
                <p><a href='index.php?mnu=detail&kode=$kode_paket' rel='nofollow'>Kode  $kode_paket</a> Harga: 
				<a href='#' rel='nofollow'>
				$harga</a><br>$deskripsi</p>
                <a href='index.php?mnu=detail&kode=$kode_paket' class='more'>DETAIL</a>
            </div>";
			
		}
		?>
        
			
		</div>
        <div class="clear"></div>