<?php
// Personal Information
$name        = "Bryan Calimlim"; 
$jobTitle    = "UI/UX Designer & System Developer";
$phone       = "09078843162";
$email       = "bryancalimlim87@gmail.com";
$linkedin    = "https://www.linkedin.com/in/bryan-calimlim-a45703335/";
$gitlab      = "https://github.com/bryancalm";
$address     = "Payas, Sta. Barbara, Pangasinan, Philippines";
$dob         = "October 30, 2003";
$gender      = "Male";
$nationality = "Filipino";

// Education
$hsSchool    = "Payas National High School";
$hsYear      = "2016–2022";
$hsGrade     = "88%";
$hsActivity1 = "Member, Math Club";
$hsActivity2 = "Member, SSG Officer";

$college     = "Pangasinan State University";
$collegeYear = "2022–Present";
$collegeCgpa = "N/A";

// Specialization (Dynamic)
$specializations = [
  "System Design & Development – building small-scale systems (order tracking, revenue reports, account management).",
  "Web Development (PHP & MySQL) – developing dynamic websites and database-driven applications.",
  "Mobile App Development (Flutter & SQLite) – creating cross-platform mobile apps with offline storage.",
  "UI/UX Design Basics – designing simple, user-friendly layouts and interfaces.",
  "Database Management – structuring, querying, and maintaining relational databases.",
  "Problem-Solving & Logical Thinking – analyzing requirements and creating practical solutions.",
  "Team Collaboration – working with peers during capstone and project development.",
  "Adaptability & Fast Learning – quickly adjusting to new tools and technologies."
];

// Experience
$expYear     = "JUNE 2024 ";
$expTitle    = "AquaKita Water Refilling Station System";
$expCompany  = "AWRSS Group";
$exp1        = "Designed and developed an order and revenue tracking system using PHP and MySQL.";
$exp2        = "Implemented features for order placement, revenue reports, and account management.";
$exp3        = "Collaborated with a team to analyze requirements, design workflows, and ensure system usability.";

// Skills
$skills = ["PHP", "MySQL", "Java", "HTML & CSS", "Flutter", "C#", "Figma & Canva"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resume</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #fff;
    }
    .header {
      background: #007acc;
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
    }
    .header img {
      width: 180px;
      height: 180px;
      margin-right: 20px;
      object-fit: cover;
    }
    .header h1 {
      margin: 0;
      font-size: 28px;
    }
    .header p {
      margin: 2px 0;
    }
    .section {
      padding: 18px;
    }
    h2 {
      color: #007acc;
      border-bottom: 2px solid #007acc;
      padding-bottom: 5px;
      margin-bottom: 10px;
    }
    .info-table {
      width: 100%;
      margin-top: 10px;
    }
    .info-table td {
      padding: 3px 10px;
      vertical-align: top;
    }
    ul {
      margin: 5px 0 10px 20px;
    }
  </style>
</head>
<body>

  <div class="header">
    <img src="bryanpfp.png" alt="Profile Picture"> 
    <div>
      <h1><?php echo $name; ?></h1>
      <p><?php echo $jobTitle; ?></p>
      <table class="info-table">
        <tr>
            <td><b>Email:</b></td>
            <td>
                <a href="mailto:<?php echo $email; ?>" style="color:white; text-decoration:none;">
                <?php echo $email ?: "NA"; ?>
                </a>
            </td>
            <td><b>Date of birth:</b></td><td><?php echo $dob ?: "NA"; ?></td>
            </tr>
            <tr>
            <td><b>LinkedIn:</b></td>
            <td>
                <a href="<?php echo $linkedin; ?>" target="_blank" style="color:white; text-decoration:none;">
                <?php echo $linkedin ?: "NA"; ?>
                </a>
            </td>
            <td><b>Gender:</b></td><td><?php echo $gender ?: "NA"; ?></td>
            </tr>
            <tr>
            <td><b>GitHub:</b></td>
            <td>
                <a href="<?php echo $gitlab; ?>" target="_blank" style="color:white; text-decoration:none;">
                <?php echo $gitlab ?: "NA"; ?>
                </a>
            </td>
            <td><b>Nationality:</b></td><td><?php echo $nationality ?: "NA"; ?></td>
        </tr>
      </table>
    </div>
  </div>

  <!-- Summary -->
  <div class="section">
    <p>
      Motivated and detail-oriented aspiring System Designer with a strong foundation in system development, UI/UX design, and software implementation. Skilled in PHP, MySQL, Flutter, Java, and C#, with hands-on experience in creating user-friendly applications and improving system functionality. Adept at analyzing requirements, designing efficient workflows, and building solutions that enhance usability and efficiency. A fast learner with strong problem-solving skills, capable of adapting to new technologies and collaborative work environments. Committed to applying both technical knowledge and creative thinking to contribute to organizational goals and deliver high-quality results.
    </p>
  </div>

  <!-- Education -->
  <div class="section">
    <h2>Education</h2>
    <p><b><?php echo $hsYear; ?></b><br>
      High School Diploma<br>
      <?php echo $hsSchool; ?><br>
      Grade: <?php echo $hsGrade; ?><br>
      Activities:
      <ul>
        <li><?php echo $hsActivity1; ?></li>
        <li><?php echo $hsActivity2; ?></li>
      </ul>
    </p>
    <p><b><?php echo $collegeYear; ?></b><br>
      Bachelor of Information Technology<br>
      <?php echo $college; ?><br>
      CGPA: <?php echo $collegeCgpa; ?><br>
      Specialization:
      <ul>
        <?php foreach ($specializations as $spec) { echo "<li>$spec</li>"; } ?>
      </ul>
    </p>
  </div>

  <!-- Experience -->
  <div class="section">
    <h2>Experience</h2>
    <p><b><?php echo $expYear; ?></b><br>
      <?php echo $expTitle; ?><br>
      <?php echo $expCompany; ?>
    </p>
    <ul>
      <li><?php echo $exp1; ?></li>
      <li><?php echo $exp2; ?></li>
      <li><?php echo $exp3; ?></li>
    </ul>

    <!-- Personal Project -->
    <p><b>2024 – Present</b><br>
      Personal Project – SkinTrack App<br>
      Self-Initiated
    </p>
    <ul>
      <li>Developed a skincare tracking app in Flutter to help users monitor routines and receive recommendations.</li>
      <li>Integrated SQLite database for local storage of user progress.</li>
    </ul>
  </div>

  <!-- Skills -->
  <div class="section">
    <h2>Skills</h2>
    <ul>
      <?php foreach ($skills as $skill) { echo "<li>$skill</li>"; } ?>
    </ul>
  </div>

</body>
</html>
