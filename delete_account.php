<?php
include 'db.php';

if(isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $conn->query("DELETE FROM users WHERE user_id='$id'");
    session_destroy();
}

header("Location: register.php");
exit();
?>
