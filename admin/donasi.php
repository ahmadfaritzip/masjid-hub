<?= set_page_title("Donasi");?>
<main class="main">
  <div class="container-fliud p-4">
    <div class="row mb-2">
      <div class="col">
        <div class="card mb-4 border-left-primary shadow">
          <div class="card-body">
              <img src="<?= base_url('assets/img/icon/keuangan.png') ?>" width="37" class="mr-3" alt="">
              <span class="h5">Donasi</span>
          </div>
      </div>
        <!-- <i class="fas fa-calendar fa-2x mr-2"></i> -->
      </div>
    </div>

    <div class="row mx-1">
  
      <div class="shadow col-3 p-3">      
        <p class="fs-5">Tambah Baru</p>
        <hr>
        <form action="func_donasi.php" method="POST">
        <div class="fs-6">Jenis Donasi :</div>
          <div class="input-group mb-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jenis-donasi" id="donasi-tetap" value="Donasi Tetap" checked>
              <label class="form-check-label" for="donasi-tetap">Donasi Tetap</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jenis-donasi" id="donasi-tidak-tetap" value="Donasi Tidak Tetap">
              <label class="form-check-label" for="donasi-tidak-tetap">Donasi Tidak Tetap</label>
            </div>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama">
            </span>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Donatur" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jumlah-donasi">
            </span>
            <input type="number" name="jumlah" class="form-control" id="jumlah-donasi" placeholder="Jumlah Donasi" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="tanggal-donasi">
            </span>
            <input type="date" name="tanggal" class="form-control" id="tanggal-donasi" required>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" name="donasi" class="btn btn-primary" value="tambah">Tambah</button>
          </div>

        </form>
      </div>

      <div class="shadow col p-3 ml-3">
        <p class="fs-5">Data Donasi</p>
        <hr>
        <table id="tabel" class="table table-sm table-hover table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis</th>
              <th>Jumlah</th>
              <th style="display:none;">tanggal</th>
              <th style="display:none;"></th>
              <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php 
              $fetch_data = get_data('users/'.$_SESSION['username'].'/pemasukan/donasi');
              
              //cek ketika detail user sudah di inputkan
              if($fetch_data > 0):
                $i = 1;
                foreach($fetch_data as $key => $row):
            ?>
              <tr>
                <td class="text-center"><?= $i++ ?></td>
                <td class="pl-3"><?= $row['nama']?></td>
                <td class="pl-3"><?= $row['jenis_donasi']?></td>
                <td class="pl-3 uang"><?= $row['jumlah']?></td>
                <td style="display:none;"><?= $row['tanggal']?></td>
                <td style="display:none;"><?= $key?></td>
                <td class="pl-3">
                  <button class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle"></i></button>
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                  <form name="myForm<?= $key?>" action="func_donasi.php" method="POST" style="display: inline;">
                    <input type="hidden" name="token" value="<?= $key?>">
                    <input type="hidden"  name="delete-donasi">
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
            <form action="func_donasi.php" method="POST">
              <div class="modal-body">

              <!-- radio -->
              <div class="input-group mb-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis-donasi" id="edit-donasi-tetap" value="Donasi Tetap">
                  <label class="form-check-label" for="edit-donasi-tetap">Donasi Tetap</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis-donasi" id="edit-donasi-tidak-tetap" value="Donasi Tidak Tetap">
                  <label class="form-check-label" for="edit-donasi-tidak-tetap">Donasi Tidak Tetap</label>
                </div>
              </div>
              
              <!-- Nama Donatur -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama">
                </span>
                <input type="text" name="nama" class="form-control" id="edit-nama" placeholder="Nama Barang" required>
              </div>
              
              <!-- Jumlah Donatur -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jumlah">
                </span>
                <input type="number" name="jumlah" class="form-control" id="edit-jumlah" placeholder="Jumlah" required>
              </div>
              
              <!-- tanggal donatur -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="tanggal">
                  </span>
                  <input type="date" name="tanggal" class="form-control" id="edit-tanggal" value="" required>
                </div>
                
                <!-- token -->
                <div class="input-group visually-hidden">
                  <input type="hidden" name="token" class="form-control" id="token" value="" required>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="donasi" class="btn btn-primary" value="edit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>