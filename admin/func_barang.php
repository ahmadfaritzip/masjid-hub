<?php
  require 'templates/include.php';

  function barang($status){
    global $database;
    $kategori = $_POST['kategori-barang'];
    $kondisi = $_POST['kondisi-barang'];
    $jumlah = $_POST['jumlah-barang'];
    $nama = $_POST['nama-barang'];
    $ket = $_POST['keterangan'];
    $satua = $_POST['satuan'];
    $username = $_SESSION['username'];
    $info = "";

    $data = [
      'kategori' => $kategori,
      'kondisi' => $kondisi,
      'keterangan' => $ket,
      'jumlah' => $jumlah,
      'satuan' => $satua,
      'nama' => $nama
    ];

    if($status == 'tambah'){
      $ref = 'users/'.$username.'/inventaris';
      $send_data = $database->getReference($ref)->push($data);
      $info = "Menambahkan";
    }else if($status == 'edit'){
      $token = $_POST['token'];
      $ref = 'users/'.$username.'/inventaris/'.$token;
      $send_data = $database->getReference($ref)->update($data);
      $info = "Mengubah";
    }

    if($send_data){
      $_SESSION['status'] = 'Berhasil '.$info.' Barang';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal '.$info.' Barang';
      $_SESSION['status-icon'] = 'error';
    }

  } //end function tambah barang

  function delete_barang(){
    global $database;
    $username = $_SESSION['username'];
    $token = $_POST['token'];
    $ref = 'users/'.$username.'/inventaris'.'/'.$token;
    // var_dump($ref);die();
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Barang';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Barang';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['barang'])){
    barang($_POST['barang']);
    redirect('admin?page=inventaris');
  }else if(isset($_POST['delete-barang'])){
    delete_barang();
    redirect('admin?page=inventaris');
  }else{
    redirect('admin?page=404');
  }
?>