function fun(event) 
{
    console.log("func work");
    event.preventDefault();

    var fname =document.myform.fname.value;
    var lname =document.myform.lname.value;
    var email =document.myform.email.value;
    var mobileno=document.myform.mobileno.value;
    var Dob=document.myform.Dob.value;
    var password = document.myform.password.value;

    var dataString = '&fname=' + fname +'&lname='+ lname + '&password='+ password +'&email=' + email + '&mobileno=' + mobileno + '&Dob='+ Dob;

    var dataPreview =
    "Full Name: " + fname + "\n" +
    "Last Name: " +lname+"\n"+
    "password: " + password +'\n'+
    "Email Address: " + email + "\n" +
    "Mobile Number: " + mobileno + "\n"+
     "Date of Birth: " + Dob + "\n"+


      // AJAX code to submit form.
       $.ajax({
        type: "POST",
        url: "regform.php",
        data: dataString,
        cache: false,
        success: function(html)  
            {
             alert(html);
            }
            });

        console.log(dataPreview);

};
function Showpass() 
{
            var x = document.getElementById("password");
            if (x.type === "password") 
            {
               x.type = "text";
            }
            else
             {
                x.type = "password";
            }
        }
        