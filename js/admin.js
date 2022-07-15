// toggle book - member
function Toggle() {
	
	
	var sel = document.getElementById("sel");
	var value = sel.value;  
	
    if(value == "book"){
        document.getElementById('tab_1').style.display = 'block';
		document.getElementById('tab_member').style.display = 'none';
		
		document.getElementById('Bookbtn').style.display = 'block';
		document.getElementById('Memberbtn').style.display = 'none';
	}else{
   
   if(value == "member")
		document.getElementById('tab_1').style.display = 'none';
		document.getElementById('tab_member').style.display = 'block';	
		
		document.getElementById('Bookbtn').style.display = 'none';
		document.getElementById('Memberbtn').style.display = 'block';
		
		
	}
}


