<?php
  require 'templates/include.php';

  function users_update($status){
    global $database;
    $username = $_POST['username'];
    $nama_masjid = $_POST['nama-masjid'];
    $email = $_POST['email'];
    $no_hp = $_POST['no-hp'];
    $alamat = $_POST['alamat'];
    $info = "";

    $data = [
      'nama_masjid' => $nama_masjid,
      'email' => $email,
      'no_hp' => $no_hp,
      'alamat' => $alamat
    ];

    $token = $_POST['token'];
    $ref = 'users/'.$username.'/detail/'.$token;
    $send_data = $database->getReference($ref)->update($data);

    if($send_data){
      $_SESSION['status'] = 'Berhasil mengubah data';
      $_SESSION['status-icon'] = 'success';
    }

  } //end function tambah barang

  function delete_users(){
    global $database;
    // var_dump($_POST); die();
    $username = $_POST['token'];
    $ref = 'users/'.$username;
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Barang';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Barang';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['users'])){
    users_update($_POST['users']);
    redirect('admin?page=users');
  }else if(isset($_POST['delete-users'])){
    delete_users();
    redirect('admin?page=users');
  }else{
    redirect('admin?page=404');
  }
?>