<?php
/**
 * Koneksi basis data
 */

$conn = mysqli_connect($config['db']['server'], $config['db']['username'], $config['db']['password'], $config['db']['database']);

if (mysqli_connect_errno()) {
    die('Gagal koneksi ke basis data: ' . mysqli_connect_error());
}
