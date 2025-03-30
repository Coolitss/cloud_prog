<?php
include_once "../config/conn.config.php";
session_start();

if (!isset($_SESSION['doctor_id'])) {
    header("Location: ../index.php");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

try {
    $doctor = $conn->prepare("SELECT * FROM doctor_account WHERE doctor_id = ? ");
    $doctor->execute([$doctor_id]);
    $doctorAcc = $doctor->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


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
                            <span class="d-none d-md-block dropdown-toggle ps-1"><?php echo htmlspecialchars($doctorAcc['first_name']) . ' ' . htmlspecialchars($doctorAcc['last_name']); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header text-center">
                                <h6><?php echo htmlspecialchars($doctorAcc['first_name']) . ' ' . htmlspecialchars($doctorAcc['last_name']); ?></h6>
                                <span>Doctor</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="patient_profile.php">
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

            <div class="container">
                <div class="main-body">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body pt-4">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4><?php echo htmlspecialchars($doctorAcc['first_name']) . ' ' . htmlspecialchars($doctorAcc['last_name']); ?></h4>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle"
                                                    type="button"
                                                    id="statusDropdown"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Not Available
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                                    <li><a class="dropdown-item status-option" href="#" data-status="Available">Available</a></li>
                                                    <li><a class="dropdown-item status-option" href="#" data-status="Not Available">Not Available</a></li>
                                                </ul>
                                            </div>
                                            <p class="text-secondary mb-1 mt-2">Doctor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body pt-4">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0 mt-1">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo htmlspecialchars($doctorAcc['first_name']) . ' ' . htmlspecialchars($doctorAcc['last_name']); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0 mt-1">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo htmlspecialchars($doctorAcc['email']); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0 mt-1">Phone Number</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo htmlspecialchars($doctorAcc['phone_number']); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0 mt-1">Specialty</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo htmlspecialchars($doctorAcc['specialty']); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0 mt-1">Medical License</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo htmlspecialchars($doctorAcc['medical_license']); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0 mt-1">ID</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary d-flex justify-content-between align-items-center">
                                            <span><?php echo htmlspecialchars($doctorAcc['professional_license_id']); ?></span>
                                            <div class="text-end">
                                                <button
                                                    class="btn btn-primary btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#viewID">View</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn btn-primary" href="">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Modal for View -->
        <div class="modal fade" id="viewID" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">License ID</h5>
                        <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close" style="border: none; background: none; font-size: 1.5rem;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="<?php echo "../uploads" . htmlspecialchars($doctorAcc['professional_license_id']); ?>" alt="License Image" class="img-fluid" width="200px">
                    </div>
                </div>
            </div>
        </div>

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


    <!-- Status -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const statusButton = document.getElementById("statusDropdown");
            const statusOptions = document.querySelectorAll(".status-option");

            statusOptions.forEach(option => {
                option.addEventListener("click", function(e) {
                    e.preventDefault();
                    let selectedStatus = this.getAttribute("data-status");

                    // Update button text
                    statusButton.textContent = selectedStatus;

                    // Change button color based on status
                    if (selectedStatus === "Available") {
                        statusButton.classList.remove("btn-secondary");
                        statusButton.classList.add("btn-success");
                    } else {
                        statusButton.classList.remove("btn-success");
                        statusButton.classList.add("btn-secondary");
                    }
                });
            });
        });
    </script>


    <!-- Modal JS -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = new bootstrap.Modal(document.getElementById("exampleModalCenter"));

            document.querySelectorAll(".open-modal").forEach(button => {
                button.addEventListener("click", function() {
                    modal.show();
                });
            });
        });
    </script>


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
                timer: 5000
            });
        </script>
    <?php
        unset($_SESSION['message']);
    endif;
    ?>

</body>

</html>