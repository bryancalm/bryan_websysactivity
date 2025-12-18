<?php
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$res = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
$user = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | DTR System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
        }
        .navbar {
            background: #007BFF;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }
        .container {
            padding: 30px;
            max-width: 1000px;
            margin: auto;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }
        .card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007BFF;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #007BFF;
            color: white;
            cursor: pointer;
        }
        tr:hover {
            background: #f1f1f1;
        }
        input[type=text] {
            padding: 8px 12px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        a.delete-btn {
            color: white;
            background: #dc3545;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        a.delete-btn:hover {
            background: #c82333;
        }
        #deleteModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }
        #deleteModalContent {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }
        #deleteModalContent h3 {
            margin-bottom: 15px;
        }
        #deleteModalContent button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            font-weight: bold;
        }
        #deleteModalContent .yes-btn {
            background: #dc3545;
            color: white;
        }
        #deleteModalContent .no-btn {
            background: #6c757d;
            color: white;
        }
    </style>
    <script>
        // search
        function searchTable() {
            var input = document.getElementById("search").value.toLowerCase();
            var table = document.getElementById("userTable");
            var tr = table.getElementsByTagName("tr");
            for (var i = 1; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td");
                var found = false;
                for (var j = 0; j < td.length; j++) {
                    if(td[j].innerText.toLowerCase().includes(input)) {
                        found = true;
                        break;
                    }
                }
                tr[i].style.display = found ? "" : "none";
            }
        }

        // sort tables
        function sortTable(n) {
            var table = document.getElementById("userTable");
            var rows = Array.from(table.rows).slice(1);
            var asc = table.getAttribute("data-sort-dir") === "asc";
            rows.sort(function(a, b){
                var A = a.cells[n].innerText.toLowerCase();
                var B = b.cells[n].innerText.toLowerCase();
                if(A < B) return asc ? -1 : 1;
                if(A > B) return asc ? 1 : -1;
                return 0;
            });
            for(var i=0; i<rows.length; i++) table.appendChild(rows[i]);
            table.setAttribute("data-sort-dir", asc ? "desc" : "asc");
        }

        
        function showDeleteModal() {
            document.getElementById('deleteModal').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
        function confirmDelete() {
            window.location.href = 'delete_account.php';
        }
    </script>
</head>
<body>
    <div class="navbar">
        <div>
            Welcome, <b><?php echo $user['fullname']; ?></b> 
            <img src="<?php echo $user['photo']; ?>" style="width:40px; height:40px; border-radius:50%; border:2px solid white; margin-left:10px;">
        </div>
        <div>
            <a href="#" onclick="showDeleteModal()">Delete Account</a> |
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <?php if($user_type == 'admin') { ?>
            <h2>Users Management</h2>
            <input type="text" id="search" onkeyup="searchTable()" placeholder="Search users...">
            <table id="userTable" data-sort-dir="asc">
                <tr>
                    <th onclick="sortTable(0)">ID</th>
                    <th onclick="sortTable(1)">Full Name</th>
                    <th onclick="sortTable(2)">Username</th>
                    <th onclick="sortTable(3)">User Type</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                <?php
                $users = $conn->query("SELECT * FROM users");
                while($row = $users->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['user_id']}</td>
                        <td>{$row['fullname']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['user_type']}</td>
                        <td><img src='{$row['photo']}' width='50' style='border-radius:50%;'></td>
                        <td><a class='delete-btn' href='delete_user.php?id={$row['user_id']}' onclick=\"return confirm('Delete this user?')\">Delete</a></td>
                    </tr>";
                }
                ?>
            </table>
        <?php } else { ?>
            <h2>Your Details</h2>
            <div class="card">
                <img src="<?php echo $user['photo']; ?>" alt="photo">
                <div>
                    <p><b>Full Name:</b> <?php echo $user['fullname']; ?></p>
                    <p><b>Username:</b> <?php echo $user['username']; ?></p>
                    <p><b>User Type:</b> <?php echo $user['user_type']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- delete account  -->
    <div id="deleteModal">
        <div id="deleteModalContent">
            <h3>Are you sure?</h3>
            <p>You are about to delete your account.</p>
            <button class="yes-btn" onclick="confirmDelete()">Yes</button>
            <button class="no-btn" onclick="closeModal()">No</button>
        </div>
    </div>
</body>
</html>
