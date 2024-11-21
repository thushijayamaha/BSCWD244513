<?php

include_once('../../function/userFunction.php');

// Corrected assignment of $result
$result = userRegistration($_POST['userName'], $_POST['userEmail'], $_POST['userPass'], $_POST['userPhone'], $_POST['userNic']);

// Output the result
echo($result);

?>
