<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Edit Client">
    <meta name="keywords" content="Update Client Page, Oracle">
    <meta name="author" content="Eshan Gulati"/>

	<title>Client Search and Edit</title>
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
	<h1>Client Search and Edit</h1>
	<form method="post" action="">
		<label for="client-id">Enter Client ID:</label>
		<input type="text" name="client-id" id="client-id" required>
		<input type="submit" name="search" value="Search">
	</form>
	
	<?php
	$clientFile = 'database/client.csv';
		if(isset($_POST['search'])) {
			$client_id = $_POST['client-id'];
			$clients = array_map('str_getcsv', file($clientFile));
			$found_client = false;
			foreach($clients as $client) {
				if($client[0] == $client_id) {
					$found_client = true;
					$client_name = $client[1];
                    $client_lname = $client[2];
					$client_phone = $client[3];
                    $client_email = $client[4];
                    $client_gender = $client[5];
                    $client_income = $client[6];
                    $client_networth = $client[7];
                    $client_risktol = $client[8];
                    $client_goals = $client[9];
					break;
				}
			}
			if($found_client) {
				echo '<form id="Application-Form" method="post" action="">';
				echo '<label for="client-name">Client Name:</label>';
				echo '<input type="text" name="client-name" id="name" value="'.$client_name.'" required><br>';
                echo '<label for="client-lname">Client Last Name:</label>';
                echo '<input type="text" name="client-lname" id="lname" value="'.$client_lname.'" required><br>';
                echo '<label for="client-phone">Client Phone:</label>';
				echo '<input type="tel" name="client-phone" id="phone" value="'.$client_phone.'" required><br>';
				echo '<label for="client-email">Client Email:</label>';
				echo '<input type="email" name="client-email" id="email" value="'.$client_email.'" required><br>';
                echo '<label for="client-gender">Client Gender:</label>';
				echo '<select id="gender" name="gender">';
				echo '<option value="M" '.($gender == 'M' ? 'selected="selected"' : '').'>M</option>';
                echo '<option value="F" '.($gender == 'F' ? 'selected="selected"' : '').'>F</option>';
                echo '<option value="Other" '.($gender == 'Other' ? 'selected="selected"' : '').'>Other</option>';
                echo '</select><br>';
                echo '<label for="client-income">Client Income:</label>';
				echo '<input type="text" name="client-income" id="income" value="'.$client_income.'" required><br>';
                echo '<label for="client-networth">Client NetWorth:</label>';
				echo '<input type="text" name="client-networth" id="networth" value="'.$client_networth.'" required><br>';
                echo '<label for="risktol">Risk Tolerance:</label>';
                echo '<select id="risktol" name="risktol">';
                echo '<option value="Low" '.($risktol == 'Low' ? 'selected="selected"' : '').'>Low</option>';
                echo '<option value="Moderate" '.($risktol == 'Moderate' ? 'selected="selected"' : '').'>Moderate</option>';
                echo '<option value="High" '.($risktol == 'High' ? 'selected="selected"' : '').'>High</option>';
                echo '</select><br>';
                echo '<label for="client-goals">Client Investment Goals:</label>';
				echo '<input type="text" name="client-goals" id="goals" value="'.$client_goals.'" required><br>';
				echo '<input type="hidden" name="id" value="'.$client_id.'">';
				echo '<input type="submit" name="save" value="Save">';
				echo '</form>';
			} else {
				echo 'Client not found.';
			}
        }
    $clientFile = 'database/client.csv';
	if(isset($_POST['save'])) {
    $client_id = $_POST['id'];
    $client_name = $_POST['client-name'];
    $client_lname = $_POST['client-lname'];
    $client_phone = $_POST['client-phone'];
    $client_email = $_POST['client-email'];
    $client_gender = $_POST['gender'];
    $client_income = $_POST['client-income'];
    $client_networth = $_POST['client-networth'];
    $client_risktol = $_POST['risktol'];
    $client_goals = $_POST['client-goals'];

    $clients = array_map('str_getcsv', file($clientFile));
    $updated_clients = [];
    foreach($clients as $client) {
        if($client[0] == $client_id) {
            $updated_client = [$client_id, $client_name, $client_lname, $client_phone, $client_email, $client_gender, $client_income, $client_networth, $client_risktol, $client_goals];
        } else {
            $updated_client = $client;
        }
        $updated_clients[] = $updated_client;
    }

    $fp = fopen($clientFile, 'w');
    foreach ($updated_clients as $client) {
        fputcsv($fp, $client);
    }
    fclose($fp);

    echo 'Client information updated successfully.';
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
