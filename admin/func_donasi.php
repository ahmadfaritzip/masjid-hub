<?php
  require 'templates/include.php';

  function donasi($status){
    global $database;
    $jenis_donasi = $_POST['jenis-donasi'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $tanggal = tanggal_indo($_POST['tanggal'], true);
    $username = $_SESSION['username'];
    $info = "";

    $data = [
      'jenis_donasi' => $jenis_donasi,
      'jumlah' => $jumlah,
      'nama' => $nama,
      'tanggal' => $tanggal
    ];

    if($status == 'tambah'){
      $ref = 'users/'.$username.'/pemasukan/donasi';
      $send_data = $database->getReference($ref)->push($data);
      $info = "Menambahkan";
    }else if($status == 'edit'){
      $token = $_POST['token'];
      $ref = 'users/'.$username.'/pemasukan/donasi/'.$token;
      $send_data = $database->getReference($ref)->update($data);
      $info = "Mengubah";
    }

    if($send_data){
      $_SESSION['status'] = 'Berhasil '.$info.' Donatur';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal '.$info.' Donatur';
      $_SESSION['status-icon'] = 'error';
    }

  } //end function tambah barang

  function delete_donasi(){
    global $database;
    $username = $_SESSION['username'];
    $token = $_POST['token'];
    $ref = 'users/'.$username.'/pemasukan/donasi'.'/'.$token;
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Barang';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Barang';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['donasi'])){
    donasi($_POST['donasi']);
    redirect('admin?page=donasi');
  }else if(isset($_POST['delete-donasi'])){
    delete_donasi();
    redirect('admin?page=donasi');
  }else{
    redirect('admin?page=404');
  }
?>