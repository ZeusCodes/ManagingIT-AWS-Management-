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



	  
		//delete button
		if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["deletep"])) {
			$searchClient = $_GET['cID'];
			
            $csv = array_map('str_getcsv', file('database/portfolio.csv'));
            unset($csv[$searchClient]);
            
            $fp = fopen('database/portfolio.csv', 'w');
  
            // Loop through file pointer and a line
            foreach ($csv as $fields) {
                fputcsv($fp, $fields);
            }
              
            fclose($fp);
        }

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
				
	header("Location: clientDetails.php");
    exit;
                
?>