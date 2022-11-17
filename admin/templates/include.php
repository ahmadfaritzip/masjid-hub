<?php
  // Memulai session
  session_start();
  ob_start();

  /**
   * Menyertakan semua file konfigurasi
   */
  require '../config/config.php';
  require '../config/database.php';

  /**
   * Menyertakan semua file pustaka
   */
  require '../libs/fpdf182/fpdf.php';
  require '../libs/helper.php';
  require '../libs/security.php';
?>