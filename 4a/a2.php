<?php 
//  koneksi ke database
require 'functionsGame.php';

$heroes = query("SELECT * FROM heroes_tb WHERE type_id =1");

//tombol cari ditekan

 ?>
<html>
<head>
</head>



<body>
<h1> table heroes tipe tertentu</h1>
<br><br>


<table border="1" cellpadding="10" cellspacing="0" >
<tr>
<th>no</th>

    <th>gambar</th>
    <th>id</th>
    <th>name</th>   
    <th>type</th>

</tr>
<?php $i= 1; ?>
<?php foreach($heroes as $row ) : ?>

<tr>
    <td><?php echo $i ?></td>
    <td><img src="img/<?php echo $row["photo"]; ?>"
    width="50"></td>
    <td> <?php echo $row["id"]; ?></td>
    <td> <?php echo $row["name"]; ?></td>
    <td> <?php echo $row["type_id"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

</body>
</html>