<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HealthNet</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- flaticon -->

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="assets/css/landingstylesss.css">

</head>


<body>
    
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo-img">
                                <a href="#">
                                    <img src="assets/img/HNLogo.png" style="width: 113px;" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="menu_wrap d-none d-lg-block">
                                <div class="menu_wrap_inner d-flex align-items-center justify-content-end">
                                    <div class="book_room">
                                        <div class="book_btn">
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Create Account
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#login_admin">Login as Admin</a></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#login_clinic">Login as Clinic</a></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#login_doctor">Login as Doctor</a></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#login_patient">Login as Patient</a></li>
                                                </ul>
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
    </header>
    <!-- header-end -->

    <!-- Modal for Login Admin -->
    <div class="modal fade" id="login_admin" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Login as Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Centered Logo -->
                    <div class="text-center">
                        <img src="assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-2" style="width: 100px;">
                    </div>

                    <form action="auth/admin_auth/loginAdmin.auth.php" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" name="email" autofocus placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="pw" placeholder="Enter your password" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block" name="admin-login">Login</button>
                            <!-- <a href="#" class="switch-modal" data-target="#register_patient">Not yet registered? Register</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Login Clinic -->
    <div class="modal fade" id="login_clinic" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Login as Clinic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Centered Logo -->
                    <div class="text-center">
                        <img src="assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-2" style="width: 100px;">
                    </div>

                    <form action="auth/clinic_auth/loginClinic.auth.php" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block" name="login_clinic">Login</button>
                            <a href="#register_clinic" class="switch-modal" data-target="#register_clinic">Not yet registered? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Register Clinic -->
    <div class="modal fade" id="register_clinic" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content p-4" style="max-height: 110vh; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalToggleLabel">Register as Clinic (Part 1)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="text-center">
                        <img src="assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-3" style="width: 100px;">
                    </div>

                    <form id="register-form-clinic" action="auth/clinic_auth/registerClinic.auth.php" method="POST"  enctype="multipart/form-data">
                        <div class="row">

                            <!-- Left Side -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Clinic Name</label>
                                    <input type="text" class="form-control" name="clinic_name" placeholder="Enter clinic name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact" placeholder="Enter contact number" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Operating Hours</label>
                                    <input type="text" class="form-control" name="operating_hours" placeholder="Enter operating hours" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Upload Accreditation Certificate</label>
                                    <input type="file" class="form-control" name="accreditation_certificate" required accept=".pdf,.docx,.png,.jpeg,.jpg">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Clinic Address</label>
                                    <input type="text" class="form-control" name="clinic_address" placeholder="Clinic Location Based on Google Map" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Administrator's Name</label>
                                    <input type="text" class="form-control" name="owner_name" placeholder="Enter owner name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Upload Business Permit</label>
                                    <input type="file" class="form-control" name="business_permit" required accept=".pdf,.docx,.png,.jpeg,.jpg">
                                </div>
                                <!-- <div class="form-group">
                                    <label class="font-weight-bold">Field of Medicine</label>
                                    <select class="form-control">
                                        <option selected disabled>Select field of medicine</option>
                                        <option>General Practitioner</option>
                                        <option>Cardiology</option>
                                        <option>Dermatology</option>
                                        <option>Neurology</option>
                                        <option>Pediatrics</option>
                                        <option>Psychiatry</option>
                                        <option>Orthopedics</option>
                                        <option>Radiology</option>
                                        <option>Urology</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label class="font-weight-bold">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="cpw" placeholder="Confirm password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Register Button -->
                        <div class="modal-footer border-0 d-flex flex-column">
                            <button type="submit" class="btn btn-primary btn-block" name="register-clinic">Register</button>
                            <a href="#login_clinic" class="switch-modal" data-target="#login_clinic">Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Login Doctor -->
    <div class="modal fade" id="login_doctor" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Login as Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Centered Logo -->
                    <div class="text-center">
                        <img src="assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-2" style="width: 100px;">
                    </div>

                    <form action="auth/doctor_auth/loginDoctor.auth.php" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block" name="doctor_login">Login</button>
                            <a href="#register_doctor" class="switch-modal" data-target="#register_doctor">Not yet registered? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Register Doctor-->
    <div class="modal fade" id="register_doctor" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content p-4" style="max-height: 110vh; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title">Register as Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Centered Logo -->
                    <div class="text-center">
                        <img src="assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-3" style="width: 100px;">
                    </div>

                    <form action="auth/doctor_auth/registerDoctor.auth.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Medical License Number</label>
                                    <input type="text" class="form-control" name="license_number" placeholder="Medical License Number" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Upload Professional License & ID</label>
                                    <input type="file" class="form-control" name="professional_license_id" required>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone_number" placeholder="Enter phone number" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Specialty</label>
                                    <input type="text" class="form-control" name="specialty" placeholder="Enter your specialty" required>
                                </div>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="modal-footer border-0 d-flex flex-column">
                            <button type="submit" class="btn btn-primary btn-block" name="register-doctor">Register</button>
                            <a href="#login_doctor" class="switch-modal" data-target="#login_doctor">Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Login Patient -->
    <div class="modal fade" id="login_patient" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Login as Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Centered Logo -->
                    <div class="text-center">
                        <img src="assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-2" style="width: 100px;">
                    </div>

                    <form action="auth/login.php" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="pw" placeholder="Enter your password" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block" name="patient-login">Login</button>
                            <a href="#" class="switch-modal" data-target="#register_patient">Not yet registered? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Register Patient-->
    <div class="modal fade" id="register_patient" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content p-4" style="max-height: 110vh; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title">Register as Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Centered Logo -->
                    <div class="text-center">
                        <img src="assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-3" style="width: 100px;">
                    </div>

                    <form action="auth/register.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" required>
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
                                    <label class="font-weight-bold pt-3">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_number" placeholder="Enter contact number" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">National ID(Required)</label>
                                    <input type="file" class="form-control" name="national_id" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Home Address(Optional)</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter address">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">PhilHealth ID(Optional)</label>
                                    <input type="file" class="form-control" name="philhealth_id">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="cpw" placeholder="Confirm password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="modal-footer border-0 d-flex flex-column">
                            <button type="submit" class="btn btn-primary btn-block" name="register-patient">Register</button>
                            <a href="#" class="switch-modal" data-target="#login_patient">Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <!-- slider_area_start -->
    <div class="slider_area mt-5">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text">
                                <h3> <span>Health Net</span> <br>
                                    "Strengthening Community Access to Medical Resources."</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- welcome_clicnic_area_start -->
    <div class="welcome_clicnic_area" id="clinic_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="assets/img/HealthNET/hero1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h3>Welcome To
                            <span>HealthNet.</span>
                        </h3>
                        <p>Enable users to find nearby clinics and book appointments.
                            Provide clinics with tools to manage appointments and clinic details.</p>
                        <ul>
                            <li><i class="fa-solid fa-location-dot"></i>Finding Nearby Clinics. </li>
                            <li><i class="fa-regular fa-calendar-check"></i> Appointment booking and management. </li>
                            <li><i class="fa-regular fa-face-smile"></i> User reviews and ratings. </li>
                            <li><i class="fa-regular fa-bell"></i> Notification system for reminders and updates. </li>

                        </ul>
                        <!-- <a href="about.html" class="boxed-btn6">About us</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_clicnic_area_end -->

    <!-- depertment_area_start  -->
    <div class="depertment_area">
        <div class="container">
            <div class="row custom_align align-items-end justify-content-between">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Specialists Information</h3>
                        <p>Types of Doctors and their Informations</p>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="learn_more_btn text-right">
                        <a href="#" class="boxed-btn">Learn more</a>
                    </div>
                </div> -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="depart_ment_tab mb-30">
                        <ul class="nav d-flex flex-row overflow-auto" id="myTab" role="tablist"
                            style="white-space: nowrap; overflow-x: auto; display: flex;">
                            <li class="nav-item">
                                <a class="nav-link active" id="anes-tab" data-toggle="tab" href="#anes" role="tab" aria-controls="anes" aria-selected="true">
                                    <i class="fi fi-tr-syringe"></i>
                                    <h4>Anesthesiology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="cardio-tab" data-toggle="tab" href="#cardio" role="tab" aria-controls="cardio" aria-selected="false">
                                    <i class="fi fi-tr-heart-rate"></i>
                                    <h4>Cardiology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="derma-tab" data-toggle="tab" href="#derma" role="tab" aria-controls="derma" aria-selected="false">
                                    <i class="fi fi-ts-beauty-mask"></i>
                                    <h4>Dermatology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ortho-tab" data-toggle="tab" href="#ortho" role="tab" aria-controls="ortho" aria-selected="false">
                                    <i class="fi fi-tr-bone-break"></i>
                                    <h4>Orthopedics</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="neuro-tab" data-toggle="tab" href="#neuro" role="tab" aria-controls="neuro" aria-selected="false">
                                    <i class="fi fi-ts-head-side-brain"></i>
                                    <h4>Neurology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="onco-tab" data-toggle="tab" href="#onco" role="tab" aria-controls="onco" aria-selected="false">
                                    <i class="fi fi-tr-lungs-virus"></i>
                                    <h4>Oncology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="psy-tab" data-toggle="tab" href="#psy" role="tab" aria-controls="psy" aria-selected="false">
                                    <i class="fi fi-ts-treatment"></i>
                                    <h4>Psychiatry</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="radio-tab" data-toggle="tab" href="#radio" role="tab" aria-controls="radio" aria-selected="false">
                                    <i class="fi fi-ts-x-ray"></i>
                                    <h4>Radiology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gas-tab" data-toggle="tab" href="#gas" role="tab" aria-controls="gas" aria-selected="false">
                                    <i class="fi fi-tr-stomach"></i>
                                    <h4>Gastroenterology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="uro-tab" data-toggle="tab" href="#uro" role="tab" aria-controls="uro" aria-selected="false">
                                    <i class="fi fi-ts-kidneys"></i>
                                    <h4>Urology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="surg-tab" data-toggle="tab" href="#surg" role="tab" aria-controls="surg" aria-selected="false">
                                    <i class="fi fi-ts-scalpel-path"></i>
                                    <h4>Surgeons</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="endo-tab" data-toggle="tab" href="#endo" role="tab" aria-controls="endo" aria-selected="false">
                                    <i class="fi fi-ts-head-side-virus"></i>
                                    <h4>Endocrinology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="neph-tab" data-toggle="tab" href="#neph" role="tab" aria-controls="neph" aria-selected="false">
                                    <i class="fi fi-tr-kidneys"></i>
                                    <h4>Nephrology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="opht-tab" data-toggle="tab" href="#opht" role="tab" aria-controls="opht" aria-selected="false">
                                    <i class="fi fi-ts-magnifying-glass-eye"></i>
                                    <h4>Ophthalmology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hema-tab" data-toggle="tab" href="#hema" role="tab" aria-controls="hema" aria-selected="false">
                                    <i class="fi fi-tr-blood"></i>
                                    <h4>Hematology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pedia-tab" data-toggle="tab" href="#pedia" role="tab" aria-controls="pedia" aria-selected="false">
                                    <i class="fi fi-tr-stethoscope"></i>
                                    <h4>Pediatrics</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pulmo-tab" data-toggle="tab" href="#pulmo" role="tab" aria-controls="pulmo" aria-selected="false">
                                    <i class="fi fi-tr-lungs"></i>
                                    <h4>Pulmonology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="rheu-tab" data-toggle="tab" href="#rheu" role="tab" aria-controls="rheu" aria-selected="false">
                                    <i class="fi fi-ts-broken-arm"></i>
                                    <h4>Rheumatology</h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>




            <div class="dept_main_info white-bg">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="anes" role="tabpanel" aria-labelledby="anes">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
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
                                    <img src="assets/img/department/1.jpg" alt="">
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
                                    <img src="assets/img/department/1.jpg" alt="">
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
                                    <img src="assets/img/department/1.jpg" alt="">
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
                                    <img src="assets/img/department/1.jpg" alt="">
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

                    <div class="tab-pane fade" id="onco" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Oncology <br> </h3>
                                    <p>Oncology clinics specialize in the prevention, diagnosis, and treatment of cancer. These clinics provide comprehensive care, including early detection, personalized treatment plans, and supportive therapies to improve patient outcomes and quality of life.</p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="psy" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Psychiatry <br> </h3>
                                    <p>Psychiatry clinics specialize in diagnosing, treating, and managing mental health conditions to improve emotional well-being and overall quality of life. These clinics provide personalized treatment plans using therapy, medication management, and holistic approaches to mental health care. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="radio" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Radiology <br> </h3>
                                    <p>Radiology clinics specialize in imaging and diagnostic services to help detect, monitor, and manage a wide range of medical conditions. Using advanced imaging technologies, these clinics provide accurate and timely results for patients and healthcare providers. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="gas" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Gastroenterology<br> </h3>
                                    <p>Gastroenterology clinics specialize in diagnosing, treating, and managing disorders of the digestive system, including the esophagus, stomach, intestines, liver, pancreas, and gallbladder. These clinics provide expert care to help patients maintain digestive health and manage gastrointestinal (GI) conditions. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="uro" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Urology <br> </h3>
                                    <p>Urology clinics specialize in diagnosing, treating, and managing conditions related to the urinary tract and male reproductive system. These clinics provide expert care for both men and women, addressing issues ranging from urinary infections to kidney and prostate health. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="surg" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Surgeons <br> </h3>
                                    <p>Surgical clinics specialize in performing minor to moderate surgical procedures in an outpatient setting, offering patients a convenient and efficient alternative to hospital-based surgery. These clinics focus on safe, high-quality surgical care with shorter recovery times. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="endo" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Endocrinology <br> </h3>
                                    <p>Endocrinology clinics specialize in diagnosing, treating, and managing disorders related to hormones and the endocrine system, which includes the thyroid, pancreas, adrenal glands, and reproductive organs. These clinics provide expert care to help patients maintain hormonal balance and overall well-being. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="neph" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Nephrology <br> </h3>
                                    <p>Nephrology clinics specialize in diagnosing, treating, and managing diseases related to the kidneys. These clinics provide expert care to help patients maintain kidney function, prevent complications, and manage chronic kidney conditions. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="opht" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Ophthalmology <br> </h3>
                                    <p>Ophthalmology clinics specialize in diagnosing, treating, and managing eye diseases and vision disorders. These clinics provide both medical and surgical eye care to help patients maintain optimal vision and eye health. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="hema" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Hematology <br> </h3>
                                    <p>Hematology clinics specialize in diagnosing, treating, and managing blood disorders and diseases affecting the bone marrow, lymphatic system, and clotting mechanisms. These clinics provide expert care to help patients maintain healthy blood function and prevent complications. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="pedia" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Pediatrics <br> </h3>
                                    <p>Pediatrics clinics specialize in the medical care of infants, children, and adolescents, focusing on preventive care, early diagnosis, and treatment of childhood illnesses and developmental concerns. These clinics provide comprehensive and compassionate healthcare tailored to young patients. </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="pulmo" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Pulmonology <br> </h3>
                                    <p>Pulmonology clinics specialize in diagnosing, treating, and managing conditions related to the respiratory system, including the lungs and airways. These clinics provide expert care to help patients breathe easier and improve lung health.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="rheu" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="assets/img/department/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Rheumatology <br> </h3>
                                    <p>Rheumatology clinics specialize in diagnosing, treating, and managing autoimmune and inflammatory conditions that affect the joints, muscles, and connective tissues. These clinics provide expert care to help patients manage chronic pain, reduce inflammation, and improve mobility. </p>
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- depertment_area_end  -->

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6">
                    <div class="section_title mb-55 text-center">
                        <h3>Developers</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p> -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="single_expert">
                        <div class="expert_thumb">
                            <img src="assets/img/experts/Pogi.jpg" alt="" height="430px">
                        </div>
                        <div class="experts_name text-center">
                            <h3>Florence Facton</h3>
                            <span>Developer</span>
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-twitter-alt-circle"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-instagram"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="single_expert">
                        <div class="expert_thumb">
                            <img src="assets/img/developers/cedric.jpg" alt="" height="430px">
                        </div>
                        <div class="experts_name text-center">
                            <h3>John Cedric Cabillon</h3>
                            <span>Developer</span>
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-twitter-alt-circle"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-instagram"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

                    <div class="single_expert">
                        <div class="expert_thumb">
                            <img src="assets/img/experts/3.png" alt="" height="430px">
                        </div>
                        <div class="experts_name text-center">
                            <h3>Missy Jimenez</h3>
                            <span>Documentator</span>
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-twitter-alt-circle"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-brands-instagram"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->

    <!-- <div class="book_apointment_area">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="popup_box ">
                        <div class="popup_inner">
                            <h3>
                                Book an
                                <span>Appointment</span>
                            </h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <select class="form-select wide" id="default-select" class="">
                                            <option data-display="Please select doctor to visit">Please select doctor to visit </option>
                                            <option value="1">Anaf</option>
                                            <option value="2">Nayna Therapy</option>
                                            <option value="3">Nadif</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" placeholder="Your name ">
                                    </div>
                                    <div class="col-xl-3">
                                        <input type="text" placeholder="Your age">
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="text" placeholder="Phone number ">
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="email" placeholder="Email Address">
                                    </div>
                                    <div class="col-xl-6">
                                        <input class="datepicker" placeholder="Appointment Date">
                                    </div>
                                    <div class="col-xl-6">
                                        <input class="timepicker" placeholder="Suitable time">
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="boxed-btn3">Make an Appointment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- quality_area_start  -->
    <div class="quality_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6">
                    <div class="section_title mb-55 text-center">
                        <h3>HealthNET Features</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

                    <div class="single_quality">
                        <div class="icon">
                            <i class="fa-solid fa-magnifying-glass-location"></i>
                        </div>
                        <h3>Find Nearby Clinic</h3>
                        <p>Location-based clinic search using Google Maps API.
                            Filters for clinic type, ratings, services offered, and distance.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

                    <div class="single_quality">
                        <div class="icon">
                            <i class="fa-regular fa-calendar-check mr-2 "></i>
                        </div>
                        <h3>Book Appointment</h3>
                        <p>View available slots for appointments.
                            Book, reschedule, or cancel appointments easily.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

                    <div class="single_quality">
                        <div class="icon">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <h3>Search Doctor</h3>
                        <p>Search by specialty, name, location, and availability. Doctor availability status (On duty, on leave, emergency-only, etc.)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- quality_areaend  -->

    <!-- Emergency_contact start -->
    <!-- <div class="Emergency_contact">
        <div class="Emergency_contact_inner ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="single_emergency">
                            <div class="info">
                                <span>We are here for you</span>
                                <h3>Book Appointment</h3>
                            </div>
                            <div class="info_button">
                                <a href="#" class="boxed-btn3-white">Book Appointment
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_emergency align-items-center d-flex justify-content-end">
                            <div class="icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="info">
                                <span>Emergency Medical Care</span>
                                <h3>+1-465 4545</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Emergency_contact end -->

    <footer class="footer">
        <div class="footer_top">
            <div class="container-fluid"> <!-- Full-width for alignment -->
                <div class="row d-flex justify-content-between">
                    <!-- Left Section: Logo & Social Links -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#"><img src="assets/img/HNLogo.png" alt="HealthNET Logo" width="150px"></a>
                                <p class="address_text">"Strengthening Community Access to Medical Resources."</p>
                            </div>
                            <div class="footer_links">
                                <ul class="d-flex list-unstyled gap-3">
                                    <li><a href="#"><i class="fi fi-brands-facebook"></i></a></li>
                                    <li><a href="#"><i class="fi fi-brands-twitter-alt-circle"></i></a></li>
                                    <li><a href="#"><i class="fi fi-brands-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Section: Quick Links -->
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="footer_widget">
                            <h3 class="footer_title">Quick Access</h3>
                            <ul class="">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Find a Clinic</a></li>
                                <li><a href="#">Book Appointment</a></li>
                                <li><a href="#">Search Doctor</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Section: Contact Information -->
                    <div class="col-lg-4 col-md-6 text-end">
                        <div class="footer_widget">
                            <h3 class="footer_title">Contact Information</h3>
                            <ul class="contact_info list-unstyled">
                                <li><strong>Address:</strong> Iloilo City</li>
                                <li><strong>Phone:</strong> 123-456-789</li>
                                <li><strong>Email:</strong> <a href="mailto:HealthNETdev.com">HealthNETdev.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="copy-right_text">
            <div class="container-fluid">
                <div class="bordered_1px"></div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="copy_right">
                            &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> HealthNET. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <!-- link that opens popup -->

    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>
                    Book an
                    <span>Appointment</span>
                </h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-12">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Please select doctor to visit">Please select doctor to visit </option>
                                <option value="1">Anaf</option>
                                <option value="2">Nayna Therapy</option>
                                <option value="3">Nadif</option>
                            </select>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" placeholder="Your name ">
                        </div>
                        <div class="col-xl-3">
                            <input type="text" placeholder="Your age">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Phone number ">
                        </div>
                        <div class="col-xl-6">
                            <input type="email" placeholder="Email Address">
                        </div>
                        <div class="col-xl-6">
                            <input class="datepicker" placeholder="Appointment Date">
                        </div>
                        <div class="col-xl-6">
                            <input class="timepicker" placeholder="Suitable time">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Make an Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- Js for Modal Clinic -->


    <!-- JS For Modal -->

    <!-- Font Awesome for Eye Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Handle switching between modals
            document.querySelectorAll(".switch-modal").forEach(link => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    let targetModal = this.getAttribute("data-target");

                    $(".modal").modal("hide"); // Hide any open modal

                    $(".modal").on("hidden.bs.modal", function() {
                        $(targetModal).modal("show"); // Show the target modal
                        $(".modal").off("hidden.bs.modal"); // Prevent multiple event bindings
                    });
                });
            });

            // Ensure modals remove backdrops properly when closed
            $(".modal").on("hidden.bs.modal", function() {
                $("body").removeClass("modal-open"); // Remove class preventing scroll
                $(".modal-backdrop").remove(); // Remove any lingering modal-backdrop
            });

            // password toggle visibility
            document.querySelectorAll(".toggle-password").forEach(button => {
                button.addEventListener("click", function() {
                    let input = this.closest(".input-group").querySelector("input");
                    input.type = input.type === "password" ? "text" : "password";
                    this.firstElementChild.classList.toggle("fa-eye-slash");
                });
            });
        });

        $(document).ready(function() {
            $(".dropdown-toggle").on("click", function(e) {
                var $dropdown = $(this).next(".dropdown-menu");

                if ($dropdown.hasClass("show")) {
                    $dropdown.removeClass("show"); // Close if already open
                } else {
                    $(".dropdown-menu").removeClass("show"); // Close other open dropdowns
                    $dropdown.addClass("show"); // Open this one
                }

                return false; // Prevents default behavior
            });

            // Close dropdown when clicking outside
            $(document).on("click", function(e) {
                if (!$(e.target).closest(".dropdown").length) {
                    $(".dropdown-menu").removeClass("show");
                }
            });
        });
    </script>
    <!-- Include jQuery (Required for Bootstrap Modals to Work) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Bootstrap JS (Ensure it's included) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






    <!-- JS here -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/scrollIt.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/gijgo.min.js"></script>
    
    <!--contact js-->
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/mail-script.js"></script>


    <script src="assets/js/main.js"></script>
    <script>
        document.querySelector(".slider_bg_1").style.filter = "none";

        $('.datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar"></span>'
            }
        });

        $('.timepicker').timepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-clock-o"></span>'
            }
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

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
                showconfirmButton: true,
                timer: 5000
            });
        </script>
    <?php
        unset($_SESSION['message']);
    endif;
    ?>

</body>

</html>