<?php

  // include file konfigurasi
  require 'templates/include.php';

  if(isset($_POST['login-masjid'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $ref = 'users/'.$username.'/user';
    $fetch_data = $database->getReference($ref)->getValue();
    
    // cek ketika username benar/salah
    if($fetch_data > 0){
      foreach($fetch_data as $key => $row){
        //cek password
        if($row['password'] === $password){

          //cek admin 
          if($row['username'] === "admin"){
            $_SESSION['user']['type'] = "administrator";
          }else{
            $_SESSION['user']['type'] = "dkm-masjid";
          }

          $_SESSION['username'] = $username;
          $_SESSION['login'] = TRUE;
          redirect('admin?page=home');
        }else{
          $_SESSION['status'] = 'Kata sandi salah';
          $_SESSION['status-icon'] = 'error';
          redirect('?page=login');
        }
      }
    }else{
      $_SESSION['status'] = 'Nama Pengguna tidak terdaftar';
      $_SESSION['status-icon'] = 'error';
      redirect('?page=login');
    }
  }else{
    redirect('404.php');
  }
?>