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
    public static function updateSpecificAppointmentByDoctor($appointment_id, $doctor_id, $status, $remark,$appointment_time, $connection)
    {
        $query='';
        if ($status == 1) {
            echo "accept kara";
            $query = "UPDATE `appointment` SET status='{$status}',remark='{$remark}',appointment_time='{$appointment_time}',update_date=NOW() WHERE appointment_id='{$appointment_id}' AND doctor_id='{$doctor_id}'";
        }else {
            echo "accept kare na";
            $query = "UPDATE `appointment` SET status='{$status}',remark='{$remark}',update_date=NOW() WHERE appointment_id='{$appointment_id}' AND doctor_id='{$doctor_id}'";
        }
        
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

    // GET appointments  for under doctors(to calculate booking time)
    public static function getDoctorApprovedAppointments($status, $doctor_id,$appointment_date, $connection)
    {
        $data = array();
        $query = "SELECT * FROM `appointment` WHERE status=$status AND doctor_id=$doctor_id AND appointment_date='{$appointment_date}' ORDER BY update_date DESC";
        $result_set = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result_set)) {
            $data[] = $row;
        }
        return $data;
    }

  

}


?>