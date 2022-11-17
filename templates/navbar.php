<!-- Topbar -->
<nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">
  <div class="container-fluid">

    <a class="navbar-brand ml-4" href="<?= base_url('?page=home')?>">
      <img src="<?= base_url('assets/img/masjid-default.png')?>" alt="" width="30" height="24" class="d-inline-block align-top">
      Masjid-HUB
    </a>

  <!-- Topbar Search -->
  <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search"
        aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mb-2 mb-lg-0 no-arrow">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('?page=masjid');?>">Masjid</a>
          </li>
        </ul>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('?page=login')?>">Masuk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('?page=register')?>">Daftar</a>
          </li>
      </ul>

    </ul>
  </div>

</nav>
<!-- End of Topbar -->