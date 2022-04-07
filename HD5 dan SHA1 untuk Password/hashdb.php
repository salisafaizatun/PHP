<?php
require_once"koneksi.php";
$keterangan="MD5";
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#examplec').DataTable();
} );
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">



<h1>UJI TAMBAH HASH</h1>
	  <form class="form-sample" method="post" enctype="multipart/form-data">
		<div class="row">
		  <div class="col-md-12">
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label">Nama</label>
			  <div class="col-sm-9">
				<input type="text" class="form-control" name="nama" id="nama" value=""  />
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-md-12">
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label">Username</label>
			  <div class="col-sm-9">
				<input type="text" class="form-control" name="username" id="username" value=""  />
			  </div>
			</div>
		  </div>
		</div>
		<div class="row">
		  <div class="col-md-12">
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label">Password</label>
			  <div class="col-sm-9">
				 <input type="password" class="form-control" name="password" id="password" value=""  />
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-md-12">
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label">Keterangan</label>
			  <div class="col-sm-9">
<input type="radio" name="keterangan" id="keterangan"  checked="checked" value="MD5" <?php if($keterangan=="MD5"){echo"checked";}?>/> <small>MD5</small> 
<input type="radio" name="keterangan" id="keterangan" value="SHA" <?php if($keterangan=="SHA"){echo"checked";}?>/> <small>SHA</small>
<input type="radio" name="keterangan" id="keterangan" value="None" <?php if($keterangan=="None"){echo"checked";}?>/> <small>None</small>
			  </div>
			</div>
		  </div>
		</div>
		
		
		<div class="row text-center">
			<div class="col-md-12">
				<button type='submit' name="Simpan" >Simpan</button>
				<button type='reset' name="Reset" >Reset</button>
			</div>
		</div>
	  </form>
<hr>			
			
<h1>UJI SHOW HASH</h1>
<table id="examplec" class="display" style="width:100%">
<thead>
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th> 
		<th>Keterangan</th> 
	</tr>
</thead>
<tbody> 
<?php  
$sql="SELECT * FROM `tb_hash` ORDER by `id_hash` asc";
$no=1;
							
		$arr=getData($conn,$sql);
		foreach($arr as $d) {						
			$id_hash=$d["id_hash"];
			$nama=strtoupper($d["nama"]);
			$username=$d["username"];
			$password=$d["password"];
			$keterangan=$d["keterangan"];
		echo"<tr>
			<td>$no</td>
			<td>$nama</td>
			<td>$username</td>
			<td>$password</td> 
			<td>$keterangan</td> 
		</tr>";	
				$no++;	
		}

	?>
</tbody>
<tfoot>
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th>
		<th>Keterangan</th>
	</tr>
</tfoot>
</table>
	

<?php
if(isset($_POST["Simpan"])){
	$nama=strip_tags($_POST["nama"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	if($keterangan=="MD5"){
		$username=MD5($username);
		$password=MD5($password);
	}
	elseif($keterangan=="SHA"){
		$username=sha1($username);
		$password=sha1($password);
	}
	
 $sql=" INSERT INTO `tb_hash` (
`nama` ,
`username` ,
`password` ,
`keterangan`
) VALUES (
'$nama',
'$username',
'$password', 
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data Hash \"$nama\" berhasil disimpan !');document.location.href='?mnu=hashdb';</script>";}
		else{echo"<script>alert('Data Hash \"$nama\"  gagal disimpan...');document.location.href='?mnu=hashdb';</script>";}
}


?>	


