$(document).ready(function() {
    $('#cars').DataTable();

    const listHarga = $('.listHarga')
    let arrayHarga = []
    arrayHarga.push(0)
    for(var i = 0; i < listHarga.length; i++){
        arrayHarga.push(listHarga[i].innerHTML)
    }

    $('#duration').val(1)
    const duration = $('#duration').val()
    const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(duration)
    $('#total-price').val(totalCost)

    $('#duration').on('input',function() {
        const duration = $('#duration').val()
        console.log("Hello");
        if (duration == ''){
            const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(0)
            $('#total-price').val(totalCost)
        }else{
            const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(duration)
            $('#total-price').val(totalCost)
        }
    })

    $('#vehicle').on('input',function() {
        const duration = $('#duration').val()
        if (duration == ''){
            const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(0)
            $('#total-price').val(totalCost)
        }else{
            const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(duration)
            $('#total-price').val(totalCost)
        }
    })

    $('.tampilDetailsPenyewa').on('click', function(){
        const id_penyewa = $(this).data('id_penyewa')
        const jenis_kendaraan = $(this).data('jenis_kendaraan')

        $.ajax({
            url: 'http://localhost/sewakeun pbo/public/penyewa/getPenyewaById',
            data: {id_penyewa : id_penyewa, jenis_kendaraan : jenis_kendaraan},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $('#detail_nama').html(data.nama)
                $('#detail_alamat').html(data.alamat)
                $('#detail_no_telepon').html(data.no_telepon)
                $('#detail_no_ktp').html(data.no_ktp)
                $('#detail_kendaraan_disewa').html(data.kendaraan_disewa)
                $('#detail_lama_sewa').html(data.lama_sewa)
                $('#detail_total_biaya').html(parseInt(data.total_biaya).toLocaleString())
            }
        })
    })

    $('.tampilDeletePenyewa').on('click', function(){
        const id_penyewa = $(this).data('id_penyewa')
        const jenis_kendaraan = $(this).data('jenis_kendaraan')
        const href_attr = "http://localhost/sewakeun pbo/public/penyewa/hapus/" + jenis_kendaraan + "/" + id_penyewa
        $(".btn-delete").attr("href", href_attr)
    })

    // ================= EDIT =================

    $('.tampilEditPenyewa').on('click', function(){

        $('.modal-body form').attr('action', 'http://localhost/sewakeun pbo/public/penyewa/ubah')

        const id_penyewa = $(this).data('id_penyewa')
        const jenis_kendaraan = $(this).data('jenis_kendaraan')

        $.ajax({
            url: 'http://localhost/sewakeun pbo/public/penyewa/getPenyewaById',
            data: {id_penyewa : id_penyewa, jenis_kendaraan : jenis_kendaraan},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#name-edit').val(data.nama)
                $('#address-edit').val(data.alamat)
                $('#id-number-edit').val(data.no_ktp)
                $('#phone-number-edit').val(data.no_telepon)
                if(data.jenis_kendaraan == "mobil"){
                    $('#kendaraan_lama-edit').val(data.id_penyewa + " " + data.jenis_kendaraan + " " + data.id_mobil)
                }else if(data.jenis_kendaraan == "motor"){
                    $('#kendaraan_lama-edit').val(data.id_penyewa + " " + data.jenis_kendaraan + " " + data.id_motor)
                }else if(data.jenis_kendaraan == "truck"){
                    $('#kendaraan_lama-edit').val(data.id_penyewa + " " + data.jenis_kendaraan + " " + data.id_truck)
                }else if(data.jenis_kendaraan == "bus"){
                    $('#kendaraan_lama-edit').val(data.id_penyewa + " " + data.jenis_kendaraan + " " + data.id_bus)
                }
                
                if(data.jenis_kendaraan == "mobil"){
                    $('#vehicle-edit').val(data.id_mobil + " " + data.jenis_kendaraan)
                }else if(data.jenis_kendaraan == "motor"){
                    $('#vehicle-edit').val(data.id_motor + " " + data.jenis_kendaraan)
                }else if(data.jenis_kendaraan == "truck"){
                    $('#vehicle-edit').val(data.id_truck + " " + data.jenis_kendaraan)
                }else if(data.jenis_kendaraan == "bus"){
                    $('#vehicle-edit').val(data.id_bus + " " + data.jenis_kendaraan)
                }
                $('#start-date-edit').val(data["start-date"])
                $('#end-date-edit').val(data["end-date"])
                $('#duration-edit').val(data.lama_sewa)
                $('#total-price-edit').val(data.total_biaya)
                $('#id_penyewa-edit').val(data.id_penyewa)
                $('#jenis_kendaraan-edit').val(data.jenis_kendaraan)
            }
        })
    })

    $('#duration-edit').val(1)
    const durationEdit = $('#duration-edit').val()
    const totalCostEdit = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(durationEdit)
    $('#total-price-edit').val(totalCostEdit)

    $('#duration-edit').on('input',function() {
        const durationEdit = $('#duration-edit').val()
        if (durationEdit == ''){
            const totalCostEdit = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(0)
            $('#total-price-edit').val(totalCostEdit)
        }else{
            const totalCostEdit = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(durationEdit)
            $('#total-price-edit').val(totalCostEdit)
        }
    })

    $('#vehicle-edit').on('input',function() {
        const durationEdit = $('#duration-edit').val()
        if (durationEdit == ''){
            const totalCostEdit = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(0)
            $('#total-price-edit').val(totalCostEdit)
        }else{
            const totalCostEdit = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(durationEdit)
            $('#total-price-edit').val(totalCostEdit)
        }
    })
} );