function showAddForm(){
  document.querySelector(".add").style="top: 9%;" +
  "left: 30%;";
  console.log("test");
}
function hideAddForm(){
  document.querySelector(".add").style="top: 100%;" +
  "left: 100%;";
  console.log("test");
}
function showRemoveButton(){
  document.querySelector("#remove-button").style = "margin-top: 15px;";
}
function validateAddForm(){
  if(document.forms["add-form"]["day"].value == ""){
    alert("Please select a day first");
    return false;
  }
}