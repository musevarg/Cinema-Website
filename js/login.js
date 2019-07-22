var mobile = false;

window.onload = function(){
	if (logindiv.offsetWidth < 991)
	{
		mobile = true;
	}
}

window.onresize = function(){

var logindiv = document.getElementById("logindiv");
var loginForm = document.getElementById("login-form");
var registerForm = document.getElementById("register-form");
var loginButton = document.getElementById("loginTab");
var registerButton = document.getElementById("registerTab");

	if (logindiv.offsetWidth < 991)
	{
		if (!mobile)
		{
			loginForm.style.display = "block";
			registerForm.style.display = "none";
			loginButton.style.backgroundColor = "rgb(45,45,45)";
			registerButton.style.backgroundColor = "rgb(25,25,25)";
			document.getElementById("logindiv").style.height = "710px";
			mobile = true;
		}
	} else
	{
		mobile = false;
	}
}

function register()
{

var logindiv = document.getElementById("logindiv");
var loginForm = document.getElementById("login-form");
var registerForm = document.getElementById("register-form");
var loginButton = document.getElementById("loginTab");
var registerButton = document.getElementById("registerTab");

	if (logindiv.offsetWidth < 991)
	{
		if (mobile)
		{
			document.getElementById("logindiv").style.height = "1080px";
			mobile = true;
		}
	}
	$("#register-form").fadeIn(120);
 	$("#login-form").fadeOut(120);

	loginButton.style.backgroundColor = "rgb(25,25,25)";
	registerButton.style.backgroundColor = "rgb(45,45,45)";

}

function login()
{

var logindiv = document.getElementById("logindiv");
var loginForm = document.getElementById("login-form");
var registerForm = document.getElementById("register-form");
var loginButton = document.getElementById("loginTab");
var registerButton = document.getElementById("registerTab");

	if (logindiv.offsetWidth < 991)
	{
		if (mobile)
		{		
			document.getElementById("logindiv").style.height = "500px";
			mobile = true;
		}
	}

	$("#login-form").fadeIn(120);
 	$("#register-form").fadeOut(120);

	loginButton.style.backgroundColor = "rgb(45,45,45)";
	registerButton.style.backgroundColor = "rgb(25,25,25)";
}

/* ADDRESS LOOKUP */

function getAddress(){
var postcode = $('#postcode').val();
  $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address='+ postcode + ',+UK&key=AIzaSyCKfzrRm8UtGzJo9Z-ek0gX4l2eeRtfzUk', function(data) {

  var myJSON = JSON.stringify(data, null, 2);
  obj = JSON.parse(myJSON);
  console.log(obj.results);
  //console.log(obj.results["0"].address_components["1"].long_name);
  if (obj.results["0"].address_components["0"].short_name != "GB")
  {
	  $('#addr1').val(obj.results["0"].address_components["1"].long_name);

	  var y1 = obj.results["0"].address_components["2"].long_name;
	  var y2 = obj.results["0"].address_components["3"].long_name;
	  if(y1==y2)
	  {
	  	$('#city').val(obj.results["0"].address_components["3"].long_name);
	  }
	  else
	  {
	  	 $('#addr2').val(obj.results["0"].address_components["2"].long_name);
	  	$('#city').val(obj.results["0"].address_components["3"].long_name);
	  }
  }
  else
  {
  	$('#addr1').val("");
  	$('#addr2').val("");
  	$('#city').val("");
  }

});
}