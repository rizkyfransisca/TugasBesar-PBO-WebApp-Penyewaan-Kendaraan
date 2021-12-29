// ketika dokumennya sudah siap, maka jalankan fungsi di dalamnya
$(function(){

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa')
        // jquery carikan element yang class nya modal-footer lalu ambil button di dalamnya tapi yang tipe nya submit saja
        $('.modal-footer button[type=submit]').html('Tambah Data')

        $('#nama').val('')
        $('#nrp').val('')
        $('#email').val('')
        $('#jurusan').val('')
    })

    // jquery tolong carikan saya sebuah element yang nama kelas nya tampilModalUbah
    $('.tampilModalUbah').on('click', function(){
        // .html -> ubah isinya
        $('#formModalLabel').html('Ubah Data Mahasiswa')
        // jquery carikan element yang class nya modal-footer lalu ambil button di dalamnya tapi yang tipe nya submit saja
        $('.modal-footer button[type=submit]').html('Ubah Data')
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah') // mengubah attribut action yang ada pada form

        // $(this) -> tombol yang kita klik, ambil data yang namanya id (data-id)
        const id = $(this).data('id') // ambil datanya yang namanya id (data-id)

        // ajax -> membuat permintaan data atau request datanya terjadi di sebagian elementnya saja -> tidak perlu mereload satu halaman
        $.ajax({
            // mahasiswa == controller , getubah == method di controller
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id}, // namadata : isidata -> data yang dikirimkan ke fungsi getubah menggunakan method post
            method: 'post', // sehingga nanti ditangkap idnya pakai $_POST
            dataType: 'json', // format data yang dikirimkan atau di echo dari fungsi getubah controller Mahasiswa adalah json
            success: function(data) { // meminta response atau kembalian data dari method getubah yang ada di controller Mahasiswa -> dari echo nya
                $('#nama').val(data.nama)
                $('#nrp').val(data.nrp)
                $('#email').val(data.email)
                $('#jurusan').val(data.jurusan)
                $('#id').val(data.id)
            }
        })
    })
})