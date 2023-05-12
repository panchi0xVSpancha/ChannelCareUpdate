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


?>