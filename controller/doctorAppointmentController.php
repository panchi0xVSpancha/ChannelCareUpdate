<?php

require_once('../includes/database.php');
require_once('../models/appointmentModel.php');
require_once('../models/doctorModel.php');


session_start();
?>

<?php


//get appointement details (filter by appointment status)
function getAppointmentCount($connection, $status, $doctor_id)
{
  $result = appointmentModel::getCountOfAppointment($status, $doctor_id, $connection);
  return $result;
}

//retrieve doctor all appointments
function getDoctorAllAppointment($connection, $doctor_id)
{
  $result = appointmentModel::getDoctorAllAppointment($doctor_id, $connection);
  return $result;
}

//retrieve  a specific appointment
function getSpecificAppointment($connection, $appointment_id)
{
  $result = appointmentModel::getSpecificAppointment($appointment_id, $connection);
  return $result;
}

function getADoctorDetails($connection, $email)
{
  $result = doctorModel::getADoctorDetails($email, $connection);
  return $result;
}

function getAPatientDetailsUsingId($connection, $patient_id)
{
  $result = doctorModel::getAPatientDetailsUsingId($patient_id, $connection);
  return $result;
}

//update status a specific appointment by doctor
if (isset($_POST['submit_action'])) {

  $status = $_POST['status'];
  $remark = $_POST['remark'];
  $appointment_id = $_POST['appointment_id'];
  $doctor_id = $_POST['doctor_id'];

  $result = appointmentModel::updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark, $connection);

  if ($result) {
    //  echo '<script>alert("Remark and status has been updated")</script>';
    header('Location:../views/all-appointment.php');
  } else {
    // echo '<script>alert("Remark and status has been not updated")</script>';
    header('Location:../views/view-appointment-detail.php');
  }
}

//get patient appointement details
function getPatientAppointments($connection, $status, $patient_id)
{
  $result = appointmentModel::getPatientAppointments($status, $patient_id, $connection);
  return $result;
}

//get patient appointement details
function getPatientHistoryAppointments($connection, $patient_id)
{
  $result = appointmentModel::getPatientHistoryAppointments($patient_id, $connection);
  return $result;
}

function getADoctorDetailsUsingId($connection, $doctor_id)
{
  $result = doctorModel::getADoctorDetailsUsingId($doctor_id, $connection);
  return $result;
}



//delete pending appointment by patient(before accept the doctor)
if (isset($_POST['delete_appointment_action'])) {

  $appointment_id = $_POST['appointment_id'];
  $patient_id = $_POST['patient_id'];

  $result = appointmentModel::deletePatientAppointment($appointment_id, $patient_id, $connection);

  if ($result) {
    header('Location:../views/patient-dashboard');
  } else {
    header('Location:../views/patient-pending-appointment.php');
  }
}


?>