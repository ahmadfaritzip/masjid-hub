function register_validation(){
  $("#btn-submit").click(function(){
    var password = $("#password").val();
    var confirmPassword = $("#re-password").val();
    if (password != confirmPassword) {
      alert("Passwords do not match.");
      $("#repassword").addClass('is-invalid');
      return false;
    }
    return true;
  });
}

function number_format(number) {
  var number_string = number.toString();

  var sisa 	= number_string.length % 3;
  var format	= number_string.substr(0, sisa);
  var ribuan	= number_string.substr(sisa).match(/\d{3}/g);

  if (ribuan) {
    separator 	= sisa ? '.' : '';
    format 		+= separator + ribuan.join('.');
  }

  return format;
}


function basic_sweet_alert(status_icon, message){
  Swal.fire({
    icon: status_icon,
    title: message,
    showConfirmButton: false,
    timer: 1500
  })
}

function get24hTime(str){
  str = String(str).toLowerCase().replace(/\s/g, '');
  var has_am = str.indexOf('am') >= 0;
  var has_pm = str.indexOf('pm') >= 0;
  // first strip off the am/pm, leave it either hour or hour:minute
  str = str.replace('am', '').replace('pm', '');
  // if hour, convert to hour:00
  if (str.indexOf(':') < 0) str = str + ':00';
  // now it's hour:minute
  // we add am/pm back if striped out before 
  if (has_am) str += ' am';
  if (has_pm) str += ' pm';
  // now its either hour:minute, or hour:minute am/pm
  // put it in a date object, it will convert to 24 hours format for us 
  var d = new Date("1/1/2011 " + str);
  // make hours and minutes double digits
  var doubleDigits = function(n){
      return (parseInt(n) < 10) ? "0" + n : String(n);
  };
  return doubleDigits(d.getHours()) + ':' + doubleDigits(d.getMinutes());
}

function btn_update_profile(){
  $("#btn-update-profil").click(function(event){
    event.preventDefault();
    $(this).after('<button class="btn btn-primary" id="btn-simpan-profil" type="submit" name="update_profil">Simpan</button>')
    $('#nama-masjid').prop("disabled", false).addClass('bg-white');
    $('#email').prop("disabled", false).addClass('bg-white');
    $('#no-hp').prop("disabled", false).addClass('bg-white');
    $('#alamat').prop("disabled", false).addClass('bg-white');
    $('#foto').prop("disabled", false).addClass('bg-white');
    $('#deksripsi-masjid').prop("disabled", false).addClass('bg-white');
  });
}

function modal_data_barang(){
  console.log('ampas')
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      $('form').find("#edit-nama-barang").val(data[1]);
      $('form').find("#edit-kategori-barang").val(data[2]);
      $('form').find("#edit-jumlah-barang").val(data[3].split(' ')[0]);
      $('form').find("#edit-satuan").val(data[3].split(' ')[1]);
      $('form').find("#edit-kondisi-barang").val(data[4]);
      $('form').find("#edit-keterangan").val(data[5]);
      $('form').find("#token").val(data[6]);
      // $('form').find("input[name='ruang[]'][type='checkbox']").each(function(index){
      //     $(this).prop('checked', false)
      //     for(var i = 0; i < ruanganHaram.length; i++){
      //         if($(this)[0].value == $.trim(ruanganHaram[i])){
      //             $(this).prop('checked',true)
      //         }
      //     }
      // });
  });
}

function bulan_to_no($no_bulan){
	$bulan = {
		'Januari' : '01',
		'Februari' : '02',
		'Maret' : '03',
		'April' : '04',
		'Mei' : '05',
		'Juni' : '06',
		'Juli' : '07',
		'Agustus' : '08',
		'September' : '09',
		'Oktober' : '10',
		'November' : '11',
		'Desember' : '12'
  }
	return $bulan[$no_bulan];
}

function modal_data_donasi(){
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      // for radio
      donasi_tetap = $("#edit-donasi-tetap")
      donasi_tidak_tetap = $("#edit-donasi-tidak-tetap")
      if(donasi_tetap.val() == data[2]){
        donasi_tetap.prop('checked', true)  
      }else{
        donasi_tidak_tetap.prop('checked', true)  
      }

      //for nama donatur
      $("#edit-nama").val(data[1]);

      //for jumlah donasi
      $("#edit-jumlah").val(data[3].split(' ')[1].replace(/\./g,''));

      //for tanggal
      tanggal = data[4].split(' ')[3]+'-'+bulan_to_no(data[4].split(' ')[2])+'-'+data[4].split(' ')[1]
      $("#edit-tanggal").val(tanggal);

      //for token
      $("#token").val(data[5]);
  });
}

function modal_data_infaq(){
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      //for tanggal
      tanggal = data[1].split(' ')[3]+'-'+bulan_to_no(data[1].split(' ')[2])+'-'+data[1].split(' ')[1]
      $("#edit-tanggal").val(tanggal);
      
      //for jumlah infaq
      $("#edit-jumlah").val(data[2].split(' ')[1].replace(/\./g,''));

      //for keterangan
      $("#edit-keterangan").val(data[3]);

      //for token
      $("#token").val(data[4]);
  });
}

function modal_data_pembelian(){
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      // Nama Barang
      $("#edit-nama").val(data[1]);

      // tanggal
      temp = data[2]
      tanggal = temp.split(' ')[3]+'-'+bulan_to_no(temp.split(' ')[2])+'-'+temp.split(' ')[1]
      $("#edit-tanggal").val(tanggal);

      // jumlah infaq
      $("#edit-jumlah").val(data[3]);

      // harga satuan infaq
      $("#edit-harga-satuan").val(data[4].split(' ')[1]);

      // total harga pembelian
      $("#edit-total-harga").val(data[5].split(' ')[1]);

      // keterangan
      $("#edit-keterangan").val(data[6]);

      // token
      $("#token").val(data[7]);
  });
}

function modal_data_gaji(){
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      // Nama Barang
      $("#edit-nama").val(data[1]);
      
      // jumlah infaq
      $("#edit-jumlah").val(data[2].split(' ')[1]);

      // tanggal
      temp = data[3]
      tanggal = temp.split(' ')[3]+'-'+bulan_to_no(temp.split(' ')[2])+'-'+temp.split(' ')[1]
      $("#edit-tanggal").val(tanggal);
      
      // token
      $("#token").val(data[4]);
  });
}

function modal_data_kajian(){
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      // Nama Pemateri
      $("#edit-nama").val(data[1]);
      
      // Tema Pemateri
      $("#edit-tema").val(data[2]);
      
      // Judul Pemateri
      $("#edit-judul").val(data[5]);
      
      // Hari kajian
      $("#edit-jam").val(get24hTime(data[4]));

      // Hari kajian
      $("#edit-hari").val(data[3]);
      
      // token
      $("#token").val(data[6]);
  });
}

function modal_data_khotbah_jumat(){
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      // Nama Khotib
      $("#edit-nama-khotib").val(data[1]);
      
      // Nama Imam
      $("#edit-nama-imam").val(data[2]);
      
      // Tanggal
      temp = data[3]
      tanggal = temp.split(' ')[3]+'-'+bulan_to_no(temp.split(' ')[2])+'-'+temp.split(' ')[1]
      $("#edit-tanggal").val(tanggal);
      
      // token
      $("#token").val(data[4]);
  });
}

function modal_data_users(){
  var table= $('#tabel').DataTable();
  var tableBody = '#tabel tbody';
  $(tableBody).on('click', 'button', function () {
      var cursor = table.row($(this).parents('tr'));//get the clicked row
      var data = cursor.data();// this will give you the data in the current row.
      
      // Nama Khotib
      $("#edit-username").val(data[1]);
      
      // Nama Imam
      $("#edit-nama-masjid").val(data[2]);
      
      // Nama Imam
      $("#edit-email").val(data[3]);
      
      // Nama Imam
      $("#edit-no-hp").val(data[4]);
      
      // Nama Imam
      $("#edit-alamat").val(data[5]);
      
      // token
      $("#token").val(data[6]);
  });
}

function validateForm(token) {
  event.preventDefault(); // prevent form submit
  var form = document.forms["myForm"+token]; // storing the form
  Swal.fire({
    title: 'Hapus Data ?',
    text: "Apakah anda akan menghapus data ini!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit()
    }
  })
}