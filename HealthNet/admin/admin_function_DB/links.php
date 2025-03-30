<?php
require_once("../config/conn.config.php");
session_start();

if (!isset($_SESSION['admin_id'])) {
  header("Location: ../index.php");
  exit();
}

$admin_id = $_SESSION['admin_id'];


try{
  $admin = $conn->prepare("SELECT * FROM admin WHERE admin_id = ? ");
  $admin->execute([$admin_id]);
  $adminAcc = $admin->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e){
  echo "Error: " . $e->getMessage();
}

$full_name = $adminAcc['first_name'] . ' ' . $adminAcc['last_name'];



try {
  $stmt = $conn->prepare("SELECT * FROM user_patient");
  $stmt->execute();
  $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}

if (isset($_GET['id'])) {
  $_SESSION['user_id'] = $_GET['id'];
  $user_id = $_SESSION['user_id'];
  try {
      $user = $conn->prepare("SELECT * FROM user_patient WHERE user_id = ?");
      $user->execute([$user_id]);
      $uProfile = $user->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

try {
  $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM user_patient");
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $total_patients = $result['total'];

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}




try {
  $doctorside = $conn->prepare("SELECT * FROM doctor_account WHERE status = 'pending' ");
  $doctorside->execute();
  $doctorData = $doctorside->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}

try {
  $doctorside2 = $conn->prepare("SELECT * FROM doctor_account");
  $doctorside2->execute();
  $overallDoctorRetrieval = $doctorside2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}


try {
  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM doctor_account");
  $stmt->execute();

  // Fetch the count
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $total_rows = $result['total'];

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}




try {
  $clinicside = $conn->prepare("SELECT * FROM clinic_account WHERE status = 'pending' ");
  $clinicside->execute();
  $clinicData = $clinicside->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}

try {
  $clinicside2 = $conn->prepare("SELECT * FROM clinic_account");
  $clinicside2->execute();
  $overallClinicRetrieval = $clinicside2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}


try {
  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM clinic_account");
  $stmt->execute();

  // Fetch the count
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $total_clinics = $result['total'];

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}



$page = isset($_GET['page']) ? basename($_GET['page']) : "dashboard_main";
