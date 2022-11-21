<?php 

//INCLUDE DATABASE FILE
include ('database.php');

include ('session.php');



//ROUTING
if (isset($_POST['save'])){       saveProducts();}

if (isset($_POST['update']))      updateProduct();
if (isset($_GET['id']))      deleteProducts();

//SAVE FUNCTION
function saveProducts()
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $id=$_SESSION['id'];

    //Upload img
    //-----------------------------------------------
    $tmp_picture_name     = $_FILES['picture']['tmp_name'];
    //unique id img
    $new_unique_name      = uniqid('',true);
    //
    $basename = $_FILES['picture']['name'];
    $image = $new_unique_name . $basename;
    //check picture
    if(!empty($_FILES['picture']['name'])){
        $distination_file = '../img/upload/'.$image;
    }
    
    //Func upload picture
    move_uploaded_file($tmp_picture_name,$distination_file);
    //-----------------------------------------------

    //SQL INSERT
    $query = "INSERT INTO products(name ,category_id ,price,user_id ,quantity , description, picture) VALUES ('$name','$category','$price','$id','$quantity','$description','$image')";

    global $connection;//to make it visible into the scope of the function 
    mysqli_query($connection, $query);
    $_SESSION['message'] = "Product has been added successfully !";
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
function deleteProducts()
{
    //CODE HERE
    $id = $_GET['id'];
    //SQL DELETE
    $query = "DELETE FROM products WHERE id='$id'";

    global $connection;
    mysqli_query($connection, $query);
    
    $_SESSION['message'] = "Product has been deleted successfully !";
    header('location: products.php');
    die;
}


//THE ROLE OF THIS FUNCTION IS TO GET THE SELECTED PRODUCT FROM DATABASE AND STOCK IT IN VARIABLES
function getProduct($id){
    //CODE HERE
    $query="SELECT
        products.* , categories.name AS category
        FROM products
        INNER JOIN categories
        ON products.category_id = categories.id WHERE products.id=$id
        ";
    //SQL SELECT
    global $connection;//to make it visible into the scope of the function 
    $result=mysqli_query($connection, $query);
    
    return mysqli_fetch_assoc($result);
}

//UPDATE FUNCTION
function updateProduct(){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $idProduct=$_POST['product-id']; //product-id is the hidden input in the modal
    // image
    $id=$_SESSION['id'];
    

    $description = $_POST['description'];
    //SQL INSERT
    $query= "UPDATE products 
            SET name='$name', description='$description', price='$price', quantity ='$quantity', category_id ='$category'
            WHERE id='$idProduct'";

    global $connection;//to make it visible into the scope of the function 

    $_SESSION['message'] = "Product has been updated successfully !";

    mysqli_query($connection, $query);
    header('location:products.php');
    die;

}

//Min Price counter
function counterMin(){
    $query= "SELECT MIN(price)
            FROM products";

    global $connection;
    $result=mysqli_query($connection, $query);

    $result= mysqli_fetch_array($result);
    
    return $result[0];

}


//Max Price counter
function counterMax(){
    $query= "SELECT MAX(price)
    FROM products";

global $connection;
$result=mysqli_query($connection, $query);

$result= mysqli_fetch_array($result);

return $result[0];
}

//Available Product counter
function counterProduct(){
    $query= "SELECT COUNT(id)
    FROM Products";
    
global $connection;
$result=mysqli_query($connection, $query);

$result= mysqli_fetch_array($result);

return $result[0];
}
//Categories counter
function counterCategories(){
    $query= "SELECT COUNT(id)
    FROM categories";
    
global $connection;
$result=mysqli_query($connection, $query);

$result= mysqli_fetch_array($result);

return $result[0];
}