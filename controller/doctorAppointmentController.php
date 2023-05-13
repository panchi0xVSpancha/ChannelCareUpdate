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
  // $old_appointment_time = (new DateTime())->format('Y-m-d H:i:s');
  // $new_appointment_time = (new DateTime())->format('Y-m-d H:i:s');
  // $old_appointment_time = "";
  // $new_appointment_time = "";
  $result='';

  // echo "old_appointment_time: $old_appointment_time";

  if ($status == 1) {

    //calculate appointment time
  $getApprovedA = appointmentModel::getDoctorApprovedAppointments(1, $doctor_id, $appointment_date, $connection);

  if (count($getApprovedA) == 0) {
    $week_date = date('l', strtotime($appointment_date));
    echo "The data type of the variable is: " .gettype($week_date);
    echo "The data type of the variable is: " .gettype(10);
   
    echo 'appointment_date-'.$appointment_date;
    echo 'week_date-'.$week_date;
   // $time_doc_availa = date('h:i A', strtotime($old_appointment_time_doc_available . ' +15 minutes'));
    $filter_results = doctorModel::filterDoctorAvailableDates($doctor_id, $week_date, $connection);
    if (count($filter_results) == 0) {
      echo "Not available time slot found";
    } else {
      $row = $filter_results[0];
      $old_appointment_time_doc_available = $row['available_time'];
      echo $old_appointment_time_doc_available;
    

      //add 15mins
      $new_appointment_time_doc_availa = date('h:i A', strtotime($old_appointment_time_doc_available . ' +15 minutes'));
      echo '<br/>';
      echo 'adding 15 -min'.$new_appointment_time_doc_availa;
      echo '<br/>';
      echo "The data type of the variable is: " .gettype($new_appointment_time_doc_availa);

      $result_doc_availa = appointmentModel::updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark,$new_appointment_time_doc_availa, $connection);
      if ($result_doc_availa) {
        //  echo '<script>alert("Remark and status has been updated")</script>';
        header('Location:../views/all-appointment.php?doc-available');
      } else {
        // echo '<script>alert("Remark and status has been not updated")</script>';
       header('Location:../views/view-appointment-detail.php?doc-available');
      }
    }

  } else {
    $row_desc_date= $getApprovedA[0];
    $old_appointment_time_already_approve = $row_desc_date['appointment_time'];
    echo $old_appointment_time_already_approve;
    //add 15mins
    $new_appointment_time_already_approve = date('h:i A', strtotime($old_appointment_time_already_approve . ' +15 minutes'));
    echo '<br/>';
    $dateTimeString=$row_desc_date['appointment_date'].''.$new_appointment_time_already_approve;
    echo $dateTimeString;
    echo '<br/>';
    $dateTime = new DateTime($dateTimeString);
    echo $dateTime->format('Y-m-d H:i:s');
    echo '<br/>';
    echo '<script>alert("Remark and status has been not updated")</script>';

    echo '<br/>';
    // $dateTimeString=$row_desc_date['appointment_date'].''.$new_appointment_time_already_approve;
    echo $dateTimeString;
    echo '<br/>';
    $dateTime = new DateTime($dateTimeString);
    echo $dateTime->format('Y-m-d H:i:s');
    echo '<br/>';
 
    $result_already_approve = appointmentModel::updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark,$new_appointment_time_already_approve, $connection);
    if ($result_already_approve) {
      //  echo '<script>alert("Remark and status has been updated")</script>';
      header('Location:../views/all-appointment.php?already_approve');
    } else {
      // echo '<script>alert("Remark and status has been not updated")</script>';
      header('Location:../views/view-appointment-detail.php?already_approve');
    }
  }
    
 

  
  }else {
    $result = appointmentModel::updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark,'', $connection);
    if ($result) {
      //  echo '<script>alert("Remark and status has been updated")</script>';
      header('Location:../views/all-appointment.php');
    } else {
      // echo '<script>alert("Remark and status has been not updated")</script>';
      header('Location:../views/view-appointment-detail.php');
    }
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