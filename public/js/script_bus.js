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
    $('#cars').DataTable();

    var hargaSewa = document.getElementById('price');
    hargaSewa.addEventListener('keyup', function(e) {
        hargaSewa.value = formatRupiah(this.value, 'Rp. ');
    });

    $('.tampilDetailsBus').on('click', function(){
        const id_bus = $(this).data('id_bus')
        console.log(id_bus)
        $.ajax({
            url: 'http://localhost/sewakeun pbo/public/bus/getBusById',
            data: {id_bus : id_bus},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#detail_merk').html(data.merk)
                $('#detail_warna').html(data.warna)
                // $('#detail_harga_sewa').html(data.harga_sewa)
                $('#detail_harga_sewa').html(parseInt(data.harga_sewa).toLocaleString())
                $('#detail_tahun').html(data.tahun)
                $('#detail_transmisi').html(data.transmisi)
                $('#detail_total_unit').html(data.total_unit)
                $('#detail_kapasitas_penumpang').html(data.kapasitas_penumpang)
                $('#detail_tipe_ac').html(data.tipe_ac)
                $('#detail_air_bag').html(data.air_bag)
                $('#detail_ada_wifi').html(data.ada_wifi)
                $('#detail_ada_toilet').html(data.ada_toilet)
                $('#detail_kapasitas_bagasi').html(data.kapasitas_bagasi)
            }
        })
    })

    $('.tampilDeleteBus').on('click', function(){
        const id_bus = $(this).data('id_bus')
        const href_attr = "http://localhost/sewakeun pbo/public/bus/hapus/" + id_bus
        $(".btn-delete").attr("href", href_attr)
    })

    $('.tampilEditBus').on('click', function(){

        var hargaSewaEdit = document.getElementById('price-edit');
        hargaSewaEdit.addEventListener('keyup', function(e) {
            hargaSewaEdit.value = formatRupiah(this.value, 'Rp. ');
        });

        $('.modal-body form').attr('action', 'http://localhost/sewakeun pbo/public/bus/ubah')

        const id_bus = $(this).data('id_bus')
        
        $.ajax({
            url: 'http://localhost/sewakeun pbo/public/bus/getBusById',
            data: {id_bus : id_bus},
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
                $('#capacity-edit').val(data.kapasitas_penumpang)
                console.log(data.kapasitas_penumpang);
                $('#air-conditioner-edit').val(data.tipe_ac)
                $('#toilet-edit').val(data.ada_toilet)
                $('#airbag-edit').val(data.air_bag)
                $('#wifi-edit').val(data.ada_wifi)
                $('#baggage-capacity-edit').val(data.kapasitas_bagasi)
                $('#id_bus-edit').val(data.id_bus)
            }
        })
    })
} );