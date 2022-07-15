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
	//document.write(document.myForm.Message.value);

if(document.myForm.Message.value=="")
	{
		alert("Pleace provide Your  Message");
		
		document.myForm.Message.focus();
		return false;
	}
	
    	
}