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