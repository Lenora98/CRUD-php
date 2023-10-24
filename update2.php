<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $strquery = "SELECT * FROM myguest WHERE name=:name";
        $stmt = $conn->prepare($strquery);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $name = $row["name"];
            $password = $row["password"];
        } else {
            echo "User not found.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
  <div class="container mt-5">
        <h3 class="text-center">Login Details</h3>
        <form name="form1" method="post" action="update.php">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                    <input name="name" maxlength="50" type="text" class="form-control" placeholder="Enter username" 
                    value="<?php echo $name ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <input name="password" maxlength="30" type="text" class="form-control" 
                    value="<?php echo $password ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary" value="Reset">
                </div>
            </div>
        </form>
        <a href="index.html" class="btn btn-secondary" >Back</a>
    </div>
 <!-- Link Bootstrap JS and Popper.js from a CDN -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



</body>
</html>
