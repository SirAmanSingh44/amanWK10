<?php
$title = 'view records';
require_once './includes/header.php';
require_once './db/conn.php';
?>

<h1>Testing!!</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Variables for user inputs
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];

    //Escape special characters in a string
    $email = mysqli_real_escape_string($conn, $email);
    $address = mysqli_real_escape_string($conn, $address);
    $city = mysqli_real_escape_string($conn, $city);
    $province = mysqli_real_escape_string($conn, $province);
    $postal_code = mysqli_real_escape_string($conn, $postal_code);

    //Create an SQL INSERT query
    // SQL - insert
    $sql = "INSERT INTO client_info (email, address, city, province, postalcode) VALUES ('$email', '$address', '$city', '$province', '$postal_code')";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Output the submitted variables to test whether the form sends them
    echo $_POST['email'] . " <br>";
    echo $_POST['address'] . " <br>";
    echo $_POST['city'] . " <br>";
    echo $_POST['province'] . " <br>";
    echo $_POST['postal_code'] . " <br>";
}

require_once './includes/footer.php';
?>
