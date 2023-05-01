<?php

$clientFile = 'database/client.csv';
$portfolioFile = 'database/portfolio.csv';
$cID = "";

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"]))
      {
       
        $searchClient = $_GET['cID'];
        if(($handle = fopen($clientFile, "r+")) !== FALSE) 
        {

            // Create a temporary file 
            $temporary = fopen("temp.csv", "w");

            // Loop through each row in the CSV file

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
            {
              // Search for the word in the row
                
              if ($data[0] != $searchClient)
              {
                // Store data without the client that we want to delete
                fputcsv($temporary,$data);
              } 

            }

            fclose($handle);
            fclose($temporary);

            // Replace the original file with the temporary file
            rename("temp.csv", $clientFile);
        }

        if(($handle = fopen($portfolioFile, "r")) !== FALSE) {

            $temporary = fopen("temp.csv", "w");
            // Loop through each row in the CSV file

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
            {
              // Search for the word in the row
                
              if ($data[1] != $searchClient)
              {
                // Store data without the client that we want to delete
                fputcsv($temporary,$data);
              } 

            }

            fclose($handle);
            fclose($temporary);

            // Replace the original file with the temporary file
            rename("temp.csv", $portfolioFile);
          } 

        header("Location: clientDetails.php");
        exit;
      }

?>
