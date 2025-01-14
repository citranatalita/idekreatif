<?php


include("config.php");


session_start();


if (isset($_POST['simpan'])) {
  
  $category_name = $_POST['category_name'];

  
  $query = "INSERT INTO categories (category_name) VALUES ('$category_name')";
  $exec = mysqli_query($conn, $query);

  
  if ($exec) {
    $_SESSION['notification'] = [
      'type' => 'primary', 
      'message' => 'Kategori berhasil ditambahkan!'
    ];
  } else {
    $_SESSION['notification'] = [
      'type' => 'danger', 
      'message' => 'Gagal menambahkan kategori: ' . mysqli_error($conn)
    ];
  }



header('Location: kategori.php');
exit();
}