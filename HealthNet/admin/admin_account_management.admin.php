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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.admin.php?page=dashboard_main">Home</a></li>
          <li class="breadcrumb-item active"><a href="dashboard.admin.php?page=dashboard_main">Dashboard</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row w-100 justify-content-start flex-nowrap gap-3">

            <!-- Doctor Card -->
            <a href="dashboard.admin.php?page=doctor_side" class="col-md-3 col-6">
              <div class="card info-card doctor-card h-100 w-100 d-flex flex-column align-items-center">
                <div class="card-body text-center">
                  <h5 class="card-title">Doctor</h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fi fi-ss-calendar-clock"></i>
                    </div>
                  </div>
                  <span><?php echo "Total Doctors: " . htmlspecialchars($total_rows); ?></span>
                </div>
              </div>
            </a>

            <!-- Patient Card -->
            <a href="dashboard.admin.php?page=patient_side" class="col-md-3 col-6">
              <div class="card info-card patient-card h-100 w-100 d-flex flex-column align-items-center">
                <div class="card-body text-center">
                  <h5 class="card-title">Patient</h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fi fi-ss-user-md"></i>
                    </div>
                  </div>
                  <span><?php echo "Total Patients: " . htmlspecialchars($total_patients) ?></span>
                </div>
              </div>
            </a>

            <!-- Clinic Card -->
            <a href="dashboard.admin.php?page=clinic_side" class="col-md-3 col-6">
              <div class="card info-card customers-card h-100 w-100 d-flex flex-column align-items-center">
                <div class="card-body text-center">
                  <h5 class="card-title">Clinic</h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fi fi-ss-feedback-alt"></i>
                    </div>
                  </div>
                  <span><?php echo "Total Clinics: " . htmlspecialchars($total_clinics) ?></span>
                </div>
              </div>
            </a>

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