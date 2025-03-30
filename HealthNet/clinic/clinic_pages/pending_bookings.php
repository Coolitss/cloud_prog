<div class="pagetitle">
    <h1>Pending Bookings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.clinic.php">Clinic</a></li>
            <li class="breadcrumb-item active"><a href="dashboard.clinic.php?page=dashboard_page">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="dashboard.clinic.php?page=pending_bookings">Pending Bookings</a></li>
        </ol>
    </nav>
</div>


<section class="section dashboard">
    <div class="row">
        <!-- Table -->
        <div class="card h-100 w-100">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">List of Clinic Pending Bookings</h4>
            </div>
            <div class="card-body">
                <div class="pt-5 pb-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Appointment Date</th>
                                        <th scope="col">Appointment Time</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Expense</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($clinicAppointments && count($clinicAppointments) > 0): ?>
                                        <?php foreach ($clinicAppointments as $index => $row): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $index + 1; ?></td>
                                                <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                                <td class="text-center"><?php echo htmlspecialchars($row['gender']); ?></td>
                                                <td><?php echo htmlspecialchars($row['contact']); ?></td>
                                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                <td class="text-center"><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                                                <td class="text-center"><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                                                <td><?php echo htmlspecialchars($row['reason']); ?></td>
                                                <td class="text-center"><?php echo htmlspecialchars($row['total_expense']); ?></td>
                                                <td><?php echo htmlspecialchars($row['doctor_name']); ?></td>
                                                <td class="text-center">
                                                    <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($row['status']); ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-inline-flex gap-2 align-items-center">
                                                        <form action="../auth/clinic_auth/update_clinic_appointment.php" method="POST">
                                                            <input type="hidden" name="clinic_id" value="<?php echo $row['clinic_id']; ?>">
                                                            <input type="hidden" name="status" value="Confirmed">
                                                            <button class="btn btn-success btn-sm">
                                                                <i class="bi bi-check-circle"></i> Approve
                                                            </button>
                                                        </form>
                                                        <form action="../auth/clinic_auth/update_clinic_appointment.php" method="POST">
                                                            <input type="hidden" name="clinic_id" value="<?php echo $row['clinic_id']; ?>">
                                                            <input type="hidden" name="status" value="Cancelled">
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="bi bi-x-circle"></i> Reject
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="12" class="text-center text-muted">No pending appointments</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>