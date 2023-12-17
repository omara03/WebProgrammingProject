<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "eonia";

$conn = mysqli_connect($server, $user, $pass, $dbname,3307);

if (!$conn) {
    echo "Failed to connect!";
    die();
} else {

     echo"connection success";
     header("location:indexUser.html");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $sql = "SELECT * FROM user WHERE Email = '$Email' AND Password = '$Password';";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            echo "Login success! Welcome " . $row['First_Name'] . " " . $row['Last_Name'];
            // Redirect or perform other actions here
        } else {
            echo "Incorrect credentials!";
            // Redirect to the login form
            //header("location: indexUser.html");
            exit; // Ensure the script stops executing after the header is sent
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>

<html>

<body>

    <h1>Welcome <?php echo $FirstName?></h1>
</body>
</html>