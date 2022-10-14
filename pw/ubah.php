<?php

require 'function.php';

$id_buku = $_GET['id'];
$book = query("SELECT * FROM buku WHERE id_buku =$id_buku")[0];

if(isset($_POST['ubah'])) {
    if(ubah($_POST) > 0){
         echo "<script>
            alert('Data Change Success');
            document.location.href = 'index.php';
        </script>";
    }else {
        echo "<script>
                alert('Data Change Fail');
                document.location.href = 'index.php';
            </script>";
    }
    
   
}



?>



















<!DOCTYPE html>
<html lang="en">
<head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <h3 class="center">Change data</h3>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id_buku" name="id_buku" value="<?= $book['id_buku'];?>">
            <div class="input-field">
                <input type="text" name="Judul" id="Judul" class="validate" required value="<?= $book['Judul'];?>">
                <label for="Judul">Judul</label>
            </div>
            <div class="input-field">
                <input type="text" name="Penerbit" id="Penerbit" class="validate" required value="<?= $book['Penerbit'];?>">
                <label for="Penerbit">Penerbit</label>
            </div>
            <div class="input-field">
                <input type="text" name="Pengarang" id="Pengarang" class="validate" required value="<?= $book['Pengarang'];?>">
                <label for="Pengarang">Pengarang</label>
            </div>
            <div class="file-field input-field">
                <input type="hidden" name="gambar_lama" value="<?= $book['Gambar']?>">
                 <div class="btn">
                     <span>Choose Picture</span>
                     <input type="file" name="Gambar" id="Gambar" class="gambar" onchange="previewImage()">
                 </div>
                 <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="Gambar" id="Gambar" value="<?= $book['Gambar'];?>">
                </div>
                <img src="img/<?= $book['Gambar']?>" style="display: block;" width="120px" class="img-preview">
            </div>
            <button type="submit" name="ubah" class="waves-effect waves-light btn blue lighten-3">Change Data</button>
            <a href="index.php" class="waves-effect waves-light btn blue lighten-3"><i class="material-icons left">arrow_back</i>Back</a>
    
        
        </form>
        
    
    
    </div>

 <!--JavaScript at end of body for optimized loading-->
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <script src="javascript/scriptphoto.js"></script>
</body>
</html>
