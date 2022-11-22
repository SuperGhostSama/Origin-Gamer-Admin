<?php 

  include ('scripts.php');
  $products = getProducts();

  if (isset($_GET['getProduct'])){
    $product = getProduct($_GET['getProduct']);
    $id=$product['id'];
    $name=$product['name'];
    $price=$product['price'];
    $quantity=$product['quantity'];
    $description=$product['description'];
    $categoryID=$product['category_id'];

  
  }else{
    $id='';
    $name='';
    $price='';
    $quantity='';
    $description='';
    $categoryID='';

  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Products</title>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    <script  src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
</head>
<body>
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php"><img src="../img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" style="height: 30px">𝓞𝓻𝓲𝓰𝓲𝓷 𝓖𝓪𝓶𝓮𝓻</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNavDropdown">
              <ul class="navbar-nav flex-wrap me-auto mb-2 mb-lg-0 flex-row justify-content-center">
                <li class="nav-item mx-3">
                <a class="nav-link active d-flex" aria-current="page" href="dashboard.php">𝓓𝓪𝓼𝓱𝓑𝓸𝓪𝓻𝓭</a>
                </li>
                <li class="nav-item mx-3">
                  <a class="nav-link active d-flex" href="products.php">𝓟𝓻𝓸𝓭𝓾𝓬𝓽𝓼</a>
                </li>
              
                
              </ul>


              <div class="btn-group d-flex">
                  <button type="button" class="btn dropdown-toggle text-light ms-1 mt-1 fw-bold fs-5" data-bs-toggle="dropdown" aria-expanded="false"><?php echo htmlspecialchars($_SESSION["username"]); ?></button>
                  <ul class="dropdown-menu w-100">
                      <li><a href="profile.php" class="dropdown-item text-dark" type="button">Profile</a></li>
                      <li><a href="logout.php" class="dropdown-item text-dark" type="button">Log out</a></li>
                  </ul>
              </div>
            </div>
          </div>
        </nav>
  </header>  
            <!-- MESSAGE NOTIFICATION -->
          <?php
            if(isset($_SESSION['message'])){?>

            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong><?= $_SESSION['message'];?></strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

          <?php unset($_SESSION['message']);}?>

  <section>
    <!-- PRODUCTS TABLE -->
    <div class="tableContainer">
        <div class="d-flex justify-content-end m-3">
            <button href="#modal-product" data-bs-toggle="modal" class="btn btn-primary d-flex " onclick="addProduct()"><i class="bi bi-plus-circle-dotted me-2"></i>Add Product</button>
        </div>
        
      <table class="table table-dark table-hover table-striped "  id="myTable">
        <thead>
          <tr class="text-center">
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price DH</th>
            <th scope="col">Quantity</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($products AS $product ) { ?> 

          <tr class="text-center">
            <th class="align-middle" scope="row"><?php echo $product['id'] ?></th>
            <td ><img class="productImage" src="../img/upload/<?php echo $product['picture'] ?>" alt=""></td>
            <td class="align-middle"> <?php echo $product['name'] ?> </td>
            <td class="align-middle" > <?php echo $product['category'] ?> </td>
            <td class="align-middle" > <?php echo $product['price'] ?> </td>
            <td class="align-middle" > <?php echo $product['quantity'] ?> </td>
            <td class="align-middle" >
                <div class="d-flex flex-wrap justify-content-around">
                    <a href="products.php?getProduct=<?php echo $product['id'] ?>" class="btn btn-warning d-flex"></i>Update</a>
                    <a href="scripts.php?id=<?php echo $product['id'] ?>" class="btn btn-danger d-flex"></i>Delete</a>
                </div>
            </td>
          </tr>

          <?php } ?>

        </tbody>
      </table>
    </div>
  </section>

  <!-- PRODUCTS MODAL -->

  

	<div class="modal fade" id="modal-product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" id="form" enctype="multipart/form-data" data-parsley-validate>
					<div class="modal-header">
						<h5 class="modal-title">Add Product</h5>
						<a href="products.php" class="btn-close"></a>
					</div>
					<div class="modal-body">
							<!-- HIDDEN INPUT  -->
							<input type="hidden" value=<?= $id ?> name="product-id">
							
							<div class="mb-3">
								<label class="form-label" >Name</label>
								<input name="name" type="text" class="form-control" id="product-name" value="<?= $name ?>" required/>
							</div>
							<div class="mb-3">
								<label class="form-label">Category</label>
								<select class="form-select" id="product-category" name="category" required>
									<option disabled>Please select</option>
									<option <?= ($categoryID=='1') ? 'selected' : ''?> value="1">Graphic Card</option>
									<option <?= ($categoryID=='2') ? 'selected' : ''?> value="2">Processor</option>
									<option <?= ($categoryID=='3') ? 'selected' : ''?> value="3">Power Suply</option>
									<option <?= ($categoryID=='4') ? 'selected' : ''?> value="4">HDD Storage</option>
									<option <?= ($categoryID=='5') ? 'selected' : ''?> value="5">SSD Storage</option>
									<option <?= ($categoryID=='6') ? 'selected' : ''?> value="6">Cooler</option>
									<option <?= ($categoryID=='7') ? 'selected' : ''?> value="7">Case</option>
									<option <?= ($categoryID=='8') ? 'selected' : ''?> value="8">Mother Board</option>
								</select>
							</div>

              <div class="mb-3">
								<label class="form-label" >Price DH</label>
								<input name="price" type="text" class="form-control" id="product-price" value="<?= $price ?>" required/>
							</div>

              <div class="mb-3">
								<label class="form-label" >Quantity</label>
								<input name="quantity" type="text" class="form-control" id="product-quantity" value="<?= $quantity ?>" required/>
							</div>

							<div class="mb-3">
								<label class="form-label">Description</label>
								<textarea class="form-control" rows="10" id="product-description" name="description" required><?= $description ?></textarea>
							</div>

							<div class="mb-0">
								<label class="col-md-4 control-label mb-1" for="filebutton">Product Image</label>
								<div class="col-md-4">
								<input id="picture" name="picture" class="input-file" type="file">
								</div>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="products.php" class="btn btn-secondary" >Cancel</a>
						<button type="submit" name="save" class="btn btn-primary task-action-btn" id="save">Save</button>
						<button type="submit" name="update" class="btn btn-warning task-action-btn" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
  <script>
    <?php if (isset($_GET['getProduct'])) { ?>
      window.onload = function() {
        $("#save").hide();
        $("#update").show();
        $("#modal-product").modal("show");
      };
  <?php }
    ?>
  </script>
  <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
  <script src="../assets/js/script.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>
