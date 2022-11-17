<?= set_page_title("Lupa Password");?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-2">Lupa Password?</h1>
                  <p class="mb-4">Silahkan masukkan username anda dibawah dan kami akan mengirimkan link untuk reset password ke alamat email yang sudah tercantum di detail masjid!</p>
                </div>
                <form class="user">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                      aria-describedby="emailHelp" placeholder="Masukkan username...">
                  </div>
                  <a href="login.html" class="btn btn-primary btn-user btn-block">
                    Reset Password
                  </a>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('?page=register')?>">Daftar Masjid!</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('?page=login')?>">Sudah punya akun? Masuk!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>