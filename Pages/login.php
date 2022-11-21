<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include database file
require_once "database.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login&signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>LogIn Origin Game</title>
</head>
<body>
  <header>
                    <!-- NAVBAR -->
                    <nav class="navbar navbar-expand-lg  ">
                      <div class="container-fluid">
                          <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" style="height: 30px">𝓞𝓻𝓲𝓰𝓲𝓷 𝓖𝓪𝓶𝓮𝓻</a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                        <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
                            <ul class="navbar-nav flex-row justify-content-center">
                                <li class="nav-item mx-2 ">
                                    <button class="btn btn-secondary btn-sm"><a class="nav-link" aria-current="page" href="login.php">𝓛𝓸𝓰𝓘𝓷</a></button>
                                  </li>
                              <li class="nav-item">
                                <button class="btn btn-secondary btn-sm"><a class="nav-link" href="signup.php">𝓢𝓲𝓰𝓷𝓤𝓹</a></button>
                              </li>
                            </ul>
                        </div>
                      </div>
                    </nav>
  </header>
  <section>
                 <!-- LOGIN -->
    <div class="card mt-4 mx-auto col-12 col-sm-6 " >
        <div class="card-body">
                <h1 class="text-center fw-bold">LogIn</h1>

                <?php 
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }        
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 mt-4">
                        <label for="exampleInputEmail1" class="form-label <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">Username</label>
                        <input type="text" name="username" class="form-control"></input>
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"></input>
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="d-flex flex-column align-items-center ">
                        <button type="submit" class="btn btn-light fw-bold mt-3">LOGIN</button>
                        <p>Not a member? <a href="signup.php">SignUp now</a></p>
                    </div>
                </form>
            </div>
        </div>
  </section>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>