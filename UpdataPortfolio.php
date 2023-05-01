<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Update Portfolio">
    <meta name="keywords" content="Update Portfolio Page, Oracle">
    <meta name="author" content="Eshan Gulati"/>
    <title>Update Client Portfolio Details</title>

        <!-- Bootstrap CSS -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
  
      <!-- CSS Applied -->
      <link rel="stylesheet" href="./styles/styles.css" />

</head>
<body>
     <section id="UpdatePortfolio-Form">
      <input
        id="completionSlider"
        type="range"
        min="1"
        max="111"
        step="10"
        value="0"
        disabled
      />
      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

        <div class = "container">
          <div class = "row">
              <div class ="col-lg-6">
                  <h1>Portfolio Information</h1>
              </div>
          </div>     
        </div>

        <div class = "row">
          <div class = "col-lg-6">
              <label for = "CID">Client Id <span>*</span></label> <br />
              <input
                  type="number"
                  name="Client-Id"
                  id="CID"
                  placeholder="Client Id"
                  required
              />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <label for="IType">Investmennt Type <span>*</span></label> <br />
              <input
                  type="text"
                  name="Investmennt-Type"
                  id="IType"
                  pattern="[A-Za-z]{1,20}"
                  placeholder="Investmennt Type"
                  required
              />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <label for="pNoShares">Number of Shares <span>*</span></label> <br />
              <input
                  type="number"
                  name="Number-Shares"
                  id="pNoShares"
                  placeholder="Number of Shares"
                  required
              />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <label for="pBuyDate">Date Bought <span>*</span></label> <br />
              <input
                  type="date"
                  name="Date-Bought"
                  id="pBuyDate"
                  required
              />
              <span id="DOB-err"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <label for="pBuyPrice">Price <span>*</span></label> <br />
              <input
                  type="number"
                  name="Price"
                  id="pBuyPrice"
                  placeholder="Price"
                  required
              />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <label for="pCurrentVal">Current Value <span>*</span></label> <br />
              <input
                  type="number"
                  name="Current-Value"
                  id="pCurrentVal"
                  placeholder="Current Value"
                  required
              />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <label for="pInterest">Interest <span>*</span></label> <br />
              <input
                  type="number"
                  name="Interest"
                  id="pInterest"
                  placeholder="Interest"
                  required
              />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <label for="pCaptial">Captial <span>*</span></label> <br />
              <input
                  type="number"
                  name="Capital"
                  id="pCapital"
                  placeholder="Capital"
                  required
              />
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-6">
          <span id="Form-err"></span><br />
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
    </form>
    </section>
	
	<?php
		if(isset($_POST['update'])) {
      $CID = $_POST['CID'];
			$IType = $_POST['IType'];
			$pNoShares = $_POST['pNoShares'];
			$pBuyPrice = $_POST['pBuyPrice'];
			$pCurrentVal = $_POST['pCurrentVal'];
			$pInterest = $_POST['pInterest'];
      $pCapital = $_POST['pCapital'];
			
			$file = fopen('database/client.csv', 'a');
			
			$no_rows = count(file("database/client.csv"));
			if($no_rows > 1) {
				$no_rows = ($no_rows - 1) + 1;
			}
			
			$data = array(
				'id'  =>  $no_rows,
				'CID'  => $CID,
				'IType'  => $IType,
				'pNoShares'  => $pNoShares,
				'pBuyPrice'  => $pBuyPrice,
				'pCurrentVal'  => $pCurrentVal,
				'pInterest'  => $pInterest,
				'pCapital'  => $pCapital,
			  );
			
			
			

			//write data to csv
			fputcsv($file, $data);
			echo "Successfully Updated Client Portfolio!";
	   }
	?>

    <footer>
      <div class="container-fluid">
        <i class="social-icon fab fa-facebook-f"></i>
        <i class="social-icon fab fa-twitter"></i>
        <i class="social-icon fab fa-instagram"></i>
        <i class="social-icon fas fa-envelope"></i>
        <p>©Swinburne University Submission ©By</p>
      </div>
    </footer>

    <script src="./scripts/apply.js"></script>
    <script src="./scripts/dropdown.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
    <script src="./scripts/apply.js"></script>
    <script src="./scripts/dropdown.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</body>
</html>