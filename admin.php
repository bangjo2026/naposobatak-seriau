<?php

session_start();

if(!isset($_SESSION['admin'])){

header("location:login.php");

}

include "koneksi.php";

$data=mysqli_query(
$conn,
"SELECT * FROM anggota"
);

?>


<h1>
Dashboard Admin
</h1>


<a href="logout.php">
Logout
</a>


<table border="1" cellpadding="10">

<tr>
<th>No</th>
<th>Wilayah</th>
<th>Nama</th>
<th>Aksi</th>
</tr>


<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>


<tr>

<td><?= $no++; ?></td>

<td><?= $row['wilayah']; ?></td>

<td><?= $row['nama']; ?></td>


<td>

<a href="hapus.php?id=<?= $row['id']; ?>">
Hapus
</a>

</td>


</tr>


<?php } ?>


</table>