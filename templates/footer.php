    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('config/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('config/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('config/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- my javascript -->
    <script src="<?= base_url('assets/js/my-js.js') ?>"></script>

    <!-- Footer -->                                                                                                                                    
    <footer class="footer-dark bg-dark pt-3 px-3">
      <div class="row pl-4 text-white">

        <div class="col-4">

          <div class="row">
            <div class="col">
              Contact us : <br> 082279072279 / masjidhub@gmail.com
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              Address : <br> Jl.Kubangsari IV Coblong
            </div>
          </div>

        </div>

        <div class="col offset-5">
          Follow us : <br>
          <a href="https://www.facebook.com/bootsnipp"><i class="fab fa-facebook-square fa-3x social"></i></a>
          <a href="https://twitter.com/bootsnipp"><i class="fab fa-twitter-square fa-3x social"></i></a>
          <a href="https://plus.google.com/+Bootsnipp-page"><i class="fab fa-google-plus-square fa-3x social"></i></a>
          <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
        </div>
        
      </div>
      
      <div class="row bg-dark">
        <div class="col">
          <div class="text-center text-white py-3">
            Copyright © 2021 - Masjid Hub
          </div>
        </div>
      </div>

    </footer> 
    
  </body>

</html>

<script>
  $(document).ready(function(){

    if(document.title == 'Daftarkan Masjid | Masjid-HUB'){
        register_validation();
    }

  <?php if(isset($_SESSION['status']) && $_SESSION['status'] != ''): ?>
    basic_sweet_alert("<?= $_SESSION['status-icon']; ?>", "<?= $_SESSION['status']; ?>");
    <?php unset($_SESSION['status']); ?>    
  <?php endif; ?>
  
  }); 
</script>