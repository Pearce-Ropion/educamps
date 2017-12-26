var cart = {}; //global associative array to track items and quantities
var priceTable = {}; //global associative array to track items and prices
var login; //track whether the user is logged in
var camper = 0; // track whether the user has registered a camper;
var total = 0;
var discount = 0;

//add item(s) to cart if quantity > 0
//new value overwrites previous value
function aLaCart(name, price) 
{
  // name is also the identifier for the id of the corresponding number input
  var quantity = Number(document.getElementById(name).value);	
  //add items to the cart
  if (quantity>0)
  {
    updatePriceTable(name, price);
    cart[name] = quantity;
    updateHTMLCart();
    document.getElementById(name + " confirm").value = 1;
  }
}

//update cart table html
function updateHTMLCart()
{
  //clear previous HTML
  var parent = document.getElementById("cart");
  parent.innerHTML = "";

  var table = document.createElement("table"); //creates table

  //display all items in the cart
  var i = 0;
  var row;
  var cell1;
  var cell2;
  var cell3;
  var cell4;
  for (var key in cart)
    {
      row = table.insertRow(i);
      cell1 = row.insertCell(0)
      cell2 = row.insertCell(1);
      cell3 = row.insertCell(2);
      cell4 = row.insertCell(3);
      cell1.innerHTML = key;
      cell2.innerHTML = cart[key];
      //if the item has a whole-number price, display dec point with two 0's, else display 1 zero
      if (priceTable[key] % 1 === 0)
        cell3.innerHTML = "$" + (cart[key] * priceTable[key]) + ".00"; 
      else
        cell3.innerHTML = "$" + (cart[key] * priceTable[key]) + "0"
      i++;
      cell4.innerHTML = "<button type='button' onclick=removeItem('" + encodeURIComponent(key) + "')>Remove</button>";
    }

  var header = table.createTHead();
  row = header.insertRow(0);
  cell1 = row.insertCell(0);
  cell1.innerHTML = "Item";
  cell2 = row.insertCell(1);
  cell2.innerHTML = "Quantity";
  cell3 = row.insertCell(2);
  cell3.innerHTML = "Price";

  table.className = "item-cart"; //link table to CSS
  table.id = "cart-table-id";
  parent.appendChild(table); // adds table to cart
  updateTotal();
  console.log(total);
  var finalTotal = document.getElementById("final-total");
  finalTotal.innerHTML = "<span class='total-price-bold'>Total price</span>: $" + "<span id='total-price'>" + total + "</span>";
  displayControls();
}

//add an item and its price to the price table if its not already
function updatePriceTable(name, price)
{
  if(!priceTable[name])
    priceTable[name] = price;
}

//remove an item from the cart
//button displayed next to item in the HTML cart
function removeItem(encodedName)
{
  var name = decodeURIComponent(encodedName);
  delete cart[name];
  document.getElementById(name).value = 0;
  //if the cart is empty, clear HTML
  if (Object.keys(cart).length === 0)
    emptyCart();
  //else update the cart
  else
    updateHTMLCart();
  document.getElementById(name+" confirm").value = 0;
}

//empty the cart and clear ALL HTML
function emptyCart()
{
  for (var key in cart)
  {
    delete cart[key];
    document.getElementById(key+" confirm").value = 0;
  }
  document.getElementById("cart").innerHTML = "";
  displayControls();
  updateTotal();
}

//hide or show cart controls basd on whether the user is logged in and how many items are in the cart
function displayControls()
{
  if (login === false)
  {
    document.getElementById("submit").style.display = "none";
    document.getElementById("reset").style.display = "none";
  }
  if (login === true && Object.keys(cart).length === 0)
  {
    document.getElementById("submit").style.display = "none";
    document.getElementById("reset").style.display = "none";
  }
  if (login === true && Object.keys(cart).length !== 0)
  {
    document.getElementById("submit").style.display = "inline";
    document.getElementById("reset").style.display = "inline";
  }
}

function updateTotal()
{
  //calculate total
  total = 0;
  if (Object.keys(cart).length !== 0)
    for (var key in cart)
        total += (cart[key] * priceTable[key]);
  //calculate discount
  discount = 0;
  var link = document.getElementById("camp-child-discount"); //displays link to register
  var message = document.getElementById("discount-message"); //displays discount
  var finalTotal = document.getElementById("final-total");
  var cartLength = Object.keys(cart).length;
  if (camper === 0) {
    if (cartLength > 0) {
      link.innerHTML = "<a href='/projects/coen161/register/'>Register a camper now to save 15%!</a>";
      message.innerHTML = "";
    }
    else {
      link.innerHTML = "";
      message.innerHTML = "";
      finalTotal.innerHTML = "";
    }
  }
  else {
    if (cartLength > 0) {
        discount = (Math.round(total*0.15 * 100) / 100).toFixed(2);
        link.innerHTML = "";
        message.innerHTML = "<br>Registration discount: -$" + discount;
    }
    else {
      link.innerHTML = "";
      message.innerHTML = "";
      finalTotal.innerHTML = "";
    }
  }
  if (discount > 0)
    total -= discount;
  total = total.toFixed(2);
}

$(document).ready(function(){
  $("#shop-form").submit(function(){
      alert("Thank you for your order!  Your total was: $"+total+"\nYou'll receive confirmation details by email shortly!");
  });
});

$(document).keypress( //prevent the enter key from submitting the form inadvertently
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }
});