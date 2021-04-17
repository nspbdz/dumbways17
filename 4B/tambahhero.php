<?php 
 require 'functionshero.php';
 //koneksi ke dbms
 $conn = mysqli_connect("localhost", "root","","game");

 $type = query("SELECT  * FROM type_tb ORDER BY id ASC");
 
 // cek apakah tombol submit sudah di ttekan belum
 if( isset($_POST["submit"]) ) {

  

    //cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST) > 0 ){
            echo " <script>
                alert('data berhasil ditambahkan')
                document.location.href = 'index.php';
            </script> ";
    } else {
        echo  " <script>
        alert('data gagal ditambahkan')
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
    <title>tambah data mahasiswa</title>
</head>
<body>
        <h1>tambah data mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">id : </label>
                <input type="text" name="id" id="id" required>
                <p>tolong masukan id berupa angka </p>
            </li>
            <li>
                <label for="name">name : </label>
                <input type="text" name="name"id="name" required>
            </li>
            
               
            <li>
                <label>Type : </label>
                    
            <select name="type_id" id="type_id" required>
            <option  disable selected="selected"  > "Pilih" </option>

            <?php
                foreach($type as $name) { ?>
                <option id="type_id" value="<?= $name['id'] ?>">"<?= $name['name'] ?>"</option>
            <?php
                } ?>
            </select> 
                        </li>
            <!-- <li>
                <label for="category_id">category_id : </label>
                <input type="text" name="category_id"id="category_id" required>
            </li>
            <li>
                <label for="writer_id">writer_id : </label>
                <input type="text" name="writer_id"id="writer_id" required>
            </li> -->
          
            <li>
                <label for="img">img : </label>
                <p>tolong masukan  berupa "jpg" "png" "jpeg" </p>

                <input type="file" name="img"id="img" required>

            </li>
            <br>
            <li>
                 <button type="submit" name="submit">tambah data</button>
            </li>
        </ul>
        </form>

</body>

</html>