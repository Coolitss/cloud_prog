<?php
include_once "../config/conn.config.php";
session_start();

if (!isset($_SESSION['clinic_id'])) {
  header("Location: ../index.php");
  exit();
}



$clinic_id = $_SESSION['clinic_id'];

try{
  $clinic = $conn->prepare("SELECT * FROM clinic_account WHERE clinic_id = ? ");
  $clinic->execute([$clinic_id]);
  $clinicAcc = $clinic->fetch(PDO::FETCH_ASSOC);
  
} catch(PDOException $e){
  echo "Error: " . $e->getMessage();
}

try {
  $doctorside2 = $conn->prepare("SELECT * FROM doctor_account WHERE clinic_id = ?");
  $doctorside2->execute([$clinic_id]);
  $overallDoctorRetrieval = $doctorside2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}


try {
  $CAppointment = $conn->prepare("SELECT * FROM clinic_appointments WHERE clinic_id = ? AND status = 'Pending' ");
  $CAppointment->execute([$clinic_id]);
  $clinicAppointments = $CAppointment->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}

try {
  $CAppointment = $conn->prepare("SELECT COUNT(*) AS total FROM clinic_appointments WHERE clinic_id = ? AND status = 'Pending' ");
  $CAppointment->execute([$clinic_id]);
  $clinicTotalCount = $CAppointment->fetch(PDO::FETCH_ASSOC);
  $totalRows = $clinicTotalCount['total'];
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}



try {
  $doctorside2 = $conn->prepare("SELECT * FROM doctor_account WHERE clinic_id IS NULL");
  $doctorside2->execute();
  $allDoctor = $doctorside2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo ("Error" . $e->getMessage());
}



$page = isset($_GET['page']) ? basename($_GET['page']) : "dashboard_page";
