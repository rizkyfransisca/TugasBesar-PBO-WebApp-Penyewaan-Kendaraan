/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
}

$(document).ready(function() {
    $('#cars').DataTable( {
        "scrollX": true
    } );

    var hargaSewa = document.getElementById('price');
    hargaSewa.addEventListener('keyup', function(e) {
        hargaSewa.value = formatRupiah(this.value, 'Rp. ');
    });

    $('.tampilDetailsMotor').on('click', function(){
        const id_motor = $(this).data('id_motor')

        $.ajax({
            url: 'http://localhost/sewakeun pbo/public/getMotorById',
            data: {id_motor : id_motor},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#detail_merk').html(data.merk)
                $('#detail_warna').html(data.warna)
                // $('#detail_harga_sewa').html(data.harga_sewa)
                $('#detail_harga_sewa').html("Rp " + parseInt(data.harga_sewa).toLocaleString())
                $('#detail_tahun').html(data.tahun)
                $('#detail_transmisi').html(data.transmisi)
                $('#detail_total_unit').html(data.total_unit + " unit")
                $('#detail_injection').html(data.isInjeksi)
                $('#detail_idling').html(data.idlingStopSystem)
            }
        })
    })

    $('.tampilDeleteMotor').on('click', function(){
        const id_motor = $(this).data('id_motor')
        const href_attr = "http://localhost/sewakeun pbo/public/motor/hapus/" + id_motor
        $(".btn-delete").attr("href", href_attr)
    })

    $('.tampilEditMotor').on('click', function(){

        var hargaSewaEdit = document.getElementById('price-edit');
        hargaSewaEdit.addEventListener('keyup', function(e) {
            hargaSewaEdit.value = formatRupiah(this.value, 'Rp. ');
        });

        $('.modal-body form').attr('action', 'http://localhost/sewakeun pbo/public/motor/ubah')

        const id_motor = $(this).data('id_motor')

        $.ajax({
            url: 'http://localhost/sewakeun pbo/public/motor/getMotorById',
            data: {id_motor : id_motor},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#brand-edit').val(data.merk)
                $('#color-edit').val(data.warna)
                // $('#price-edit').val(data.harga_sewa)
                $('#price-edit').val("Rp. " + parseInt(data.harga_sewa).toLocaleString())
                $('#year-edit').val(data.tahun)
                $('#transmission-edit').val(data.transmisi)
                $('#unit-edit').val(data.total_unit)
                $('#injection-edit').val(data.isInjeksi)
                $('#idling-stop-edit').val(data.idlingStopSystem)
                $('#id_motor-edit').val(data.id_motor)
            }
        })
    })
} );