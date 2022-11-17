<?php
  require 'templates/include.php';

  function pembelian($status){
    global $database;
    $nama = $_POST['nama'];
    $tanggal = tanggal_indo($_POST['tanggal'], true);
    $jumlah = $_POST['jumlah'];
    $harga_satuan = $_POST['harga-satuan'];
    $total_harga = $_POST['total-harga'];
    $keterangan = $_POST['keterangan'];
    $username = $_SESSION['username'];
    $info = "";

    $data = [
      'nama_barang' => $nama,
      'tanggal' => $tanggal,
      'jumlah_barang' => $jumlah,
      'harga_satuan' => $harga_satuan,
      'total_harga' => $total_harga,
      'keterangan' => $keterangan,
    ];

    if($status == 'tambah'){
      $ref = 'users/'.$username.'/pengeluaran/pembelian';
      $send_data = $database->getReference($ref)->push($data);
      $info = "Menambahkan";
    }else if($status == 'edit'){
      $token = $_POST['token'];
      $ref = 'users/'.$username.'/pengeluaran/pembelian/'.$token;
      $send_data = $database->getReference($ref)->update($data);
      $info = "Mengubah";
    }

    if($send_data){
      $_SESSION['status'] = 'Berhasil '.$info.' Barang Pembelian';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal '.$info.' Barang Pembelian';
      $_SESSION['status-icon'] = 'error';
    }

  } //end function tambah barang

  function delete_pembelian(){
    global $database;
    $username = $_SESSION['username'];
    $token = $_POST['token'];
    $ref = 'users/'.$username.'/pengeluaran/pembelian'.'/'.$token;
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Barang';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Barang';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['pembelian'])){
    pembelian($_POST['pembelian']);
    redirect('admin?page=pembelian');
  }else if(isset($_POST['delete-pembelian'])){
    delete_pembelian();
    redirect('admin?page=pembelian');
  }else{
    redirect('admin?page=404');
  }
?>