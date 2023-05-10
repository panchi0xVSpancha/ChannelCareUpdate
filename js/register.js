// form submission with ajax [register 1st page]
$('#registerForm').on('submit',function(){
    var first=$('#first_name').val();
    var last=$('#last_name').val();
    var address=$('#address').val();
    var phone=$('#phone_number').val();
    var email=$('#email').val();
    var level = $('input[name="level"]:checked').val()
    $.ajax({
        url:"../controller/registerCon.php",
        method:"POST",
        data:{submit:"submit",first_name:first,last_name:last,address:address,phone_number:phone,email:email,level:level},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
          if(data.state=='unsucess')
          {
            if(data.eFirst!=""){
                $('#firstError').html(data.eFirst);
                $('#first_name').css("background-color", "rgb(255, 224, 224)");
             }else{
                 $('#firstError').html("");
                 $('#first_name').css("background-color", "#b8bcc4");
             }
             if(data.eLast!=""){
                 $('#lastError').html(data.eLast);
                 $('#last_name').css("background-color", "rgb(255, 224, 224)");
              }else{
                  $('#lastError').html("");
                  $('#last_name').css("background-color", "#b8bcc4");
              }
              if(data.eAddress!=""){
                 $('#addressError').html(data.eAddress);
                 $('#address').css("background-color", "rgb(255, 224, 224)");
              }else{
                  $('#addressError').html("");
                  $('#address').css("background-color", "#b8bcc4");
              }

              if(data.ePhone!=""){
                $('#phoneNumberError').html(data.ePhone);
                $('#phone_number').css("background-color", "rgb(255, 224, 224)");
             }else{
                 $('#phoneNumberError').html("");
                 $('#phone_number').css("background-color", "#b8bcc4");
             }

              if(data.eEmail!=""){
                 $('#emailError').html(data.eEmail);
                 $('#email').css("background-color", "rgb(255, 224, 224)");
              }else{
                  $('#emailError').html("");
                  $('#email').css("background-color", "#b8bcc4");
              }
          }else if(data.state=='sucess')
          {
            if(data.level=="doctor")
                {
                    window.location='doctor_reg.php?email='+data.email+'&first_name='+data.first_name+'&last_name='+data.last_name+'&address='+data.address+'&phone_number='+data.phone_number;
                }
            if(data.level=="patient")
                {
                    window.location='patient_reg.php?email='+data.email+'&first_name='+data.first_name+'&last_name='+data.last_name+'&address='+data.address+'&phone_number='+data.phone_number;
                }
          }
          
        }
    });

    return false;
})