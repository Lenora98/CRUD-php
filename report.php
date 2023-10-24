<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
    <!-- Link Bootstrap CSS from a CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            // Ensure a name is submitted through POST
            if(isset($_POST["name"])) {
                $name = $_POST["name"];

                // Database connection settings
                $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
                $username = "root";
                $password = "";

                try {
                    // Create a PDO instance
                    $conn = new PDO($dsn, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Prepare and execute the SQL query
                    $stmt = $conn->prepare("SELECT * FROM myguest WHERE name=:name");
                    $stmt->bindParam(':name', $name);
                    $stmt->execute();

                    // Display the results in a Bootstrap table
                    echo '<table class="table">';
                    echo '<thead class="thead-light">';
                    echo '<tr><th>Username</th><th>Password</th></tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = $stmt->fetch()) {
                        echo '<tr><td>' . $row["name"] . '</td><td>' . $row["password"] . '</td></tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Please provide a name through the form.";
            }
        ?>
    </div>

    <!-- Link Bootstrap JS and Popper.js from a CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
