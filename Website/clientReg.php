<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Client register" />
    <meta name="keywords" content="Form page" />
    <meta name="author" content="Team 2 - Managing IT Projects" />

    <title>Client Registration Form</title>
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
              <li class="nav-item">
                <a class="nav-link" href="./UpdataPortfolio.php"
                  >Update Portfolio Investment</a
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
              <h1>Client Information</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <h2>Personal Information</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <label for="fname">First Name<span>*</span></label> <br />
              <input
                type="text"
                name="fname"
                id="fname"
                pattern="[A-Za-z]{1,20}"
                placeholder="First Name"
                size="25"
                required
              />
            </div>
            <div class="col-lg-6">
              <label for="lname">Last Name<span>*</span></label> <br />
              <input
                type="text"
                name="lname"
                id="lname"
                pattern="[A-Za-z]{1,20}"
                placeholder="Last Name"
                size="25"
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <label for="email">Email Address<span>*</span></label> <br />
              <input
                type="email"
                name="email"
                id="email"
                placeholder="Email Address"
                required
              />
            </div>
            <div class="col-lg-6">
              <label for="phone">Phone Number<span>*</span></label> <br />
              <input
                type="text"
                name="phone"
                id="phone"
                pattern="[0-9 ]{8,12}"
                placeholder="Phone Number (#)"
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <fieldset>
                <legend>Gender<span>*</span></legend>
                <input
                  type="radio"
                  id="gender"
                  name="gender"
                  value="M"
                  required
                />Male
                <input
                  type="radio"
                  id="gender"
                  name="gender"
                  value="F"
                />Female
                <input
                  type="radio"
                  id="gender"
                  name="gender"
                  value="O"
                />Other
              </fieldset>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <h2>Financial Information</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <label for="income">Income<span>*</span></label> <br />
              <input
                type="text"
                name="income"
                id="income"
                pattern="[0-9]{1,20}"
                placeholder="Income ($)"
                size="25"
                required
              />
            </div>
            <div class="col-lg-6">
              <label for="networth">Net Worth<span>*</span></label> <br />
              <input
                type="text"
                name="networth"
                id="networth"
                pattern="[0-9]{1,20}"
                placeholder="Net Worth ($)"
                size="25"
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <label for="risktol">Risk Tolerance<span>*</span></label> <br />
              <select id="risktol" name="risktol">
				  <option value="Low">Low</option>
				  <option value="Moderate">Moderate</option>
				  <option value="High">High</option>
			  </select>
            </div>
            <div class="col-lg-6">
              <label for="goals">Investment Goals<span>*</span></label> <br />
              <input
                type="text"
                name="goals"
                id="goals"
                placeholder="Investment Goals"
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
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$income = $_POST['income'];
			$networth = $_POST['networth'];
			$risktol = $_POST['risktol'];
			$goals = $_POST['goals'];
			
			$file = fopen('database/client.csv', 'a');
			
			$no_rows = count(file("database/client.csv"));
			if($no_rows > 1) {
				$no_rows = ($no_rows - 1) + 1;
			}
			
			$data = array(
				'id'  =>  $no_rows,
				'fname'  => $fname,
				'lname'  => $lname,
				'phone'  => $phone,
				'email'  => $email,
				'gender'  => $gender,
				'income'  => $income,
				'networth'  => $networth,
				'risktol'  => $risktol,
				'goals'  => $goals,
			  );
			
			
			

			//write data to csv
			fputcsv($file, $data);
			echo "Successfully added client to database!";
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
