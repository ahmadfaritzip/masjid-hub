<?= set_page_title("Kajian Rutin");?>
<main class="main">
  <div class="container-fliud p-4">
    <div class="col">
      <div class="card mb-4 border-left-primary shadow">
        <div class="card-body">
          <!-- <i class="fas fa-calendar fa-2x mr-2"></i> -->
            <img src="<?= base_url('assets/img/icon/agenda.png') ?>" width="36" class="mr-3" alt="">
            <span class="h5">Kajian Rutin</span>
        </div>
    </div>

    <div class="row mx-1">
      
      <div class="shadow col-3 p-3">      
        <p class="fs-5">Tambah Kajian Rutin</p>
        <hr>
        <form action="func_kajian_rutin.php" method="POST">

          <!-- Nama Pemateri -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama">
            </span>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pemateri"></input required>
          </div>

          <!-- Tema Kajian -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="tema">
            </span>
            <input type="text" name="tema" class="form-control" id="tema" placeholder="Tema Kajian"></input required>
          </div>

          <!-- Judul Kajian -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="judul">
            </span>
            <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Pengajian"></input required>
          </div>

          <!-- Hari Kajian -->
          <div class="input-group mb-3">
            <select name="hari" id="hari" class="form-select" aria-label="Default select example">
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
              <option value="Ahad">Ahad</option>
            </select>
          </div>

          <!-- Jam Kajian -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jam">
            </span>
            <input type="time" name="jam" class="form-control" id="jam" required>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" name="kajian-rutin" class="btn btn-primary" value="tambah">Tambah</button>
          </div>

        </form>
      </div>

      <div class="shadow col p-3 ml-3">
        <p class="fs-5">Data Kajian Rutin</p>
        <hr>
        <table id="tabel" class="table table-sm table-hover table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pemateri</th>
              <th>Tema Kajian</th>
              <th>Hari</th>
              <th>Waktu</th>
              <th style="display:none;">Judul</th>
              <th style="display:none;"></th>
              <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php 
              $ref = 'users/'.$_SESSION['username'].'/agenda/kajian_rutin';
              $fetch_data = $database->getReference($ref)->getValue();
              
              //cek ketika detail user sudah di inputkan
              if($fetch_data > 0):
                $i = 1;
                foreach($fetch_data as $key => $row):
            ?>
              <tr>
                <!-- <td class="text-center">1</td>
                <td class="pl-3">Afip</td>
                <td class="pl-3">Akidah Islam</td>
                <td class="pl-3">Rabu</td>
                <td class="pl-3">02:00 pm</td>
                <td style="display:none;">Ini Judul</td>
                <td style="display:none;">ini token</td> -->
                <td class="text-center"><?= $i++ ?></td>
                <td class="pl-3"><?= $row['nama']?></td>
                <td class="pl-3"><?= $row['tema']?></td>
                <td class="pl-3"><?= $row['hari']?></td>
                <td class="pl-3"><?= $row['jam']?></td>
                <td style="display:none;"><?= $row['judul']?></td>
                <td style="display:none;"><?= $key?></td>
                <td class="pl-3">
                  <button class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle"></i></button>
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                  <form name="myForm<?= $key?>" action="func_kajian_rutin.php" method="POST" style="display: inline;">
                    <input type="hidden" name="token" value="<?= $key?>">
                    <input type="hidden"  name="delete-kajian-rutin">
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
            <form action="func_kajian_rutin.php" method="POST">
              <div class="modal-body">
              
                <!-- Nama Pemateri -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="nama">
                  </span>
                  <input type="text" name="nama" class="form-control" id="edit-nama" placeholder="Nama Pemateri"></input required>
                </div>

                <!-- Tema Kajian -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="tema">
                  </span>
                  <input type="text" name="tema" class="form-control" id="edit-tema" placeholder="Tema Kajian"></input required>
                </div>

                <!-- Judul Kajian -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="judul">
                  </span>
                  <input type="text" name="judul" class="form-control" id="edit-judul" placeholder="Judul Pengajian"></input required>
                </div>

                <!-- Hari Kajian -->
                <div class="input-group mb-3">
                  <select name="hari" id="edit-hari" class="form-select" aria-label="Default select example">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Ahad">Ahad</option>
                  </select>
                </div>

                <!-- Jam Kajian -->
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <img src="<?= base_url('assets/img/icon/user.png')?>" width="20" alt="jam">
                  </span>
                  <input type="time" name="jam" class="form-control" id="edit-jam" value="13:00" required>
                </div>
                
                <!-- token -->
                <div class="input-group visually-hidden">
                  <input type="hidden" name="token" class="form-control" id="token" value="">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="kajian-rutin" class="btn btn-primary" value="edit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>