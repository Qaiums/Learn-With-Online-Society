
    // function username()
    // {  
    //    if (uname == "" && uname.length < 4) {
    //     alert("user name must be filled out");
    //     return false;
    // } 
    // }

	
	function validateForm() {
		alaer("Fuck U 2");
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

     if (uname == "") {
        alert("Username must be filled out");
        return false;
    }

     if (uname != "" && uname.length < 4) {
        alert('Username should contain atleast three word');
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
        alert("state must be filled out");r
        return false;
    }*/
    if (pass == "") {
        alert("pass must be filled out");

    }
    if(pass != "")
    {
        alert('pass is not empty');
    }
    if (confirmPass == "") {
        alert("confirmPass must be filled out");
        return false;
    }
    if (pass!=confirmPass){
    	alert("password is not match ");
        return false;
    }
    if(email != ' '){
        checkmail(email);
        //alert(email);
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
    // xhttp.open("GET","emailcheck.php?email="+str,true);
    // xhttp.send();

    $.ajax({
        url: 'emailcheck.php?email='+str,
        type: 'GET',

        success:function(data){
            if (data != 'Valid') {
                alert('This email is already taken. Please insert another one !');
                data.preventDefault();
            }else{
                console.log('ok');
            }
        }
    })

    // if()
    //   { 
    //     alert("validation failed false");
    //     returnToPreviousPage();
    //     return false;
    //   }

    //   alert("validations passed");
    //   return true;                              

    // event.preventDefault();
    
}


function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  $("#result").text("");
  var email = $("#email").val();
  if (validateEmail(email)) {
    $("#result").text(email + " is valid :)");
    $("#result").css("color", "green");
  } else {
    $("#result").text(email + " is not valid :(");
    $("#result").css("color", "red");
  }
  return false;
}

function callAjax(method, value, target)
  {
    if(encodeURIComponent) {
      //var req = new AjaxRequest();
      var params = "method=" + method + "&value=" + encodeURIComponent(value) + "&target=" + target;
      req.setMethod("POST");
      req.loadXMLDoc('/emailcheck.php', params);
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


	

