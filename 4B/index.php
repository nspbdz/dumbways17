 <?php 
//  koneksi ke database
require 'functionshero.php';

$hero = query("SELECT heroes_tb.id AS heroID, heroes_tb.name AS heroName, heroes_tb.photo, type_tb.name AS typeName FROM heroes_tb JOIN type_tb ON heroes_tb.type_id =type_tb.id ORDER BY heroes_tb.id ASC");

//tombol cari ditekan

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
  <table>
<tr>


</table>    
<h1> List Hero</h1> 
<a href="listtype.php"> list type</a> <br>
<a href="tambahhero.php"> add hero</a> <br>
<a href="tambahtype .php"> add type</a>
<br><br>


    <div class="container-fluid">
	<div class="row">
<?php foreach($hero as $row ) : ?>

		<div class="col-md-4">
			<div class="card" >
            <img src=" img/<?php echo $row["photo"]; ?>"  style="width: 18rem;">
				<h5 class="card-header">
                <?php echo $row["heroName"]; ?>
				</h5>
				<div class="card-body">
					<p class="card-text">
                     <?php echo $row["typeName"]; ?>
					</p>
                    
				</div>
				<div class="card-footer">
        <a href="detail.php?id=<?php echo $row['heroID']; ?>">View Detail<a/> 

            <br>
        <a href="ubahhero.php?id=<?php echo $row['heroID']; ?>">ubah<a/> |
        <a href="hapushero.php?id=<?php echo $row['heroID']; ?>" 
        onclick="return confirm('yakin');">hapus <a/>
				</div>
			</div>
		</div>
		

<?php endforeach; ?>


	</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>

</html>