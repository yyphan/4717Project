function updateInput(id){
    
    switch(id){
        case 1:
            input1 = document.getElementById("Java");
            if(document.getElementById("JavaCheck").checked){ 
                input1.type = "number";
				document.getElementById("JavaCheck").disabled = true;
            }
        
            break;
        case 2:
			input2 = document.getElementById("singleCafe");
			input3 = document.getElementById("doubleCafe");
            if(document.getElementById("cafeCheck").checked) {
				document.getElementById("cafeCheck").disabled = true;
                input2.type = "number";
                input3.type = "number";
            }
           
            break;
        case 3:
            input4 = document.getElementById("singleCappuccino");
            input5 = document.getElementById("doubleCappuccino");
            if(document.getElementById("cappuccinoCheck").checked){
				document.getElementById("cappuccinoCheck").disabled = true;
                input4.type = "number";
                input5.type = "number";
            }
          
            break;
    }
}