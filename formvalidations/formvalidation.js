function ErroMsg(elemId, hintMsg) 
{
    document.getElementById(elemId).innerHTML = hintMsg;
}


function ValidateForm(event) {
    console.log("func work");
    event.preventDefault();

    var fname =document.myform.fname.value;
    var lname =document.myform.lname.value;
    var email =document.myform.email.value;
    var mobileno=document.myform.mobileno.value;
    var Dob =document.myform.Dob.value;
    var gender=document.myform.gender.value;

    var fnameErr = lnameErr = emailErr = mobileErr = dobErr = genderErr= true;
    var dataString = '&fname=' + fname +'&lname='+ lname + '&gender='+ gender +'&email=' + email + '&mobileno=' + mobileno + '&Dob='+ Dob;
    
     //   ------------------------------------- firstname validation start---------------------------------
   
     if (fname == "") 
    {
        ErroMsg("nameErr", "please enter your name");

    }
    else {
        var regex = /^[a-zA-Z\s]+$/;

        if (regex.test(fname) === false) 
        {
            ErroMsg("nameErr", "Please enter a valid name");
        }
        else {
            ErroMsg("nameErr", "");
            
            fnameErr = false;
        } 
    }
     //   ------------------------------------- firstname validation end---------------------------------

      //   ------------------------------------- laststname validations start---------------------------------
    if (lname == "") 
    {
        ErroMsg("lnameErr", "please enter your lastname");
    }
    else 
    {
        var regex = /^[a-zA-Z\s]+$/;

        if (regex.test(lname) === false)
         {
            ErroMsg("lnameErr", "Please enter a valid name");
        }
        else {
            ErroMsg("lnameErr", "");
            lnameErr = false;
        } 
    }
 //   ------------------------------------- lastname validation end---------------------------------
    if(fname.length>15)
    {
      ErroMsg("nameErr","Name must be include 15 char");
    }  

    if(lname.length>10)
    {
      ErroMsg("lnameErr","LastName must be include 10 char");
    } 
     //   ------------------------------------- Names validation end---------------------------------

    if(gender=="")
    {
        ErroMsg("genderErr", "Please enter your gender");
       
    }
    else
    {
        ErroMsg("genderErr", "");
        genderErr=false;
    }
    
    if (email == "") 
    {
        ErroMsg("emailErr", "Please enter your email address");
        // return false;
    }
    else 
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;;

        if (regex.test(email) === false) 
        {
            ErroMsg("emailErr", "Please enter a valid email address");
        }
       else 
         {
            ErroMsg("emailErr", "");
             emailErr = false;
          
        }
    }

    if (mobileno =="") 
    {
        ErroMsg("mobileErr", "Please enter your mobile number");
    //    return false;
    } 
    else 
    {
        var regex = /^[0-9]{1}[0-9]{9}$/;

        if (regex.test(mobileno) === false) 
        {
            ErroMsg("mobileErr", "Please enter a valid  mobile number");
        }       
        else 
        {
            ErroMsg("mobileErr", "");
            mobileErr = false;
        }
    }
    if (Dob == "") 
    {
        ErroMsg("dobErr", "Please enter your DOB");

        // return false;
    }
    else 
    {
        ErroMsg("dobErr", "")

        dobErr = false;
    }


    if ((fnameErr ||lnameErr|| emailErr || mobileErr||dobErr||genderErr) === true)
    {
        return false;
    }
        // Creating a string from input data for preview
            var dataPreview =
            "Full Name: " + fname + "\n" +
            "Last Name: " +lname+"\n"+
            "Gender: " + gender+'\n'+
            "Email Address: " + email + "\n" +
            "Mobile Number: " + mobileno + "\n"+
             "Date of Birth: " + Dob + "\n"

             // AJAX code to submit form.
             $.ajax({
                type: "POST",
                url: "valid.php",
                data: dataString,
                cache: false,
                success: function(html) 
                {
                   if(html=="Connected successfullyRecord was inserted!"){
                    Swal.fire(
                        'Submitted SuccessFully!',
                        'You clicked the button!',
                        'success'
                        )
                        $('#myform').trigger('reset');
                   }
                   else                    {
                     Swal.fire({
                         icon: 'error',
                         title: 'Duplicate Entry',
                         text: 'Check your Entry!',
                      })
                    // alert(html);
                   }
                  
                }    
                });

                console.log(dataPreview);
};
// function alertt()
// {
//     Swal.fire(
// 'Submitted SuccessFully!',
// 'You clicked the button!',
// 'success'
// )
// } 

// jQuery("#myform").on("submit",function(e)
// {
// alert('s');
// });

// document.querySelector("submit").addEventlistener('click',()=>{
//     let xhr= new XMLHttpRequest();
//     xhr.open("POST","formvalidation.html",true);
    
//     xhr.onreadystatechange=function()
//     {
//     console.log(xhr.readyState);
//     }
//     xhr.send();
//     });
