<?php
    switch ($page) {
      case "dashboard_main":
        include "admin_pages/dashboard_main.php";
        break;

      case "user_management":
        include "admin_pages/user_management.php";
        break;

      case "clinic_management":
        include "admin_pages/clinic_management.php";
        break;

      case "doctor_management":
        include "admin_pages/doctor_management.php";
        break;

      case "doctor_side":
        include "admin_pages/doctor_side.php";
        break;

      case "admin_account_management":
        include "admin_pages/admin_account_management.php";
        break;

      case "admin_profile":
        include "admin_pages/admin_profile.php";
        break;

      case "patient_side":
        include "admin_pages/patient_side.php";
        break;

      case "clinic_side":
        include "admin_pages/clinic_side.php";
        break;

      case "patient_profile":
        include "admin_pages/patient_profile.php";
        break;

      default:
        echo "<h2 class='text-danger'>404 - Page Not Found</h2>";
        break;
    }
    ?>