<?php
  require 'templates/include.php';

  function infaq($status){
    global $database;
    $jumlah = $_POST['jumlah'];
    if($jumlah === ''){
      $_SESSION['status'] = 'Harga tidak boleh kosong';
      $_SESSION['status-icon'] = 'warning';

    }else{

      $tanggal = tanggal_indo($_POST['tanggal'], true);
      $keterangan = $_POST['keterangan'];
      $username = $_SESSION['username'];
      $info = "";

      $data = [
        'jumlah' => $jumlah,
        'keterangan' => $keterangan,
        'tanggal' => $tanggal
      ];

      if($status == 'tambah'){
        $ref = 'users/'.$username.'/pemasukan/infaq';
        $send_data = $database->getReference($ref)->push($data);
        $info = "Menambahkan";
      }else if($status == 'edit'){
        $token = $_POST['token'];
        $ref = 'users/'.$username.'/pemasukan/infaq/'.$token;
        $send_data = $database->getReference($ref)->update($data);
        $info = "Mengubah";
      }

      if($send_data){
        $_SESSION['status'] = 'Berhasil '.$info.' Infaq';
        $_SESSION['status-icon'] = 'success';
      }else{
        $_SESSION['status'] = 'Gagal '.$info.' Infaq';
        $_SESSION['status-icon'] = 'error';
      }
    }
  } //end function tambah barang

  function delete_infaq(){
    global $database;
    $username = $_SESSION['username'];
    $token = $_POST['token'];
    $ref = 'users/'.$username.'/pemasukan/infaq'.'/'.$token;
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Barang';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Barang';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['infaq'])){
    infaq($_POST['infaq']);
    redirect('admin?page=infaq');
  }else if(isset($_POST['delete-infaq'])){
    delete_infaq();
    redirect('admin?page=infaq');
  }else{
    redirect('admin?page=404');
  }
?>