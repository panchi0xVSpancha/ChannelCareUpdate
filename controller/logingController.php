<?php

require_once('../includes/database.php');

require_once('../models/reg_user.php'); //

session_start();
?>

<?php

if (isset($_POST['login'])) {
  $errors = array(); //create empty array
  if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1) //check if the username and password has been entered
  {
    $errors[] = 'Username is Missing / Invalid';
  }
  if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
    $errors[] = 'Password is Missing / Invalid';
  }

  //check if there are any errors in the form
  if (empty($errors)) {
    //save username and password into variables
    //protect the our database  becauses  can be change sql query in database
    $useremail = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $hash = sha1($password);

    $result = reg_user::loging($useremail, $hash, $connection);
    //prepare database query
    if ($result) {
     
      //query successful
      //check if the user is valid
      if (mysqli_num_rows($result) == 1) {
        $record = mysqli_fetch_assoc($result);
        // if($record['user_accepted']==1){

        $_SESSION['email'] = $record['email'];
        $_SESSION['type'] = $record['type'];
        $_SESSION['first_name'] = $record['first_name'];
        $_SESSION['last_name'] = $record['last_name'];
        $_SESSION['address'] = $record['address'];
        $ID = reg_user::getId($record['type'], $record['email'], $connection);
        $user_id = mysqli_fetch_assoc($ID);

        if ($record['type'] == "patient") {
          $_SESSION['patient_id'] = $user_id['patient_id'];
          header('Location:../views/patient-dashboard.php');

        } elseif ($record['type'] == "doctor") {
          $_SESSION['doctor_id'] = $user_id['doctor_id'];
          header('Location:../views/dashboard.php');
        } elseif ($record['type'] == "admin") {
          $_SESSION['admin_id'] = $user_id['admin_id'];
          header('Location:../index.php?admin');
        }

      } else {
        header('Location:../views/login.php?errors=' . 'errors');
      }

    } else {
      header('Location:../views/login.php?errors=' . 'errors');
    }

  } else {
    header('Location:../views/login.php?errors=' . 'errors');
  }
}

?>