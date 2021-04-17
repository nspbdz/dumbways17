<?php 
 require 'functionshero.php';
 //koneksi ke dbms

 //ambil data di url
$id = $_GET["id"];
//query data hero berdasarkan id

$wrt = query("SELECT  * FROM type_tb ORDER BY id ASC");

$mhs = query("SELECT heroes_tb.id AS heroId, heroes_tb.name AS heroName, heroes_tb.photo, type_tb.name AS typeName,type_tb.id AS typeId FROM heroes_tb JOIN type_tb ON heroes_tb.type_id =type_tb.id WHERE heroes_tb.id = $id ")[0];


 // cek apakah tombol submit sudah di ttekan belum
 if( isset($_POST["submit"]) ) {

  

    //cek apakah data berhasil di ubah atau tidak
    if( ubah($_POST) > 0 ){
            echo " <script>
                alert('data berhasil ubah')
                document.location.href = 'index.php';
            </script> ";
    } else {
        echo  " <script>
        alert('data gagal ubah')
        document.location.href = 'index.php';
        </script> 
                ";
        echo "<br>";
        echo mysqli_error($conn);
    }
 
    }

 ?>

<html>
<head>
    <title>ubah data hero</title>
</head>
<body>
        <h1>ubah data hero</h1>
        <h1>minimal merubah 1 data hero</h1>

        <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $mhs["heroId"]; ?>">
        <input type="hidden" name="photolama" value="<?= $mhs["photo"]; ?>">

        <ul>
            <!-- <li>
                <label for="id">id : </label>
                <input type="text" name="id" id="id" required value="<?= $mhs["id"]; ?>">
            </li> -->
            <li>
                <label for="name">name : </label>
                <input type="text" name="name"id="name" required value="<?= $mhs["heroName"]; ?>" >
            </li>

          
            <li>
                <label>writer : </label>
                    
            <select name="type_id" id="type_id" required>
  <option  disable selected="selected" value="<?= $mhs['typeId'] ?>" > "<?= $mhs['typeName'] ?>" </option>
  <?php
    foreach($wrt as $name) { ?>
      <option id="type_id" value="<?= $name['id'] ?>">"<?= $name['name'] ?>"</option>
  <?php
    } ?>
</select> 
            </li>

          
            <li>
                <label for="photo">photo : </label>
                <img src="img/<?= $mhs['photo']; ?>" width="40px" alt=""> <br>
                <input type="file" name="photo"id="photo"  ">
            </li>
            <li>
                 <button type="submit" name="submit">ubah data</button>
            </li>
        </ul>
        </form>

</body>

</html>