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

      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

        <div class = "container">
          <div class = "row">
              <div class ="col-lg-6">
                  <h1>Portfolio Information</h1>
              </div>
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

        <h1>Client Search</h1>
	            <h5>Enter Client ID to begin</h5>
              <form name="search" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
              <label for="cID">Client ID: </label>
              <input
              type="text"
              name="cID"
              id="cID"
              pattern="[0-9]"
              />

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

if(isset($_GET['search'])) {
  // Open the CSV file
  $file = fopen('database/portfolio.csv', 'r');
  
  // Find the row that matches the ID in the URL
  while (($row = fgetcsv($file)) !== false) {
      if ($row[0] == $_GET['search']) {
          $data = $row;
          break;
      }
  }
  
  // Close the CSV file
  fclose($file);
}
if(isset($_POST['submit'])) {
  // Open the CSV file in read/write mode
  $file = fopen('database/portfolio.csv', 'r+');
  
  // Find the row that matches the ID in the URL and update it
  while (($row = fgetcsv($file)) !== false) {
      if ($row[0] == $_POST['cID']) {
          $row[1] = $_POST['IType'];
          $row[2] = $_POST['pNoShares'];
          $row[3] = $_POST['pBuyDate'];
          $row[4] = $_POST['pBuyPrice'];
          $row[5] = $_POST['pCurrentVal'];
          $row[6] = $_POST['pInterest'];
          $row[7] = $_POST['pCapital'];
          
          
          // Go back to the beginning of the row and write the updated data
          fseek($file, -strlen(implode(',', $row)), SEEK_CUR);
          fputcsv($file, $row);
          
          // Stop searching for the row
          break;
      }
  }
  
  // Close the CSV file
  fclose($file);
  
  // Redirect back to the original page
  header('Location: clientDetails.php?id=' . $_POST['id']);
  exit;
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
