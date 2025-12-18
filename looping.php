<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background: #fff;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px 15px;
            text-align: center;
        }
        th {
            background: #007acc;
            color: white;
        }
        .odd {
            background: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Dynamic Multiplication Table</h2>

<form method="post">
    <label>Enter Rows: </label>
    <input type="number" name="rows" required>
    <label>Enter Columns: </label>
    <input type="number" name="cols" required>
    <button type="submit">Generate Table</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rows = $_POST['rows'];
    $cols = $_POST['cols'];

    echo "<table>";
    echo "<tr><th>X</th>";
    for ($i = 1; $i <= $cols; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";
        echo "<th>$i</th>";
        for ($j = 1; $j <= $cols; $j++) {
            $value = $i * $j;
            if ($value % 2 != 0) {
                echo "<td class='odd'>$value</td>";
            } else {
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
