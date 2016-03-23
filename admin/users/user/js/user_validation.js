function validform()
{	alert("enter valid last name");
	var string = "/^[a-zA-Z]{3,20}$/";
	//var userex = "/^[a-zA-Z0-9]{3,20}$/"; 
	//var emailex =  /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	//var zipex =  /[0-9]{6}$/;
	var first_name = document.forms["registration"]["first_name"].value;
	if (first_name.value == "" || first_name.value == null )
	{
		alert("enter valid firstname");
		first_name.focus();
		return false;
	}
	/*var  last_name = document.forms["registration"]["last_name"];
	if (last_name.value == "" || last_name.value == null || (last_name.test(string.value)))
	{
		alert("enter valid last name");
		last_name.focus();
		return false;
	}
	var email = document.forms["registration"]["email"];
	if (email.value == "" || email.value == null || /*(email.test(emailex.value))*/)
	/*{
		alert("enter valid email name");
		email.focus();
		return false;
	}*/
	/*var user_name.value = document.forms["registration"]["user_name"].value;
	else if (user_name.value == "" || user_name.value == null || (user_name.test(userex.value)))
	{
		alert("enter valid user name");
		user_name.focus();
		return false;
	}
	var city = document.forms["registration"]["city"];
	if (city.value == "" || city.value == null || ) //(city.test(string.value)))
	{
		alert("enter valid city name");
		city.focus();
		return false;
	}
	var state = document.forms["registration"]["state"];
	if (state.value == "" || state.value == null || (state.test(string.value)))
	{
		alert("enter valid state name");
		state.focus();
		return false;
	}
	var country = document.forms["registration"]["country"];
	if (country.value == "" || country.value == null || (country.test(string.value)))
	{
		alert("enter valid country name");
		country.focus();
		return false;
	}
	var zipcode = document.forms["registration"]["zipcode"];
	if (zipcode.value == "" || zipcode.value == null || (zipcode.test(zipex.value)))
	{
		alert("enter valid zipcode");
		zipcode.focus();
		return false;
	}
	/*confirm password validation
 	var password = document.forms["registration"]["password"].value;
 	var confirm_password = document.forms["registration"]["confirm_password"].value;
 	if (password != confirm_password)
 	{
        alert("Passwords do not match.");
        return false;
    }*/
}