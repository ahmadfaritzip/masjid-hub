
  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © 2021 - Masjid Hub</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->
  
  </div>
  <!-- End of Page Wrapper -->
    
  <!-- footer -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
   
  <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda mau keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Silahkan tekan "Keluar" di bawah ini jika Anda mau keluar dari website ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('admin?page=logout')?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('config/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('config/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('config/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('config/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?= base_url('config/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->

  <!-- my javascript -->
  <script src="<?= base_url('assets/js/my-js.js') ?>"></script>

</body>

</html>

<script>
  
  $(document).ready(function(){
    $('#table').DataTable();
    
    if(document.title == 'Profil Masjid | Masjid-HUB'){
      btn_update_profile();
      // $('#foto').submit();
    }else if(document.title == 'Inventaris Masjid | Masjid-HUB'){
      modal_data_barang()
    }else if(document.title == 'Donasi | Masjid-HUB'){
      $('.uang').each(function(i, obj) {
        uang = $(this).text();
        $(this).text('Rp '+number_format(uang))
      });
      modal_data_donasi();
      // console.log(number_format($('.uang').text().split(' ')[1]));
    }else if(document.title == 'Infaq | Masjid-HUB'){
      $('.uang').each(function(i, obj) {
        uang = $(this).text();
        $(this).text('Rp '+number_format(uang))
      });
      modal_data_infaq();
    }else if(document.title == 'Pembelian | Masjid-HUB'){
      modal_data_pembelian();
    }else if(document.title == 'Gaji | Masjid-HUB'){
      modal_data_gaji();
    }else if(document.title == 'Kajian Rutin | Masjid-HUB'){
      modal_data_kajian();
    }else if(document.title == 'Kajian | Masjid-HUB'){
      modal_data_kajian();
    }else if(document.title == 'Khotbah Jumat | Masjid-HUB'){
      modal_data_khotbah_jumat();
    }else if(document.title == 'Users | Masjid-HUB'){
      modal_data_users();
    }else if(document.title == 'Admin | Masjid-HUB'){
      // create_line_chart([0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 0, 0, 0, 0])
      // console.log([0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000])
    }

  <?php if(isset($_SESSION['status']) && $_SESSION['status'] != ''): ?>
    basic_sweet_alert("<?= $_SESSION['status-icon']; ?>", "<?= $_SESSION['status']; ?>");
    <?php unset($_SESSION['status']); ?>    
  <?php endif; ?>
  
  }); 
</script>