<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Edit Client">
    <meta name="keywords" content="Update Client Page, Oracle">
    <meta name="author" content="Eshan Gulati"/>
    <title>Edit Client Data</title>
    
    
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
</head>
<body>
    <section id="EDITClient-Form">
      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

      <div class = "container">
        <div class = "row">
            <div class ="col-lg-6">
                <h1>Client Information</h1>
            </div>
        </div>     
      </div>

    <div class="row">
        <div class="col-lg-6">
            <label for="fname">First Name <span>*</span></label> <br />
            <input
                type="text"
                name="First-Name"
                id="FName"
                pattern="[A-Za-z]{1,20}"
                placeholder="First Name"
                size="25"
                required
            />
        </div>
    </div>

    <div class = "row">
            <div class="col-lg-6">
            <label for="lname">Last Name <span>*</span></label> <br />
            <input
                type="text"
                name="Last-Name"
                id="LName"
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
                placeholder="Phone Number"
                required
              />
            </div>
  
            <div class="col-lg-6">
              <fieldset>
                <legend>Gender<span>*</span></legend>
                <input
                  type="radio"
                  id="gender"
                  name="Gender"
                  value="M"
                  required
                />Male
                <input
                  type="radio"
                  id="gender"
                  name="Gender"
                  value="F"
                />Female
                <input
                  type="radio"
                  id="gender"
                  name="Gender"
                  value="0"
                />Other
              </fieldset>
            </div>
          </div>
  
          <div class="row">
            <div class="col-lg-6">
              <h1>Financial Information</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <label for="income">Income <span>*</span></label> <br />
              <input
                type="text"
                name="Income"
                id="income"
                pattern="[0-9]{1,20}"
                placeholder="Income"
                size="25"
                required
              />
            </div>
            <div class="col-lg-6">
              <label for="networth">Net Worth <span>*</span></label> <br />
              <input
                type="text"
                name="Net Worth"
                id="networth"
                pattern="[0-9]{1,20}"
                placeholder="Net Worth"
                size="25"
                required
              />
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
              <label for="goals">Investmennt Goals<span>*</span></label> <br />
              <input
                type="text"
                name="Goals"
                id="PhNum"
                placeholder="Investmennt Goals"
                required
              />

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

<?php

if(isset($_GET['search'])) {
    // Open the CSV file
    $file = fopen('database/client.csv', 'r');
    
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
  $file = fopen('data.csv', 'r+');
  
  // Find the row that matches the ID in the URL and update it
  while (($row = fgetcsv($file)) !== false) {
      if ($row[0] == $_POST['cID']) {
          $row[1] = $_POST['fname'];
          $row[2] = $_POST['lname'];
          $row[3] = $_POST['phone'];
          $row[4] = $_POST['email'];
          $row[5] = $_POST['gender'];
          $row[6] = $_POST['income'];
          $row[7] = $_POST['networth'];
          $row[8] = $_POST['risktol'];
          $row[9] = $_POST['goals']
          
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
