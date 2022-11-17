<?php

/**
 * Fungsi-fungsi umum
 */
function base_url($uri = NULL){
    global $config;
    if (substr($uri, 0, 1) == '/') {
        $uri = ltrim($uri, $uri[0]);
    }
    return $config['app']['base_url'] . $uri;
}

function redirect($uri){
    header('location: ' . base_url($uri));
}

function set_page_title($title, $separator = '|'){
    global $config;
    if (isset($config['app']['name'])){
        $title = $title . ' ' . $separator . ' ' . $config['app']['name'];
    }
    $page_title  = '<script type="text/javascript">';
    $page_title .= 'document.title = "' . $title . '"';
    $page_title .= '</script>';

    return $page_title;
}

function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

function get_data($ref){
	global $database ;
	$fetch_data = $database->getReference($ref)->getValue();
	if(!($fetch_data > 0)){
		return false;
	}
	return $fetch_data;
}

function push_data($ref, $data){
	global $database ;
	$database->getReference($ref)->push($data);
}

function remove_data($ref){
	global $database ;
	$database->getReference($ref)->remove();
}

function update_data($ref, $data){
	global $database ;
	return $database->getReference($ref)->update($data);
}

function get_data_key($ref){
	global $database ;
	$fetch_data = $database->getReference($ref)->getValue();
	if(!($fetch_data > 0)){
		return false;
	}

	$keys = array();
	foreach($fetch_data as $key => $val){
		array_push($keys, $key);
	}
	return $keys;
}

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

// Hitung donasi
function get_total_donasi($username){
	$fetch_data = get_data('users/'.$username.'/pemasukan/donasi');
	$total_donasi = 0;
	if($fetch_data > 0){
		foreach($fetch_data as $key => $row){
			$total_donasi += $fetch_data[$key]['jumlah'];
		}// endforeach
	}
	return $total_donasi;
}

// Hitung infaq
function get_total_infaq($username){
	$fetch_data = get_data('users/'.$username.'/pemasukan/infaq');
	$total_infaq = 0;
	if($fetch_data > 0){
		foreach($fetch_data as $key => $row){
			$total_infaq += $fetch_data[$key]['jumlah'];
		}// endforeach
	}
	return $total_infaq;
}


//hitung total gaji
function get_total_gaji($username){
	$fetch_data = get_data('users/'.$username.'/pengeluaran/gaji');
	$total_gaji = 0;
	if($fetch_data > 0){
		foreach($fetch_data as $key => $row){
			$total_gaji += $fetch_data[$key]['jumlah'];
		}// endforeach
	}
	return $total_gaji;
}

//Pembelian
function get_total_pembelian($username){
	$fetch_data = get_data('users/'.$username.'/pengeluaran/pembelian');
	$total_pembelian = 0;
	if($fetch_data > 0){
	  foreach($fetch_data as $key => $row){
	    $total_pembelian += $fetch_data[$key]['total_harga'];
	  }// endforeach
	}
	return $total_pembelian;
}


//Total Agenda
function get_total_agenda($username){
	$keys = get_data_key('users/'.$username.'/agenda');
	$total_agenda = 0;
	if($keys > 0){
	  foreach($keys as $key){
	    $total_agenda += count(get_data_key('users/'.$username.'/agenda/'.$key));
	  }// endforeach
	}
	return $total_agenda;
}

//Total Barang Inventaris
function get_total_inventaris($username){
	$fetch_data = get_data_key('users/'.$username.'/inventaris');
	$total_inventaris = 0;
	if($fetch_data > 0){
		$total_inventaris = count($fetch_data);
	}
	return $total_inventaris;
}

