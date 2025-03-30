<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.clinic.php">Home</a></li>
            <li class="breadcrumb-item"><a href="dashboard.clinic.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Clinic Profile</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


<section class="section dashboard">

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body pt-4">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../assets/img/user.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo htmlspecialchars($clinicAcc['clinic_name']); ?></h4>
                                    <p class="text-muted font-size-sm"><?php echo ucwords(htmlspecialchars($clinicAcc['clinic_address'])); ?></p>
                                    <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body pt-4">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($clinicAcc['clinic_name']); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Administrator</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($clinicAcc['owner_name']); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($clinicAcc['email']); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($clinicAcc['contact_number']); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($clinicAcc['clinic_address']); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#edit_profile">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-4">

            <!-- Modal Header with Fixed Close Button -->
            <div class="modal-header border-0 d-flex justify-content-between align-items-center">
                <h5 class="modal-title font-weight-bold text-primary" id="registerModalToggleLabel">Update Profile</h5>
                <button type="button" class="close text-dark ml-auto" data-dismiss="modal" aria-label="Close" style="padding: 10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="text-center">
                    <img src="../assets/img/HNLogo.png" alt="Logo" class="img-fluid mb-2" style="width: 100px;">
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

<!-- JavaScript to Toggle Password Visibility -->
<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.previousElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                this.innerHTML = '<i class="fa fa-eye"></i>';
            } else {
                input.type = 'password';
                this.innerHTML = '<i class="fa fa-eye-slash"></i>';
            }
        });
    });
</script>