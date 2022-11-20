<?php 

//INCLUDE DATABASE FILE
include ('database.php');

session_start();

$_SESSION['id']=1;

//ROUTING
if (isset($_POST['save'])){       saveTask();}

if (isset($_POST['update']))      updateTask();
if (isset($_POST['delete']))      deleteTask();

//SAVE FUNCTION
function saveTask()
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    // image
    $id=$_SESSION['id'];

    $description = $_POST['description'];
    //SQL INSERT
    $query = "INSERT INTO products(name ,category_id ,price,user_id ,quantity , description) VALUES ('$name','$category','$price','$id','$quantity','$description')";

    global $connection;//to make it visible into the scope of the function 
    $_SESSION['message'] = "Product has been added successfully !";
    mysqli_query($connection, $query);
    header('location:products.php');
    die;
}

//DELETE FUNCTION