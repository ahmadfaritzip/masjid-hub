<?= set_page_title("Profil Masjid");?>

<div class="container-fluid p-4">

  <div class="row mb-2">
    <div class="col">
      <div class="card mb-4 border-left-primary shadow">
        <div class="card-body">
            <img src="<?= base_url('assets/img/icon/user-profil.png') ?>" width="37" class="mr-3" alt="">
            <span class="h5">Pengaturan Profil</span>
        </div>
    </div>
      <!-- <i class="fas fa-calendar fa-2x mr-2"></i> -->
    </div>
  </div>

  <?php 
    $fetch_data = get_data('users/'.$_SESSION['username'].'/detail');
    //cek ketika detail user sudah di inputkan
    if($fetch_data):
      foreach($fetch_data as $key => $row):
        if($row['nama_masjid'] === '-' || $row['nama_masjid'] === ''):
  ?>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Peringatan!</h4>
    <p>Silahkan lakukan update pada nama masjid agar masjid beserta detail masjid dapat ditampilkan pada halaman <a href="<?= base_url('?page=masjid')?>" target="_blank" rel="noopener noreferrer">Masjid</a> dan update email agar dapat melakukan reset password</p>
    <hr>
    <p class="mb-0">Terimakasih</p>
  </div>
  <?php elseif($row['email'] === '-' || $row['email'] === ''):?>
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Peringatan!</h4>
    <p>Silahkan lakukan update email agar dapat melakukan reset password</p>
    <hr>
    <p class="mb-0">Terimakasih</p>
  </div>
  <?php endif; ?>

  <div class="row mx-1">
    <div class="col p-4 border shadow">

      <form action="func_profil.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 row">
          <label for="username" class="col-sm-2 col-form-label">Nama Pengguna </label>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" id="username" value="<?= $_SESSION['username']?>" disabled>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="nama-masjid" class="col-sm-2 col-form-label">Nama Masjid </label>
          <div class="col-sm-6">
            <input type="text" name="nama-masjid" class="form-control" id="nama-masjid" value="<?= $row['nama_masjid']?>" disabled>
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email </label>
          <div class="col-sm-6">
            <input type="text" name="email" class="form-control" id="email" value="<?= $row['email']?>" disabled>
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="no-hp" class="col-sm-2 col-form-label">Nomor Hp </label>
          <div class="col-sm-6">
            <input type="text" name="no-hp" class="form-control" id="no-hp" value="<?= $row['no_hp']?>" disabled>
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
          <div class="col-sm-6">
            <textarea name="alamat" class="form-control" id="alamat" rows="3" disabled><?= $row['alamat']?></textarea>
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="foto" class="col-sm-2 col-form-label">Foto Masjid </label>
          <div class="col-sm-6">
            <!-- <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile"style="opacity: 90%;">
              <label class="custom-file-label" name='foto' for="customFile">Choose file</label>
            </div> -->
            <input type="file" name="foto" id="foto" disabled>
            <?php
            $nama_foto = $row['foto'];
            if(!($nama_foto == 'assets/img/masjid-default.png')):
            ?>
            <input type="hidden" name="nama-foto" value="<?= $nama_foto ?>">
            <?php endif; ?>
            <img src="<?= base_url($nama_foto)?>" width="150" alt="">
          </div>
        </div>
      
        <div class="mb-3 row">
          <label for="deksripsi-masjid" class="col-sm-2 col-form-label">Deskripsi Masjid </label>
          <div class="col-sm-6">
            <textarea name="deskripsi-masjid" class="form-control" id="deksripsi-masjid" rows="3" disabled><?= $row['deskripsi_masjid']?></textarea>
          </div>
        </div>

        <div class="mb-3 row visually-hidden">
            <input type="hidden" name="token" value="<?= $key ?>">
        </div>

        <div class="mb-3 row">
          <div class="col">

            <button class="btn btn-primary mr-3" id="btn-update-profil">Ubah Profil</button>

            <!-- <button class="btn btn-primary" id="btn-simpan-profil" type="submit" name="update_profil">Simpan</button> -->
          </div>
        </div>
      </form>
        <?php endforeach; ?>
      <?php endif; ?>
      
    </div>
  </div>
  
</div>

