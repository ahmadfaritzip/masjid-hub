<?= set_page_title("Gaji");?>
<main class="main">
  <div class="container-fliud p-4">
    <div class="col">
      <div class="card mb-4 border-left-primary shadow">
        <div class="card-body">
          <!-- <i class="fas fa-calendar fa-2x mr-2"></i> -->
            <img src="<?= base_url('assets/img/icon/keuangan.png') ?>" width="37" class="mr-3" alt="">
            <span class="h5">Gaji</span>
        </div>
    </div>

    <div class="row mx-1">
      
      <div class="shadow col-3 p-3">      
        <p class="fs-5">Tambah Baru</p>
        <hr>
        <form action="func_gaji.php" method="POST">

          <!-- Nama Penerima -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama">
            </span>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Penerima"></input required>
          </div>
      
          <!-- jumlah gaji -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jumlah">
            </span>
            <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Gaji" required>
          </div>

          <!-- tanggal gaji -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="tanggal">
            </span>
            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" name="gaji" class="btn btn-primary" value="tambah">Tambah</button>
          </div>

        </form>
      </div>

      <div class="shadow col p-3 ml-3">
        <p class="fs-5">Data Gaji</p>
        <hr>
        <table id="tabel" class="table table-sm table-hover table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Penerima</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th style="display:none;"></th>
              <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php 
              $fetch_data = get_data('users/'.$_SESSION['username'].'/pengeluaran/gaji');
              
              //cek ketika detail user sudah di inputkan
              if($fetch_data > 0):
                $i = 1;
                foreach($fetch_data as $key => $row):
            ?>
              <tr>
                <!-- <td class="text-center">1</td>
                <td class="pl-3">Afip</td>
                <td class="pl-3">Rp 1222222</td>
                <td class="pl-3">Rabu, 27 April 2021</td>
                <td style="display:none;">ini token</td> -->
                <td class="text-center"><?= $i++ ?></td>
                <td class="pl-3"><?= $row['nama']?></td>
                <td class="pl-3">Rp <?= $row['jumlah']?></td>
                <td class="pl-3"><?= $row['tanggal']?></td>
                <td style="display:none;"><?= $key?></td>
                <td class="pl-3">
                  <button class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle"></i></button>
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                  <form name="myForm<?= $key?>" action="func_gaji.php" method="POST" style="display: inline;">
                    <input type="hidden" name="token" value="<?= $key?>">
                    <input type="hidden"  name="delete-gaji">
                    <button class="btn btn-outline-danger" onclick="validateForm('<?= $key?>')" id="btn-delete" type='submit'><i class="fa fa-trash"></i></button>
                  </td>
                </form>
            </tr>
              <?php endforeach; ?>
            <?php endif; ?>

          </tbody>
        </table>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="func_gaji.php" method="POST">
              <div class="modal-body">
              
                <!-- Nama Penerima -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama">
                  </span>
                  <input type="text" name="nama" class="form-control" id="edit-nama" placeholder="Nama Penerima"></input required>
                </div>
            
                <!-- jumlah gaji -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jumlah">
                  </span>
                  <input type="number" name="jumlah" class="form-control" id="edit-jumlah" placeholder="Jumlah Gaji" required>
                </div>

                <!-- tanggal gaji -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="tanggal">
                  </span>
                  <input type="date" name="tanggal" class="form-control" id="edit-tanggal" required>
                </div>
                
                <!-- token -->
                <div class="input-group visually-hidden">
                  <input type="hidden" name="token" class="form-control" id="token" value="">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="gaji" class="btn btn-primary" value="edit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>