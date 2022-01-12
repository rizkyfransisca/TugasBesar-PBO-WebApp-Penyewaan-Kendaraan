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
    <link rel="stylesheet" href="<?= BASEURL ?>/css/base.css"> 
    <link rel="stylesheet" href="<?= BASEURL ?>/css/navbar.css"> 
    <link rel="stylesheet" href="<?= BASEURL ?>/css/heading.css"> 
    <link rel="stylesheet" href="<?= BASEURL ?>/css/table.css"> 

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Table Styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>
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
                <a class="nav-item nav-link mb-2" href="<?= BASEURL ?>/penyewa">
                    <i class="ri-contacts-book-2-line"></i>
                    <span>Customers</span>
                </a>
                <a class="nav-item nav-link mb-2" href="<?= BASEURL ?>/mobil">
                    <i class="ri-roadster-line"></i>
                    <span>Cars</span>
                </a>
                <a class="nav-item nav-link mb-2 navbar-actived" href="<?= BASEURL ?>/motor">
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
                <h1 class="page-title">Motorbikes</h1>
                <button class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#modal-add">
                    <i class="ri-add-line"></i>
                    <span>Add Motorbike</span>
                </button>
            </header>
            <div class="content">
                <div class="sub-title">
                    <div class="sub-title-wrapper">
                        <p>Motor List</p>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="data mt-5">
                    <table id="cars" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Year</th>
                                <th>Color</th>
                                <th>Cost/Day</th>
                                <th>Total</th>
                                <th>Features</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Query Table Start Here :p-->
                            <?php $i = 1 ?>
                            <?php foreach($data["motor"] as $motor): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $motor["merk"] ?></td>
                                <td><?= $motor["tahun"] ?></td>
                                <td><?= $motor["warna"] ?></td>
                                <td>Rp <?= number_format($motor["harga_sewa"],0,',','.'); ?></td>
                                <td><?= $motor["total_unit"] ?></td>
                                <td><button type="button" class="btn btn-primary inverted tampilDetailsMotor" data-bs-toggle="modal" data-bs-target="#modal-details" data-id_motor="<?= $motor["id_motor"] ?>">Details</button></td>
                                <td>
                                    <span><i class="ri-edit-box-line tampilEditMotor" data-bs-toggle="modal" data-bs-target="#modal-edit" data-id_motor="<?= $motor["id_motor"] ?>"></i></span>
                                    <span><i class="ri-delete-bin-2-line tampilDeleteMotor" data-bs-toggle="modal" data-bs-target="#modal-delete" data-id_motor="<?= $motor["id_motor"] ?>"></i></span>
                                </td>
                                <?php $i++; ?>
                            </tr>
                            <?php endforeach ?>
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
                    <h5 class="modal-title">Add a Motorbike</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/motor/tambah" method="post">
                        <div class="row row-cols-3">
                            <div class="mb-4">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" name="merk" required>
                            </div>
                            <div class="mb-4">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="color" name="warna" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="harga_sewa" required>
                            </div>
                            <div class="mb-4">
                                <label for="year" class="form-label">Year</label>
                                <input type="number" min="1" class="form-control" id="year" name="tahun" required>
                            </div>
                            <div class="mb-4">
                                <label for="transmission" class="form-label">Transmission</label>
                                <select class="form-select" name = "transmisi" aria-label="Default select example" id="transmission" required>
                                    <option value="" selected>-Select-</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="injection" class="form-label">Injection</label>
                                <select class="form-select" name = "isInjeksi" aria-label="Default select example" id="injection" required>
                                    <option value="" selected>-Select-</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="idling-stop" class="form-label">Idling Stop</label>
                                <select class="form-select" name = "idlingStopSystem" aria-label="Default select example" id="idling-stop" required>
                                    <option value="" selected>-Select-</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="unit" class="form-label">Total unit</label>
                                <input type="number" min="1" class="form-control" id="unit" name="total_unit" required>
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
                    <h5 class="modal-title">Motorbike Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><b>Brand</b>: <span id="detail_merk"></span></li>
                        <li><b>Color</b>: <span id="detail_warna"></span></li>
                        <li><b>Year</b>: <span id="detail_tahun"></span></li>
                        <li><b>Rental Price/Day</b>: Rp <span id="detail_harga_sewa"></span></li>
                        <li><b>Transmission</b>: <span id="detail_transmisi"></span></li>
                        <li><b>Injection</b>: <span id="detail_injection"></span></li>
                        <li><b>Idling Stop System</b>: <span id="detail_idling"></span></li>
                        <li><b>Total</b>: <span id="detail_total_unit"></span> units</li>
                    </ul>
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
                    <h5 class="modal-title">Edit a Motorbike</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_motor" id="id_motor-edit">
                        <div class="row row-cols-3">
                            <div class="mb-4">
                                <label for="brand-edit" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand-edit" name="merk" required>
                            </div>
                            <div class="mb-4">
                                <label for="color-edit" class="form-label">Color</label>
                                <input type="text" class="form-control" id="color-edit" name="warna" required>
                            </div>
                            <div class="mb-4">
                                <label for="price-edit" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price-edit" name="harga_sewa" required>
                            </div>
                            <div class="mb-4">
                                <label for="year-edit" class="form-label">Year</label>
                                <input type="number" min="1" class="form-control" id="year-edit" name="tahun" required>
                            </div>
                            <div class="mb-4">
                                <label for="transmission-edit" class="form-label">Transmission</label>
                                <select class="form-select" name = "transmisi" aria-label="Default select example" id="transmission-edit" required>
                                    <option value="">-Select-</option>
                                    <option value="Manual" selected>Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="injection-edit" class="form-label">Injection</label>
                                <select class="form-select" name = "isInjeksi" aria-label="Default select example" id="injection-edit" required>
                                    <option value="">-Select-</option>
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="idling-stop-edit" class="form-label">Idling Stop</label>
                                <select class="form-select" name = "idlingStopSystem" aria-label="Default select example" id="idling-stop-edit" required>
                                    <option value="">-Select-</option>
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="unit-edit" class="form-label">Total unit</label>
                                <input type="number" min="1" class="form-control" id="unit-edit" name="total_unit" required>
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
                    <p>Are You Sure to Delete This Motorcycle?</p>
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

    <script src="<?= BASEURL ?>/js/script_motor.js"></script>
</body>
</html>