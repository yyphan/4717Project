function validname(){
  var name = document.getElementById("Name").value;
  if(name.length > 0){ // if there is input
	var regexp = /^[A-Za-z\s]+$/;  // one or more aphabets or white spaces
	if(regexp.test(name)){
	 return true;
	 }
	else{
	  alert("Invalid format, enter alphabet characters and character spaces only")
	  return false;
	  }
	}
  alert("Name is required"); //field empty
  return false;
}


function validemail() {
  var email = document.getElementById("Email").value;
  if(email.length > 0){ //If there is input
    var regexp = /^([\w\.\-])+@([\w]+\.){1,3}([A-z]){2,3}$/; // includes one or more word, hyphen and period
    if(regexp.test(email)){
	  return true;
	  }
    else{
        alert("Invalid email format."); // wrong format
        return false;
		}
    }
  alert("Email is required."); // empty field
  return false;
}

function validdate(){
    var date = new Date(document.getElementById("Date").value);
    var today = new Date();
    if(date.getFullYear() > today.getFullYear()) {  //compare by year
		return true;
	}
	else if(date.getFullYear() == today.getFullYear()){ //if same year, compare month
		if(date.getMonth() > today.getMonth()){
			return true;
		}
		else if(date.getMonth() == today.getMonth()){ //if same month, compare days
			if(date.getDate() > today.getDate()){
				return true;
			}
		}
	}
	alert("Invalid Date.");
	return false;
}