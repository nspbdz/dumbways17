 <?php 
//  koneksi ke database
require 'functionstype.php';

$ctg = query("SELECT * FROM type_tb ORDER BY id ASC");

//tombol cari ditekan

 ?>
<html>
<head>
    <title> halaman type</title>
</head>



<body>
<table>
<tr>
<td><a href="tambahtype.php">tambah type<a/></td>
</tr>

<tr>
</tr>


</table>    
<h1> List type</h1>
<br><br>


<table border="1" cellpadding="10" cellspacing="0" >
<tr>
    <th>id</th>
    <th>aksi</th>
    <th>name</th>   

</tr>
<?php $i= 1; ?>
<?php foreach($ctg as $row ) : ?>

<tr>
    <td><?php echo $i ?></td>
    <td>
    <a href="ubahtype.php?id=<?php echo $row['id']; ?>">ubah<a/> |

    <a href="hapustype.php?id=<?php echo $row['id']; ?>" 
    onclick="return confirm('yakin');">hapus <a/>

    </td>
    <td> <?php echo $row["name"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

</body>
</html>