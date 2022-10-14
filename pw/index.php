<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "prakweb_b_203040100");

// ambil dari tabel film / query
$result = mysqli_query($conn, "SELECT * FROM buku");

// ubah data ke dalam array
// $row = mysqli_fetch_row($result); // array numerik
// $row = mysqli_fetch_assoc($result); // array associative
// $row = mysqli_fetch_array($result); // keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
// tampung ke variabel buku
$buku = $rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nizaar's book</title>
</head>

<body>

  <h1>List Book</h1>

  <table border="1" cellpading="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Tahun Terbit</th>
      <th>Gambar</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($buku as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $row["judul_buku"]; ?> </td>
        <td><?= $row["penulis"]; ?></td>
        <td><?= $row["tahun"]; ?> </td>
        <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="100"></td>
        <a href="ubah.php?id=<?= $book['id_buku']?>" class="waves-effect waves-light btn blue lighten-3 center"><i class="material-icons left">create</i>Change</a>
        <a href="hapus.php?id=<?= $book['id_buku']?>" onclick="return confirm('Delete the data?')" class="waves-effect waves-light btn blue lighten-3"><i class="material-icons left">delete</i>Delete</a>
        </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>