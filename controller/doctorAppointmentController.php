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
  $appointment_date = $_POST['appointment_date'];
  $old_appointment_time = '';
  $new_appointment_time = '';
  $result='';

  if ($status == 1) {

    //calculate appointment time
  $getApprovedA = appointmentModel::getDoctorApprovedAppointments(1, $doctor_id, $appointment_date, $connection);

  if (count($getApprovedA) === 0) {
    $week_date = date('l', strtotime($appointment_date));
    echo $week_date;
    $filter_results = doctorModel::filterDoctorAvailableDates($doctor_id, $week_date, $connection);
    if (count($filter_results) === 0) {
      echo "Not available time slot found";
    } else {
      $row = $filter_results[0];
      $old_appointment_time = $row['appointment_time'];
      echo $old_appointment_time;
      //add 15mins
      $new_appointment_time = date('h:i A', strtotime($old_appointment_time . ' +15 minutes'));
    }

  } else {
    $row_desc_date= $getApprovedA[0];
    $old_appointment_time = $row_desc_date['appointment_time'];
    echo $old_appointment_time;
    //add 15mins
    $new_appointment_time = date('h:i A', strtotime($old_appointment_time . ' +15 minutes'));
  }
    
  $result = appointmentModel::updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark,$new_appointment_time, $connection);

  
  }else {
    $result = appointmentModel::updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark,'', $connection);
  }



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
    header('Location:../views/patient-dashboard.php');
  } else {
    header('Location:../views/patient-pending-appointment.php');
  }
}

//add doctor available dates
if (isset($_POST['AddAvailableDates'])) {
  $days = $_POST['days'];
  $time = $_POST['time'];
  $doctor_id = $_POST['doctor_id'];
  $result = doctorModel::addAvailableDateForDoctor($doctor_id, $days, $time, $connection);
  header('Location:../views/profile.php');

}

// get doctor available dates  using his id
function getADoctorAvailableDates($connection, $doctor_id)
{
  $result = doctorModel::getADoctorAvailableDates($doctor_id, $connection);
  return $result;
}

//delete doctor available dates
if (isset($_GET['deleteDoctorAvailableDates'])) {

  $dates_id = $_GET['dates_id'];
  $doctor_id = $_GET['doctor_id'];

  $result = doctorModel::deleteDoctorAvailableDates($dates_id, $doctor_id, $connection);
  header('Location:../views/profile.php');
}



?>