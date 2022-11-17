<?= set_page_title("Inventaris Masjid");?>
<main class="main">
  <div class="container-fliud p-4">
    <div class="col">
      <div class="card mb-4 border-left-primary shadow">
        <div class="card-body">
          <!-- <i class="fas fa-calendar fa-2x mr-2"></i> -->
            <img src="<?= base_url('assets/img/icon/inventaris.png') ?>" width="37" class="mr-3" alt="">
            <span class="h5">Inventaris</span>
        </div>
    </div>

    <div class="row mx-1">
      
      <div class="shadow col-3 p-3">      
        <p class="h5">Tambah Barang</p>
        <hr>
        <form action="func_barang.php" method="POST">
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama-barang">
            </span>
            <input type="text" name="nama-barang" class="form-control" id="nama-barang" placeholder="Nama Barang" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/pass.png')?>" width="20" alt="kategori-barang">
            </span>
            <input type="text" name="kategori-barang" class="form-control" id="kategori-barang" placeholder="Kategori Barang" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jumlah-barang">
            </span>
            <input type="number" name="jumlah-barang" class="form-control" id="jumlah-barang" placeholder="Jumlah" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/pass.png')?>" width="20" alt="satuan">
            </span>
            <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Satuan Jumlah" required>
          </div>
          
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="kondisi-barang">
            </span>
            <input type="text" name="kondisi-barang" class="form-control" id="kondisi-barang" placeholder="Kondisi Barang" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/pass.png')?>" width="20" alt="keterangan">
            </span>
            <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan"></textarea>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" name="barang" class="btn btn-primary" value="tambah">Tambah</button>
          </div>

        </form>
      </div>

      <div class="shadow col p-3 ml-3">
        <p class="h5">Data Barang</p>
        <hr>
        <div class="table-responsive">
          <table class="table table-sm hover table-bordered" id="tabel" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th style="display:none;">Keterangan</th>
                <th style="display:none;"></th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php 
                $ref = 'users/'.$_SESSION['username'].'/inventaris';
                $fetch_data = $database->getReference($ref)->getValue();
                
                //cek ketika detail user sudah di inputkan
                if($fetch_data > 0):
                  $i = 1;
                  foreach($fetch_data as $key => $row):
              ?>
                <tr>
                  <!-- <td class="text-center">1</td>
                  <td class="pl-3">a</td>
                  <td class="pl-3">b</td>
                  <td class="pl-3">3</td>
                  <td class="pl-3">d</td>
                  <td style="display:none;">e</td>
                  <td style="display:none;">f</td> -->
                  <td class="text-center"><?= $i++ ?></td>
                  <td class="pl-3"><?= $row['nama']?></td>
                  <td class="pl-3"><?= $row['kategori']?></td>
                  <td class="pl-3"><?= $row['jumlah'].' '.$row['satuan']?></td>
                  <td class="pl-3"><?= $row['kondisi']?></td>
                  <td style="display:none;"><?= $row['keterangan']?></td>
                  <td style="display:none;"><?= $key?></td>
                  <td class="pl-3">
                    <button class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle"></i></button>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                    <form name="myForm<?= $key?>" action="func_barang.php" method="POST" style="display: inline;">
                      <input type="hidden" name="token" value="<?= $key?>">
                      <input type="hidden"  name="delete-barang">
                      <button class="btn btn-outline-danger" onclick="validateForm('<?= $key?>')" id="btn-delete" type='submit'><i class="fa fa-trash"></i></button>
                    </td>
                  </form>
              </tr>
                <?php endforeach; ?>
              <?php endif; ?>

            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="func_barang.php" method="POST">
              <div class="modal-body">
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama-barang">
                  </span>
                  <input type="text" name="nama-barang" class="form-control" id="edit-nama-barang" placeholder="Nama Barang" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/pass.png')?>" width="20" alt="kategori-barang">
                  </span>
                  <input type="text" name="kategori-barang" class="form-control" id="edit-kategori-barang" placeholder="Kategori Barang" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jumlah-barang">
                  </span>
                  <input type="number" name="jumlah-barang" class="form-control" id="edit-jumlah-barang" placeholder="Jumlah" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/pass.png')?>" width="20" alt="satuan">
                  </span>
                  <input type="text" name="satuan" class="form-control" id="edit-satuan" placeholder="Satuan Jumlah" required>
                </div>
                
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="kondisi-barang">
                  </span>
                  <input type="text" name="kondisi-barang" class="form-control" id="edit-kondisi-barang" placeholder="Kondisi Barang" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/pass.png')?>" width="20" alt="keterangan">
                  </span>
                  <textarea name="keterangan" class="form-control" id="edit-keterangan" placeholder="Keterangan"></textarea>
                </div>

                <div class="input-group visually-hidden">
                  <input type="hidden" name="token" class="form-control" id="token" value="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="barang" class="btn btn-primary" value="edit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>