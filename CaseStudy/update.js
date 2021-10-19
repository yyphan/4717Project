function updateInput(id){
    
    switch(id){
        case 1:
            inputLow = document.getElementById("Java");
            if(document.getElementById("JavaCheck").checked){ 
                inputLow.type = "number";
				document.getElementById("JavaCheck").disabled = true;
            }
        
            break;
        case 2:
			inputLow = document.getElementById("singleCafe");
			inputHigh = document.getElementById("doubleCafe");
            if(document.getElementById("cafeCheck").checked) {
				document.getElementById("cafeCheck").disabled = true;
                inputLow.type = "number";
                inputHigh.type = "number";
            }
           
            break;
        case 3:
            inputLow = document.getElementById("singleCappuccino");
            inputHigh = document.getElementById("doubleCappuccino");
            if(document.getElementById("cappuccinoCheck").checked){
				document.getElementById("cappuccinoCheck").disabled = true;
                inputLow.type = "number";
                inputHigh.type = "number";
            }
          
            break;
    }
}