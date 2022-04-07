<?php
require_once"koneksi.php";
$keterangan="MD5";
?> 


<h1>OTENTIKASI HASH</h1>
	  <form class="form-sample" method="post" enctype="multipart/form-data">
	
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
				<button type='submit' name="Login" >Login</button>
				<button type='reset' name="Reset" >Reset</button>
			</div>
		</div>
	  </form>
<hr>			
		 

<?php
if(isset($_POST["Login"])){
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
	 
	$sql="select * from `tb_hash` where `username`='$username' and `password`='$password'";
	$ada=getJum($conn,$sql);
	if($ada>0){
		$d=getField($conn,$sql);
			$id_hash=$d["id_hash"];
			$nama=strtoupper($d["nama"]);
			$username=$d["username"];
			$password=$d["password"];
			$keterangan=$d["keterangan"];
		echo "<script>alert('Yth  \"$nama\" Anda berhasil Login secara $keterangan!');document.location.href='?mnu=hashdb';</script>";	
	}
	else{
		echo "<script>alert('Yth Guest...Anda Gagal Login secara $keterangan!');document.location.href='?mnu=hashdb';</script>";	
	}
}


?>	


