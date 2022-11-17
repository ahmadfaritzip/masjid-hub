<?php
  require 'templates/include.php';

  function khotbah_jumat($status){
    global $database;
    $nama_khotib = $_POST['nama-khotib'];
    $nama_imam = $_POST['nama-imam'];
    $tanggal = $_POST['tanggal'];
    $username = $_SESSION['username'];
    $info = "";

    $data = [
      'agenda' => 'Khotbah Jumat',
      'nama_khotib' => $nama_khotib,
      'nama_imam' => $nama_imam,
      'tanggal' => tanggal_indo($tanggal, true)
    ];

    // var_dump($data);die();
    if($status == 'tambah'){
      $ref = 'users/'.$username.'/agenda/khotbah_jumat';
      $send_data = $database->getReference($ref)->push($data);
      $info = "Menambahkan";
    }else if($status == 'edit'){
      $token = $_POST['token'];
      $ref = 'users/'.$username.'/agenda/khotbah_jumat/'.$token;
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

  function delete_infaq(){
    global $database;
    $username = $_SESSION['username'];
    $token = $_POST['token'];
    $ref = 'users/'.$username.'/agenda/khotbah_jumat'.'/'.$token;
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Kajian';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Kajian';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['khotbah-jumat'])){
    khotbah_jumat($_POST['khotbah-jumat']);
    redirect('admin?page=khotbah_jumat');
  }else if(isset($_POST['delete-khotbah-jumat'])){
    delete_infaq();
    redirect('admin?page=khotbah_jumat');
  }else{
    redirect('admin?page=404');
  }
?>