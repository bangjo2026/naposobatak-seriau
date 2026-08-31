<?php

session_start();

include "koneksi.php";


$username=$_POST['username'];
$password=$_POST['password'];


$data=mysqli_query(
$conn,
"SELECT * FROM admin 
WHERE username='$username'
AND password='$password'"
);


$cek=mysqli_num_rows($data);


if($cek > 0){

$_SESSION['admin']=$username;

header(
"location:admin.php"
);


}else{

echo "
<script>
alert('Username atau password salah');
location='login.php';
</script>
";

}

?>