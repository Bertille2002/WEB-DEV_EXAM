<?php

require_once(__DIR__ . '/databaseconnect.php');
include 'comptes_site/header.php';

$user_id = $_SESSION['user_id'];
$username = null;

$stmt = $pdo->prepare("SELECT username FROM users WHERE ID = :ID");
$stmt->bindParam(':ID',$user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user) {
    $username = $user["Nom d'utilisaeur"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Occaz'Music</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <p>Welcome to Occaz'Music <?php echo htmlspecialchars($username) ?> </p>
        <nav>
            <ul>
                <li><a href="index.html">Login</a></li>
                <li><a href="sign_up.html">Sign up</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>
            Browse. Choose. Reserve.
        </h1>
        <div>
            <section>
                <h2>Our available instruments :</h2>
            </section>
        </div>
    </main>
    <footer class="footer">
        <div id="contact">
            <h6>Contact us : </h6>
            <p>Phone: +33 9 26 23 22 25</p>
            <p>E-mail: occaz.music@gmail.com</p>
            <p>Adress: 123 city street, City</p>
            <p>
                <small>
                    Copyright 2023 - Occaz'Music 
                </small>
            </p>
        </div>
    </footer>
    <script src="gallery.js"></script>
</body>
</html>