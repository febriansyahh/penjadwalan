$(document).ready(function () {
    $('#example').DataTable();
});


$("#adm_plp").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "15%" }, // Petugas
      { width: "15%" }, // Penugasan
      { width: "15%" }, // Jadwal
      { width: "10%" }, // Tanggal 
      { width: "25%" }, // Laporan
      { width: "10%" }, // Dikirim
      { width: "15%" }, // Opsi
    ],
  });
  

function myProfile(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      console.log(data);
      $("#dataID").val(exp[0]);
      $("#dataUsername").val(exp[1]);
      $("#dataNama").val(exp[2]);
      $("#dataIdUser").val(exp[3]);
}


function checkFileExist(urlToFile) {
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', urlToFile, false);
    xhr.send();
     
    if (xhr.status == "404") {
        return false;
    } else {
        return true;
    }
}
    
function editableRute(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editId").val(exp[0]);
  $("#editRutenama").val(exp[1]);
  $("#editTitikAwal").val(exp[2]);
  $("#editTitikAkhir").val(exp[3]);
  $("#editJarak").val(exp[4]);
  $("#editLokasi").val(exp[5]);
  $("#editKet").val(exp[6]);
}

function editableWilayah(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editIdWilayah").val(exp[0]);
  $("#editNama").val(exp[1]);
  $("#editArea").val(exp[2]);
  $("#editAlamat").val(exp[3]);
  $("#editKeterangan").val(exp[4]);
}

// function editableJadwal(param) {
//     let data = $(param).data("id");
//     let exp = data.split("~");
//     console.log(data);
    
//   $("#editIdJadwal").val(exp[0]);
//   $("#editIdRute").val(exp[1]);
//   $("#editIdkelompok").val(exp[2]);
// //   $("#editIdwilayah").val(exp[3]);
//   $("#editNamaJadwal").val(exp[3]);
//   $("#editTanggal").val(exp[4]);
//   $("#editidRute").val(exp[5]);
//   $("#editCatatan").val(exp[6]);
// }

function editableJadwal(param) {
    let data = $(param).data("id");
    let exp = data.split("~");
    console.log(data);
    console.log(exp);
    
  $("#editIdJadwal").val(exp[0]);
  $("#editIdRute").val(exp[1]);
  $("#editIdkelompok").val(exp[2]);
  $("#editNamaJadwal").val(exp[3]);
  $("#editTanggal").val(exp[4]);
  $("#editidRute").val(exp[5]);
  $("#editCatatan").val(exp[6]);
}

function editableKelompok(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      console.log(data);
      $("#editId").val(exp[0]);
      $("#editIdWil").val(exp[1]);
      $("#editNamakel").val(exp[2]);
      $("#editJumlah").val(exp[3]);
    }

function detPetugas(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      if (exp[3] == '0') {
        let gender = 'Perempuan'
      } else {
        let gender = 'Pria'
      }
      
      console.log(data);
        $("#detIdPetugas").val(exp[0]);
        $("#detKode").val(exp[1]);
        $("#detNama").val(exp[2]);
        if (exp[3] == '0') {
            $("#detIsgender").val('Wanita');
        } else {
            $("#detIsgender").val('Pria');
        }
        $("#detAlamat").val(exp[4]);
        $("#detNohp").val(exp[5]);
        $("#detBagian").val(exp[6]);
        $("#detNmkel").val(exp[7]);
    // $("#detStatus").val(exp[8]);
      if (exp[8] == '1') {
            $("#detStatus").val('Aktif');
    } else {
        $("#detStatus").val('Non Aktif');
        }
    }

function editablePetugas(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      console.log(data);
      $("#editIdPetugas").val(exp[0]);
      $("#editKode").val(exp[1]);
      $("#editNama").val(exp[2]);
      $("#editIsgender").val(exp[3]);
      $("#editAlamat").val(exp[4]);
      $("#editNohp").val(exp[5]);
      $("#editBagian").val(exp[6]);
      $("#editIdkel").val(exp[7]);
      $("#editStatus").val(exp[8]);
    }

function editableTugas(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      console.log(data);
      $("#editIdTugas").val(exp[0]);
      $("#editPetugas").val(exp[1]);
      $("#editWilayah").val(exp[2]);
      $("#editJadwal").val(exp[3]);
      $("#editCatatan").val(exp[4]);
      $("#editKet").val(exp[5]);
    }

function editablePelaporan(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      console.log(data);
      $("#editIdPelaporan").val(exp[0]);
      $("#editTugas").val(exp[1]);
      $("#editPetugas").val(exp[2]);
      $("#editCatatan").val(exp[3]);
      $("#editFile").val(exp[4]);
      $("#editSubmit").val(exp[5]);
    }

function editableUser(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      console.log(data);
      $("#editIdUser").val(exp[0]);
      $("#editNama").val(exp[1]);
      $("#editUsername").val(exp[2]);
      $("#editPass").val(exp[3]);
      $("#editActiv").val(exp[4]);
      $("#editLevel").val(exp[5]);
      $("#editPetugas").val(exp[6]);
    }

function selesaikanTugas(param) {
      let data = $(param).data("id");
      let exp = data.split("~");
      console.log(data);
      console.log(exp[2]);
      $("#clearId").val(exp[0]);
      $("#clearIdPetugas").val(exp[1]);
      $("#cleartugas").val(exp[2]);
    }


function confirmPelaporan(param) {
    let data = $(param).data("id");
    let exp = data.split("~");
    let type = exp[4].split(".");
    
    var base_url = window.location.origin;
  let url = base_url + '/penjadwalan/';
  console.log(url);


      $("#cnfrmId").val(exp[0]);
      $("#cnfrmIdTugas").val(exp[1]);
      $("#cnfrmIdPetugas").val(exp[2]);
      $("#cnfrmCatatan").val(exp[3]);
      $("#cnfrmFile").val(exp[4]);
      $("#cnfrmSubmit").val(exp[5]);
      $("#cnfrmNama").val(exp[6]);
      $("#cnfrmCttnTugas").val(exp[7]);
  
  let upload_path = 'http://localhost/penjadwalan/file_data/pelaporan/' + exp[4];
  var check = checkFileExist(upload_path);
  console.log('AAA');

  if (check == false) {
    $('#showFile').html(
			`<h5><center>Maaf file yang anda tuju tidak tersedia</center></h5>`
		);
  } else {
     if (type[1] != 'pdf') {
		$('#showFile').html(`<img id="blah" src="${'http://localhost/penjadwalan/file_data/pelaporan/' + exp[4]}" width="520px" height="350px" />`);
    } else {
      $('#showFile').html(`<iframe src="${'http://localhost/penjadwalan/file_data/pelaporan/' + exp[4]}" height="520px" width="100%"></iframe>`);
    }
  }
   
}


function detailPelaporan(param) {
    let data = $(param).data("id");
    let exp = data.split("~");
    let type = exp[4].split(".");
    
    var base_url = window.location.origin;
    
      console.log(data);
    console.log(exp[2]);
    console.log(base_url + '/penjadwalan');

    $("#detailId").val(exp[0]);
    $("#detailIdTugas").val(exp[1]);
    $("#detailIdPetugas").val(exp[2]);
    $("#detailCatatan").val(exp[3]);
    $("#detailFile").val(exp[4]);
    $("#detailSubmit").val(exp[5]);
    $("#detailNama").val(exp[6]);
    $("#detailCttnTugas").val(exp[7]);
  
    let upload_path = 'http://localhost/penjadwalan/file_data/pelaporan/' + exp[4];
    var check = checkFileExist(upload_path);
    console.log('AAA');

    if (check == false) {
      $('#detailFile').html(
        `<h5><center>Maaf file yang anda tuju tidak tersedia</center></h5>`
      );
    } else {
      if (type[1] != 'pdf') {
      $('#detailFile').html(`<img id="blah" src="${'http://localhost/penjadwalan/file_data/pelaporan/' + exp[4]}" width="520px" height="350px" />`);
    } else {
      $('#detailFile').html(`<iframe src="${'http://localhost/penjadwalan/file_data/pelaporan/' + exp[4]}" height="520px" width="100%"></iframe>`);
    }
    }
    
}

function getProvinsi() {
//     var settings = {
//   "url": "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
//     "method": "GET",
//   "datatype": "JSON",
//   "timeout": 0,
//   "headers": {
//     "Authorization": "Basic Og=="
//   },
// };

    $.ajax({
       url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            console.log(result);
            if (result.provinsi != null) {
                
                let provinsi = result.provinsi;

                $.each(provinsi, function (i, data) {
                    $('#provinsi').append(`
                    <option value='`+ data.id + `~`+ data.nama +`'>` + data.nama +`</option>
                    `)
                });

            } else {
                $('#provinsi').html(`<p class="text-center">Maaf pencarian film tidak ditemukan </p>`);
            }
        }
    });
}

$('#req-wilayah').on('click', function () {
    console.log('ini request wilayah');
    getProvinsi();
});

$('#provinsi').on('change', function () {

    $('#kabupaten').val('');

    let data = $(this).val();
    let exp = data.split("~");

     
    $.ajax({
       url: "https://dev.farizdotid.com/api/daerahindonesia/kota",
        type: 'GET',
        dataType: 'json',
        data: {
            'id_provinsi': exp[0]
        },
        success: function (result) {
            console.log(result);
            if (result.kota_kabupaten != null) {
                
                let kota = result.kota_kabupaten;

                console.log(kota);

                $.each(kota, function (i, data) {
                    $('#kabupaten').append(`
                    <option value='` + data.nama +`'>` + data.nama +`</option>
                    `)
                });

                $('#kabupaten').val('');

            } else {
                $('#kabupaten').html(`<p class="text-center">Maaf data kota tidak ditemukan </p>`);
            }
        }
    });
})