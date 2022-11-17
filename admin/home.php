<?= set_page_title('Admin');?>
<?php
  $total_pemasukan = get_total_donasi($_SESSION['username']);
  $total_pemasukan += get_total_infaq($_SESSION['username']);
  $total_pengeluaran = get_total_pembelian($_SESSION['username']);
  $total_pengeluaran += get_total_gaji($_SESSION['username']);
  $total_agenda = get_total_agenda($_SESSION['username']);
  $total_inventaris = get_total_inventaris($_SESSION['username']);
?>

<!-- Page level plugins -->
<script src="<?= base_url('config/vendor/chart.js/Chart.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row mb-3">
    <div class="col">

      <div class="card border-left-primary shadow">
        <div class="card-body">
          <div class="row">
            
            <div class="col-10 ">
              <!-- <img src="<?= base_url('assets/img/icon/keuangan.png') ?>" width="37" class="mr-3" alt=""> -->
              <span class="h4">Dashboard</span>
            </div>
            
            <div class="col">
              <!-- Button trigger modal -->
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#report">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <a href="<?= base_url('admin/export-pdf.php?report=home') ?>" class=" mb-3 btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-download fa-sm text-white-50"></i> Full report (pdf)
                    </a>
                    <a href="<?= base_url('admin/export-pdf.php?report=donasi') ?>" class=" mb-3 btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-download fa-sm text-white-50"></i> Donasi (pdf)
                    </a>
                    <a href="<?= base_url('admin/export-pdf.php?report=infaq') ?>" class=" mb-3 btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-download fa-sm text-white-50"></i> Infaq (pdf)
                    </a>
                    <a href="<?= base_url('admin/export-pdf.php?report=pembelian') ?>" class=" mb-3 btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-download fa-sm text-white-50"></i> pembelian (pdf)
                    </a>
                    <a href="<?= base_url('admin/export-pdf.php?report=gaji') ?>" class=" mb-3 btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-download fa-sm text-white-50"></i> gaji (pdf)
                    </a>
                    <a href="<?= base_url('admin/export-pdf.php?report=inventaris') ?>" class=" mb-3 btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-download fa-sm text-white-50"></i> inventaris (pdf)
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Pemasukan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($total_pemasukan) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pengeluaran</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($total_pengeluaran) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Agenda
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_agenda ?></div>
                </div>
                <!-- <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Infentaris
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_inventaris ?></div>
                </div>
                <!-- <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Dana Pemasukan</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
              aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="myAreaChart" style="display: block; width: 535px; height: 320px;" width="535" height="320" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
      </div>
    </div>

  </div>

</div>
<!-- /.container-fluid -->
<script>
  <?php
    // Hitung pemasukan grafik
    $keys = get_data_key('users/'.$_SESSION['username'].'/pemasukan');
    $total_pemasukan = 0;
    $jan = 0; $feb = 0; $mar = 0; $apr = 0; $mei = 0; $jun = 0;
    $jul = 0; $agu = 0; $sep = 0; $okt = 0; $nov = 0; $des = 0; 
    if($keys > 0){
      foreach($keys as $key){
        $fetch_data = get_data('users/'.$_SESSION['username'].'/pemasukan/'.$key);
        foreach($fetch_data as $key => $row){
          if(explode(' ',$row['tanggal'])[2] == 'Januari'){
            $jan += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Februari'){
            $feb += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Maret'){
            $mar += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'April'){
            $apr += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Mei'){
            $mei += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Juni'){
            $jun += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Juli'){
            $jul += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Agustus'){
            $agu += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'September'){
            $sep += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Oktober'){
            $okt += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'November'){
            $nov += $row['jumlah'];
          }elseif(explode(' ',$row['tanggal'])[2] == 'Desember'){
            $des += $row['jumlah'];
          }
        }//endforeach
      }// endforeach
    }
  ?>

  create_line_chart([<?= $jan ?>, <?= $feb ?>, <?= $mar ?>, <?= $apr ?>, <?= $mei ?>, <?= $jun ?>, <?= $jul ?>, <?= $agu ?>, <?= $sep ?>, <?= $okt ?>, <?= $nov ?>, <?= $des ?>])
</script>
