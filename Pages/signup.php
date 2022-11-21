<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login&signup.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>SignUp Origin Game</title>
</head>
<body>
  <header>
                <!-- NAVBAR -->
                <nav class="navbar navbar-expand-lg ">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" style="height: 30px">𝓞𝓻𝓲𝓰𝓲𝓷 𝓖𝓪𝓶𝓮𝓻</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
                      <ul class="navbar-nav flex-row justify-content-center">
                          <li class="nav-item mx-2">
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
                <!-- SIGNUP -->
    <div class="card mt-4 mx-auto col-12 col-sm-6 " >
        <div class="card-body">
                <h1 class="text-center fw-bold">SignUp</h1>
                <form>
                    <div class="mb-3 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"></input>
                    </div>
                    <div class="d-flex flex-column align-items-center ">
                        <button type="submit" class="btn btn-light fw-bold mt-3">SIGNUP</button>
                        <p>Already have an account? <a href="login.php">LogIn now</a></p>
                    </div>
                </form>
            </div>
        </div>
  </section>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>