//this function role is to hide the update button from the add product modal
function addProduct() {
   document.getElementById('form').reset(); // used to clear the modal
   document.getElementById('product-category').value = 0; // used to clear the modal
    $("#update").hide(); // used to hide the update button
    $("#save").show(); // used to show the save button
}
