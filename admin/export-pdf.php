<?php

  // include file konfigurasi
  require 'templates/include.php';

  class Index{
    public function get_data_donasi($title, $name_table, $head, $ref){
      global $database; // Instance Class Database
      $pdf = new FPDF();
      if($_GET['report'] === 'pembelian' || $_GET['report'] === 'inventaris'){
        $pdf->AddPage('L');
      }else{
        $pdf->AddPage();
      }
      $pdf->SetFont('Arial', 'B', 15); // mengatur font
      $pdf->Cell(0, 10, $title, 0, 1 , 'C');
      $pdf->Ln(); // Berpindah baris
      
      $pdf->SetFont('Arial', 'B', 11); // mengatur font
      $pdf->Cell(0,3, $name_table, 0, 1);
      $pdf->Ln(); // Berpindah baris
      
      $heading = $head;
      
      if(get_data($ref)){
        $header = array_values(get_data($ref))[0];
        
        $pdf->SetFont('Arial', '', 11); // mengatur font
        foreach ($header as $key => $row)
          $pdf->Cell(47, 10, $heading[$key], 1);

        $rsl  = get_data($ref);

        foreach ($rsl as $row) {
          $pdf->Ln();
          foreach ($row as $column){
            $x = $pdf->GetX();
            if(is_numeric($column) && $column > 200)
              $pdf->myCell(47, 10,$x,rupiah($column), 25);
              else
              $pdf->myCell(47, 10,$x,$column, 25);
              // $pdf->myCell(47, 10, $column, 1);
          }
        }
      }else{
        $pdf->Cell(0, 10, 'Data tidak ditemukan', 1, 1, 'C');
      }
      $pdf->Output();
    }

    public function get_data_dashboard(){
      global $database; // Instance Class Database
          
      $total_donasi = get_total_donasi($_SESSION['username']);
      $total_infaq = get_total_infaq($_SESSION['username']);
      $total_pembelian = get_total_pembelian($_SESSION['username']);
      $total_gaji = get_total_gaji($_SESSION['username']);
      $total_agenda = '3';
      $total_inventaris = '5';

      $pdf = new FPDF();
      $pdf->AddPage();
      $pdf->SetFont('Arial', 'B', 15); // mengatur font
      $pdf->Cell(0, 3, 'Pemasukan', 0, 1);
      $pdf->Ln(); // Berpindah baris
      
      $pdf->SetFont('Arial', 'B', 11); // mengatur font
      $pdf->Cell(130,7, 'Donasi', 0, 0);
      $pdf->Cell(0,7, rupiah($total_donasi), 0, 1);
    
      $pdf->Cell(130,7, 'Infaq', 0, 0);
      $pdf->Cell(0,7, rupiah($total_infaq), 0, 1);
      
      $pdf->Line(140, 32, 210-10, 32); // 20mm from each edge
      
      $pdf->Cell(130,13, 'Total : ', 0, 0);
      $pdf->Cell(0,13, rupiah($total_infaq + $total_donasi), 0, 1);
      $pdf->Ln(); // Berpindah baris

      $pdf->Line(10, 47, 210-10, 47); // 20mm from each edge
      
      $pdf->SetFont('Arial', 'B', 15); // mengatur font
      $pdf->Cell(0, 3, 'Pengeluaran', 0, 1);
      $pdf->Ln(); // Berpindah baris
      
      $pdf->SetFont('Arial', 'B', 11); // mengatur font
      $pdf->Cell(130,7, 'Pembelian', 0, 0);
      $pdf->Cell(0,7, rupiah($total_pembelian), 0, 1);
    
      $pdf->Cell(130,7, 'Gaji', 0, 0);
      $pdf->Cell(0,7, rupiah($total_gaji), 0, 1);
      
      $pdf->Line(140, 78, 210-10, 78); // 20mm from each edge

      $pdf->Cell(130,13, 'Total : ', 0, 0);
      $pdf->Cell(0,13, rupiah($total_pembelian + $total_gaji), 0, 1);

      $pdf->Output();
    }
    
  }
  
  if(isset($_SESSION['username'])){

    $index = new Index();

      if(isset($_GET) && $_GET['report'] === 'home'){
        
        $index->get_data_dashboard();

      }elseif(isset($_GET) && $_GET['report'] === 'donasi'){
        
        $header = array(
          'nama' => 'Nama',
          'jumlah' => 'Jumlah Donasi',
          'tanggal' => 'Tanggal',
          'jenis_donasi' => 'Jenis Donasi'
        );
        $index->get_data_donasi('Dana Pemasukan', 'Donasi', $header, 'users/'.$_SESSION['username'].'/pemasukan/donasi');        

      }elseif(isset($_GET) && $_GET['report'] === 'infaq'){

        $header = array(
          'jumlah' => 'Jumlah Infaq',
          'tanggal' => 'Tanggal',
          'keterangan' => 'Keterangan',
        );
        $index->get_data_donasi('Dana Pemasukan', 'Infaq', $header, 'users/'.$_SESSION['username'].'/pemasukan/infaq');        

      }elseif(isset($_GET) && $_GET['report'] === 'pembelian'){
        $header = array(
          'harga_satuan' => 'Harga Satuan',
          'jumlah_barang' => 'Jumlah Barang',
          'keterangan' => 'Keterangan',
          'nama_barang' => 'Nama Barang',
          'tanggal' => 'Tanggal',
          'total_harga' => 'Total Harga',
        );
        $index->get_data_donasi('Dana Pengeluaran', 'Pembelian Barang', $header, 'users/'.$_SESSION['username'].'/pengeluaran/pembelian');
      }elseif(isset($_GET) && $_GET['report'] === 'gaji'){
        $header = array(
          'jumlah' => 'Jumlah',
          'nama' => 'Nama Anggota',
          'tanggal' => 'Tanggal',
        );
        $index->get_data_donasi('Dana Pengeluaran', 'Gaji Pengurus Masjid', $header, 'users/'.$_SESSION['username'].'/pengeluaran/gaji');
      }elseif(isset($_GET) && $_GET['report'] === 'inventaris'){
        $header = array(
          'jumlah' => 'Jumlah',
          'kategori' => 'Kategori',
          'keterangan' => 'Keterangan',
          'kondisi' => 'Kondisi Barang',
          'satuan' => 'Satuan',
          'nama' => 'Nama Barang',
        );
        $index->get_data_donasi('Barang Inventaris', 'Inventaris', $header, 'users/'.$_SESSION['username'].'/inventaris');
      }else{
        redirect('admin?page=home');
      }
    
  }else{
    redirect('admin?page=home');
  }

?>