<?php
$name = isset($_GET['name']) ? $_GET['name'] : "Unknown Student";
$score = isset($_GET['score']) ? (int)$_GET['score'] : 0;

if ($score >= 95 && $score <= 100) {
    $grade = "A";
    $desc = "Excellent";
} elseif ($score >= 90 && $score <= 94) {
    $grade = "B";
    $desc = "Very Good";
} elseif ($score >= 85 && $score <= 89) {
    $grade = "C";
    $desc = "Good";
} elseif ($score >= 75 && $score <= 84) {
    $grade = "D";
    $desc = "Needs Improvement";
} else {
    $grade = "F";
    $desc = "Failed";
}

switch ($grade) {
    case "A":
        $remark = "Outstanding Performance!";
        break;
    case "B":
        $remark = "Great Job!";
        break;
    case "C":
        $remark = "Good effort, keep it up!";
        break;
    case "D":
        $remark = "Work harder next time.";
        break;  
    default:
        $remark = "You need to improve.";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Grade Result</title>
    <link rel="stylesheet" href="casestudy2.css">
</head>
<body>
    <div class="container">
        <h1>Student Grade Report</h1>
        <table>
            <tr>
                <td class="label">Student Name</td>
                <td><?php echo htmlspecialchars($name); ?></td>
            </tr>
            <tr>
                <td class="label">Final Score</td>
                <td><?php echo $score; ?></td>
            </tr>
            <tr>
                <td class="label">Grade</td>
                <td class="grade"><?php echo $grade . " (" . $desc . ")"; ?></td>
            </tr>
        </table>
        <div class="remark">
            <?php echo $remark; ?>
        </div>
    </div>
</body>
</html>
