<?= set_page_title("Daftarkan Masjid");?>

<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">

            <div class="text-center mt-5">
              <h1 class="h4 text-gray-900 mb-4">Daftarkan Masjid!</h1>
            </div>

            <form class="user" action="func-register.php" method="POST">
              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Username" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                </div>
                <div class="col-sm-6">
                  <input type="password" name="re-password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password" required>
                </div>
              </div>
              <button type="submit" name="register-masjid" id="btn-submit" class="btn btn-primary btn-user btn-block">
                Daftarkan Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?= base_url('?page=forgot-password') ?>">Lupa Password?</a>
            </div>
            <div class="text-center mb-5">
              <a class="small" href="<?= base_url('?page=login') ?>">Sudah punya akun? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>