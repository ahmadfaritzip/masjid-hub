<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

 <!-- Sidebar Message -->
 <div class="sidebar-card mt-4">
    <img class="sidebar-card-illustration mb-2" src="<?= base_url('assets/img/icon/mosque.svg')?>" alt="">
  </div>

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <!-- <i class="fas fa-laugh-wink"></i> -->
      <img src="<?= base_url('assets/img/icon/mosque.svg') ?>" width="30" class="mr-1" alt="">
    </div>
    <div class="sidebar-brand-text mx-3">Masjid-HUB</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url('admin/index.php?page=home') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <?php if($_SESSION['user']['type'] == 'administrator' && $_SESSION['username'] == 'admin'): ?>
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/index.php?page=users')?>">
      <!-- <i class="fas fa-fw fa-chart-area"></i> -->
      <img src="<?= base_url('assets/img/icon/user-profil.png') ?>" width="20" class="mr-1" alt="">
      <span>Users</span>
    </a>
  </li>
  <?php endif; ?>
  
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/index.php?page=profil')?>">
      <!-- <i class="fas fa-fw fa-chart-area"></i> -->
      <img src="<?= base_url('assets/img/icon/user-profil.png') ?>" width="20" class="mr-1" alt="">
      <span>Profil</span>
    </a>
  </li>

  <!-- Nav Item - Pemasukan Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nav-pemasukan" aria-expanded="true"
      aria-controls="nav-pemasukan">
      <!-- <i class="fas fa-fw fa-cog"></i> -->
      <img src="<?= base_url('assets/img/icon/keuangan.png') ?>" width="20" class="mr-1" alt="">
      <span>Pemasukan</span>
    </a>
    <div id="nav-pemasukan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= base_url('admin?page=donasi')?>">Donasi</a>
        <a class="collapse-item" href="<?= base_url('admin?page=infaq')?>">Infaq</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pengeluaran Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nav-pengeluaran" aria-expanded="true"
      aria-controls="nav-pengeluaran">
      <!-- <i class="fas fa-fw fa-wrench"></i> -->
      <img src="<?= base_url('assets/img/icon/keuangan.png') ?>" width="20" class="mr-1" alt="">
      <span>Pengeluaran</span>
    </a>
    <div id="nav-pengeluaran" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= base_url('admin?page=pembelian')?>">Pembelian</a>
        <a class="collapse-item" href="<?= base_url('admin?page=gaji')?>">Gaji</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin?page=inventaris')?>">
      <!-- <i class="fas fa-fw fa-chart-area"></i> -->
      <img src="<?= base_url('assets/img/icon/inventaris.png') ?>" width="20" class="mr-1" alt="">
      <span>Inventaris</span>
    </a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nav-agenda" aria-expanded="true"
      aria-controls="nav-agenda">
      <!-- <i class="fas fa-fw fa-wrench"></i> -->
      <img src="<?= base_url('assets/img/icon/agenda.png') ?>" width="20" class="mr-1" alt="">
      <span>Agenda</span>
    </a>
    <div id="nav-agenda" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= base_url('admin?page=kajian_rutin')?>">Kajian Rutin</a>
        <a class="collapse-item" href="<?= base_url('admin?page=khotbah_jumat')?>">Khotbah Jumatan</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
  <?php require 'navbar.php'?>
  
