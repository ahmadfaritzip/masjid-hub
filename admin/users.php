<?= set_page_title("Users");?>
<main class="main">
  <div class="container-fliud p-4">
    <div class="row mb-2">
      <div class="col">
        <div class="card mb-4 border-left-primary shadow">
          <div class="card-body">
              <img src="<?= base_url('assets/img/icon/keuangan.png') ?>" width="37" class="mr-3" alt="">
              <span class="h5">Users</span>
          </div>
      </div>
        <!-- <i class="fas fa-calendar fa-2x mr-2"></i> -->
      </div>
    </div>

    <div class="row mx-1">
  
      <div class="shadow col-3 p-3">      
        <p class="fs-5">Tambah Users</p>
        <hr>
        <form class="user" action="../func-register.php" method="POST">
            
          <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Username" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col mb-3 mb-sm-0">
                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col">
                <input type="password" name="re-password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password" required>
              </div>
            </div>
            
            <button type="submit" name="register-masjid" id="btn-submit" class="btn btn-primary btn-user btn-block">
              Daftarkan Account
            </button>
        </form>
      </div>

      <div class="shadow col p-3 ml-3">
        <p class="fs-5">Data Donasi</p>
        <hr>
        <table id="tabel" class="table table-sm table-hover table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Usename</th>
              <th>Nama Masjid</th>
              <th style="display:none;">Email</th>
              <th style="display:none;">No Hp</th>
              <th style="display:none;">Alamat</th>
              <th style="display:none;"></th>
              <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php 
              $ref = 'users/';
              $fetch_data = $database->getReference($ref)->getValue();
              //cek ketika detail user sudah di inputkan
              if($fetch_data > 0):
                $i = 1;
                foreach($fetch_data as $key => $row):
                  $user = $database->getReference('users/'.$key.'/detail')->getValue();
                  foreach($user as $user_key => $user_row):
            ?>
              <tr>
                <td class="text-center"><?= $i++ ?></td>
                <td class="pl-3"><?= $key ?></td>
                <td class="pl-3"><?= $user_row['nama_masjid'] ?></td>
                <td style="display:none;"><?= $user_row['email'] ?></td>
                <td style="display:none;"><?= $user_row['no_hp'] ?></td>
                <td style="display:none;"><?= $user_row['alamat'] ?></td>
                <td style="display:none;"><?= $user_key ?></td>
                <td class="pl-3">
                  <button class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle"></i></button>
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                  <form name="myForm<?= $key?>" action="func_users.php" method="POST" style="display: inline;">
                    <input type="hidden" name="token" value="<?= $key?>">
                    <input type="hidden"  name="delete-users">
                    <button class="btn btn-outline-danger" onclick="validateForm('<?= $key?>')" id="btn-delete" type='submit'><i class="fa fa-trash"></i></button>
                  </td>
                </form>
            </tr>
                <?php endforeach; ?>
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
            <form action="func_users.php" method="POST">
              <div class="modal-body">

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" name="username" class="form-control form-control-user" id="edit-username" placeholder="Username" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col mb-3 mb-sm-0">
                    <input type="text" name="nama-masjid" class="form-control form-control-user" id="edit-nama-masjid" placeholder="Nama Masjid">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col">
                    <input type="text" name="email" class="form-control form-control-user" id="edit-email" placeholder="Email">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col">
                    <input type="number" name="no-hp" class="form-control form-control-user" id="edit-no-hp" placeholder="No Hp">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col">
                    <input type="text" name="alamat" class="form-control form-control-user" id="edit-alamat" placeholder="Alamat">
                  </div>
                </div>
                
                <!-- token -->
                <div class="input-group visually-hidden">
                  <input type="hidden" name="token" class="form-control" id="token" value="">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="users" class="btn btn-primary" value="edit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>