<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
        <title>SideNav</title>
    </head>
    <body>
        <header>
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="dashboard.php"><img src="../img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" style="height: 30px" />𝓞𝓻𝓲𝓰𝓲𝓷 𝓖𝓪𝓶𝓮𝓻</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav flex-wrap me-auto mb-2 mb-lg-0 flex-row justify-content-center">
                            <li class="nav-item mx-3">
                                <a class="nav-link active d-flex" aria-current="page" href="dashboard.php">𝓓𝓪𝓼𝓱𝓑𝓸𝓪𝓻𝓭</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link active d-flex" href="products.php">𝓟𝓻𝓸𝓭𝓾𝓬𝓽𝓼</a>
                            </li>
                        </ul>
                        <div class="btn-group d-flex">
                            <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false"><?php echo htmlspecialchars($_SESSION["username"]); ?></button>
                            <ul class="dropdown-menu w-100">
                                <li><a href="profile.php" class="dropdown-item text-dark" type="button">Profile</a></li>
                                <li><a href="logout.php" class="dropdown-item text-dark" type="button">Log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section>
            <!-- DASHBOARD TABLE -->
            <div class="d-flex justify-content-center">
                <div class="col-7 col-sm-4">
                    <div class="card mt-4">
                        <div class="card-header bg-dark">
                            <h4 class="text-white my-auto px-1 text-center">Total Products</h4>
                        </div>
                        <!-- TOTAL PRODUCTS COUNT -->
                        <div class="" id="total-products">
                            <button class="contentTable d-flex list-group-item w-100 text-start">
                                <div class="ms-auto me-auto">
                                    <div class="py-2">
                                        <span class="btn btn-primary py-3px px-5px fs-5 fw-bold">999</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DASHBOARD TABLE -->
            <div class="d-flex justify-content-center">
                <div class="col-7 col-sm-4">
                    <div class="card mt-4">
                        <div class="card-header bg-dark">
                            <h4 class="text-white my-auto px-1 text-center">Available Categories</h4>
                        </div>
                        <!-- COUNT -->
                        <div class="" id="available-categories">
                            <button class="contentTable d-flex list-group-item w-100 text-start">
                                <div class="ms-auto me-auto">
                                    <div class="py-2">
                                        <span class="btn btn-primary py-3px px-5px fs-5 fw-bold">999</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAX PRICE TABLE -->
            <div class="d-flex justify-content-center">
                <div class="col-7 col-sm-4">
                    <div class="card mt-4">
                        <div class="card-header bg-dark">
                            <h4 class="text-white my-auto px-1 text-center">Max Price</h4>
                        </div>
                        <!--COUNT -->
                        <div class="" id="max-price">
                            <button class="contentTable d-flex list-group-item w-100 text-start">
                                <div class="ms-auto me-auto">
                                    <div class="py-2">
                                        <span class="btn btn-primary py-3px px-5px fs-5 fw-bold">999</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MIN PRICE TABLE -->
            <div class="d-flex justify-content-center">
                <div class="col-7 col-sm-4">
                    <div class="card mt-4">
                        <div class="card-header bg-dark">
                            <h4 class="text-white my-auto px-1 text-center">Min Price</h4>
                        </div>
                        <!-- COUNT -->
                        <div class="" id="min-price">
                            <button class="contentTable d-flex list-group-item w-100 text-start">
                                <div class="ms-auto me-auto">
                                    <div class="py-2">
                                        <span class="btn btn-primary py-3px px-5px fs-5 fw-bold">999</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>
