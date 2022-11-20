<?php 

//INCLUDE DATABASE FILE
include ('database.php');

session_start();

$_SESSION['id']=1;

//ROUTING
if (isset($_POST['save'])){       saveProducts();}

if (isset($_POST['update']))      updateProducts();
if (isset($_POST['delete']))      deleteProducts();

//SAVE FUNCTION
function saveProducts()
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

//DISPLAY FUNCTION
function getProducts()
{
    //CODE HERE
    $query="SELECT
        products.* , categories.name AS category
        FROM products
        INNER JOIN categories
        ON products.category_id = categories.id
        ";
    //SQL SELECT
    global $connection;//to make it visible into the scope of the function 
    $result=mysqli_query($connection, $query);
    
    return $result;
}


//DELETE FUNCTION
