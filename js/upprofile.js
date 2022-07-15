// JavaScript Document
function validation()
{
	//alert("Please provide your name!");
    if(document.myForm.Name.value=="")
    {
        alert("Please provide your name!");
        document.myForm.Name.focus();

        return false;
    }

    if(document.myForm.Email.value == "")
	{
		alert("Pleace provide Your Emaill");

		document.myForm.Email.focus();
		return false;

}
	 if(document.myForm.telephone.value == "")
	{
		alert("Pleace provide Your contact number");

		document.myForm.telephone.focus();
		return false;
	}
	
	if(document.myForm.Address.value=="")
	{
		alert("Pleace provide Your  Address");
		
		document.myForm.Address.focus();
		return false;
	}
	
	if(document.getElementById("Gender").value=="")
	{
		alert("pleace select your Gender");
		
		document.myForm.Gender.focus();
		return false;
		
	}
	if(document.getElementById("date").value=="")
	{
		alert("pleace select your DOB");
		
		document.myForm.date.focus();
		return false;
		
	}
	if(document.myForm.Npassword.value == "")
	{
		alert("Pleace provide Your New Password");

		document.myForm.Npassword.focus();
		return false;
	}
	
	if(document.myForm.Cpassword.value=="")
	{
		alert("Pleace provide Your  Comfrim Password");
		
		document.myForm.Cpassword.focus();
		return false;
	
}
	
	/*alert(document.myForm.Npassword.value);*/
	var a=document.myForm.Npassword.value;
	var b=document.myForm.Cpassword.value;
	if(a!=b){
		
		alert("Password not match")
		document.myFrom.cpassword.value;
	}
	
}