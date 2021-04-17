<?php 
//  koneksi ke database
$conn = mysqli_connect("localhost", "root","","game");


function query($query)  {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;

    }
    return $rows; 
}

function tambah($data) {
    
      //ambil data dari tiap elemen dalam form
        global $conn;
      $id = htmlspecialchars($data["id"]);
      $name = htmlspecialchars($data["name"]);
      $type_id = htmlspecialchars($data["type_id"]);
    
    //upload gambar
    $photo = upload();
    if( !$photo ) {
        return false;
    }

        // query inser data
    $query = "INSERT INTO heroes_tb
            VALUES
            ('$id','$name','$type_id',
            '$photo')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM heroes_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data) {
    //ambil data dari tiap elemen dalam form
    global $conn;
    $id = $data["id"];
    // $nrp = htmlspecialchars($data["nrp"]);
    $name = htmlspecialchars($data["name"]);
    $type_id = htmlspecialchars($data["type_id"]);
    $photolama = htmlspecialchars($data["photolama"]);

    //cek apakah user pilih gambar baru / tidak
    if ( $_FILES['photo']['error'] === 4 ) {
        $photo = $photolama;
    } else {
        $photo = upload();

    }

        // query inser data
    $query = "UPDATE  heroes_tb SET
                -- id = '$id',
                name = '$name',
                type_id = '$type_id',
                photo = '$photo'
            WHERE id = $id
             
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}


function cari($keyword) {
    $query = "SELECT * FROM mahasiswa 
                WHERE
                  nama LIKE '$keyword%' OR
                  nrp LIKE '$keyword%' OR
                  email LIKE '$keyword%' OR
                  jurusan LIKE '$keyword%' 

                  
             ";
    return query($query);
    
}


function upload(){ 

    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    //cek apakah tidak ada photo yang diupload
    if( $error === 4) {
        echo "<script>
                alert('pilih photo terlebih dahulu');
            </script>";
        return false; 
    }

    // cek  apakah yang diupload adalah photo
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
    </script>";
return false; 

    }

        // cek  jika ukuran nya terlalu besar
        if( $ukuranFile > 1000000 ) {
            echo "<script>
            alert('pilih gambar terlalu besar!');
        </script>";
    return false; 

        }

        // generate nama gambar baru

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .=$ekstensiGambar;

        // lolos pengecekan, gambar siap diupload

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;


}

?>










<!-- <html>
 $conn = mysqli_connect("localhost", "root","","phpdasar");

// mengambil data dari database

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() mengembalikan array asosiatif
// mysqli_fetch_assoc() mengembalikan array numerik
// mysqli_fetch_array() mengembalikan array array
// mysqli_fetch_objek() mengembalikan array objek


// while ($mhs = mysqli_fetch_array($result)) {

//     var_dump($mhs);

// }
</html> -->
