<?php

class doctorModel
{

    // get doctor details
    public static function getADoctorDetails($email, $connection)
    {
        $query = "SELECT * FROM doctor  WHERE email='{$email}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);
        return $result_set;
    }

    // get patient details using his id
    public static function getAPatientDetailsUsingId($patient_id, $connection)
    {
        $query = "SELECT * FROM patient  WHERE patient_id='{$patient_id}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);
        return $result_set;
    }

    // get doctor details using his id
    public static function getADoctorDetailsUsingId($doctor_id, $connection)
    {
        $query = "SELECT * FROM doctor  WHERE doctor_id='{$doctor_id}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);
        return $result_set;
    }


}


?>