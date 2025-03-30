<?php
include "admin_function_DB/links.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HealthNet: Admin Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>



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

    <!-- Template Main CSS File -->
    <link href="../assets/css/NiceAdminstyles.css" rel="stylesheet">

</head>



<body>


    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard.admin.php" class="logo d-flex align-items-center">
                <img src="../../../../assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">HealthNet</span>
            </a>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../assets/img/user.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($full_name); ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo htmlspecialchars($full_name); ?></h6>
                            <span><?php echo htmlspecialchars($adminAcc['role']); ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="admin_profile.admin.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>My Profile</span>
                            </a>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../auth/admin_auth/signoutAdmin.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="dashboard.admin.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="user_management.admin.php">
                    <i class="bi bi-grid"></i>
                    <span>User Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="clinic_management.admin.php">
                    <i class="bi bi-grid"></i>
                    <span>Clinic Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="doctor_management.admin.php">
                    <i class="bi bi-grid"></i>
                    <span>Doctor Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="../404/admin_management.404.php">
                    <i class="bi bi-grid"></i>
                    <span>Admin Account Management</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->


    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.admin.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="dashboard.admin.php">User Management</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            <div class="row">
                <div class="card h-100 w-100">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Overall Clinic Lists</h4>
                    </div>
                    <div class="card-body">
                        <div class="pt-5 pb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <table class="table table-bordered datatable">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Date of Birth</th>
                                            <th scope="col">Home Address</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Credentials</th>
                                            <th scope="col">View Profile</th>
                                        </tr>
                                    </thead>

                                    <?php if ($user): ?>
                                        <?php foreach ($user as $index => $row): ?>
                                            <tr>
                                                <th><?php echo $index + 1; ?></th>
                                                <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['dob']); ?></td>
                                                <td><?php echo htmlspecialchars($row['home_address']); ?></td>
                                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                                                <td><?php echo htmlspecialchars($row['role']); ?></td>
                                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                                        <button class="btn btn-primary btn-sm w-auto" data-bs-toggle="modal" data-bs-target="#credentialsModal-<?php echo $index; ?>">
                                                            View Credentials
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center flex-wrap">
                                                        <a href="patient_profile.admin.php?id=<?php echo htmlspecialchars($row['user_id']); ?>" class="btn btn-success btn-sm w-auto">View Profile</a>
                                                    </div>
                                                </td>


                                                <!-- Modal for Viewing Credentials -->
                                                <div class="modal fade" id="credentialsModal-<?php echo $index; ?>" tabindex="-1" aria-labelledby="credentialsModalLabel-<?php echo $index; ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="credentialsModalLabel-<?php echo $index; ?>">Uploaded Credentials</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <h6>Business Permit</h6>
                                                                        <img src="<?php echo '../uploads/' . htmlspecialchars($row['national_id']); ?>" class="img-fluid rounded mb-2" alt="Business Permit">
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <h6>Accreditation Certificate</h6>
                                                                        <img src="<?php echo '../uploads/' . htmlspecialchars($row['philhealth_id']); ?>" class="img-fluid rounded mb-2" alt="Accreditation Certificate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="10" class="text-center">No data available</td>
                                            </tr>
                                        <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="card h-100 w-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center text-danger bg-primary text-center">Account Deletion</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Active Status</th>
                                        <th>Account</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($user): ?>
                                        <?php $count = 1; ?>
                                        <?php foreach ($user as $row): ?>
                                            <tr>
                                                <th scope="row"> <?php echo $count++; ?></th>
                                                <td> <?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?> </td>
                                                <td> <?php echo htmlspecialchars(ucfirst($row['role'])); ?> </td>
                                                <td class="fw-bold text-<?php echo ($row['status'] == 'online') ? 'success' : 'danger'; ?>">
                                                    <?php echo htmlspecialchars(ucfirst($row['status'])); ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-danger btn-sm">Delete Account</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No records found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "admin_includes/footer.php"; ?>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- jQuery and Bootstrap JS -->
    <!-- Include jQuery (Required for Bootstrap Modals to Work) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include jQuery (Required for Bootstrap Modals to Work) -->


    <!-- Bootstrap JS (Ensure it's included) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Js for Modal -->
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

            // Fix password toggle visibility
            document.querySelectorAll(".toggle-password").forEach(button => {
                button.addEventListener("click", function() {
                    let input = this.closest(".input-group").querySelector("input");
                    input.type = input.type === "password" ? "text" : "password";
                    this.firstElementChild.classList.toggle("fa-eye-slash");
                });
            });
        });
    </script>



    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js">
    </script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

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
                timer: 3000
            });
        </script>
    <?php
        unset($_SESSION['message']);
    endif;
    ?>

</body>

</html>