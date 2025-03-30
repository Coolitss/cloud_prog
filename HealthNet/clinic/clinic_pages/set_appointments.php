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


    <div class="card h-100 w-100 mt-5">
        <div class="card-body">
            <div class="pt-4 pb-3">
                <h3 class="logo fw-bold border-bottom pb-2" style="color: #012970;">
                    <i class="fas fa-calendar-alt me-2"></i> Appointment List
                </h3>

                <table class="table align-middle mb-0 bg-white" style="font-size: 14px;">
                    <thead class="bg-light">
                        <tr>
                            <th style="padding: 8px; font-size: 13px;">Doctor</th>
                            <th style="padding: 8px; font-size: 13px;">Patient</th>
                            <th style="padding: 8px; font-size: 13px;">Schedule</th>
                            <th style="padding: 8px; font-size: 13px;">Notes</th>
                            <th style="padding: 8px; font-size: 13px;">Status</th>
                            <th style="padding: 8px; font-size: 13px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 6px;">
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="Profile Image" style="width: 35px; height: 35px;" class="rounded-circle" />
                                    <div class="ms-2">
                                        <p class="fw-bold mb-0" style="font-size: 13px;">James</p>
                                        <p class="text-muted" style="font-size: 12px;">Dentist</p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 6px;">
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="Profile Image" style="width: 35px; height: 35px;" class="rounded-circle" />
                                    <div class="ms-2">
                                        <p class="fw-bold mb-0" style="font-size: 13px;">Florence</p>
                                        <p class="text-muted" style="font-size: 12px;">florence@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 6px;">
                                <p class="fw-normal" style="font-size: 13px;">Consultation</p>
                                <p class="text-muted" style="font-size: 12px;">March 10, 2025, 10:00 AM</p>
                            </td>
                            <td style="padding: 6px;"></td>
                            <td style="padding: 6px;"><span class="badge bg-success rounded-pill" style="font-size: 12px;">Done</span></td>
                            <td style="padding: 6px;">
                                <div class="d-flex gap-1">
                                    <a href="dashboard.clinic.php?page=patient_details.clinic" class="btn btn-outline-primary btn-sm" style="font-size: 12px;">View</a>
                                    <button class="btn btn-outline-secondary btn-sm" style="font-size: 12px;">Edit</button>
                                    <button class="btn btn-outline-success btn-sm" style="font-size: 12px;">Accept</button>
                                    <button class="btn btn-outline-danger btn-sm" style="font-size: 12px;">Cancel</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</section>