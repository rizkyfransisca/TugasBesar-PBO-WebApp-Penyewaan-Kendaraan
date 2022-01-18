<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewakeun</title>

    <!-- Page Logo -->
    <link rel = "icon" href = "img/logo.png" type = "image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/base.css"> 
    <link rel="stylesheet" href="css/navbar.css"> 
    <link rel="stylesheet" href="css/heading.css"> 
    <link rel="stylesheet" href="css/table.css"> 

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Table Styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>

    <style>
        .listHarga{
            display: none;
        }
    </style>
</head>
<body>

    <!-- Main Page Goes Here -->
    <div class="body-wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-column align-items-start">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="ri-steering-fill"></i>
                <div class="title">
                    <h1>Sewakeun</h1>
                    <p>Rent Now Pay Later</p>
                </div>
            </a>
            <div class="navbar-nav d-flex flex-column mt-5 flex-grow-1">
                <a class="nav-item nav-link mb-2" href="<?= BASEURL ?>/admin">
                    <i class="ri-home-6-line"></i>
                    <span>Admin Page</span>
                </a>
                <a class="nav-item nav-link mb-2 navbar-actived" href="<?= BASEURL ?>/penyewa">
                    <i class="ri-contacts-book-2-line"></i>
                    <span>Customers</span>
                </a>
                <a class="nav-item nav-link mb-2" href="<?= BASEURL ?>/mobil">
                    <i class="ri-roadster-line"></i>
                    <span>Cars</span>
                </a>
                <a class="nav-item nav-link mb-2" href="<?= BASEURL ?>/motor">
                    <i class="ri-motorbike-line"></i>
                    <span>Motorbike</span>
                </a>
                <a class="nav-item nav-link mb-2" href="<?= BASEURL ?>/bus">
                    <i class="ri-bus-line"></i>
                    <span>Bus</span>
                </a>
                <a class="nav-item nav-link mb-2" href="<?= BASEURL ?>/truck">
                    <i class="ri-truck-line"></i>
                    <span>Truck</span>
                </a>
                <a class="nav-item nav-link mb-2" data-bs-toggle="modal" data-bs-target="#modal-logout" href="">
                    <i class="ri-logout-box-line"></i>
                    <span>Logout</span>
                </a>
            </div>         
            <div class="profile-admin d-flex align-items-center mb-5">
                <img src="img/avatar.png" alt="admin-img">
                <div class="desc">
                    <span class="text-black-50 h6">Admin</span>
                    <p><?= $_SESSION["isLogin"]["nama"] ?>.</p>
                </div>
            </div>
            </a>
        </nav>

        <!-- Page Content -->
        <main>
            <header class="d-flex justify-content-between">
                <h1 class="page-title align-self-center">Customers</h1>
                <button class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#modal-add">
                    <i class="ri-add-line"></i>
                    <span>Add Customer</span>
                    <span>Add</span>
                </button>
            </header>
            <div class="content">
                <div class="sub-title">
                    <div class="sub-title-wrapper">
                        <p>Customer List</p>
                    </div>
                </div>

                <!-- Data Table -->
                <?php foreach($data['mobil'] as $mobil): ?>
                    <p class="listHarga"><?= $mobil["harga_sewa"] ?></p>
                <?php endforeach ?>
                <?php foreach($data['motor'] as $motor): ?>
                    <p class="listHarga"><?= $motor["harga_sewa"] ?></p>
                <?php endforeach ?>
                <?php foreach($data['truck'] as $truck): ?>
                    <p class="listHarga"><?= $truck["harga_sewa"] ?></p>
                <?php endforeach ?>
                <?php foreach($data['bus'] as $bus): ?>
                    <p class="listHarga"><?= $bus["harga_sewa"] ?></p>
                <?php endforeach ?>
                <div class="data mt-5">
                    <table id="cars" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Rented</th>
                                <th>Duration</th>
                                <th class="sd-col">Start Date</th>
                                <th class="ed-col">End Date</th>
                                <th class="c-col">Total Cost</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Query Table Start Here :p-->
                            <?php $i = 0; ?>
                            <?php foreach($data["merged"] as $merged): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $merged["nama"] ?></td>
                                <td><?= $merged["kendaraan_disewa"] ?></td>
                                <td><?= $merged["lama_sewa"] ?> days</td>
                                <td class="sd-col"><?= date("d-m-Y", strtotime($merged["start-date"]))  ?></td>
                                <td class="ed-col"><?= date("d-m-Y", strtotime($merged["end-date"]))?></td>
                                <td class="c-col">Rp <?= number_format($merged["total_biaya"],0,',','.'); ?></td>
                                <td><button type="button" class="btn btn-primary inverted tampilDetailsPenyewa" data-bs-toggle="modal" data-bs-target="#modal-details" data-id_penyewa="<?= $merged["id_penyewa"] ?>" data-jenis_kendaraan="<?= $merged["jenis_kendaraan"] ?>">More</button></td>
                                <td>
                                    <span><i class="ri-edit-box-line tampilEditPenyewa" data-bs-toggle="modal" data-bs-target="#modal-edit" data-id_penyewa="<?= $merged["id_penyewa"] ?>" data-jenis_kendaraan="<?= $merged["jenis_kendaraan"] ?>"></i></span>
                                    <span><i class="ri-delete-bin-2-line tampilDeletePenyewa" data-bs-toggle="modal" data-bs-target="#modal-delete" data-id_penyewa="<?= $merged["id_penyewa"] ?>" data-jenis_kendaraan="<?= $merged["jenis_kendaraan"] ?>"></i></span>
                                </td>
                                <?php $i++; ?>
                            </tr>
                            <?php endforeach; ?>
                            <!-- <tr>
                                <td>2</td>
                                <td>Api Debak R</td>
                                <td>Avanza R</td>
                                <td>7 days</td>
                                <td>Rp 3.000.000</td>
                                <td><p class="stat-return">Returned</p></td>
                                <td><button type="button" class="btn btn-primary inverted" data-bs-toggle="modal" data-bs-target="#modal-details">More</button></td>
                                <td>
                                    <span><i class="ri-edit-box-line" data-bs-toggle="modal" data-bs-target="#modal-edit"></i></span>
                                    <span><i class="ri-delete-bin-2-line" data-bs-toggle="modal" data-bs-target="#modal-delete"></i></span>
                                </td>
                            </tr> -->
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal or Overlay Goes Here -->

    <!-- Modal Add -->
    <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg rounded">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= BASEURL ?>/penyewa/tambah">
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="nama" required>
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="alamat" required>
                            </div>
                            <div class="mb-4">
                                <label for="id-number" class="form-label">ID Card</label>
                                <input type="number" min="1" class="form-control" id="id-number" name="no_ktp" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone-number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone-number" name="no_telepon" required>
                            </div>
                            <div class="mb-4">
                                <label for="vehicle" class="form-label">Vehicle</label>
                                <select class="form-select" name = "kendaraan_disewa" aria-label="Default select example" id="vehicle" required>
                                    <option value="" selected>-Select-</option>
                                    <?php foreach($data['mobil'] as $mobil): ?>
                                        <option value="<?=$mobil['id_mobil'] . " mobil" ?>"><?=$mobil['merk'] . " (".$mobil['warna'].")"  ?></option>
                                    <?php endforeach ?>
                                    <?php foreach($data['motor'] as $motor): ?>
                                        <option value="<?=$motor['id_motor'] . " motor" ?>"><?=$motor['merk'] . " (".$motor['warna'].")"  ?></option>
                                    <?php endforeach ?>
                                    <?php foreach($data['truck'] as $truck): ?>
                                        <option value="<?=$truck['id_truck'] . " truck" ?>"><?=$truck['merk'] . " (".$truck['warna'].")"  ?></option>
                                    <?php endforeach ?>
                                    <?php foreach($data['bus'] as $bus): ?>
                                        <option value="<?=$bus['id_bus'] . " bus" ?>"><?=$bus['merk'] . " (".$bus['warna'].")" ?></option>
                                    <?php endforeach ?>
                                    <!-- <option value="Avanza X">Avanza X 2017 (Red)</option>
                                    <option value="Vario 125 R">Vario 125 R 2012 (Yellow)</option>
                                    <option value="Hino Fuso E">Hino Fuso E 2018 (Green)</option>
                                    <option value="Xenia E">Xenia E 2010 (Grey)</option>
                                    <option value="Mini Cooper">Mini Cooper 2012 (Red)</option> -->
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="start-date" class="form-label">Start Date</label>
                                <input type="date" min="1" class="form-control" id="start-date" value="<?=date("Y-m-d") ?>" name="start-date" required onchange="rubahDurasi()">
                            </div>
                            <div class="mb-4">
                                <label for="end-date" class="form-label">End Date</label>
                                <input type="date" min="1" class="form-control" id="end-date" value="<?=date("Y-m-d") ?>" name="end-date" required onchange="rubahDurasi()">
                            </div>
                            <div class="mb-4">
                                <label for="duration" class="form-label">Duration (Day)</label>
                                <input type="number" min="1" class="form-control" id="duration" name="lama_sewa" required readonly>
                            </div>
                            <div class="mb-4">
                                <label for="total-price" class="form-label">Total Price (Rp)</label>
                                <input type="number" min="1" class="form-control" id="total-price" name="total_biaya" value="0" readonly>
                            </div>
                        </div>
                        <div class="button-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="submit-btn" style="width: 90px;">Add</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 90px; margin-left:5px;">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Details -->
    <div class="modal fade" id="modal-details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog rounded">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <ul>
                        <li><b>Name</b>: <span id="detail_nama"></span></li>
                        <li><b>Address</b>: <span id="detail_alamat"></span></li>
                        <li><b>Phone Number</b>: <span id="detail_no_telepon"></span></li>
                        <li><b>ID Card</b>: <span id="detail_no_ktp"></span></li>
                        <li><b>Vehicle Rented</b>: <span id="detail_kendaraan_disewa"></span></li>
                        <li><b>Duration</b>: <span id="detail_lama_sewa"></span> days</li>
                        <li><b>Start Date</b>: <span id="detail-start-date"></span></li>
                        <li><b>End Date</b>: <span id="detail-end-date"></span></li>
                        <li><b>Total Cost</b>: Rp <span id="detail_total_biaya"></span></li>
                    </ul> -->
                    <table>
                        <colgroup>
                            <col span="1" style="width: 30%;">
                            <col span="1" style="width: 1%;">
                            <col span="1" style="width: 69%;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td id="detail_nama"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td id="detail_alamat"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>:</td>
                                <td id="detail_no_telepon"></td>
                            </tr>
                            <tr>
                                <td>ID Card</td>
                                <td>:</td>
                                <td id="detail_no_ktp"></td>
                            </tr>
                            <tr>
                                <td>Vehicle Rented</td>
                                <td>:</td>
                                <td id="detail_kendaraan_disewa"></td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>:</td>
                                <td id="detail_lama_sewa"></td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>:</td>
                                <td id="detail-start-date"></td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td>:</td>
                                <td id="detail-end-date"></td>
                            </tr>
                            <tr>
                                <td>Total Cost</td>
                                <td>:</td>
                                <td id="detail_total_biaya"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg rounded">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit a Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <input type="hidden" name="id_penyewa" id="id_penyewa-edit">
                        <input type="hidden" name="jenis_kendaraan" id="jenis_kendaraan-edit">
                        <input type="hidden" name="kendaraan_lama" id="kendaraan_lama-edit">
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                            <div class="mb-4">
                                <label for="name-edit" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name-edit" name="nama" required value="Api Debak R">
                            </div>
                            <div class="mb-4">
                                <label for="address-edit" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address-edit" name="alamat" required value="Jl.Diponegoro Tanggerang Selatan">
                            </div>
                            <div class="mb-4">
                                <label for="id-number-edit" class="form-label">ID Card</label>
                                <input type="number" min="1" class="form-control" id="id-number-edit" name="no_ktp" required value="52030765122002">
                            </div>
                            <div class="mb-4">
                                <label for="phone-number-edit" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone-number-edit" name="no_telepon" required value="087763312432">
                            </div>
                            <div class="mb-4">
                                <label for="vehicle-edit" class="form-label">Vehicle</label>
                                <select class="form-select" name = "kendaraan_disewa" aria-label="Default select example" id="vehicle-edit" required>
                                    <option value="">-Select-</option>
                                    <?php foreach($data['mobil'] as $mobil): ?>
                                        <option value="<?=$mobil['id_mobil'] . " mobil" ?>"><?=$mobil['merk'] . " (".$mobil['warna'].")"  ?></option>
                                    <?php endforeach ?>
                                    <?php foreach($data['motor'] as $motor): ?>
                                        <option value="<?=$motor['id_motor'] . " motor" ?>"><?=$motor['merk'] . " (".$motor['warna'].")"  ?></option>
                                    <?php endforeach ?>
                                    <?php foreach($data['truck'] as $truck): ?>
                                        <option value="<?=$truck['id_truck'] . " truck" ?>"><?=$truck['merk'] . " (".$truck['warna'].")"  ?></option>
                                    <?php endforeach ?>
                                    <?php foreach($data['bus'] as $bus): ?>
                                        <option value="<?=$bus['id_bus'] . " bus" ?>"><?=$bus['merk'] . " (".$bus['warna'].")" ?></option>
                                    <?php endforeach ?>
                                    <!-- <option value="Avanza X" selected>Avanza X 2017 (Red)</option>
                                    <option value="Vario 125 R">Vario 125 R 2012 (Yellow)</option>
                                    <option value="Hino Fuso E">Hino Fuso E 2018 (Green)</option>
                                    <option value="Xenia E">Xenia E 2010 (Grey)</option>
                                    <option value="Mini Cooper">Mini Cooper 2012 (Red)</option> -->
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="start-date-edit" class="form-label">Start Date</label>
                                <input type="date" min="1" class="form-control" id="start-date-edit" name="start-date" required onchange="rubahDurasiEdit()">
                            </div>
                            <div class="mb-4">
                                <label for="end-date-edit" class="form-label">End Date</label>
                                <input type="date" min="1" class="form-control" id="end-date-edit" name="end-date" required onchange="rubahDurasiEdit()">
                            </div>
                            <div class="mb-4">
                                <label for="duration-edit" class="form-label">Duration (Day)</label>
                                <input type="number" min="1" class="form-control" id="duration-edit" name="lama_sewa" required value="7" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="total-price-edit" class="form-label">Total Price (Rp)</label>
                                <input type="number" min="1" class="form-control" id="total-price-edit" name="total_biaya" value="2500000" readonly>
                            </div>
                        </div>
                        <div class="button-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="submit-btn" style="width: 90px;">Edit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 90px; margin-left:5px;">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure to Delete This Customer?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger btn-delete">Delete</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Logout-->
    <div class="modal fade" id="modal-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure to Logout?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger btn-delete" href="<?= BASEURL ?>/admin/logout">Logout</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Script-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Table Style Script -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script src="<?= BASEURL ?>/js/script_penyewa.js"></script>
    <script>
        function secondsDiff(d1, d2) {
            let millisecondDiff = d2 - d1;
            let secDiff = Math.floor( ( d2 - d1) / 1000 );
            return secDiff;
        }
        function minutesDiff(d1, d2) {
            let seconds = secondsDiff(d1, d2);
            let minutesDiff = Math.floor( seconds / 60 );
            return minutesDiff;
        }
        function hoursDiff(d1, d2) {
            let minutes = minutesDiff(d1, d2);
            let hoursDiff = Math.floor( minutes / 60 );
            return hoursDiff;
        }
        function daysDiff(d1, d2) {
            let hours = hoursDiff(d1, d2);
            let daysDiff = Math.floor( hours / 24 );
            return daysDiff;
        }
        function rubahDurasi(){
            let startDate = document.getElementById("start-date").value
            let endDate = document.getElementById("end-date").value

            document.getElementById("duration").value = daysDiff(new Date(startDate), new Date(endDate))
            const listHarga = $('.listHarga')
            let arrayHarga = []
            arrayHarga.push(0)
            for(var i = 0; i < listHarga.length; i++){
                arrayHarga.push(listHarga[i].innerHTML)
            }
            const duration = $('#duration').val()
            const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(duration)
            $('#total-price').val(totalCost)
            console.log("Hello");
            if (duration == ''){
                const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(0)
                $('#total-price').val(totalCost)
            }else{
                const totalCost = parseInt(arrayHarga[$('#vehicle').prop('selectedIndex')]) * parseInt(duration)
                $('#total-price').val(totalCost)
            }
        }

        function rubahDurasiEdit(){
            let startDate = document.getElementById("start-date-edit").value
            let endDate = document.getElementById("end-date-edit").value

            document.getElementById("duration-edit").value = daysDiff(new Date(startDate), new Date(endDate))
            const listHarga = $('.listHarga')
            let arrayHarga = []
            arrayHarga.push(0)
            for(var i = 0; i < listHarga.length; i++){
                arrayHarga.push(listHarga[i].innerHTML)
            }
            const duration = $('#duration-edit').val()
            const totalCost = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(duration)
            $('#total-price-edit').val(totalCost)
            if (duration == ''){
                const totalCost = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(0)
                $('#total-price-edit').val(totalCost)
            }else{
                const totalCost = parseInt(arrayHarga[$('#vehicle-edit').prop('selectedIndex')]) * parseInt(duration)
                $('#total-price-edit').val(totalCost)
            }
        }
    </script>
</body>
</html>