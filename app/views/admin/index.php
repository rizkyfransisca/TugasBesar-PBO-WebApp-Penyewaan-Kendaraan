<?php

?>

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
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/base.css"> 
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/navbar.css"> 
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/heading.css"> 
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/profile.css"> 

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
                <a class="nav-item nav-link mb-2 navbar-actived" href="<?= BASEURL ?>/admin/">
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
                <a class="nav-item nav-link mb-2" href="#">
                    <i class="ri-logout-box-line"></i>
                    <span>Logout</span>
                </a>
            </div>         
            <div class="profile-admin d-flex align-items-center mb-5">
                <img src="img/avatar.png" alt="admin-img">
                <div class="desc">
                    <span class="text-black-50 h6">Admin</span>
                    <p>Rafly Cincah R.</p>
                </div>
            </div>
            </a>
        </nav>

        <!-- Page Content -->
        <main>
            <header class="d-flex justify-content-between">
                <h1 class="page-title">Admin Page</h1>
            </header>
            <div class="content">
                <section>
                    <div class="section-title">
                        <p>Profile</p>
                    </div>
                    <div class="profile-field mt-5">
                        <div class="profile d-flex align-items-center">
                            <div class="profile-img">
                                <img src="img/avatar.png" alt="">
                            </div>
                            <div class="admin-info ms-3">
                                <h1 class="mb-2">Rafly Cincah R</h1>
                                <p class="mb-2">raflyganteng</p>
                                <p>#8275</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="mt-5">
                    <div class="section-title">
                        <p>Summary</p>
                    </div>
                    <div class="summary-field mt-4 row row-cols-3 gx-4 gy-4">
                        <div class="col">
                            <div class="box p-4 d-flex">
                                <div class="icon-circle d-flex justify-content-center align-items-center">
                                    <i class="ri-contacts-book-2-line"></i>
                                </div>
                                <div class="info ms-3 align-self-center">
                                    <h1 class="mb-2"><?= $data["total_customer"] ?></h1>
                                    <p>Total Customers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box p-4 d-flex">
                                <div class="icon-circle d-flex justify-content-center align-items-center">
                                    <i class="ri-money-dollar-circle-line"></i>
                                </div>
                                <div class="info ms-3 align-self-center">
                                    <h1 class="mb-2">Rp 50.000.000</h1>
                                    <p>Total Revenue</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box p-4 d-flex">
                                <div class="icon-circle d-flex justify-content-center align-items-center">
                                    <i class="ri-roadster-line"></i>
                                </div>
                                <div class="info ms-3 align-self-center">
                                    <h1 class="mb-2"><?= $data["total_mobil"]["total_unit_mobil"] ?></h1>
                                    <p>Cars Available</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box p-4 d-flex">
                                <div class="icon-circle d-flex justify-content-center align-items-center">
                                    <i class="ri-motorbike-line"></i>
                                </div>
                                <div class="info ms-3 align-self-center">
                                    <h1 class="mb-2"><?= $data["total_motor"]["total_unit_motor"] ?></h1>
                                    <p>Motorbikes Available</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box p-4 d-flex">
                                <div class="icon-circle d-flex justify-content-center align-items-center">
                                    <i class="ri-bus-line"></i>
                                </div>
                                <div class="info ms-3 align-self-center">
                                    <h1 class="mb-2"><?= $data["total_bus"]["total_unit_bus"] ?></h1>
                                    <p>Bus Available</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box p-4 d-flex">
                                <div class="icon-circle d-flex justify-content-center align-items-center">
                                    <i class="ri-truck-line"></i>
                                </div>
                                <div class="info ms-3 align-self-center">
                                    <h1 class="mb-2"><?= $data["total_truck"]["total_unit_truck"] ?></h1>
                                    <p>Truck Available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <!-- Jquery Script-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Table Style Script -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cars').DataTable();
        } );
    </script>
</body>
</html>