<?php
  // Memulai session
  require 'templates/include.php';

  // cek apakah post register-masjid sudah di set
  if(isset($_POST['register-masjid'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];

    // cek ketika password kosong
    if($password === '' || $re_password === ''){
      $_SESSION['status'] = 'Password tidak boleh kosong';
      $_SESSION['status-icon'] = 'warning';
      if(isset($_SESSION['user']['type'])){
        redirect('admin?page=users');
      }else{
        redirect('?page=register');
      }

    // cek ketika password tidak sama
    }elseif($password !== $re_password){
      $_SESSION['status'] = 'Pasword harus sama';
      $_SESSION['status-icon'] = 'warning';
      if(isset($_SESSION['user']['type'])){
        redirect('admin?page=users');
      }else{
        redirect('?page=register');
      }
    }else{    

      $data = [
        'username' => $username,
        'password' => $password,
      ];

      $ref = 'users/'.$username.'/user';
      $fetch_data = $database->getReference($ref)->getValue();

      //cek apakah user sudah terdaftar
      if($fetch_data > 0){
        $_SESSION['status'] = 'Maaf nama pengguna sudah terdaftar';
        $_SESSION['status-icon'] = 'info';
        if(isset($_SESSION['user']['type'])){
          redirect('admin?page=users');
        }else{
          redirect('?page=register');
        }
      }else{
        $ref = 'users/'.$username.'/user';
        $send_data = $database->getReference($ref)->push($data);

        if($send_data){
          $_SESSION['status'] = 'Berhasil mendaftarkan masjid';
          $_SESSION['status-icon'] = 'success';

          $data = [
            'email' => '-',
            'no_hp' => '-',
            'alamat' => '-',
            'foto' => 'assets/img/masjid-default.png',
            'nama_masjid' => '-',
            'deskripsi_masjid' => '-'
          ];
          $ref = 'users/'.$username.'/detail';
          $send_data = $database->getReference($ref)->push($data);
        }else{
          $_SESSION['status'] = 'Gagal mendaftarkan masjid';
          $_SESSION['status-icon'] = 'error';
        }
        if(isset($_SESSION['user']['type'])){
          redirect('admin?page=users');
        }else{
          redirect('?page=login');
        }
      }

    }
    
  }else{
    redirect('404.php');
  }
?>