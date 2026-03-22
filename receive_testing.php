<?php
$title = "Received";
require_once './includes/header.php';
?>
<h1>Testing!!</h1>
<?php echo $_POST['email']; ?> <br>
<?php echo $_POST['address']; ?> <br>
<?php echo $_POST['city']; ?> <br>
<?php echo $_POST['province']; ?> <br>
<?php echo $_POST['postal_code']; ?> <br>
<?php
require_once './includes/footer.php';
?>
