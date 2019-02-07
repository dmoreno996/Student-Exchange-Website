
var taxRate=0.05;



function calculateTotal()
{//adds together a single item
    
    var total = 0;
    var here = document.getElementById('beforeTotal');//will be printed here
    var x = document.getElementById("drop");//gets quantity from drop menu
    var qty = (x.options[x.selectedIndex].value);

    var price = document.getElementById("theprice").innerHTML;
    
    var total = qty * price;
    alert ("qty: " + qty + "price: " + price + "total: " + total);
    
    total = parseFloat(Math.round(total)).toFixed(2);//round it to 2 decimal places
    here.innerHTML=total.toString();
}

var totalCost = calculateTotal();

function calculateFinalTotal(totalCost)
{//this function calculates the final total after tax and all the others are added together
    var place = document.getElementById("finalResult");//will be printed here

    var taxRate = 0.05;
    var tax = totalCost*taxRate;
    var totalAfterTax = tax+totalCost;
    
   
    totalAfterTax = parseFloat(Math.round(totalAfterTax*100)/100).toFixed(2);//round it to 2 decimal places
    place.innerHTML=totalAfterTax.toString();

    document.getElementById("totalbefore").innerhtml=totalCost.toString();
    document.getElementById("totalafter").innerhtml=totalAfterTax.toString();
}

function goToPage()
{
    <button onclick="window.location.href='profile.php'"></button>
}
