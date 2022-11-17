<?php
  require 'templates/include.php';

  function kajian_rutin($status){
    global $database;
    $nama = $_POST['nama'];
    $tema = $_POST['tema'];
    $judul = $_POST['judul'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $username = $_SESSION['username'];
    $info = "";

    $data = [
      'agenda' => 'Kajian Rutin',
      'nama' => $nama,
      'tema' => $tema,
      'judul' => $judul,
      'hari' => $hari,
      'jam' => $jam
    ];
    // var_dump($data);die();
    if($status == 'tambah'){
      $ref = 'users/'.$username.'/agenda/kajian_rutin';
      $send_data = $database->getReference($ref)->push($data);
      $info = "Menambahkan";
    }else if($status == 'edit'){
      $token = $_POST['token'];
      $ref = 'users/'.$username.'/agenda/kajian_rutin/'.$token;
      $send_data = $database->getReference($ref)->update($data);
      $info = "Mengubah";
    }

    if($send_data){
      $_SESSION['status'] = 'Berhasil '.$info.' Kajian';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal '.$info.' Kajian';
      $_SESSION['status-icon'] = 'error';
    }

  } //end function tambah barang

  function delete_infaq(){
    global $database;
    $username = $_SESSION['username'];
    $token = $_POST['token'];
    $ref = 'users/'.$username.'/agenda/kajian_rutin'.'/'.$token;
    $remove_data = $database->getReference($ref)->set(null);

    if($remove_data){
      $_SESSION['status'] = 'Berhasil Menghapus Kajian';
      $_SESSION['status-icon'] = 'success';
    }else{
      $_SESSION['status'] = 'Gagal Menghapus Kajian';
      $_SESSION['status-icon'] = 'error';
    }
  }

  if(isset($_POST['kajian-rutin'])){
    kajian_rutin($_POST['kajian-rutin']);
    redirect('admin?page=kajian_rutin');
  }else if(isset($_POST['delete-kajian-rutin'])){
    delete_infaq();
    redirect('admin?page=kajian_rutin');
  }else{
    redirect('admin?page=404');
  }
?>