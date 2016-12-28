

	
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




    if (name == "") {
        alert("Name must be filled out");
        return false;
    }
   
     if (uname == "" && uname.length < 4) {
        alert("user name must be filled out");
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
    }

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
	

