<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" style="height: 30px">𝓞𝓻𝓲𝓰𝓲𝓷 𝓖𝓪𝓶𝓮𝓻</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNavDropdown">
              <ul class="navbar-nav flex-wrap me-auto mb-2 mb-lg-0 flex-row justify-content-center">
                <li class="nav-item mx-3">
                <a class="nav-link active d-flex" aria-current="page" href="dashboard.html">𝓓𝓪𝓼𝓱𝓑𝓸𝓪𝓻𝓭</a>
                </li>
                <li class="nav-item mx-3">
                  <a class="nav-link active d-flex" href="#">𝓟𝓻𝓸𝓭𝓾𝓬𝓽𝓼</a>
                </li>
              
                
              </ul>

                <div class="btn-group d-flex justify-content-center mt-1">
                  <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
                
                <div class="btn-group d-flex">
                  <button type="button" class="btn dropdown-toggle text-light ms-1 mt-1" data-bs-toggle="dropdown"
                      aria-expanded="false">SalahEddine Hanaoui</button>
                  <ul class="dropdown-menu w-100">
                      <li><button class="dropdown-item" type="button">Profile</button></li>
                      <li><button class="dropdown-item" type="button">Log out</button></li>
                  </ul>
              </div>
                  
            </div>
          </div>
        </nav>
  </header>  

  <section>
    <!-- PRODUCTS TABLE -->
    <div class="tableContainer">
        <div class="d-flex justify-content-end mt-3">
            <button href="#modal-product" data-bs-toggle="modal" class="btn btn-primary d-flex"><i class="bi bi-plus-circle-dotted me-1"></i>Add Product</button>
        </div>
        
      <table class="table table-dark table-hover table-striped ">
        <thead>
          <tr class="text-center">
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <th scope="row">1</th>
            <td><img class="productImage" src="../img/MSI-RTX-3070.jpg" alt=""></td>
            <td>RTX 2060</td>
            <td>Graphic Card</td>
            <td>5000DH</td>
            <td>20</td>
            <td>
                <div class="d-flex flex-wrap justify-content-around">
                    <button class="btn btn-warning d-flex"></i>Update</button>
                    <button class="btn btn-danger d-flex"></i>Delete</button>
                </div>
            </td>
          </tr>

          <tr class="text-center">
            <th scope="row">2</th>
            <td><img class="productImage" src="../img/MSI-RTX-3070.jpg" alt=""></td>
            <td>RTX 2060</td>
            <td>Graphic Card</td>
            <td>5000DH</td>
            <td>20</td>
            <td>
                <div class="d-flex flex-wrap justify-content-around">
                    <button class="btn btn-warning d-flex"></i>Update</button>
                    <button class="btn btn-danger d-flex"></i>Delete</button>
                </div>
            </td>
          </tr>

          <tr class="text-center">
            <th scope="row">3</th>
            <td><img class="productImage" src="../img/MSI-OPTIX.jpg" alt=""></td>
            <td>MSI OPTIX</td>
            <td>Monitor</td>
            <td>3000DH</td>
            <td>5</td>
            <td>
                <div class="d-flex flex-wrap justify-content-around">
                    <button class="btn btn-warning d-flex"></i>Update</button>
                    <button class="btn btn-danger d-flex"></i>Delete</button>
                </div>
            </td>
          </tr>
          
          
        </tbody>
      </table>
    </div>

  </section>
  <!-- PRODUCTS MODAL -->
	<div class="modal fade" id="modal-product">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" id="form-product">
					<div class="modal-header">
						<h5 class="modal-title">Add Product</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
							<!-- This Input Allows Storing Product Index  -->
							<input type="hidden" id="product-id">
							
							<div class="mb-3">
								<label class="form-label" >Name</label>
								<input name="name" type="text" class="form-control" id="product-name" required/>
							</div>

							<div class="mb-3">
								<label class="form-label">Category</label>
								<select class="form-select" id="product-category" name="productCategory" required>
									<option selected disabled value="">Please select</option>
									<option value="1">Graphic Card</option>
									<option value="2">Processor</option>
									<option value="3">Power Suply</option>
									<option value="4">HDD Storage</option>
									<option value="5">SSD Storage</option>
									<option value="6">Cooler</option>
									<option value="7">Case</option>
									<option value="8">Mother Board</option>
								</select>
							</div>

              <div class="mb-3">
								<label class="form-label" >Price</label>
								<input name="price" type="text" class="form-control" id="product-price" required/>
							</div>

              <div class="mb-3">
								<label class="form-label" >Quantity</label>
								<input name="quantity" type="text" class="form-control" id="product-quantity" required/>
							</div>

							<div class="mb-3">
								<label class="form-label">Description</label>
								<textarea class="form-control" rows="10" id="product-description" name="productDescription" required></textarea>
							</div>

							<div class="mb-0">
								<label class="col-md-4 control-label mb-1" for="filebutton">Product Image</label>
								<div class="col-md-4">
								<input id="filebutton" name="filebutton" class="input-file" type="file">
								</div>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>