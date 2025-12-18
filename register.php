<?php
include 'db.php';

$message = "";

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];

    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $photo_folder = "uploads/" . $photo;

    if (move_uploaded_file($tmp_name, $photo_folder)) {
        $stmt = $conn->prepare("INSERT INTO users (fullname, username, password, user_type, photo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullname, $username, $password, $user_type, $photo_folder);
        if ($stmt->execute()) {
            $message = "Registration Successful. <a href='login.php'>Login Here</a>";
        } else {
            $message = "Username already exists!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | DTR System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .message {
            color: green;
            text-align: center;
            margin: 15px 0;
        }
        p {
            text-align: center;
            margin-top: 15px;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if($message != "") { echo "<p class='message'>$message</p>"; } ?>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="user_type" required>
                <option value="">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="faculty">Faculty</option>
            </select>
            <input type="file" name="photo" required>
            <button type="submit" name="register">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>
