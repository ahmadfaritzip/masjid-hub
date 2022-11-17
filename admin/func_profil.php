<?php
  require 'templates/include.php';

  function send_data_profil($username, $token, $gambar, $email, $no_hp, $alamat, $nama_masjid, $deskripsi_masjid){
    $data = [
      'foto' => $gambar,
      'email' => $email,
      'no_hp' => $no_hp,
      'alamat' => $alamat,
      'nama_masjid' => $nama_masjid,
      'deskripsi_masjid' => $deskripsi_masjid
    ];

    $ref = 'users/'.$username.'/detail/'.$token;
    $send_data = update_data($ref, $data);

    if($send_data){
      $_SESSION['status'] = 'Berhasil mengubah profil masjid';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal mengubah profil masjid';
      $_SESSION['status-icon'] = 'error';
    }
    redirect('admin?page=profil');
  }

  if(isset($_POST['update_profil'])){
    $token = $_POST['token'];
    $email = $_POST['email'];
    $no_hp = $_POST['no-hp'];
    $alamat = $_POST['alamat'];
    $nama_masjid = $_POST['nama-masjid'];
    $deskripsi_masjid = $_POST['deskripsi-masjid'];
    $username = $_SESSION['username'];


    $gambar = $_FILES['foto']['name'];
    $temp_ekstensi = explode('.', $gambar);
    $ekstensi_gambar = strtolower(end($temp_ekstensi));
    
    // ketika tidak mengirimkan gambar pertama kali
    if($gambar === '' && $ekstensi_gambar === '' && !isset($_POST['nama-foto'])){
      $gambar = 'assets/img/masjid-default.png';
      send_data_profil($username, $token, $gambar, $email, $no_hp, $alamat, $nama_masjid, $deskripsi_masjid);
    }elseif($gambar === '' && $ekstensi_gambar === '' && isset($_POST['nama-foto'])){
      send_data_profil($username, $token, $_POST['nama-foto'], $email, $no_hp, $alamat, $nama_masjid, $deskripsi_masjid);
    }else{

      //ketika mengirimkan gambar
      if ( ! in_array($ekstensi_gambar, array('jpg', 'png', 'gif', 'bmp', 'jpeg'))) {
          $_SESSION['status'] = "Maaf ekstensi gambar tidak diperbolehkan.";
          $_SESSION['status-icon'] = "error";

          redirect('admin?page=profil');
      } else {
          unlink('../'.$_POST['nama-foto']);
          $nama_gambar      = date('YmdHis') . '.' . $ekstensi_gambar;
          $tmp_gambar       = $_FILES['foto']['tmp_name'];
          $direktori_upload = '../uploads/profile/' . $nama_gambar;
          
          if (move_uploaded_file($tmp_gambar, $direktori_upload)) {
            $gambar = 'uploads/profile/' . $nama_gambar;
            send_data_profil($username, $token, $gambar, $email, $no_hp, $alamat, $nama_masjid, $deskripsi_masjid);
            
          } else {
            $_SESSION['status'] = 'Gagal mengubah profil masjid';
            $_SESSION['status-icon'] = 'error';

            redirect('admin?page=profil');
          }
      }
    }
  }
?>