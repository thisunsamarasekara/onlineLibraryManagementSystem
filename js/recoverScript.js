// Created by P.M.J.I.Karunarathna IT20235192

function back() {
  window.history.go(-1);
}

function myFunction1() {
  var x = document.getElementById("npsw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("cpsw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function checkPassword(){
	var password = document.getElementById("psw");
	var rpassword = document.getElementById("cpsw");
	if(npsw == cpsw)
	{
		alert("Success!");
	}
	else
	{
		alert("Password Mismatch!");
	}
}
