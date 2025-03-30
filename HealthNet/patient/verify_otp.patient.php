<?php
include_once "../config/conn.config.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
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

    <section class="section dashboard">
        <div class="card border-0">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold mb-3" id="otpModalLabel" style="color: #012970;">Verification Code</h5>
                <p class="card-text text-muted">Enter the OTP sent to your email.</p>

                <!-- OTP Form -->
                <form action="../auth/patient_auth/verify_otp.php" method="POST">
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <input type="text" name="otp1" class="otp-input" maxlength="1" required>
                        <input type="text" name="otp2" class="otp-input" maxlength="1" required>
                        <input type="text" name="otp3" class="otp-input" maxlength="1" required>
                        <input type="text" name="otp4" class="otp-input" maxlength="1" required>
                        <input type="text" name="otp5" class="otp-input" maxlength="1" required>
                        <input type="text" name="otp6" class="otp-input" maxlength="1" required>
                    </div>
                    <span> <a href="../auth/patient_auth/resend_otp.php">Resend OTP</a> </span>

                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>

                <!-- Display Messages -->
                <?php
                if (isset($_SESSION['otp_message'])) {
                    echo '<div class="mt-2 text-danger">' . $_SESSION['otp_message'] . '</div>';
                    unset($_SESSION['otp_message']); // Clear message after displaying
                }
                ?>
            </div>
        </div>
    </section>




    <!-- ======= Footer ======= -->
    <footer id="footer justify-content-center" class="footer">
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
                showconfirmButton: false,
                timer: 3000
            });
        </script>
    <?php
        unset($_SESSION['message']);
    endif;
    ?>


</body>

</html>s