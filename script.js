let addIsOpen = false;
let editIsOpen = false;
function showAddForm(){
  if(editIsOpen) hideEditForm();
  addIsOpen = true;
  document.querySelector(".add").style="top: 9%;";
}
function hideAddForm(){
  document.querySelector(".add").style="top: 100%;";
}
function showEditForm(){
  if(addIsOpen) hideAddForm();
  editIsOpen = true;
  document.querySelector(".edit").style="top: 9%;";
}
function hideEditForm(){
  document.querySelector(".edit").style="top: 100%;";
}
function validateAddForm(){
  if(document.forms["add-form"]["day"].value == ""){
    alert("Please select a day first");
    return false;
  }
}
function validateEditForm(){
  if(document.forms["edit-form"]["day"].value == ""){
    alert("Please select a day first");
    return false;
  }
}