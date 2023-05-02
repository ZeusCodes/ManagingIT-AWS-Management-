<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Client Search" />
    <meta name="keywords" content="Client search page" />
    <meta name="author" content="Team 2 - Managing IT Projects" />

    <title>Client Search</title>
    
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
<header>
      <nav
        class="navbar navbar-expand-lg navbar-dark"
        style="background-color: #394867"
      >
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navigator"
            aria-controls="navigator"
            aria-expanded="true"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="./index.html">
            <img
              src="./AWS.png"
              alt="Logo"
              class="d-inline-block align-text-center brand-logo"
            />
          </a>
          <div class="collapse navbar-collapse" id="navigator">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="./clientDetails.php"
                  >Client Details</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./clientReg.php"
                  >Register New Client</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./UpdateClientDetails.html"
                  >Update Client</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./portfolioReg.php"
                  >Update Client Portfolio</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

      <!-- Search bar -->
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

        <div class="row">
          <div class="col-1">
              <span id="Form-err"></span><br />
              <button type="submit" name="search" value="Search" class="btn btn-primary"> Search </button>
            </div>
          <div class="col-2">
              <span id="Form-err"></span><br />
              <button type="submit" name="reset" value="Reset" class="btn btn-danger"> Reset </button>
            </div>
        </div> 
      </form> 

      <!-- Search -->

      <?php

      $clientFile = 'database/client.csv';
      $portfolioFile = 'database/portfolio.csv';
      $cID = "";

      $searchClient = ""; 

      $cName = "";
      $cLName = "";
      $cPhone = "";
      $cEmail = "";
      $cGender = "";
      $cIncome = "";
      $cWorth = "";
      $cRiskTol = "";
      $cInvGoals = "";

      $pType = "";
      $pNoShares = "";
      $pBDay = "";
      $pBPrice = "";
      $pCurrentVal = "";
      $pInterest = "";
      $pCapital = "";

    

    
      // Finding client detail
      
      if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"]))
      {
        $searchClient = $_GET['cID'];
        if(($handle = fopen($clientFile, "r")) !== FALSE) {
            $found = false;

            // Loop through each row in the CSV file

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                // Search for the word in the row

                if (in_array($searchClient, $data)) {
                    $found = true;

                    $cName = $data[1];
                    $cLName = $data[2];
                    $cPhone = $data[3];
                    $cEmail = $data[4];
                    $cGender = $data[5];
                    $cIncome = $data[6];
                    $cWorth = $data[7];
                    $cRiskTol = $data[8];
                    $cInvGoals = $data[9];
                    // Get client pID

                    $cID = $data[0];
                }
            
            }

            fclose($handle);
        }

        
      }

      if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Reset"]))
      {
      $cName;
      $cLName;
      $cPhone;
      $cEmail;
      $cGender;
      $cIncome;
      $cWorth;
      $cRiskTol;
      $cInvGoals;

      $pType;
      $pNoShares;
      $pBDay;
      $pBPrice;
      $pCurrentVal;
      $pInterest;
      $pCapital;
      }
      
    ?>
  
    <!-- Show result -->

    <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Client Information</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3>Personal Information</h3>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-3">
            <label for="fname">First Name </label> <br />
            <?php
                  echo "<p>". $cName . "</p>"; 
            ?>
          </div>

          <div class="col-lg-3">
            <label for="lname">Last Name </label> <br />
            <?php
              echo "<p>". $cLName . "</p>"; 
            ?>
          </div>

          <div class="col-lg-3">
            <label for="email">Email Address</label> <br />
            <?php
              echo "<p>". $cEmail . "</p>"; 
            ?>
          </div>

          <div class="col-lg-3">
            <label for="phone">Phone Number</label> <br />
            <?php
              echo "<p>". $cPhone . "</p>"; 
            ?>
          </div>

        </div>
        
        <div class="row">

          <div class="col-lg-3">
            <label for="income">Income </label> <br />
            <?php
              echo "<p>". $cIncome . "</p>"; 
            ?>
          </div>

          <div class="col-lg-3">
            <label for="networth">Net Worth </label> <br />
            <?php
              echo "<p>". $cWorth . "</p>"; 
            ?>
          </div>

          <div class="col-lg-3">
            <label for="risktol">Risk Tolerance</label> <br />
            <?php
              echo "<p>". $cRiskTol . "</p>"; 
            ?>
          </div>

          <div class="col-lg-3">
            <label for="goals">Investment Goals</label> <br />
            <?php
              echo "<p>". $cInvGoals . "</p>"; 
            ?>
          </div>
        </div>
  
        <div class="row">
            <div class="col-lg-6">
              <h3>Wealth Information</h3>
            </div>
        </div>

    <table class="dashboardTable">
        <tr>
            <th scope="col"> Investment Type</th>
                <th scope="col"> No of Shares </th>
                <th scopes="col"> Buy Date </th>
                <th scope="col"> Buy Price </th>
                <th scope="col"> Current Value </th>
                <th scope="col"> Interest </th>
                <th scope="col"> Capital </th>
                </tr>

                <?php

                if(($handle = fopen($portfolioFile, "r")) !== FALSE) {
                  //$found = false;

                  // Loop through each row in the CSV file

                  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                      // Search for the word in the row

                      if (($cID == $data[1])) {
                          //$found = true;

                          $pType = $data[2];
                          $pNoShares = $data[3];
                          $pBDay = $data[4];
                          $pBPrice = $data[5];
                          $pCurrentVal = $data[6];
                          $pInterest = $data[7];
                          $pCapital = $data[8];

                          echo "<tr>";
                          echo "<td scope='col'>". $data[2] ."</td>"; 
                          echo "<td scope='col'>". $data[3] ."</td>";
                          echo "<td scope='col'>". $data[4] ."</td>";
                          echo "<td scope='col'>". $data[5] ."</td>";
                          echo "<td scope='col'>". $data[6] ."</td>";
                          echo "<td scope='col'>". $data[7] ."</td>";
                          echo "<td scope='col'>". $data[8] ."</td>";
                          echo "</tr>";
                          
                      }
                  
                  }

                  fclose($handle);
                } 
                
                ?>
                
            </table>
	    
	    <!-- Delete -->
	    
	    <form name="delete" method="get" action="deleteClient.php" >
		     
		     <input
			  type="hidden"
			  name="cID"
			  id="cID"
			  value ="<?php echo $cID; ?>"
			/>

		      <div class="row">
			<div class="col-1">
			    <span id="Form-err"></span><br />
			    <button type="submit" name="delete" value="Delete" class="btn btn-danger"> Delete client</button>
			  </div>
		      </div> 
              </form> 
            
        </section>  
        
    
    <footer>
        <div class="container-fluid">
          <i class="social-icon fab fa-facebook-f"></i>
          <i class="social-icon fab fa-twitter"></i>
          <i class="social-icon fab fa-instagram"></i>
          <i class="social-icon fas fa-envelope"></i>
          <p>Asset & Wealth Services Inc. </p>
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
