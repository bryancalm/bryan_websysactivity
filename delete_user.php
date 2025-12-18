<?php
include 'db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM users WHERE user_id='$id'");
}

header("Location: dashboard.php");
exit();
?>
