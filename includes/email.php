<?php

function sentDoctorRegApproveRequest($email, $doctor_name)
{

    $subject = "Message from ChannelCare Website";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $from = "companychannelcare@gmail.com";
    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $message = '
        
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	
    <style>
		*{
			padding: 0;
			margin: 0;
			font-family: "Poppins",sans-serif;
        }
        body{
            background-color: #8EE48f;
        }
    .container{
        width: 70%;
        margin: 0 auto;
        background-color:#5cdb95;
    }

    

     
  


.header{
    padding: 30px;
}
.wrapper{
    background-color: #379683;
}
.header h2{
    color: white;
}

.header h3{
    text-align: center;
    font-size: 32px;
    border-bottom: 2px solid black;

}
.content{
    padding:0 100px ;
    text-align: center;
    margin: 0 auto;
}
p{
    margin: 0 auto;
}
.footer{
    background-color: black;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin: 0 auto;
   
}




	</style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="header">
            <h2>ChannelCare </h2>
            <h4>Hi ' . $doctor_name . '</h4>
            <h3>Your Registration request has been accepted </h3>
        </div>
        </div>
        <div class="content">
           <div class="para"> <p>.
             <h4><b style="color: red">Congralulations!!</b>Your Registration request has been accepted. Now you can use the ChannelCare web site.</h4></p></div>
          

            
        <div class="footer">
        <h4>ChannelCare @2023 all right received </h4>
    </div>
    </div>
    
</body>
</html>';

    $result_mail = mail($email, $subject, $message, $headers);
    if ($result_mail) {
        echo "email sent success fully<br/>";
    } else {
        echo "email not sent<br/>";
    }
}



function sentDoctorRegRejectedRequest($email, $doctor_name)
{

    $subject = "Message from ChannelCare Website";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $from = "companychannelcare@gmail.com";
    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $message = '

<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">

    <style>
    *{
      padding: 0;
      margin: 0;
      font-family: "Poppins",sans-serif;
        }
        body{
            background-color: #8EE48f;
        }
    .container{
        width: 70%;
        margin: 0 auto;
        background-color:#5cdb95;
    }







.header{
    padding: 30px;
}
.wrapper{
    background-color: #db5c60;
}
.header h2{
    color: white;
}

.header h3{
    text-align: center;
    font-size: 32px;
    border-bottom: 2px solid black;

}
.content{
    padding:0 100px ;
    text-align: center;
    margin: 0 auto;
}
p{
    margin: 0 auto;
}
.footer{
    background-color: black;
    color: white;
    text-align: center;
    margin-left:0;
    margin-right:0;
    margin-bottom:0;
    padding: 20px 0;


}

  </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="header">
            <h2>ChannelCare </h2>
            <h4>Hi ' . $doctor_name . '</h4>
            <h3>Your Registration Request has been Rejected </h3>
        </div>
        </div>
        <div class="content">
           <div class="para"> <p> Your Reqgistration Request has been Rejected. There is some issue with your send documents. Thanks! </p></div>

        <div class="footer">
        <h4>ChannelCare @2023 all right received </h4>
        </div>
    </div>

</body>
</html>';

    mail($email, $subject, $message, $headers);
}

//approve appointment
function sentAppointmentApproveRequest($email,$name,$appointment_date,$remark)
{

    $subject = "Message from ChannelCare Website";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $from = "companychannelcare@gmail.com";
    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $message = '
        
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	
    <style>
		*{
			padding: 0;
			margin: 0;
			font-family: "Poppins",sans-serif;
        }
        body{
            background-color: #8EE48f;
        }
    .container{
        width: 70%;
        margin: 0 auto;
        background-color:#5cdb95;
    }

    

     
  


.header{
    padding: 30px;
}
.wrapper{
    background-color: #379683;
}
.header h2{
    color: white;
}

.header h3{
    text-align: center;
    font-size: 32px;
    border-bottom: 2px solid black;

}
.content{
    padding:0 100px ;
    text-align: center;
    margin: 0 auto;
}
p{
    margin: 0 auto;
}
.footer{
    background-color: black;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin: 0 auto;
   
}




	</style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="header">
            <h2>ChannelCare </h2>
            <h4>Hi ' . $name . '</h4>
            <h3>Your Appointment request has been accepted </h3>
        </div>
        </div>
        <div class="content">
           <div class="para"> <p>.
             <h4><b style="color: red">Congralulations!!</b>Your Appointment request has been accepted. Your appointment time is ' .$appointment_date. '. more details '.$remark.' . Thank you!</h4></p></div>
          

            
        <div class="footer">
        <h4>ChannelCare @2023 all right received </h4>
    </div>
    </div>
    
</body>
</html>';

    $result_mail=mail($email, $subject, $message, $headers);
    if ($result_mail) {
      echo "email sent success fully<br/>";
    }else {
        echo "email not sent<br/>";
    }
}

//reject appointment
function sentAppointmentRejectedRequest($email, $name,$remark)
{

    $subject = "Message from ChannelCare Website";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $from = "companychannelcare@gmail.com";
    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $message = '

<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">

    <style>
    *{
      padding: 0;
      margin: 0;
      font-family: "Poppins",sans-serif;
        }
        body{
            background-color: #8EE48f;
        }
    .container{
        width: 70%;
        margin: 0 auto;
        background-color:#5cdb95;
    }







.header{
    padding: 30px;
}
.wrapper{
    background-color: #db5c60;
}
.header h2{
    color: white;
}

.header h3{
    text-align: center;
    font-size: 32px;
    border-bottom: 2px solid black;

}
.content{
    padding:0 100px ;
    text-align: center;
    margin: 0 auto;
}
p{
    margin: 0 auto;
}
.footer{
    background-color: black;
    color: white;
    text-align: center;
    margin-left:0;
    margin-right:0;
    margin-bottom:0;
    padding: 20px 0;


}

  </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="header">
            <h2>ChannelCare </h2>
            <h4>Hi ' . $name . '</h4>
            <h3>Your Appointment Request has been Rejected </h3>
        </div>
        </div>
        <div class="content">
           <div class="para"> <p> Your Appointment Request has been Rejected. more.. '.$remark.'Thanks! </p></div>

        <div class="footer">
        <h4>ChannelCare @2023 all right received </h4>
        </div>
    </div>

</body>
</html>';

$result=mail($email, $subject, $message, $headers);

    if ($result) {
       echo 'email send successfully';
    }else {
        echo 'email send unsccessfully';
    }
}


//approve appointment
function sentAppointmentNotificationRequest($email,$name,$appointment_date,$doctor_name)
{
        
    $subject = "Message from ChannelCare Website";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $from = "companychannelcare@gmail.com";
    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $message = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Your Email Title</title>
      <style>
        /* CSS styles for the email */
        body {
          font-family: Arial, sans-serif;
          background-color: #f2f2f2;
          margin: 0;
          padding: 0;
        }
    
        .container {
          max-width: 600px;
          margin: 0 auto;
          background-color: #ffffff;
          padding: 20px;
        }
    
        .header {
          background-color: #03316d;
          color: #ffffff;
          padding: 20px;
        }
    
        .footer {
          background-color: #03316d;
          color: #ffffff;
          padding: 10px;
          text-align: center;
        }
    
        .footertext {
          font-size: x-small;
        }
    
        h1 {
          color: #ffffff;
        }
    
        table {
          width: 100%;
          border-collapse: collapse;
        }
    
        th,
        td {
          padding: 10px;
          text-align: left;
          border-bottom: 1px solid #dddddd;
        }
    
        th {
          background-color: #f2f2f2;
        }
      </style>
    </head>
    
    <body>
      <div class="container">
        <div class="header">
          <h1>ChannelCare Appointment Notice</h1>
          <p></p>
        </div>
        <br/><br/>
        Hi '.$name.',<br/>
        <br/>
        <div>
        Your appointment at ChannelCare is in 9 hours.<br/><br/>
        Appointment Details:<br/>
        Date: '.$appointment_date.'<br/>
        Doctor: '.$doctor_name.'<br/>
        <br/>
        Arrive on time. Bring medical records if there are any. <br/>
        <br/>
        Thank you.<br/>
    <br/>
    <br/>
    <br/>
        Channel Care Online Appointment centre.
        <br/><br/><br/>
        <div class="footer">
          <p class="footertext">ChannelCare @2023 all right received</p>
        </div>
      </div>
    </body>
    
    </html>';

    $result_mail=mail($email, $subject, $message, $headers);
    if ($result_mail) {
      echo "email sent success fully<br/>";
    }else {
        echo "email not sent<br/>";
    }
}

?>