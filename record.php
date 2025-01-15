<?php

$servername = "localhost";
$database = "instruments_db";
$util = "root";
$pssw = "root";
$error_msg = null;
$success = null;

try{
    $occaz = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $util, $pssw);
    $occaz->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Error : ".$e->getMessage();
}

if(isset($_POST['ok'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username != "" && $password != "") {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $requete = $occaz->prepare("INSERT INTO Users (username, password) VALUES (:username, :password)");
        $requete->execute(
            array(
                "username" => $username,
                "password" => $hashed_password
            )
        );
        $success = "Successful registration !";
    } else {
        $error_msg = "Registration failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' media='screen' href='assets/record.css'>
    <title>Sign Up</title>
</head>
<body style="overflow: visible;">

    <?php if (!empty($success)): ?>
            <div class="success">
                <?= htmlspecialchars($success) ?>
            </div>
    <?php endif; ?>

    <br>

    <div class="home">
        <a href="index.php">
            <button class="button_home" type="submit">BACK TO LOGIN</button>
        </a>
    </div>
<script src='assets/index.js'></script>
</body>
</html>