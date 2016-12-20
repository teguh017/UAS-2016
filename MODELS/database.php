<?php

class database {
	
	function daftar($con,$nama,$alamat,$tlp,$agama,$tempat,$tanggal,$kelamin,$jurusan,$asal,$alm_smp,$lulus,$nis,$nilai)
	{
		//query
		$q1 = mysqli_query($con,"INSERT INTO tbl_pendaftaran VALUES(null,'$nama','$alamat','$tlp','$agama','$tempat','$tanggal','$kelamin','$jurusan','$asal','$alm_smp','$lulus','$nis');");
		$q2 = mysqli_query($con,"INSERT INTO tbl_nilai VALUES(null,'$nilai');");
		
		if($q1 && $q2)
		{
			echo '
			<script>alert("DATA BERHASIL DIMASUKKAN");window.location.href="";</script>
			';
		}
	}
	
	function login($con,$user,$pass)
	{
		$q = mysqli_query($con,"SELECT * FROM tbl_admin WHERE username = '$user' AND
		password = '$pass';");
		$cek = mysqli_fetch_array($q);
		if(!empty($cek[0]))
		{
			session_start();
			$_SESSION["username"] = $user; 
			header("location: index.php?page=admin");
		}
		else
		{
			echo '
			<script>
				alert("LOGIN GAGAL USERNAME DAN PASSWORD SALAH !!");
				window.location.href="";
			</script>
			';
		}
	}
	
	function tampil($con)
	{
		$list = array();
		$q = mysqli_query($con,"SELECT * FROM tbl_pendaftaran
		JOIN tbl_nilai ON 
		tbl_nilai.id_pendaftar = tbl_pendaftaran.id_pendaftar
		ORDER BY tbl_pendaftaran.id_pendaftar DESC;");
		while($data = mysqli_fetch_array($q))
		{
			$list[] = $data;
		}
		return $list;
	}
	
	function hapusData($con,$kode)
	{
		$q1 = mysqli_query($con,"DELETE FROM tbl_pendaftaran WHERE id_pendaftar = '$kode';");
		$q2 = mysqli_query($con,"DELETE FROM tbl_nilai WHERE id_pendaftar = '$kode';");
		if($q1 & $q2)
		{
			echo '
			<script>
				alert("Data berhasil dihapus !");
				window.location.href="index.php?page=admin";
			</script>
			';
		}
	}
	
	function detailData($con,$kode) 
	{
		$q = mysqli_query($con,"SELECT * FROM tbl_pendaftaran
		JOIN tbl_nilai ON 
		tbl_nilai.id_pendaftar = tbl_pendaftaran.id_pendaftar
		WHERE tbl_pendaftaran.id_pendaftar = '$kode'
		ORDER BY tbl_pendaftaran.id_pendaftar DESC;");
		$data = mysqli_fetch_array($q);
		return $data;
	}
	
	function editData($con,$nama,$alamat,$tlp,$agama,$tempat,$tanggal,$kelamin,$jurusan,$asal,$alm_smp,$lulus,$nis,$nilai,$kode)
	{
		$q1 = mysqli_query($con,"UPDATE tbl_pendaftaran SET 
		nama = '$nama',
		alamat = '$alamat',
		no_telepon ='$tlp',
		agama = '$agama',
		tempat = '$tempat',
		tanggal = '$tanggal',
		kelamin = '$kelamin',
		jurusan = '$jurusan',
		asal = '$asal',
		alm_smp = '$alm_smp',
		lulus = '$lulus',
		nis = '$nis'
		WHERE id_pendaftar = '$kode';");
		$q2 = mysqli_query($con,"UPDATE tbl_nilai SET 
		skhun ='$nilai'
		WHERE id_pendaftar = '$kode';");
		if($q1 & $q2)
		{
			echo '
			<script>
				alert("Data berhasil diedit !");
				window.location.href="index.php?page=admin";
			</script>
			';
		}
	}
}

?>
