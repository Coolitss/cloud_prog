<?php
include_once "../config/conn.config.php";
session_start();

if (!isset($_SESSION['doctor_id'])) {
    header("Location: ../index.php");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

try{
    $doctor = $conn->prepare("SELECT * FROM doctor_account WHERE doctor_id = ? ");
    $doctor->execute([$doctor_id]);
    $doctorAcc = $doctor->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}


try {
    $stmt = $conn->prepare("SELECT c.*
                            FROM clinic_account c 
                            JOIN doctor_account d ON c.clinic_id = d.clinic_id
                            WHERE d.doctor_id = ? AND d.acc_stat = 'waiting'");
    $stmt->execute([$doctor_id]);
    $clinic_Invitation = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            <div class="card h-100 w-100">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Clinic Invitation</h4>
                </div>
                <div class="card-body">
                    <div class="pt-5 pb-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <table class="table table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>#</th>
                                        <th>Clinic Name</th>
                                        <th>Email</th>
                                        <th>Clinic Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($clinic_Invitation)): ?>
                                        <?php foreach ($clinic_Invitation as $index => $row): ?>
                                            <tr>
                                                <td><?php echo $index + 1; ?></td>
                                                <td><?php echo htmlspecialchars($row['clinic_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                <td><?php echo htmlspecialchars($row['clinic_address']); ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                                        <!-- Accept Invitation -->
                                                        <form action="../auth/doctor_auth/update_invitation.php" method="POST">
                                                            <input type="hidden" name="clinic_id" value="<?php echo $row['clinic_id']; ?>">
                                                            <input type="hidden" name="doctor_id" value="<?php echo $_SESSION['doctor_id']; ?>">
                                                            <input type="hidden" name="acc_stat" value="accepted">
                                                            <button type="submit" class="btn btn-success btn-sm w-auto">Accept</button>
                                                        </form>

                                                        <!-- Decline Invitation -->
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="clinic_id" value="<?php echo $row['clinic_id']; ?>">
                                                            <input type="hidden" name="doctor_id" value="<?php echo $_SESSION['doctor_id']; ?>">
                                                            <input type="hidden" name="acc_stat" value="declined">
                                                            <button type="submit" class="btn btn-danger btn-sm w-auto">Decline</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No invitations available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card h-100 w-100 mt-5">
                <div class="card-body">
                    <div class="pt-4 pb-3">
                        <h3 class="logo fw-bold border-bottom pb-2" style="color: #012970;">
                            <i class="fas fa-calendar-alt me-2"></i> Appointment List
                        </h3>
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Appointment Schedule</th>
                                    <th>Notes</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="Profile Image" style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">ClinicNameHere</p>
                                                <p class="text-muted mb-0">AddressHere</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">Consultation</p>
                                        <p class="text-muted mb-0">March 10, 2025, 10:00 AM</p>
                                    </td>
                                    <td>

                                    </td>
                                    <td><span class="badge bg-success rounded-pill">Done</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="patient_profile.doctor.php" type="button" class="btn btn-outline-primary btn-sm">View</a>
                                            <button type="button" class="btn btn-outline-secondary btn-sm">Edit</button>
                                            <button type="button" class="btn btn-outline-success btn-sm">Accept</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" alt="Profile Image" style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">Alex Ray</p>
                                                <p class="text-muted mb-0">alex.ray@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">Follow-up Consultation</p>
                                        <p class="text-muted mb-0">March 12, 2025, 2:30 PM</p>
                                    </td>
                                    <td>

                                    </td>
                                    <td><span class="badge bg-primary rounded-pill">Onboarding</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="patient_profile.doctor.php" type="button" class="btn btn-outline-primary btn-sm">View</a>
                                            <button type="button" class="btn btn-outline-secondary btn-sm">Edit</button>
                                            <button type="button" class="btn btn-outline-success btn-sm">Accept</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" alt="Profile Image" style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">Kate Hunington</p>
                                                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">Routine Checkup</p>
                                        <p class="text-muted mb-0">March 15, 2025, 9:00 AM</p>
                                    </td>
                                    <td>

                                    </td>
                                    <td><span class="badge bg-warning rounded-pill">Pending</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="patient_profile.doctor.php" type="button" class="btn btn-outline-primary btn-sm">View</a>
                                            <button type="button" class="btn btn-outline-secondary btn-sm">Edit</button>
                                            <button type="button" class="btn btn-outline-success btn-sm">Accept</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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