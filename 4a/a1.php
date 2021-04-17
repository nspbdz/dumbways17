<?php 
//  koneksi ke database
require 'functionsGame.php';

$heroes = query("SELECT heroes_tb.id, heroes_tb.photo,  heroes_tb.name AS heroName, type_tb.name AS typeName FROM heroes_tb JOIN type_tb ON heroes_tb.type_id =type_tb.id  ORDER BY heroes_tb.id ASC");

//tombol cari ditekan

 ?>
<html>
<head>
</head>



<body>
<h1> table heroes beserta type dari hero tsb</h1>
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
    <td> <?php echo $row["heroName"]; ?></td>
    <td> <?php echo $row["typeName"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

</body>
</html>