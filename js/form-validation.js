window.onload = init;

function init() {

	//target the submit button
	document.getElementById('submit').onclick = validate;

}

function validate() {

	var valid = true; //assume everything is ok 

	//validate the first name
	//select the first name using the DOM
	var firstName = document.getElementById('name'); 
	if(firstName.value.length < 2){
		//dont submit form
		valid = false;
	//use the DOM to select the first-name error message element and give it the error message
		document.getElementById('name-msg').innerHTML = 'First name must be at least 2 characters long';
	} else {
		//everything is fine
		document.getElementById('name-msg').innerHTML = '';
	}

	//use the DOM and select the email inputs value
	var email = document.getElementById('email').value;
	var emailRegExp = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if(!email || emailRegExp.test(email) == false) {
		//not valid
		document.getElementById('email-msg').innerHTML = 'Please enter a valid email address';
		valid = false;
	} else {
		//is valid
		document.getElementById('email-msg').innerHTML = '';
	}

	var message = document.getElementById('message');
	if(message.value.length < 15) {
		valid = false;
		document.getElementById('message-msg').innerHTML = 'Message must be at least 15 characters long';
	} else {
		document.getElementById('message-msg').innerHTML = '';
	}



if (valid == true) {
success();
}

	return false;


//if properly validated, an alert box will come up alerting them that the reservation enquiry has been initiated.
}	function success()
{
alert("Thank you " + document.forms[0]["title"].value + " " + document.forms[0]["family-name"].value + ", your booking enquiry has been made.")
}