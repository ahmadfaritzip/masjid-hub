<?php
  require 'templates/include.php';

  function gaji($status){
    global $database;
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $tanggal = tanggal_indo($_POST['tanggal'], true);
    $username = $_SESSION['username'];
    $info = "";

    $data = [
      'nama' => $nama,
      'jumlah' => $jumlah,
      'tanggal' => $tanggal
    ];

    if($status == 'tambah'){
      $ref = 'users/'.$username.'/pengeluaran/gaji';
      $send_data = $database->getReference($ref)->push($data);
      $info = "Menambahkan";
    }else if($status == 'edit'){
      $token = $_POST['token'];
      $ref = 'users/'.$username.'/pengeluaran/gaji/'.$token;
      $send_data = $database->getReference($ref)->update($data);
      $info = "Mengubah";
    }

    if($send_data){
      $_SESSION['status'] = 'Berhasil '.$info.' Data';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal '.$info.' Data';
      $_SESSION['status-icon'] = 'error';
    }

  } //end function tambah barang

  function delete_gaji(){
    global $database;
    $username = $_SESSION['username'];
    $token = $_POST['token'];
    $ref = 'users/'.$username.'/pengeluaran/gaji'.'/'.$token;
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Data';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Data';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['gaji'])){
    gaji($_POST['gaji']);
    redirect('admin?page=gaji');
  }else if(isset($_POST['delete-gaji'])){
    delete_gaji();
    redirect('admin?page=gaji');
  }else{
    redirect('admin?page=404');
  }
?>