<?php 
 require 'functionstype.php';
 //koneksi ke dbms
 $conn = mysqli_connect("localhost", "root","","game");


 // cek apakah tombol submit sudah di ttekan belum
 if( isset($_POST["submit"]) ) {

  

    //cek apakah data berhasil di tambahkan atau tidak
    if( tambahWriter($_POST) > 0 ){
            echo " <script>
                alert('data berhasil ditambahkan')
                document.location.href = 'listtype.php';
            </script> ";
    } else {
        echo  " <script>
        alert('data gagal ditambahkan')
        document.location.href = 'listtype.php';
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
            </li>
            <li>
                <label for="name">name : </label>
                <input type="text" name="name"id="name" required>
            </li>
           
                 <button type="submit" name="submit">tambah data</button>
            </li>
        </ul>
        </form>

</body>

</html>