const JUST_JAVA_SINGLE = 2;
const CAFE_AU_LAIT_SINGLE = 2;
const CAFE_AU_LAIT_DOUBLE = 3;
const ICED_CAP_SINGLE = 4.75;
const ICED_CAP_DOUBLE = 5.75;


function CalculateJustJava(element)
{
    var qty = element.value;
    var sum = qty * JUST_JAVA_SINGLE;

    document.getElementById("JustJavaPrice").value = sum;
    UpdateTotalSum();
}

function CalculateCafeAuLait()
{
    var qty = document.getElementById("CafeAuLaitQty").value;
    var choice = document.querySelector('input[name="CafeAuLaitChoice"]:checked').value;
    
    var sum;
    switch (choice) {
        case "cafe_au_lait_single":
            sum = qty * CAFE_AU_LAIT_SINGLE;
            break;
        case "cafe_au_lait_double":
            sum = qty * CAFE_AU_LAIT_DOUBLE;
            break;
    }
    
    document.getElementById("CafeAuLaitPrice").value = sum;
    UpdateTotalSum();
}

function CalculateIcedCap()
{
    var qty = document.getElementById("IcedCapQty").value;
    var choice = document.querySelector('input[name="IcedCapChoice"]:checked').value;
    
    var sum;
    switch (choice) {
        case "iced_cappuccino_single":
            sum = qty * ICED_CAP_SINGLE;
            break;
        case "iced_cappuccino_double":
            sum = qty * ICED_CAP_DOUBLE;
            break;
    }
    
    document.getElementById("IcedCapPrice").value = sum;
    UpdateTotalSum();
}

function UpdateTotalSum() 
{
    var justJavaSum = parseFloat(document.getElementById("JustJavaPrice").value);
    var cafeAuLaitSum = parseFloat(document.getElementById("CafeAuLaitPrice").value);
    var icedCapSum = parseFloat(document.getElementById("IcedCapPrice").value);

    var totoalSum = justJavaSum + cafeAuLaitSum + icedCapSum;

    document.getElementById("TotalPrice").value = totoalSum;
}