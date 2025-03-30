<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.clinic.php">Clinic</a></li>
      <li class="breadcrumb-item active"><a href="dashboard.clinic.php?page=dashboard_page">Dashboard</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row w-100 justify-content-start flex-nowrap gap-3">

        <!-- Pending Bookings Card -->
        <a href="dashboard.clinic.php?page=pending_bookings" class="col-md-4 col-6">
          <div class="card info-card doctor-card h-100 w-100 d-flex flex-column align-items-center">
            <div class="card-body text-center">
              <h5 class="card-title text-wrap">Pending Bookings</h5>
              <div class="d-flex align-items-center justify-content-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fi fi-ss-calendar-clock"></i>
                </div>
              </div>
              <span><?php echo "Total Pending Bookings: " . '<h3>' . htmlspecialchars($totalRows);  '</h3>' ?></span>
            </div>
          </div>
        </a>

        <!-- Upcoming Appointments Card -->
        <a href="../404/upcoming-appointments.404.php" class="col-md-4 col-6">
          <div class="card info-card patient-card h-100 w-100 d-flex flex-column align-items-center">
            <div class="card-body text-center">
              <h5 class="card-title text-wrap">Upcoming Appointments</h5>
              <div class="d-flex align-items-center justify-content-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fi fi-ss-user-md"></i>
                </div>
              </div>
              <span># of Upcoming Appointments</span>
            </div>
          </div>
        </a>

        <!-- Completed Appointments Card -->
        <a href="../404/upcoming-appointments.404.php" class="col-md-4 col-6">
          <div class="card info-card customers-card h-100 w-100 d-flex flex-column align-items-center">
            <div class="card-body text-center">
              <h5 class="card-title text-wrap">Completed Appointments</h5>
              <div class="d-flex align-items-center justify-content-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fi fi-ss-feedback-alt"></i>
                </div>
              </div>
              <span># of Completed Appointments</span>
            </div>
          </div>
        </a>

      </div>
    </div>
  </div>


  


</section>