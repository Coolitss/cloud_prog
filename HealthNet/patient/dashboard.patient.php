<?php
include "../config/conn.config.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

try{
    $user = $conn->prepare("SELECT * FROM user_patient WHERE user_id = ? ");
    $user->execute([$user_id]);
    $userAcc = $user->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

$full_name = $userAcc['first_name'] . ' ' . $userAcc['last_name'];



try {
    $clinicside2 = $conn->prepare("SELECT * FROM clinic_account WHERE status = 'approved' ");
    $clinicside2->execute();
    $approvedClinic = $clinicside2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo ("Error" . $e->getMessage());
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
            <div class="d-flex align-items-center">
                <a href="dashboard.patient.php" class="logo d-flex align-items-center">
                    <img src="../assets/img/logo.png" alt="" class="me-2">
                    <span class="d-none d-lg-block">HealthNET</span>
                </a>
            </div>

            <!-- Profile & Find Nearby Clinic Section -->
            <nav class="header-nav ms-auto d-flex align-items-center">
                <!-- Find Nearby Clinic -->
                <div class="me-4">
                    <a href="find_nearby_clinic.patient.php" class="btn btn-success px-4 py-2 fw-bold rounded-pill shadow-sm"
                        style="background:rgb(36, 103, 190); border: none; transition: all 0.3s ease;">
                        <i class="bi bi-geo-alt me-2"></i>
                        <span class="d-none d-lg-inline">Find Nearby Clinic</span>
                    </a>
                </div>

                <ul class="d-flex align-items-center m-0 p-0 list-unstyled">
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="../assets/img/user.png" alt="Profile" class="rounded-circle me-2" width="35">
                            <span class="d-none d-md-block dropdown-toggle ps-1"><?php echo htmlspecialchars($full_name); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header text-center">
                                <h6><?php echo htmlspecialchars($full_name); ?></h6>
                                <span>Patient</span>
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
                                <a class="dropdown-item d-flex align-items-center" href="../auth/patient_auth/patient_logout.auth.php">
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
                <a class="nav-link collapsed" href="dashboard.patient.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link"  href="view_appointment.php">
                    <i class="bi bi-menu-button-wide"></i><span>View Appointments</span>
                </a>

            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../404/patient_activity.404.php">
                    <i class="bi bi-journal-text"></i><span>Activity</span>
                </a>

            </li><!-- End Forms Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="patient_profile.php">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.patient.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-4 g-3 justify-content-start">
                    <?php foreach ($approvedClinic as $clinic): ?>
                        <div class="col">
                            <div class="card h-100 text-center">
                                <img src="../assets/img/healthNET/1.png" class="card-img-top" alt="Clinic Image">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold flex-grow-1 d-flex align-items-center justify-content-center">
                                        <?= htmlspecialchars($clinic['clinic_name']); ?>
                                    </h5>
                                    <p class="card-text"><?= htmlspecialchars($clinic['clinic_address']); ?></p>
                                    <a href="clinic_page.patient.php?id=<?= $clinic['clinic_id']; ?>" class="btn btn-primary mt-auto">
                                        See Clinic
                                    </a>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

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