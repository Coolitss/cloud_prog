<?php
include_once "../config/conn.config.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}


if (isset($_GET['id'])) {
    $_SESSION['clinic_id'] = $_GET['id'];
    $clinic_id = $_SESSION['clinic_id'];
}
$clinic_id = $_SESSION['clinic_id'];
$user_id = $_SESSION['user_id'];

try {
    $clinicc = $conn->prepare("SELECT * FROM clinic_account WHERE clinic_id = ? AND status = 'approved' ");
    $clinicc->execute([$clinic_id]);
    $clinicAcc = $clinicc->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $user = $conn->prepare("SELECT * FROM user_patient WHERE user_id = ? ");
    $user->execute([$user_id]);
    $userAcc = $user->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$full_name = $userAcc['first_name'] . ' ' . $userAcc['last_name'];

try {
    $stmt = $conn->prepare("
    SELECT da.doctor_id, da.first_name, da.last_name, da.specialty 
    FROM doctor_account da
    JOIN clinic_account ca ON da.clinic_id = ca.clinic_id
    WHERE da.clinic_id = ? AND da.acc_stat = 'accepted'
");

    $stmt->execute([$clinic_id]);

    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper.js (Required for Dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>


    <!-- Template Main CSS File -->
    <link href="../assets/css/NiceAdminstyles.css" rel="stylesheet">

    <style>
        .card {
            max-height: 100vh;
        }

        .card-img-top {
            height: 350px;
            object-fit: cover;
        }

        .form-contact label {
            color: #999999;
            font-size: 14px;
        }

        .form-contact input {
            max-width: 450px;
            width: 340px;
        }

        .form-contact .form-group {
            margin-bottom: 30px;
            color: #999999;
        }

        .form-contact .form-control {
            border: 1px solid #e5e6e9;
            border-radius: 5px;
            height: 38px;
            padding-left: 18px;
            font-size: 13px;
            background: transparent;
            color: #999999 !important;
            font-family: 'Work Sans', sans-serif;
        }


        .form-contact input::placeholder,
        .form-contact textarea::placeholder {
            color: #999999 !important;
            opacity: 1;
        }

        .form-contact select {
            color: #999999 !important;
        }

        .form-contact select option {
            color: black !important;
        }

        .form-contact textarea {
            border-radius: 5px;
            width: 100%;
            height: 120px;
            padding: 10px;
            font-size: 13px;
            background: transparent;
            color: #999999 !important;
        }

        .otp-input {
            width: 40px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border: 2px solid #999999;
            border-radius: 8px;
            outline: none;
            transition: all 0.2s ease-in-out;
        }

        .otp-input:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
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
                                <a class="dropdown-item d-flex align-items-center" href="../auth/logout.php">
                                    <i class="bi bi-box-arrow-right me-2"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>
    </header><!-- End Header -->

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
                    <li class="breadcrumb-item"><a href="dashboard.patient.php?page=dashboard_page">Dashboard</a></li>
                    <li class="breadcrumb-item active">Clinic</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card mb-3">
                <img src="<?php echo "../uploads/" . htmlspecialchars($clinicAcc['business_permit']); ?>" class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($clinicAcc['clinic_name']); ?></h5>
                    <p class="card-text">Location: <?php echo htmlspecialchars($clinicAcc['clinic_address']); ?></p>
                    <p class="card-text">Email: <?php echo htmlspecialchars($clinicAcc['email']); ?></p>
                    <p class="card-text">Contact Number: <?php echo htmlspecialchars($clinicAcc['contact_number']); ?></p>
                    <div class="mt-auto d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fi fi-tr-edit-message fs-6"></i> Chat with Doctor
                        </button>
                        <button type="button" class="btn btn-primary" id="openModalBtn" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                            <i class="fi fi-tr-discover fs-6"></i> Book Appointment
                        </button>

                    </div>
                </div>
            </div>
        </section>

        <section class="section dashboard">
            <div class="card mb-3">

                <div class="card-body">
                    <h5 class="card-title">Available Specialist</h5>
                    <div class="row">
                        <ul class="nav d-flex flex-row overflow-auto" id="myTab" role="tablist"
                            style="white-space: nowrap; overflow-x: auto; display: flex; gap: 10px; padding: 10px;">

                            <!-- Anesthesiology -->
                            <li class="nav-item">
                                <div class="card text-center p-2 shadow-sm" style="max-width: 200; height: 60px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <a class="nav-link active" id="anes-tab" data-toggle="tab" href="#anes" role="tab"
                                        aria-controls="anes" aria-selected="true" style="text-decoration: none;">
                                        <i class="fi fi-tr-syringe" style="font-size: 20px;"></i>
                                        <h6 class="mt-1 fw-bold" style="font-size: 14px; color:#2D336B">Anesthesiology</h6>
                                    </a>
                                </div>
                            </li>

                            <!-- Cardiology -->
                            <li class="nav-item">
                                <div class="card text-center p-2 shadow-sm" style="max-width: 200; height: 60px;border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <a class="nav-link" id="cardio-tab" data-toggle="tab" href="#cardio" role="tab"
                                        aria-controls="cardio" aria-selected="false" style="text-decoration: none;">
                                        <i class="fi fi-tr-heart-rate" style="font-size: 20px;"></i>
                                        <h6 class="mt-1 fw-bold" style="font-size: 14px; color:#2D336B">Cardiology</h6>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="card text-center p-2 shadow-sm" style="max-width: 200; height: 60px;border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <a class="nav-link" id="derma-tab" data-toggle="tab" href="#derma" role="tab"
                                        aria-controls="derma" aria-selected="false" style="text-decoration: none;">
                                        <i class="fi fi-ts-beauty-mask" style="font-size: 20px;"></i>
                                        <h6 class="mt-1 fw-bold" style="font-size: 14px; color:#2D336B">Dermatology</h6>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="card text-center p-2 shadow-sm" style="max-width: 200; height: 60px;border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <a class="nav-link" id="ortho-tab" data-toggle="tab" href="#ortho" role="tab"
                                        aria-controls="ortho" aria-selected="false" style="text-decoration: none;">
                                        <i class="fi fi-tr-bone-break" style="font-size: 20px;"></i>
                                        <h6 class="mt-1 fw-bold" style="font-size: 14px; color:#2D336B">Orthopedics</h6>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="card text-center p-2 shadow-sm" style="max-width: 200; height: 60px;border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <a class="nav-link" id="neuro-tab" data-toggle="tab" href="#neuro" role="tab"
                                        aria-controls="neuro" aria-selected="false" style="text-decoration: none;">
                                        <i class="fi fi-ts-head-side-brain" style="font-size: 20px;"></i>
                                        <h6 class="mt-1 fw-bold" style="font-size: 14px; color:#2D336B">Neurology</h6>
                                    </a>
                                </div>
                            </li>
                        </ul>



                        <div class="col-lg-8 m-5">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="anes" role="tabpanel" aria-labelledby="anes">
                                    <!-- single_content  -->
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="dept_thumb">
                                                <img src="../assets/img/department/1.jpg" alt="" width="250px">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="dept_info">
                                                <h3>Anesthesiology <br></h3>
                                                <p>Clinics offering anesthesiology services ensure patient comfort and safety during minor surgeries, diagnostic procedures, and pain management treatments. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single_content  -->
                                </div>

                                <div class="tab-pane fade" id="cardio" role="tabpanel" aria-labelledby="cardio-tab">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="dept_thumb">
                                                <img src="../assets/img/department/1.jpg" alt="" width="250px">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="dept_info">
                                                <h3>Cardiology</h3>
                                                <p>Cardiology in a clinical setting focuses on the prevention, diagnosis, and treatment of heart-related conditions...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="derma" role="tabpanel" aria-labelledby="dermatology-tab">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="dept_thumb">
                                                <img src="../assets/img/department/1.jpg" alt="" width="250px">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="dept_info">
                                                <h3>Dermatology</h3>
                                                <p>Dermatology clinics specialize in the diagnosis, treatment, and prevention of skin, hair, and nail conditions...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="ortho" role="tabpanel" aria-labelledby="orthopedics-tab">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="dept_thumb">
                                                <img src="../assets/img/department/1.jpg" alt="" width="250px">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="dept_info">
                                                <h3>Orthopedics</h3>
                                                <p>Orthopedic clinics specialize in diagnosing, treating, and preventing conditions affecting the musculoskeletal system...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="neuro" role="tabpanel" aria-labelledby="neurology-tab">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="dept_thumb">
                                                <img src="../assets/img/department/1.jpg" alt="" width="250px">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="dept_info">
                                                <h3>Neurology</h3>
                                                <p>Neurology clinics specialize in diagnosing, treating, and managing disorders of the nervous system...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- Modal for Appointment Booking -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content p-4" style="max-height: 110vh; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title">Book an Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <!-- Centered Logo -->
                    <div class="text-center">
                        <img src="../assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-3" style="width: 100px;">
                    </div>

                    <form class="form-contact" action="../auth/patient_auth/book_appointment.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold pt-5">Preferred Date</label>
                                    <input type="date" class="form-control" name="date" required>
                                </div>
                                <div class="form-group">
                                    <label for="doctor" class="form-label fw-bold">Choose Doctor</label>
                                    <select class="form-select" id="doctor" name="doctor" required>
                                        <option value="" disabled selected>-- Select a Doctor --</option>
                                        <?php foreach ($doctors as $doctor): ?>
                                            <option value="<?= "Dr." . ' ' . htmlspecialchars($doctor['first_name']) . ' ' . htmlspecialchars($doctor['last_name']) . "(" . htmlspecialchars($doctor['specialty']) . ")"; ?>">
                                                <?= "Dr. " . ' ' . htmlspecialchars($doctor['first_name']) . ' ' . htmlspecialchars($doctor['last_name']) ?>
                                                (<?= htmlspecialchars($doctor['specialty']); ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_number" placeholder="Enter contact number" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Reason for Appointment</label>
                                    <textarea class="form-control" name="reason" placeholder="Briefly describe your reason for visiting..." required style="height: 85px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Preferred Time</label>
                                    <input type="time" class="form-control" name="time" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Estimated Expenses</label>
                                    <input type="text" class="form-control" name="total_expense" value="300-750" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="modal-footer border-0 d-flex flex-column">
                            <button type="submit" class="btn btn-primary btn-block" name="book_appointment">
                                Book Appointment
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Chat with Doctor -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-white border-bottom">
                    <h5 class="modal-title text-dark fw-bold" id="exampleModalLabel">Chat With Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> <!-- Updated for better contrast -->

                    <!-- Doctor List -->
                    <div class="doctor-list">
                        <!-- Doctor 1 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1 text-dark">Dr. Adrian Castillo</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Adrian C.
                                </a>
                                <a href="tel:09124567890" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0912-456-7890
                                </a>
                            </div>
                        </div>

                        <!-- Doctor 2 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1">Dr. Bianca Ramirez</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Bianca R.
                                </a>
                                <a href="tel:09235678901" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0923-567-8901
                                </a>
                            </div>
                        </div>

                        <!-- Doctor 3 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/3.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1">Dr. Carlo Mendoza</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Carlo M.
                                </a>
                                <a href="tel:09346789012" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0934-678-9012
                                </a>
                            </div>
                        </div>

                        <!-- Doctor 4 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1">Dr. Diana Cruz</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Diana C.
                                </a>
                                <a href="tel:09457890123" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0945-789-0123
                                </a>
                            </div>
                        </div>

                        <!-- Doctor 5 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1">Dr. Ethan Reyes</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Ethan R.
                                </a>
                                <a href="tel:09568901234" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0956-890-1234
                                </a>
                            </div>
                        </div>

                        <!-- Doctor 6 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1">Dr. Fiona Santos</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Fiona S.
                                </a>
                                <a href="tel:09679012345" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0967-901-2345
                                </a>
                            </div>
                        </div>

                        <!-- Doctor 7 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1">Dr. Gabriel Torres</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Gabriel T.
                                </a>
                                <a href="tel:09780123456" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0978-012-3456
                                </a>
                            </div>
                        </div>

                        <!-- Doctor 8 -->
                        <div class="d-flex align-items-center mb-3 p-3 border rounded bg-light">
                            <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                            <div>
                                <h6 class="mb-1">Dr. Hannah Villanueva</h6>
                                <a href="https://www.facebook.com/" class="d-block text-primary">
                                    <i class="fi fi-brands-facebook me-1"></i>Hannah V.
                                </a>
                                <a href="tel:09891234567" class="d-block text-dark">
                                    <i class="fi fi-rr-phone-call me-1"></i>0989-123-4567
                                </a>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="modal-footer bg-white border-top">
                    <button type="button" class="btn btn-primary w-100 fw-semibold" style="background-color: #007BFF; border-color: #0056B3;" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>




    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <script>
                document.write(new Date().getFullYear());
            </script> HealthNET. All rights reserved.
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Modals -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));

            // Open modal when button is clicked
            document.getElementById("openModalButton").addEventListener("click", function() {
                myModal.show();
            });

            // Close modal manually if needed
            document.getElementById("closeModalButton").addEventListener("click", function() {
                myModal.hide();
            });
        });
    </script>

    <!-- Script for Switching -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'));
            triggerTabList.forEach(function(triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl);
                triggerEl.addEventListener('click', function(event) {
                    event.preventDefault();
                    tabTrigger.show();
                });
            });
        });
    </script>


    <!-- Script For Book Appointment -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let appointmentModal = document.getElementById("appointmentModal");
            let otpModal = document.getElementById("otpModal");

            function removeBackdrops() {
                document.querySelectorAll(".modal-backdrop").forEach(backdrop => {
                    backdrop.remove();
                });
                document.body.classList.remove("modal-open");
            }

            // Reset modal content when reopened
            appointmentModal.addEventListener("show.bs.modal", function() {
                removeBackdrops(); // Ensure no leftover dark backgrounds
                this.style.display = "block"; // Force display modal
                setTimeout(() => {
                    this.classList.add("show");
                }, 200); // Small delay for animation fix
            });

            // Hide modal properly
            appointmentModal.addEventListener("hidden.bs.modal", function() {
                removeBackdrops();
                this.classList.remove("show");
                this.style.display = "none";

            });

            otpModal.addEventListener("hidden.bs.modal", function() {
                removeBackdrops();
                location.reload();
            });

            // Ensure OTP inputs work properly
            document.querySelectorAll(".otp-input").forEach((input, index, arr) => {
                input.addEventListener("input", function() {
                    if (this.value.length === 1 && index < arr.length - 1) {
                        arr[index + 1].focus();
                    }
                });

                input.addEventListener("keydown", function(e) {
                    if (e.key === "Backspace" && this.value.length === 0 && index > 0) {
                        arr[index - 1].focus();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#appointmentForm').submit(function(e) {
                e.preventDefault();
                $.post('book_appointment.php', $(this).serialize(), function(response) {
                    let res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('#otpModal').show();
                    } else {
                        alert(res.message);
                    }
                });
            });

            $('#verifyOtp').click(function() {
                let otp = $('#otp').val();
                $.post('verify_otp.php', {
                    otp: otp
                }, function(response) {
                    let res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert("Appointment confirmed!");
                        window.location.href = 'dashboard.php';
                    } else {
                        alert("Invalid OTP.");
                    }
                });
            });
        });
    </script>


    <!-- Bootstrap JS (Ensure it's included) -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- For Bootstrap 4 (Optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

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

</html>s