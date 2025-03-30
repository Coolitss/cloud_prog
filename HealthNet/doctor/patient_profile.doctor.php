<?php
include_once "../config/conn.config.php";
session_start();

if (!isset($_SESSION['doctor_id'])) {
    header("Location: ../index.php");
    exit();
}

$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'FName';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : 'LName';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'User';
$phone = isset($_SESSION['phone_number']) ? $_SESSION['phone_number'] : 'User';
$specialty = isset($_SESSION['specialty']) ? $_SESSION['specialty'] : 'User';
$med_license = isset($_SESSION['medical_license']) ? $_SESSION['medical_license'] : 'User';
$license_id = isset($_SESSION['professional_license_id']) ? $_SESSION['professional_license_id'] : 'User';


$full_name = $fname . " " . $lname;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HealthNET </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Flaticon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-straight/css/uicons-bold-straight.css'>

    <!-- Template Main CSS File -->
    <link href="../assets/css/NiceAdminstyles.css" rel="stylesheet">

    <style>
        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
    </style>

<body>

    <!--  Header  -->
    <header id="header" class="header fixed-top d-flex align-items-center px-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <!-- Logo Section -->
            <div class="d-flex align-items-center justify-content-between">
                <a href="dashboard.doctor.php" class="logo d-flex align-items-center">
                    <img src="../../HN/assets/HNLogo.png" alt="">
                    <span class="d-none d-lg-block">HealthNet</span>
                </a>
            </div>

            <!-- Profile & Find Nearby Clinic Section -->
            <nav class="header-nav ms-auto d-flex align-items-center">
                <!-- Find Nearby Clinic -->
                <!-- <div class="me-4">
                    <a href="find_nearby_clinic.patient.php" class="btn btn-success px-4 py-2 fw-bold rounded-pill shadow-sm"
                        style="background:rgb(36, 103, 190); border: none; transition: all 0.3s ease;">
                        <i class="bi bi-geo-alt me-2"></i>
                        <span class="d-none d-lg-inline">Find Nearby Clinic</span>
                    </a>
                </div> -->

                <ul class="d-flex align-items-center m-0 p-0 list-unstyled">
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="../assets/img/user.png" alt="Profile" class="rounded-circle me-2" width="35">
                            <span class="d-none d-md-block dropdown-toggle ps-1"><?php echo htmlspecialchars($full_name); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header text-center">
                                <h6><?php echo htmlspecialchars($full_name); ?></h6>
                                <span>Doctor</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="doctor_profile.php">
                                    <i class="bi bi-person me-2"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="../auth/logout.php">
                                    <i class="bi bi-box-arrow-right me-2"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="dashboard.doctor.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="add_schedule.doctor.php">
                    <i class="bi bi-menu-button-wide"></i><span>Add Schedule</span>
                </a>

            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../404/doctor_activity.404.php">
                    <i class="bi bi-journal-text"></i><span>Activity</span>
                </a>

            </li><!-- End Forms Nav -->

            <!-- <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="patient_profile.php">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li> -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.doctor.php">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- <button type="button" class="card-button" data-bs-toggle="modal" data-bs-target="#register_clinic">
      Add Clinic Account
    </button> -->

        <section class="section dashboard">

            <section class="h-100 gradient-custom-2">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center">
                        <div class="col col-lg-9 col-xl-8">
                            <div class="card">
                                <div class="rounded-top text-white d-flex flex-row" style="background-color:#A3D1C6; height:200px;">
                                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                        <img src="../assets/img/developers/cedric.jpg"
                                            alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                            style="width: 150px; z-index: 1">
                                        <!-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark text-body" data-mdb-ripple-color="dark" style="z-index: 1;">
                                            Edit profile
                                        </button> -->
                                    </div>
                                    <div class="ms-3" style="margin-top: 130px;">
                                        <h5>Cedric</h5>
                                        <p>Iloilo</p>
                                    </div>
                                </div>
                                <!-- <div class="p-4 text-black bg-body-tertiary">
                                    <div class="d-flex justify-content-end text-center py-1 text-body">
                                        <div>
                                            <p class="mb-1 h5">253</p>
                                            <p class="small text-muted mb-0">Photos</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="mb-1 h5">1026</p>
                                            <p class="small text-muted mb-0">Followers</p>
                                        </div>
                                        <div>
                                            <p class="mb-1 h5">478</p>
                                            <p class="small text-muted mb-0">Following</p>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card-body p-4 text-black mt-3">
                                    <div class="mb-4  text-body">
                                        <p class="lead fw-normal mb-1">Details</p>
                                        <div class="p-4 bg-body-tertiary">
                                            <p class="font-italic mb-1">Gender: Male</p>
                                            <p class="font-italic mb-1">Contact Number: 123-456-789</p>
                                            <p class="font-italic mb-0">Email: cabillonjohncedric@gmail.com</p>
                                        </div>
                                    </div>

                                    <div class="mb-4  text-body">
                                        <p class="lead fw-normal mb-1">Reason for Appointment</p>
                                        <div class="p-4 bg-body-tertiary">
                                            <p class="font-italic mb-1">............</p>
                                        </div>
                                    </div>

                                    <div class="mb-4  text-body">
                                        <p class="lead fw-normal mb-1">Preffered Time and Date</p>
                                        <div class="p-4 bg-body-tertiary">
                                            <p class="font-italic mb-1">Date: Oct 3, 2025:</p>
                                            <p class="font-italic mb-0">Time: 10:00pm:</p>
                                        </div>
                                    </div>

                                    <div class="mb-4  text-body">
                                        <p class="lead fw-normal mb-1">Preffered Time and Date</p>
                                        <div class="p-4 bg-body-tertiary">
                                            <p class="font-italic mb-1">Date: Oct 3, 2025:</p>
                                            <p class="font-italic mb-0">Time: 10:00pm:</p>
                                        </div>
                                    </div>

                                    <div class="mb-4  text-body">
                                        <p class="lead fw-normal mb-1">Preffered Time and Date</p>
                                        <div class="p-4 bg-body-tertiary">
                                            <p class="font-italic mb-1">Selected Doctor: James</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>


    </main><!-- End #main -->
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <script>
                document.write(new Date().getFullYear());
            </script> HealthNET. All rights reserved.
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])):
    ?>

        <script>
            const messageData = <?php echo json_encode($_SESSION["message"]); ?>;
            Swal.fire({
                title: messageData.title,
                text: messageData.message,
                icon: messageData.type,
                shonfirmButton: false,
                timer: 3000
            });
        </script>
    <?php
        unset($_SESSION['message']);
    endif;
    ?>

</body>

</html>