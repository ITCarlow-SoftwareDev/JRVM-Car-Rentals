/*
  Author: Mark Kelly
  Date: 22/02/2016
  File Name: mark.js
*/




function clearForm() {
  document.getElementById("textarea").innerHTML = "";
} // end clearForm

function clearAddCat() {
  document.getElementById("catId").innerHTML = "";
  document.getElementById("costPerDay").innerHTML = "";
  document.getElementById("fiveDayDisc").innerHTML = "";
  document.getElementById("tenDayDisc").innerHTML = "";
} // end clearForm

function clear() {
  document.getElementById("delCat").reset();
}
