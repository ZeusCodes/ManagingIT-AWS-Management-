<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Update Portfolio">
    <meta name="keywords" content="Update Portfolio Page, Oracle">
    <meta name="author" content="Uddhav Grover"/>
    <title>Register New Investment Details</title>

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

    <form method="post" action="" style="margin:100px">
    <h1>Portfolio Search and Edit</h1>
		<label for="client-id">Enter Client ID:</label>
		<input type="text" name="client-id" id="client-id" required>
		<input type="submit" name="search" value="Search">
	</form>
	
	<?php
	$portfolio = 'database/portfolio.csv';
	if(isset($_POST['search'])) {
		$client_id = $_POST['client-id'];
		$portfolios = array_map('str_getcsv', file($portfolio));
		$found_portfolio = false;
		foreach($portfolios as $portfolio) {
			if($portfolio[1] == $client_id) {
				$found_portfolio = true;
				$portfolio_id = $portfolio[0];
				$client_id = $portfolio[1];
				$inv_type = $portfolio[2];
				$number_shares = $portfolio[3];
				$buy_date = $portfolio[4];
				$buy_price = $portfolio[5];
				$current_val = $portfolio[6];
				$interest = $portfolio[7];
				$capital = $portfolio[8];

				break;
			}
		}
		if ($found_portfolio) {
			echo '<form id="Portfolio-Update-Form" method="post" action="">';
  			echo '<label for="client-id" style="margin: 10px; padding: 10px;">Client id:</label>';
  			echo '<input type="text" name="client-id" id="client-id" value="'.$client_id.'" required><br>';
  			echo '<label for="inv-type" style="margin: 10px; padding: 10px;">Investment Type Type:</label>';
 	 		echo '<input type="text" name="inv-type" id="inv-type" value="'.$inv_type.'" required><br>';
  			echo '<label for="number-shares" style="margin: 10px; padding: 10px;">Number of shares:</label>';
  			echo '<input type="int" name="number-shares" id="number-shares" value="'.$number_shares.'" required><br>';
  			echo '<label for="buy-date" style="margin: 10px; padding: 10px;">Date Bought:</label>';
  			echo '<input type="date" name="buy-date" id="buy-date" value="'.$buy_date.'" required><br>';
 		 	echo '<label for="buy-price" style="margin: 10px; padding: 10px;">Buy Price:</label>';
  			echo '<input type="number" name="buy-price" id="buy-price" value="'.$buy_price.'" required><br>';
 		 	echo '<label for="current-val" style="margin: 10px; padding: 10px;">Current Value:</label>';
  			echo '<input type="number" name="current-val" id="current-val" value="'.$current_val.'" required><br>';
  			echo '<label for="interest" style="margin: 10px; padding: 10px;">Interest:</label>';
 			echo '<input type="number" name="interest" id="interest" value="'.$interest.'" required><br>';
  			echo '<label for="capital" style="margin: 10px; padding: 10px;">Capital:</label>';
  			echo '<input type="number" name="capital" id="capital" value="'.$capital.'" required><br>';
  			echo '<input type="hidden" name="portfolio-id" value="'.$portfolio_id.'">';
  			echo '<input type="submit" name="save" value="Save">';
 			echo '</form>';
		} else {
			echo 'Portfolio not found.';
		}
	}
	$portfolio = 'database/portfolio.csv';
	if(isset($_POST['save'])) {
		$portfolio_id = $_POST['portfolio-id'];
		$client_id = $_POST['client-id'];
		$inv_type = $_POST['inv-type'];
		$number_shares = $_POST['number-shares'];
		$buy_date = $_POST['buy-date'];
		$buy_price = $_POST['buy-price'];
		$current_val = $_POST['current-val'];
		$interest = $_POST['interest'];
		$capital = $_POST['capital'];
		$portfolios = array_map('str_getcsv', file($portfolio));
		$updated_portfolio = false;
		foreach($portfolios as &$portfolio) {
			if($portfolio[0] == $portfolio_id) {
				$portfolio[1] = $client_id;
        	$updated_portfolio = true;
        break;
      }
    }
    if($updated_portfolio) {
      $fp = fopen($portfolio, 'w');
      foreach($portfolios as $portfolio) {
        fputcsv($fp, $portfolio);
      }
      fclose($fp);
      echo "Portfolio for client $client_id has been updated.";
    } else {
      echo "Portfolio for client $client_id could not be found.";
    }
  } else {
    echo "All updates must be provided.";
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
