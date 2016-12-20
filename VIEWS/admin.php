<?php
//CEK SESSION
session_start();
if(empty($_SESSION["username"]))
{
	header("location: index.php?page=login");
}
?>
<html>
<head>
	<title>Halaman Admin</title>

</head>
<body>
<center>
<a href="index.html">Home</a>|<a  href="index.php?page=admin">Admin</a> | 

<!--<a href="index.php?page=password">Ganti Password</a> | -->
<a href="index.php?page=logout">Logout</a>
</center>


<?php
if(!empty($_GET["edit"]))
{
	$kode = $_GET["edit"];
	//TAMPIL DATA DETAIL
	$data = $database -> detailData($con,$kode);
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="CSS/default.css"/>
<!--<form action="#" method="POST">
	Nama Lengkap : <input type="text" value="<?php echo $data["nama"]; ?>" name="nama"><br>
	Alamat : <input type="text" value="<?php echo $data["alamat"]; ?>" name="alamat"><br>
	Tlp : <input type="text" value="<?php echo $data["no_telepon"]; ?>" name="tlp"><br>
	Agama : <input type="text" value="<?php echo $data["agama"]; ?>" name="agama"><br>
	Tempat Lahir : <input type="text" value="<?php echo $data["tempat"]; ?>" name="tempat"><br>
	Tanggal Lahir : <input type="date" value="<?php echo $data["tanggal"]; ?>" name="tanggal"><br>
	Jenis Kelamin: <input type="text" value="<?php echo $data["kelamin"]; ?>" name="kelamin"><br>
	Jurusan Yang Dipilih : <input type="text" value="<?php echo $data["jurusan"]; ?>" name="jurusan"><br>
	
	Asal SMP : <input type="text" value="<?php echo $data["asal"]; ?>" name="asal"><br>
	Alamat SMP : <input type="text" value="<?php echo $data["alm_smp"]; ?>" name="alm_smp"><br>
	Tahun LULUS : <input type="text" value="<?php echo $data["lulus"]; ?>" name="lulus"><br>
	NISN : <input type="text" value="<?php echo $data["nis"]; ?>" name="nis"><br>
	
	Nilai : <input type="text" value="<?php echo $data["skhun"]; ?>" name="nilai"><br>
	<input type="submit" name="edit" value="EDIT DATA">
</form>-->


<form action="" class="atas">
         <img src="IMG/header.jpg">

            </form>
        
            
        <form action="#" method="POST" class="register">
            <h1>EDIT DATA</h1>
            
            <fieldset class="row2">
                <legend>Data Pendaftar
                </legend>
                <p>
                    <label>Nama *
                    </label>
                    <input type="text" value="<?php echo $data["nama"]; ?>" name="nama" class="long"/>
                </p>

                <p>
                    <label>Jenis Kelamin *
                    </label>
                    <input type="text" value="<?php echo $data["kelamin"]; ?>"  name="kelamin" class="long"/>
                </p>
                <p>
                    <label>Tempat Lahir *
                    </label>
                    <input type="text" value="<?php echo $data["tempat"]; ?>"  name="tempat" class="long"/>
                </p>
                
                <p>
                    <label>Tanggal Lahir *
                    </label>
                    <input type="date" value="<?php echo $data["tanggal"]; ?>"  name="tanggal" class="long"/>
                </p>
                <p>
                    <label>Alamat *
                    </label>
                    <input type="text" value="<?php echo $data["alamat"]; ?>"  name="alamat" class="long"/>
                </p>
                <p>
                    <label>Agama *
                    </label>
                    <input type="text" value="<?php echo $data["agama"]; ?>"  name="agama" class="long"/>
                </p>
                <p>
                    <label>No. Telp / Hp *
                    </label>
                    <input type="text" value="<?php echo $data["no_telepon"]; ?>"  name="tlp" class="long"/>
                </p>
				<p>
                    <label>Jurusan Yang Dipilih *
                    </label>
                    <input type="text" value="<?php echo $data["jurusan"]; ?>"  name="jurusan" class="long"/>
                </p>
       
            </fieldset>
            <!--<fieldset class="row3">
                <legend>Data Orang Tua
                </legend>
                 <p>
                    <label>Nama *
                    </label>
                    <input type="text" class="long"/>
                </p>
                <p>
                    <label>Alamat *
                    </label>
                    <input type="text" class="long"/>
                </p>
                <p>
                    <label>Pekerjaan *
                    </label>
                    <input type="text" class="long"/>
                </p>
                <p>
                    <label>No. Telp / Hp *
                    </label>
                    <input type="text" class="long"/>
                </p>
                </fieldset>-->
                
                <fieldset class="row3">
                <legend>Keterangan Sekolah Sebelumnya
                </legend>
                <p>
                    <label>Nama SMP *
                    </label>
                    <input type="text" value="<?php echo $data["asal"]; ?>"  name="asal" class="long"/>
                   
                </p>
                <p>
                    <label>Alamat *
                    </label>
                    <input type="text" value="<?php echo $data["alm_smp"]; ?>"  name="alm_smp" class="long"/>
                    </p>
                  <p>
                    <label>Tahun Lulus *
                    </label>
                    <input type="text" value="<?php echo $data["lulus"]; ?>"  name="lulus" class="long"/>
                    </p>
                <p>
                    <label>NISN *
                    </label>
                    <input type="text" value="<?php echo $data["nis"]; ?>"  name="nis"/>
                    
                </p>
                <p>
                    <label>Nilai *
                    </label>
                    <input type="text" value="<?php echo $data["skhun"]; ?>"  name="nilai"/>
                    
                </p>
                
         
                <div class="infobox"><h4>KETERANGAN</h4>
                    <p>* Data tidak boleh kosong</p>
                    <p></p>
                </div>
                <div><input type="submit" class="button" name="edit" value="EDIT DATA"></div>
            </fieldset>
            
            
        </form>

<!--===============================================================================================-->
<?php
}
else
{
?>
<h2>Daftar Pendaftar</h2>
<a href="index.php" target="window"><button>Tambah Pendaftar</button></a>|<a href="index.php?page=admin"> 
    <button onClick="window.print();">Print</button> 
    </a>
<table cellpadding="4" cellspacing="0" border="1" width="100%">
	<tr>
		<th>No.</th>
		<th>Nama Pendaftar</th>
		<th>Alamat</th>
		<th>No Telp</th>
		<th>Agama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Jurusan Yang Dipilih</th>
		<th>Asal SMP</th>
		<th>Alamat SMP</th>
		<th>Tahun Lulus</th>
		<th>NISN</th>
		<th>Nilai UN</th>
		<th>Perintah</th>
	</tr>
	<?php
	//READ (Membaca Data)
	$no=1;
	$data = $database -> tampil($con);
	foreach($data as $value)
	{
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$value["nama"].'</td>
			<td>'.$value["alamat"].'</td>
			<td>'.$value["no_telepon"].'</td>
			<td>'.$value["agama"].'</td>
			<td>'.$value["tempat"].'</td>
			<td>'.$value["tanggal"].'</td>
			<td>'.$value["kelamin"].'</td>
			<td>'.$value["jurusan"].'</td>
			<td>'.$value["asal"].'</td>
			<td>'.$value["alm_smp"].'</td>
			<td>'.$value["lulus"].'</td>
			<td>'.$value["nis"].'</td>
			<td>'.$value["skhun"].'</td>
			<td>
				<a href="index.php?page=admin&edit='.$value["id_pendaftar"].'">Edit</a> | 
				<a href="index.php?page=admin&delete='.$value["id_pendaftar"].'">Delete</a>
			</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
<?php
}
?>
</body>
</html>