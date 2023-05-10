<?php

class appointmentModel
{

    // GET appointment count for under doctor
    public static function getCountOfAppointment($status, $doctor_id, $connection)
    {
        $data = array();
        $query = "SELECT * FROM `appointment` WHERE status=$status AND doctor_id=$doctor_id";
        $result_set = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result_set)) {
            $data[] = $row;
        }
        return $data;
    }

    //retrieve doctor all appointments
    public static function getDoctorAllAppointment($doctor_id, $connection)
    {
        $data = array();
        $query = "SELECT * FROM `appointment` WHERE doctor_id=$doctor_id";
        $result_set = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result_set)) {
            $data[] = $row;
        }
        return $data;
    }

    //retrieve doctor a specific appointment
    public static function getSpecificAppointment($appointment_id, $connection)
    {
        $query = "SELECT * FROM `appointment` WHERE appointment_id=$appointment_id";
        $result_set = mysqli_query($connection, $query);
        return $result_set;
    }
    //update status a specific appointment by doctor
    public static function updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark, $connection)
    {
        $query = "UPDATE `appointment` SET status='{$status}',remark='{$remark}' WHERE appointment_id='{$appointment_id}' AND doctor_id='{$doctor_id}'";
        $result_set = mysqli_query($connection, $query);
        return $result_set;
    }

    // GET appointment  for under patient
    public static function getPatientAppointments($status, $patient_id, $connection)
    {
        $data = array();
        $query = "SELECT * FROM `appointment` WHERE status=$status AND patient_id=$patient_id";
        $result_set = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result_set)) {
            $data[] = $row;
        }
        return $data;
    }

    // GET history appointment  for under patient
    public static function getPatientHistoryAppointments($patient_id, $connection)
    {
        $data = array();
        $query = "SELECT * FROM `appointment` WHERE status IN (1,2) AND patient_id=$patient_id";
        $result_set = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result_set)) {
            $data[] = $row;
        }
        return $data;
    }

    //delete pending appointment by patient(before accept the doctor)
    public static function deletePatientAppointment($appointment_id, $patient_id, $connection)
    {
        $query = "DELETE FROM `appointment` WHERE appointment_id='{$appointment_id}' AND patient_id='{$patient_id}'";
        $result_set = mysqli_query($connection, $query);
        return $result_set;
    }

}


?>