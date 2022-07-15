// Created by Chiranjaya Chandrasena
// IT20183554

//filter menu
function Toggle() {
        var sel = document.getElementById("sel");
        var tb1 = document.getElementById("all");
        var tb2 = document.getElementById("Category");		
		var tb3 = document.getElementById("Author");
		var tb4 = document.getElementById("Publisher");
		var tb5 = document.getElementById("edu");


        tb1.style.display = sel.value == "All_books" ? "block" : "none";
        tb2.style.display = sel.value == "Category" ? "block" : "none";
		tb3.style.display = sel.value == "Author" ? "block" : "none";
		tb4.style.display = sel.value == "Publisher" ? "block" : "none";
		tb5.style.display = sel.value == "Educational" ? "block" : "none";
		
            
}

//back botton
function back(){
	window.history.go(-1);
}