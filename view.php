<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
    <!-- Link Bootstrap CSS from a CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        a{
            margin-left: 400px;
            padding: 60px;
           
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
          
        }
        </style>
</head>
<body>
<?php

$dsn = "mysql:dbname=test";
$username = "root";
$db_password = "";  // Changed variable name to avoid conflict

try {

    // Create a PDO connection
    $conn = new PDO($dsn, $username, $db_password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to select all data from a specific table
    $sql = "SELECT * FROM myguest";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch all the rows as an associative array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($rows) > 0) {
        echo '<div class="container mt-4">';
        echo '<table class="table table-hover table-dark">';
        echo '<thead>';
        echo '<tr><th>Username</th><th>Password</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        
        // Output data of each row
        foreach ($rows as $row) {
            echo '<tr><td>' . $row["name"]. '</td><td>' . $row["password"]. '</td></tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '<a href="index.html" class="btn btn-primary" >Back</a>';
    } else {
        echo "0 results";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!-- Link Bootstrap JS and Popper.js from a CDN -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
