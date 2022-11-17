<?php

  // include file konfigurasi
  require 'templates/include.php';
    
  /**
   * Routing halaman
   */
  $page = 'home.php';
  if (isset($_GET['page'])) {
    $page = escape_string($_GET['page']) . '.php';
    if (!file_exists($page)) {
      $page = '404.php';
    }
  }

  if($page !== '404.php'){

    // include header
    require 'templates/header.php';
    
    // include navbar
    require 'templates/sidebar.php';

    require $page;

    // include footer
    require 'templates/footer.php';

  }else{
    require $page;
  }