<?php
function koneksi() {

 return mysqli_connect("localhost", "root", "","prakweb_b_203040100");

}

function query($sql) {
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload() {
    $nama_file = $_FILES['Gambar']['name'];
    $tipe_file = $_FILES['Gambar']['type'];
    $ukuran_file = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmp_file = $_FILES['Gambar']['tmp_name'];
 
    //ketika tidak ada gambar
    if($error == 4) {
 
     return 'nophoto.png';
    }
 
    //cek ekstensi file 
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
     echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
  return false;
    }
 
    //cek tipe file
    if($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
     echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
  return false;
    }
 
    //cek ukuran file
    if($ukuran_file >10000000) {
     echo "<script>
     alert('File size too big, please upload another file');
  </script>";
  return false;
    }
 
    //upload file
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
 
    return $nama_file_baru;
 }


 
function add($Buku) {
    $conn = koneksi();

    $Judul = htmlspecialchars($Buku['Judul']);
    $Pengarang = htmlspecialchars($Buku['Pengarang']);
    $Penerbit = htmlspecialchars($Buku['Penerbit']);
    // $pict = htmlspecialchars($Buku['pict']);

    //upload
    $Gambar = upload();
    if (!$Gambar) {
        return false;
    }

    $query = "INSERT INTO buku
                VALUES
                ('','$Judul','$Penerbit','$Pengarang','$Gambar')";
    

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function hapus($id) {
    $conn = koneksi();
    //menghapus gambar di folder
 $Buku = query("SELECT * FROM buku WHERE id_buku =$id");
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 if($Buku['Gambar'] != 'nophoto.png') {
     unlink('img/' . $Buku['pict']);
    
 }
 

    mysqli_query($conn, "DELETE FROM buku WHERE id_buku =$id");

    return mysqli_affected_rows($conn);
}


function ubah($Buku) {
    $conn = koneksi();

    $id_buku = htmlspecialchars($Buku['id_buku']);
    $judul_buku = htmlspecialchars($Buku['Judul']);
    $penerbit = htmlspecialchars($Buku['Penerbit']);
    $Penulis = htmlspecialchars($Buku['Penulis']);
    $gambar_lama = htmlspecialchars($Buku['gambar_lama']);

    $Gambar = upload();
    if (!$Gambar) {
        return false;
    }

    if ($Gambar == 'nophoto.png') {
        $Gambar = $gambar_lama;
    }

    $query = "UPDATE buku SET
            judul_buku ='$',
            penulis ='$Penulis',
            penerbit = '$penerbit',
            Gambar = '$Gambar'
            WHERE id_buku = '$id_buku'
    ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>

