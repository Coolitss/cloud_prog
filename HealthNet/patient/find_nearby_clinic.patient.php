<?php
include "../config/conn.config.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    $user = $conn->prepare("SELECT * FROM user_patient WHERE user_id = ? ");
    $user->execute([$user_id]);
    $userAcc = $user->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$full_name = $userAcc['first_name'] . ' ' . $userAcc['last_name'];
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

    <!-- API Map-->


    <!-- API Google Map -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBec6lWjBPaP_-JTxg9eP2gaDd8HVFtcgo&libraries=places&callback=initMap" async defer></script>

    <script src="../api/index.js" defer></script>

    <script>
        let map, userMarker, clinics = [],
            autocomplete;
        let directionsService, directionsRenderer, watchPositionId;

        function initMap() {
            const iloiloCity = {
                lat: 10.7202,
                lng: 122.5621
            };
            map = new google.maps.Map(document.getElementById("map"), {
                center: iloiloCity,
                zoom: 13,
            });

            // Initialize Directions API
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: false,
            });

            detectUserLocation();
            loadNearbyClinics();
            initAutocomplete();

            document.getElementById("navigate-btn").addEventListener("click", startNavigation);
        }

        function detectUserLocation() {
            const locationInput = document.getElementById("location-input");

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userLocation = {
                            lat: 10.692204,
                            lng: 122.567710,
                        };

                        if (userMarker) userMarker.setMap(null);

                        userMarker = new google.maps.Marker({
                            position: userLocation,
                            map: map,
                            title: "Your Location",
                            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                        });

                        map.setCenter(userLocation);

                        // Reverse Geocode to get address
                        const geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            location: userLocation
                        }, (results, status) => {
                            if (status === "OK" && results[0]) {
                                locationInput.value = results[0].formatted_address;
                                locationInput.dataset.lat = userLocation.lat;
                                locationInput.dataset.lng = userLocation.lng;
                                calculateRoute();
                            }
                        });
                    },
                    (error) => {
                        console.error("Geolocation Error:", error);
                        alert("Location access denied or unavailable. Enable location services.");
                    }, {
                        enableHighAccuracy: true,
                        timeout: 20000,
                        maximumAge: 0
                    }
                );
            } else {
                alert("Geolocation is not supported by your browser.");
            }
        }

        function initAutocomplete() {
            const input = document.getElementById("location-input");
            autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    alert("Location not found. Try another search.");
                    return;
                }

                const location = place.geometry.location;
                input.dataset.lat = location.lat();
                input.dataset.lng = location.lng();

                if (userMarker) userMarker.setMap(null);

                userMarker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "Selected Location",
                    icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                });

                map.setCenter(location);
                calculateRoute();
            });
        }

        function loadNearbyClinics() {
            const service = new google.maps.places.PlacesService(map);
            const clinicDropdown = document.getElementById("clinic-dropdown");

            service.nearbySearch({
                location: {
                    lat: 10.7202,
                    lng: 122.5621
                },
                radius: 5000,
                type: "hospital"
            }, (results, status) => {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    clinicDropdown.innerHTML = '<option value="">Select a clinic...</option>';
                    clinics = results;

                    results.forEach((place) => {
                        const option = document.createElement("option");
                        option.value = `${place.geometry.location.lat()},${place.geometry.location.lng()}`;
                        option.textContent = place.name;
                        clinicDropdown.appendChild(option);

                        new google.maps.Marker({
                            position: place.geometry.location,
                            map: map,
                            title: place.name
                        });
                    });

                    clinicDropdown.addEventListener("change", calculateRoute);
                }
            });
        }

        function calculateRoute() {
            const locationInput = document.getElementById("location-input");
            const clinicDropdown = document.getElementById("clinic-dropdown");

            if (!locationInput.dataset.lat || !clinicDropdown.value) return;

            const userLat = parseFloat(locationInput.dataset.lat);
            const userLng = parseFloat(locationInput.dataset.lng);
            const [clinicLat, clinicLng] = clinicDropdown.value.split(",").map(Number);

            const request = {
                origin: {
                    lat: userLat,
                    lng: userLng
                },
                destination: {
                    lat: clinicLat,
                    lng: clinicLng
                },
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, (result, status) => {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(result);
                } else {
                    alert("Failed to get directions. Try again.");
                }
            });
        }

        function startNavigation() {
            if (!navigator.geolocation) {
                alert("Geolocation is not supported by your browser.");
                return;
            }

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const locationInput = document.getElementById("location-input");
                    const clinicDropdown = document.getElementById("clinic-dropdown");

                    if (!locationInput.dataset.lat || !clinicDropdown.value) {
                        alert("Select a valid destination first.");
                        return;
                    }

                    const userLat = parseFloat(locationInput.dataset.lat);
                    const userLng = parseFloat(locationInput.dataset.lng);
                    const [clinicLat, clinicLng] = clinicDropdown.value.split(",").map(Number);

                    const request = {
                        origin: {
                            lat: userLat,
                            lng: userLng
                        },
                        destination: {
                            lat: clinicLat,
                            lng: clinicLng
                        },
                        travelMode: google.maps.TravelMode.DRIVING
                    };

                    directionsService.route(request, (result, status) => {
                        if (status === google.maps.DirectionsStatus.OK) {
                            directionsRenderer.setDirections(result);

                            // Start real-time location tracking
                            watchPositionId = navigator.geolocation.watchPosition(
                                (pos) => {
                                    const newUserLocation = {
                                        lat: pos.coords.latitude,
                                        lng: pos.coords.longitude
                                    };

                                    if (userMarker) userMarker.setPosition(newUserLocation);
                                    map.setCenter(newUserLocation);
                                },
                                (error) => console.error("Tracking Error:", error), {
                                    enableHighAccuracy: true
                                }
                            );
                        } else {
                            alert("Failed to get directions. Try again.");
                        }
                    });
                }
            );
        }

        window.onload = initMap;
    </script>


    <!-- Template Main CSS File -->
    <link href="../assets/css/NiceAdminstyles.css" rel="stylesheet">

    <style>
        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        #map {
            width: 100%;
            height: 500px;
            display: block;
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
    </header>

    <!-- End Header -->

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
                <a class="nav-link" href="view_appointment.php">
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
                    <li class="breadcrumb-item"><a href="dashboard.patient.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Nearby Clinic</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card text-center shadow-lg border-0 p-4">
                        <div class="card-body">
                            <h2 class="mb-4 fw-bold" style="color: #012970; font-family: Nunito;">Find Nearby Clinics in Iloilo City</h2>

                            <!-- Location Input -->
                            <div class="mb-3">
                                <label for="location-input" class="form-label fw-bold">Choose Start Location:</label>
                                <input type="text" id="location-input" class="form-control" placeholder="Enter your location...">
                            </div>

                            <!-- Clinic Dropdown -->
                            <div class="mb-3">
                                <label for="clinic-dropdown" class="form-label fw-bold">Select a Clinic:</label>
                                <select id="clinic-dropdown" class="form-select">
                                    <option value="">Select a clinic...</option>
                                </select>
                            </div>

                            <!-- Map -->
                            <div id="map" class="rounded shadow" style="width: 100%; height: 400px;"></div>
                            <button id="navigate-btn" class="btn btn-primary mt-3">Navigate Location</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <script>
                document.write(new Date().getFullYear());
            </script> HealthNET. All rights reserved.
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- API Google Map -->


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
    <!-- <script src="assets/js/main.js"></script> -->
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




</html>