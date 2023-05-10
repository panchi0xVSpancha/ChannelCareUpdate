<?php

class adminModel
{

      // get all user details separetely
    //   public static function userDetails($level,$connection){
    //     $query="SELECT * FROM $level";
    //     $result=mysqli_query($connection,$query);
    //     return $result;
    // }

    //get active all users
    public static function userDetails($type,$id,$connection){
        $query="SELECT * FROM $type WHERE user_accepted=$id";
        $result=mysqli_query($connection,$query);
        return $result;
    }

}


?>