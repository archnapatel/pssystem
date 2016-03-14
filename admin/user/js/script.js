
function validateForm() 
{	
	/* first name validation */
 	var first_name = document.forms["registration"]["first_name"].value;
    var reg = /[a-z]^[A-Z]*$/
 	if (reg.test(first_name))
	{
 		return true; 
	}
 	else
 	{
 		alert("last name must consider aharter and white space");
 	}
 	/* last name validation */
 	var last_name = document.forms["registration"]["last_name"].value;
    var reg = /[a-z]^[A-Z]*$/
 	if (reg.test(last_name))
	{
 		return true; 
	}
 	else
 	{
 		alert("last name must consider aharter and white space");
 	}
 	/* email validation */
    var email = document.forms["registration"]["email"].value;
    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
 	if (reg.test(email))
	{
 		return true; 
	}
 	else
 	{
 		alert("please enter valid email");
 	}
 	/* user name validation */
 	var user_name = document.forms["registration"]["user_name"].value;
    var reg = /[a-z]^[A-Z]*$/
 	if (reg.test(user_name))
	{
 		return true; 
	}
 	else
 	{
 		alert("user name must consider alphabet and white space");
 	}
 	/* city validation */
 	var city = document.forms["registration"]["city"].value;
    var reg = /[a-z]^[A-Z]*$/
 	if (reg.test(city))
	{
 		return true; 
	}
 	else
 	{
 		alert("please valid city name");
 	}
 	/* zipcode validation */
 	var zipcode = document.forms["registration"]["zipcode"].value;
    var reg = /^[0-9]{5}(?:-[0-9]{4})?$/;
 	if (reg.test(zipcode))
	{
 		return true; 
	}
 	else
 	{
 		alert("zipcode must in 6 digits");
 	}
 	/* confirm password validation*/
 	var password = document.forms["registration"]["password"].value;
 	var confirm_password = document.forms["registration"]["confirm_password"].value;
 	if (password != confirm_password)
 	{
        alert("Passwords do not match.");
    }
   
}
