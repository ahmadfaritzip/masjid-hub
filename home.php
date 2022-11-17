<?= set_page_title($config['app']['name']);?>

<style>
  .heading-footer{  
    background-size: cover; 
    height: 275px; 
    -webkit-box-shadow: none; 
    box-shadow: none; 
    border: 0px; 
    border-radius: 0px; 
  }   
 
</style>

<div class="container">

    <div class="row">
      <div class="col"><p class="h4 mb-3">Daftar Masjid</p><hr></div>
    </div>

    <div class="row">
    <?php 
      $keys = get_data_key('users');

      if($keys):
        foreach($keys as $user):
          $fetch_data = get_data('users/'.$user.'/detail');
          if(is_array($fetch_data)):
            foreach(array_slice($fetch_data,0,3) as $key => $row):
              if( $row['nama_masjid'] === '-' || $row['nama_masjid'] === '') break;
      //cek ketika detail user sudah di inputkan
    ?>
      <div class="col-4 mb-3">
        <div class="card h-100 img-fluid" style="width: 21rem;">
          <div class="card-header heading-footer" style="background-image: url(<?php $foto = $row['foto']; echo base_url($foto)?>");></div>
          <div class="card-body">
            <h5 class="card-title">
            <?php if(strpos(strtolower($row['nama_masjid']), 'masjid') === false){
              echo 'Masjid '.$row['nama_masjid'];
            }else{
              echo $row['nama_masjid'];
            }
            ?>  
            </h5>
            <p class="card-text"><?= substr($row['deskripsi_masjid'],0, 100) ?> ...</p>
            <p class="card-text text-end">
              <a href="<?= base_url('?page=detail-masjid&user='.$user.'&masjid='.$row['nama_masjid']).'&token='.$key ?>" class="text-white">
                <button type="button" class="btn btn-primary">Detail</button>
              </a>
            </p>
          </div>
        </div>
      </div>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>

    <div class="row mb-4">
        <div class="col text-center mt-3">
          <p><a href="<?= base_url('?page=masjid') ?>"> Lihat lebih banyak ... </a></p>
        </div>
    </div>

</div>
