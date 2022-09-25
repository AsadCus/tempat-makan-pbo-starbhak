// Selec2
// $('.selectPemesanan').select2({
//     width: '100%',
//     height: '10px',
//     dropdownParent: $("#modalPemesanan"),
//     theme: "bootstrap"
// });

// console.log($('.selectpemesanan'));
// $(document).ready(function() {
//     $('.selectPemesanan').select2({
//         width: '100%',
//         height: '10px',
//         dropdownParent: $("#modalPemesanan"),
//         theme: "bootstrap"
//     });
// });

// Edit
const tombolEdit = document.querySelectorAll('.tombol-edit');
const formEdit = document.querySelector('.form-edit');
const selected = document.querySelector('.selected');

// Edit Menu
const menuName = document.querySelectorAll('.menu-name');
const inputMenuName = document.querySelector('.input-menu-name');
const menuHarga = document.querySelectorAll('.menu-harga');
const inputMenuHarga = document.querySelector('.input-menu-harga');
const menuJenis = document.querySelectorAll('.menu-jenis');
const inputMenuJenis = document.querySelector('.input-menu-jenis');
const menuJenisId = document.querySelectorAll('.menu-jenis-id');
const inputMenuJenisId = document.querySelector('.input-menu-jenis-id');

tombolEdit.forEach((e, i) => {
    e.addEventListener('click', function () {
        inputMenuName.value = '';
        inputMenuName.value = menuName[i].innerHTML.trim();
        inputMenuHarga.value = '';
        inputMenuHarga.value = menuHarga[i].innerHTML.trim();
        inputMenuJenisId.value = '';
        inputMenuJenisId.value = menuJenisId[i].innerHTML.trim();
        selected.querySelector("option").innerHTML = menuJenis[i].innerHTML.trim();
        formEdit.removeAttribute('action');
        formEdit.setAttribute('action', '/menu/update/' + e.getAttribute('data-id'))
    })
});

// Edit User
const userUsername = document.querySelectorAll('.user-username');
const inputUserUsername = document.querySelector('.input-user-username');
const userEmail = document.querySelectorAll('.user-email');
const inputUserEmail = document.querySelector('.input-user-email');
const userLevel = document.querySelectorAll('.user-level');
const inputUserLevel = document.querySelector('.input-user-level');

tombolEdit.forEach((e, i) => {
    e.addEventListener('click', function () {
        inputUserUsername.value = '';
        inputUserUsername.value = userUsername[i].innerHTML.trim();
        inputUserEmail.value = '';
        inputUserEmail.value = userEmail[i].innerHTML.trim();
        inputUserLevel.value = '';
        inputUserLevel.value = userLevel[i].innerHTML.trim();
        selected.querySelector("option").innerHTML = userLevel[i].innerHTML.trim();
        formEdit.removeAttribute('action');
        formEdit.setAttribute('action', '/user/update/' + e.getAttribute('data-id'))
    })
});

$('.modal-detail-pesanan').click(function (event) {
    var modalBody = $('.body-detail-pesanan');
    var modalBodyData = modalBody.children();
    var button = $(event.currentTarget);
    var id = button.data('pesanan_id');
    var html = '';
    var totalHarga = 0;

    $.get("/pesanan/show/"+id, function(data){
        modalBodyData.remove();
        html +=
            '<dt class="col-sm-3">Tanggal :</dt>' +
            '<dd class="col-sm-9">'+
            '<p>' + data[0]['tanggal'] + '</p>'+
            '</dd>'+
            '<dt class="col-sm-3">Menu :</dt>'+
            '<dd class="col-sm-9">'+
            '<dl class="row">';
        
        data.forEach(detailPesanan => {
            html +=
            '<dt class="col-sm-4">' + detailPesanan['menu']['harga'] + '</dt>'+
            '<dd class="col-sm-8">' + detailPesanan['menu']['nama_menu'] + '</dd>';

            totalHarga += detailPesanan['jml_harga'];
        });

        html +=
            '</dl>'+
            '</dd>'+
            '<dt class="col-sm-3">Total Harga :</dt>'+
            '<dd class="col-sm-9">'+
            '<strong>' + totalHarga + '</strong>'+
            '</dd>';

        modalBody.append(html);
    });
});

// Rupiah
$("#dengan-rupiah").keyup(function () {
    this.value = formatRupiah(this.value, 'Rp. ');
});
$(".dengan-rupiah").keyup(function () {
    this.value = formatRupiah(this.value, 'Rp. ');
});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

// function jmlHarga() {
//     // var jml_harga = formatRupiah(document.getElementById("menuSelect").value, 'Rp. ');
//     var jml_harga = document.getElementById("menuSelect").value;
//     document.getElementById("jml_harga").value() = jml_harga;
// }

$('#buttonPesan').ready(function() {
    $.ajax({url:"/api/menu", success: function(result){
        
        $('.pilih-menu').on('change', function() {
            // var JumlahMenu = {};
            $("#jumlahMenu").keyup(function() {
                JumlahMenu = $(this).val();
                console.log(JumlahMenu);

                var menuId = $('.pilih-menu').val() - 1;
                var qty = JumlahMenu;
                var intHarga = result[menuId]['harga'];
                console.log(intHarga);
                // alert(intHarga.replace(/[^0-9]/g,''));
                var totalHarga = intHarga.replace(/[^0-9]/g,'') * qty;
                console.log(totalHarga);
                var totalHargaString = totalHarga.toString();
                var totalHargaRupiah = formatRupiah(totalHargaString, 'Rp. ');
                console.log(totalHargaRupiah);

                var menuBody = $('.menu-body');
                var totalHargaData = menuBody.children();
                
                var html = '';

                totalHargaData.last().remove();

                html +=
                    '<input type="text" id="jml_harga" class="form-control col-3 dengan-rupiah total-harga" placeholder="Jumlah Harga" name="jml_harga" value="' + totalHargaRupiah + '">';

                menuBody.append(html);
            });
        });
    }});
})

$(document).ready(function(){
    $('#tes').click(function(){
        $.ajax({url: "/api/menu", success: function(result){
            console.log(result);
            // $('#disini').html(result);
        }});
    });
});