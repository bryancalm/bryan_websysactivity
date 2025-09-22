<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photoPath = "";
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $photoPath = $targetDir . time() . "_" . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>BIO-DATA</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .container { width: 700px; margin: auto; border: 2px solid black; padding: 20px; position: relative; }
            h1 { text-align: center; margin-bottom: 7   0px; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
            td { padding: 6px; vertical-align: top; }
            .section { background: black; color: white; font-weight: bold; padding: 5px; margin-top: 20px;}
            .photo {
                position: absolute;
                top: 20px;
                right: 20px;
                width: 120px;
                height: 120px;
                border: 1px solid black;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f9f9f9;
                overflow: hidden;
                margin-bottom: 20px; 
            }
            .photo img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .signature { margin-top: 50px; text-align: right; }
        </style>
    </head>
    <body>
    <div class="container">
        <h1>BIO-DATA</h1>
        <div class="photo">
            <?php if ($photoPath): ?>
                <img src="<?= htmlspecialchars($photoPath) ?>" alt="Applicant Photo">
            <?php else: ?>
                <p>Photo</p>
            <?php endif; ?>
        </div>

        <div class="section">PERSONAL DATA</div>
        <table border="1">
            <tr><td>Position Desired: <?= $_POST['position'] ?></td><td>Date: <?= $_POST['date'] ?></td></tr>
            <tr><td>Name: <?= $_POST['name'] ?></td><td>Gender: <?= $_POST['gender'] ?></td></tr>
            <tr><td>City Address: <?= $_POST['city'] ?></td><td>Provincial Address: <?= $_POST['provincial'] ?></td></tr>
            <tr><td>Telephone: <?= $_POST['telephone'] ?></td><td>Cellphone: <?= $_POST['cellphone'] ?></td></tr>
            <tr><td>Email: <?= $_POST['email'] ?></td><td></td></tr>
            <tr><td>Date of Birth: <?= $_POST['dob'] ?></td><td>Birth Place: <?= $_POST['birthplace'] ?></td></tr>
            <tr><td>Civil Status: <?= $_POST['civil'] ?></td><td>Citizenship: <?= $_POST['citizenship'] ?></td></tr>
            <tr><td>Height: <?= $_POST['height'] ?></td><td>Weight: <?= $_POST['weight'] ?></td></tr>
            <tr><td>Religion: <?= $_POST['religion'] ?></td><td></td></tr>
            <tr><td>Spouse: <?= $_POST['spouse'] ?></td><td>Occupation: <?= $_POST['spouse_occ'] ?></td></tr>
            <tr><td>Name of Children: <?= $_POST['children'] ?></td><td>Date of Birth: <?= $_POST['children_dob'] ?></td></tr>
            <tr><td>Father’s Name: <?= $_POST['father'] ?></td><td>Occupation: <?= $_POST['father_occ'] ?></td></tr>
            <tr><td>Mother’s Name: <?= $_POST['mother'] ?></td><td>Occupation: <?= $_POST['mother_occ'] ?></td></tr>
            <tr><td colspan="2">Language/Dialect: <?= $_POST['language'] ?></td></tr>
            <tr><td colspan="2">Person to Contact in Case of Emergency: <?= $_POST['emergency'] ?></td></tr>
        </table>

        <div class="section">EDUCATIONAL BACKGROUND</div>
        <table border="1">
            <tr><td>Elementary: <?= $_POST['elem'] ?></td><td>Year Graduated: <?= $_POST['elem_grad'] ?></td></tr>
            <tr><td>High School: <?= $_POST['hs'] ?></td><td>Year Graduated: <?= $_POST['hs_grad'] ?></td></tr>
            <tr><td>College: <?= $_POST['college'] ?></td><td>Year Graduated: <?= $_POST['college_grad'] ?></td></tr>
            <tr><td>Degree: <?= $_POST['degree'] ?></td><td>Special Skills: <?= $_POST['skills'] ?></td></tr>
        </table>

        <div class="section">EMPLOYMENT RECORD</div>
        <table border="1">
            <tr><td>Company: <?= $_POST['company1'] ?></td><td>Position: <?= $_POST['pos1'] ?></td><td>From: <?= $_POST['from1'] ?> To: <?= $_POST['to1'] ?></td></tr>
            <tr><td>Company: <?= $_POST['company2'] ?></td><td>Position: <?= $_POST['pos2'] ?></td><td>From: <?= $_POST['from2'] ?> To: <?= $_POST['to2'] ?></td></tr>
        </table>

        <div class="section">CHARACTER REFERENCE</div>
        <table border="1">
            <tr><td>Name: <?= $_POST['ref1'] ?></td><td>Company: <?= $_POST['refcomp1'] ?></td><td>Contact: <?= $_POST['refcontact1'] ?></td></tr>
            <tr><td>Name: <?= $_POST['ref2'] ?></td><td>Company: <?= $_POST['refcomp2'] ?></td><td>Contact: <?= $_POST['refcontact2'] ?></td></tr>
        </table>

        <div>
            Res. Cert. No.: <?= $_POST['res'] ?><br>
            Issued at: <?= $_POST['issued_at'] ?><br>
            Issued on: <?= $_POST['issued_on'] ?><br>
            SSS: <?= $_POST['sss'] ?><br>
            TIN: <?= $_POST['tin'] ?><br>
            NBI No.: <?= $_POST['nbi'] ?><br>
            Passport No.: <?= $_POST['passport'] ?><br>
        </div>

        <div class="signature">
            Applicant’s Signature: ___________________
        </div>
    </div>
    </body>
    </html>
    <?php
} else {
    // Input form
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>BIO-DATA Form</title>
    </head>
    <body>
    <h1>Fill Out BIO-DATA</h1>
    <form method="post" enctype="multipart/form-data">
        <h3>Upload Photo</h3>
        <input type="file" name="photo" accept="image/*"><br><br>

        <!-- Personal Data -->
        Position Desired: <input type="text" name="position"><br>
        Date: <input type="date" name="date"><br>
        Name: <input type="text" name="name"><br>
        Gender: <input type="text" name="gender"><br>
        City Address: <input type="text" name="city"><br>
        Provincial Address: <input type="text" name="provincial"><br>
        Telephone: <input type="text" name="telephone"><br>
        Cellphone: <input type="text" name="cellphone"><br>
        Email: <input type="email" name="email"><br>
        Date of Birth: <input type="date" name="dob"><br>
        Birthplace: <input type="text" name="birthplace"><br>
        Civil Status: <input type="text" name="civil"><br>
        Citizenship: <input type="text" name="citizenship"><br>
        Height: <input type="text" name="height"><br>
        Weight: <input type="text" name="weight"><br>
        Religion: <input type="text" name="religion"><br>
        Spouse: <input type="text" name="spouse"><br>
        Spouse Occupation: <input type="text" name="spouse_occ"><br>
        Name of Children: <input type="text" name="children"><br>
        Children DOB: <input type="text" name="children_dob"><br>
        Father’s Name: <input type="text" name="father"><br>
        Father Occupation: <input type="text" name="father_occ"><br>
        Mother’s Name: <input type="text" name="mother"><br>
        Mother Occupation: <input type="text" name="mother_occ"><br>
        Language: <input type="text" name="language"><br>
        Emergency Contact: <input type="text" name="emergency"><br>

        <!-- Education -->
        <h3>Educational Background</h3>
        Elementary: <input type="text" name="elem"><br>
        Year Graduated: <input type="text" name="elem_grad"><br>
        High School: <input type="text" name="hs"><br>
        Year Graduated: <input type="text" name="hs_grad"><br>
        College: <input type="text" name="college"><br>
        Year Graduated: <input type="text" name="college_grad"><br>
        Degree: <input type="text" name="degree"><br>
        Skills: <input type="text" name="skills"><br>

        <!-- Employment -->
        <h3>Employment Record</h3>
        Company 1: <input type="text" name="company1"><br>
        Position: <input type="text" name="pos1"><br>
        From: <input type="text" name="from1"> To: <input type="text" name="to1"><br>
        Company 2: <input type="text" name="company2"><br>
        Position: <input type="text" name="pos2"><br>
        From: <input type="text" name="from2"> To: <input type="text" name="to2"><br>

        <!-- References -->
        <h3>Character Reference</h3>
        Name: <input type="text" name="ref1"><br>
        Company: <input type="text" name="refcomp1"><br>
        Contact: <input type="text" name="refcontact1"><br>
        Name: <input type="text" name="ref2"><br>
        Company: <input type="text" name="refcomp2"><br>
        Contact: <input type="text" name="refcontact2"><br>

        <h3>Other Info</h3>
        Res. Cert. No.: <input type="text" name="res"><br>
        Issued at: <input type="text" name="issued_at"><br>
        Issued on: <input type="text" name="issued_on"><br>
        SSS: <input type="text" name="sss"><br>
        TIN: <input type="text" name="tin"><br>
        NBI: <input type="text" name="nbi"><br>
        Passport: <input type="text" name="passport"><br>

        <br><input type="submit" value="Submit">
    </form>
    </body>
    </html>
    <?php
}
?>
