
  
    function username()
    {  
       if (uname == "" && uname.length < 4) {
        alert("user name must be filled out");
        return false;
    } 
    }

    
    function validateForm() {
        
     var name = document.forms["myForm"]["name"].value;
     var uname=document.forms["myForm"]["uname"].value;
     var gender=document.forms["myForm"]["gender"].value;
     var phone=document.forms["myForm"]["phone"].value;
     var email=document.forms["myForm"]["email"].value;
     var address=document.forms["myForm"]["address"].value;
     /*var country=document.forms["myForm"]["country"].value;
     var state=document.forms["myForm"]["state"].value;*/
     var pass=document.forms["myForm"]["pass"].value;
     var confirmPass=document.forms["myForm"]["confirmPass"].value;


    var flag= "<?php session_start(); echo $_SESSION['reg_flag']; ?>";


    if (name == "") {
        alert("Name must be filled out");
        alert(flag);
        return false;
    }
   
     if (uname == "" && flag != 1) {
        alert("user name must be filled out with 4 charecter.");
        return false;
    }

      
     if (gender == "") {
        alert("gender must be filled out");
        return false;
    }
    if (phone == "") {
        alert("phone must be filled out");
        return false;
    }
    if (email == "") {
        alert("email must be filled out");
        return false;
    }
    if (address == "") {
        alert("address must be filled out");
        return false;
    }
    /*
    if (country == "") {
        alert("country must be filled out");
        return false;
    }
    if (state == "") {
        alert("state must be filled out");
        return false;
    }*/
    if (pass == "") {
        alert("pass must be filled out");
        return false;
    }
    if (confirmPass == "") {
        alert("confirmPass must be filled out");
        return false;
    }
    if (pass!=confirmPass){
        alert("password is not match ");
        return false;
    }
    if(checkmail(email)){
        alert("Change Your Email.");
        return true ;
    }

}


function checkmail(str)
{
    //alert("test");
    var xhttp;
    if(str.length==0)
    {
        document.getElementById('txtHint').innerHTML=" ";
        return true ;
    }
    xhttp= new XMLHttpRequest();
    xhttp.onreadystatechange=function()
    {   
        if (xhttp.readyState== 4 && xhttp.status==200)
        {
            document.getElementById("txtHint").innerHTML=this.responseText;
            if(this.responseText != "<p>Valid</p>"){
                return true;
            }
            else return false;
        }
    };
    xhttp.open("GET","emailcheck.php?email="+str,true);
    xhttp.send();
    
}




function validateLoinForm()
{
var email=document.forms["myForm1"]["email"].value;
var pass=document.forms["myForm1"]["pass"].value;

 if (email == "") {
        alert("email must be filled out");
        return false;
    }

 if (pass == "") {
        alert("pass must be filled out");
        return false;
    }
}
