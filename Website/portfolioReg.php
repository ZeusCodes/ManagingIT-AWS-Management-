<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Create portfolio" />
    <meta name="keywords" content="Form page" />
    <meta name="author" content="Team 2 - Managing IT Projects" />

    <title>Portfolio Creation Form</title>
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
                <a class="nav-link" href="./UpdateClientDetails.php"
                  >Update Client</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./portfolioReg.php"
                  >Register New Investment</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section id="Application-Form">
      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h1>Portfolio Information</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <h2>Client Account Information</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <label for="cid">Client ID<span>*</span></label> <br />
              <input
                type="text"
                name="cid"
                id="cid"
                pattern="[0-9]"
				placeholder="Client ID (#)"
                required
              />
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <h2>Asset Information</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <label for="invtype">Investment Type<span>*</span></label> <br />
              <input
                type="text"
                name="invtype"
                id="invtype"
                placeholder="Investment Type"
                required
              />
            </div>
            <div class="col-lg-6">
              <label for="noshares">Number of Shares<span>*</span></label> <br />
              <input
                type="number"
                name="noshares"
                id="noshares"
                placeholder="Number of Shares (#)"
				pattern="[0-9]"
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <label for="buydate">Buy Date<span>*</span></label> <br />
              <input
                type="date"
                name="buydate"
                id="buydate"
                placeholder="Buy Date"
                required
              />
            </div>
            <div class="col-lg-6">
              <label for="buyprice">Buy Price<span>*</span></label> <br />
              <input
                type="number"
                name="buyprice"
                id="buyprice"
                placeholder="Buy Price ($)"
				step=0.01
				pattern="[0-9]"
                required
              />
            </div>
          </div>
		  <div class="row">
            <div class="col-lg-6">
              <label for="currentval">Current Value<span>*</span></label> <br />
              <input
                type="number"
                name="currentval"
                id="currentval"
                placeholder="Current Value ($)"
				step=0.01
				pattern="[0-9]"
                required
              />
            </div>
            <div class="col-lg-6">
              <label for="interest">Interest<span>*</span></label> <br />
              <input
                type="number"
                name="interest"
                id="interest"
                placeholder="Interest (%)"
				step=0.01
				pattern="[0-9]"
                required
              />
            </div>
          </div>
		  <div class="row">
            <div class="col-lg-6">
              <label for="capital">Capital<span>*</span></label> <br />
              <input
                type="number"
                name="capital"
                id="capital"
                placeholder="Capital ($)"
				step=0.01
				pattern="[0-9]"
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col-1">
              <span id="Form-err"></span><br />
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
			<div class="col-2">
              <span id="Form-err"></span><br />
              <button id="resetForm" value="Reset" class="btn btn-danger">Reset</button>
            </div>
          </div>
        </div>
      </form>
    </section>
	
	<?php
		if(isset($_POST['submit'])) {
			$cid = $_POST['cid'];
			$invtype = $_POST['invtype'];
			$noshares = $_POST['noshares'];
			$buydate = $_POST['buydate'];
			$buyprice = $_POST['buyprice'];
			$currentval = $_POST['currentval'];
			$interest = $_POST['interest'];
			$capital = $_POST['capital'];
			
			$file = fopen('database/portfolio.csv', 'a');
			
			$no_rows = count(file("database/portfolio.csv"));
			if($no_rows > 1) {
				$no_rows = ($no_rows - 1) + 1;
			}
			
			$data = array(
				'pid'  =>  $no_rows,
				'cid'  =>  $cid,
				'invtype'  => $invtype,
				'noshares'  => $noshares,
				'buydate'  => $buydate,
				'buyprice'  => $buyprice,
				'currentval'  => $currentval,
				'interest'  => $interest,
				'capital'  => $capital,
			  );
			
			
			

			//write data to csv
			fputcsv($file, $data);
			echo "Successfully added portfolio to database!";
	   }
	?>
	
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
