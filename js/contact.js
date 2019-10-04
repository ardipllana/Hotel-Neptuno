/*function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
*/
function validateForm() {
  var name = document.forms["myForm"]["firstname"].value;
  if (name == "") {
 	 alert("Name must be filled out");
  	return false;
  }

  var surname = document.forms["myForm"]["lastname"].value;
  if (surname == "") {
    alert("Last name must be filled out");
    return false;
  }

  var email = document.forms["myForm"]["email"].value;
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    return (true)
  }
    
  else {
    	alert("You have entered an invalid email address!");
    	return (false)
  }


  // var phone = document.forms["myForm"]["phone"].value;
  // if (phone == "") {
  //  alert("Phone must be filled out");
  //   return false;
  // }

  var message = document.forms["myForm"]["message"].value;
  if (message == "") {
    alert("Please write a message!");
    return false;
  }

  

  }
  

