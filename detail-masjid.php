<?= set_page_title('Detail Masjid');?>
<?php
  if (!(isset($_GET['masjid']) && isset($_GET['token']) && isset($_GET['user']))){
    redirect('404.php');
  }
  $nama_majid = escape_string($_GET['masjid']);
  $token = escape_string($_GET['token']);
  $user = escape_string($_GET['user']);
  ?>

<div class="container-fluid">
  <div class="row">
    <?php 
      $data_user = get_data('users/'.$user.'/detail');
      if($data_user):
      foreach($data_user as $key => $row)?>
      <div class="col">
        <div class="jumbotron">
          <h1 class="display-4">Masjid <?= $row['nama_masjid']; ?></h1>
          <p class="lead"> <?= $row['alamat']; ?></p>
          <hr class="my-4">
          <p><?= $row['deskripsi_masjid']; ?>.</p>
        </div>
      </div>
    <?php endif; ?>
    
    <div class="col-4 shadow p-4">
      <div class="h4 ml-3">Agenda</div>
      <hr>
      
     
      <?php 
        $data_user = get_data('users/'.$user.'/agenda');
        if($data_user):
          foreach($data_user as $key => $row ):
            if($key === "kajian_rutin"):
              $data_kajian_rutin = get_data('users/'.$user.'/agenda/'.$key);
              foreach($data_kajian_rutin as $token => $row_kajian_rutin):
            ?>
          <div class="card shadow mb-2">
            <!-- Card Header - Accordion -->
            <a href="#<?= $token?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?= $token?>">
                <h6 class="m-0 font-weight-bold text-primary"><?= $row_kajian_rutin['agenda']?> - <?= $row_kajian_rutin['hari']?></h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="<?= $token?>" style="">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Hari : <?= $row_kajian_rutin['hari']?></li>
                    <li class="list-group-item">Jam : <?= $row_kajian_rutin['jam']?></li>
                    <li class="list-group-item">Tema : <?= $row_kajian_rutin['tema']?></li>
                    <li class="list-group-item">Judul : <?= $row_kajian_rutin['judul']?></li>
                  </ul>
                </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php elseif($key === "khotbah_jumat"): 
            $data_khotbah_jumat = get_data('users/'.$user.'/agenda/'.$key);
            foreach($data_khotbah_jumat as $token => $row_khotbah_jumat):
            ?>
            <div class="card shadow mb-2">
            <!-- Card Header - Accordion -->
            <a href="#<?= $token?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="<?= $token?>">
                <h6 class="m-0 font-weight-bold text-primary"><?= $row_khotbah_jumat['agenda'].' - '.substr($row_khotbah_jumat['tanggal'],0,-4)?></h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="<?= $token?>" style="">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama khotib : <?= $row_khotbah_jumat['nama_imam']?></li>
                    <li class="list-group-item">Nama Imam : <?= $row_khotbah_jumat['nama_khotib']?></li>
                    <li class="list-group-item">Nama tanggal : <?= $row_khotbah_jumat['tanggal']?></li>
                  </ul>
                </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
          <?php endforeach; ?>
        <?php else: ?>
        <ul class="list-group list-group-flush">
          <li class="list-group-item list-group-item-action">Belum ada agenda</li>
        </ul>
        <?php endif; ?>
    </div>
  </div>
</div>
