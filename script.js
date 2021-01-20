function showAddForm(){
  document.querySelector(".add").style="top: 9%;" +
  "left: 30%;";
  console.log("test");
}
function validateAddForm(){
  if(document.forms["add-form"]["day"].value == ""){
    alert("Please select a day first");
    return false;
  }
}