//this function role is to hide the update button from the add product modal
function addProduct() {
    document.querySelector(".form").reset(); // used to clear the modal
    $("#update").hide(); // used to hide the update button
    $("#save").show(); // used to show the save button
}
