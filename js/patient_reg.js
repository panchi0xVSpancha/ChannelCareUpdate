// form submission with ajax [register 1st page]
$('#patientReg').on('submit',function(){
    var first=$('#first_name').val();
    var last=$('#last_name').val();
    var address=$('#address').val();
    var phone=$('#phone_number').val();
    var email=$('#email').val();
    var level ='patient';
    var password=$('#password').val();
    var confirmpassword=$('#confirmpassword').val();
    $.ajax({
        url:"../controller/registerCon.php",
        method:"POST",
        data:{savePatient:"savePatient",first_name:first,last_name:last,address:address,phone_number:phone,email:email,level:level,password:password,confirmpassword:confirmpassword},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            if(data.pass!=""){
                $('#passError').html(data.pass);
                $('#password').css("background-color", "rgb(255, 224, 224)");
                $('#confirmpassword').css("background-color", "rgb(255, 224, 224)");
             }
             else{
                console.log("successfully created")
                window.location='../views/login.php';
             
             }
        }
    });
    return false;
});


