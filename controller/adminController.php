<?php

require_once('../includes/database.php');
// require_once('../models/appointmentModel.php');
require_once('../models/adminModel.php');


session_start();
?>

<?php

// admin student page details
function userDetails($connection,$type, $id)
{
    $data = array();
    $result = adminModel::userDetails($type, $id, $connection);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

//doctor registration accept by admin
if (isset($_GET['doctorRequestAccept_id'])) {
  $request_id = $_GET['doctorRequestAccept_id'];
  $result = adminModel::confirmOrDenyDoctorRegistration($request_id, 1,$connection);
  if ($result) {
      header('Location:../views/all-doctors.php');
  }

}

//doctor registration deny by admin
if (isset($_GET['doctorRequestCancel_id'])) {
  $request_id = $_GET['doctorRequestCancel_id'];
  $result = adminModel::confirmOrDenyDoctorRegistration($request_id,2,$connection);
  if ($result) {
      header('Location:../views/doctor-reg-deny.php');
  }

}


// admin student page search result
// function patientSearchDetails($id, $word, $accept, $connection)
// {
//     $data = array();
//     $result = adminModel::searchPatient($id, $word, $accept, $connection);
//     while ($row = mysqli_fetch_assoc($result)) {
//         $data[] = $row;
//     }

//     return $data;
// }

// //get appointement details (filter by appointment status)
// function getAppointmentCount($connection, $status, $doctor_id)
// {
//   $result = appointmentModel::getCountOfAppointment($status, $doctor_id, $connection);
//   return $result;
// }

// //retrieve doctor all appointments
// function getDoctorAllAppointment($connection, $doctor_id)
// {
//   $result = appointmentModel::getDoctorAllAppointment($doctor_id, $connection);
//   return $result;
// }

// //retrieve  a specific appointment
// function getSpecificAppointment($connection, $appointment_id)
// {
//   $result = appointmentModel::getSpecificAppointment($appointment_id, $connection);
//   return $result;
// }

// function getADoctorDetails($connection, $email)
// {
//   $result = doctorModel::getADoctorDetails($email, $connection);
//   return $result;
// }

// function getAPatientDetailsUsingId($connection, $patient_id)
// {
//   $result = doctorModel::getAPatientDetailsUsingId($patient_id, $connection);
//   return $result;
// }

// //update status a specific appointment by doctor
// if (isset($_POST['submit_action'])) {

//   $status = $_POST['status'];
//   $remark = $_POST['remark'];
//   $appointment_id = $_POST['appointment_id'];
//   $doctor_id = $_POST['doctor_id'];

//   $result = appointmentModel::updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark, $connection);

//   if ($result) {
//     //  echo '<script>alert("Remark and status has been updated")</script>';
//     header('Location:../views/all-appointment.php');
//   } else {
//     // echo '<script>alert("Remark and status has been not updated")</script>';
//     header('Location:../views/view-appointment-detail.php');
//   }
// }

// //get patient appointement details
// function getPatientAppointments($connection, $status, $patient_id)
// {
//   $result = appointmentModel::getPatientAppointments($status, $patient_id, $connection);
//   return $result;
// }

// //get patient appointement details
// function getPatientHistoryAppointments($connection, $patient_id)
// {
//   $result = appointmentModel::getPatientHistoryAppointments($patient_id, $connection);
//   return $result;
// }

// function getADoctorDetailsUsingId($connection, $doctor_id)
// {
//   $result = doctorModel::getADoctorDetailsUsingId($doctor_id, $connection);
//   return $result;
// }



// //delete pending appointment by patient(before accept the doctor)
// if (isset($_POST['delete_appointment_action'])) {

//   $appointment_id = $_POST['appointment_id'];
//   $patient_id = $_POST['patient_id'];

//   $result = appointmentModel::deletePatientAppointment($appointment_id, $patient_id, $connection);

//   if ($result) {
//     header('Location:../views/patient-dashboard');
//   } else {
//     header('Location:../views/patient-pending-appointment.php');
//   }
// }


?>