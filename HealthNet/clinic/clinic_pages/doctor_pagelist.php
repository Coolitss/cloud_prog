<div class="pagetitle d-flex justify-content-between align-items-center">
    <div>
        <h1>Healthnet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.clinic.php">Clinic</a></li>
                <li class="breadcrumb-item active"><a href="dashboard.clinic.php?page=doctor_pagelist">Manage Doctor</a></li>
            </ol>
        </nav>
    </div>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctor">Add Doctor</button>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Table -->
        <div class="card h-100 w-100">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">List of Doctors Under This Clinic</h4>
            </div>
            <div class="card-body">
                <div class="pt-5 pb-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Medical License</th>
                                    <th scope="col">Specialty</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <?php if ($overallDoctorRetrieval): ?>
                                <?php foreach ($overallDoctorRetrieval as $index => $row): ?>
                                    <tr>
                                        <th><?php echo $index + 1; ?></th>
                                        <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                                        <td><?php echo htmlspecialchars($row['medical_license']); ?></td>
                                        <td><?php echo htmlspecialchars($row['specialty']); ?></td>
                                        <td><?php echo htmlspecialchars($row['acc_stat']); ?></td>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="text-center">No data available</td>
                                    </tr>
                                <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="addDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-white border-bottom">
                <h5 class="modal-title text-dark fw-bold" id="exampleModalLabel">Doctor List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Doctor List -->
                <div class="doctor-list">
                    <?php foreach ($allDoctor as $clinic_Doc): ?>
                        <div class="d-flex justify-content-between align-items-center mb-3 p-3 border rounded bg-light">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/healthNET/1.png" alt="Doctor Image" width="80" class="rounded me-3">
                                <div>
                                    <h6 class="mb-1 text-dark">
                                        <?php echo "Dr. " . htmlspecialchars($clinic_Doc['first_name']) . ' ' . htmlspecialchars($clinic_Doc['last_name']); ?>
                                    </h6>
                                    <a href="#" class="d-block text-primary">
                                        <i class="fi fi-brands-facebook me-1"></i><?php echo htmlspecialchars($clinic_Doc['specialty']); ?>
                                    </a>
                                    <a href="#" class="d-block text-dark">
                                        <i class="fi fi-rr-phone-call me-1"></i><?php echo htmlspecialchars($clinic_Doc['phone_number']); ?>
                                    </a>
                                </div>
                            </div>

                            <!-- Add Doctor Form -->
                            <form method="POST" action="../auth/clinic_auth/update_doctor_stat.php">
                                <input type="hidden" name="doctor_id" value="<?= $clinic_Doc['doctor_id']; ?>">
                                <button type="submit" class="btn btn-primary mt-auto">Add Doctor</button>
                            </form>
                        </div>
                    <?php endforeach; ?>

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