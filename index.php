<!-- page de connexion -->

<?php
session_start();


$host = 'localhost';
$dbname = 'instruments_db';
$username = "root";
$password = "root";
$errorMsg = null;

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error : ".$e->getMessage();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['ID'];
        header("Location: occaz'music.php?id=" . $user['ID']);
        exit();
    } else {
        $errorMsg = "Incorrect username or password.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/index.css'>
    <title>Login</title>
</head>
<body style="overflow: visible;">
    <div class="container">

        <?php if (!empty($errorMsg)): ?>
            <div class="error-message">
                <?= htmlspecialchars($errorMsg) ?>
            </div>
        <?php endif; ?>

        <div class="head">
            <h1>Log in to your session</h1>
        </div>
        <div class="login_form">
            <form method="POST" action="index.php">
                <div class="form_group">
                    <label for="username" class="title">
                        <br>
                        Username
                        <br>
                    </label>
                    <input type="username" id="username" name="username" placeholder="Nom d'utilisateur" required></input>
                    <br>
                </div>
                <div class="form_group">
                    <label for="password" class="title">
                        <br>
                        Password
                        <br>
                    </label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" required></input>
                </div>
                <br>
                <button class="bttn" type="submit">Connexion</button>
            </form>
        </div>
        <div class="header_2">
            <p>New user ?  <a href="sign_up.php">Create an account here</a></p>
        </div>
    </div>
    <br>
<script src='assets/index.js'></script>
</body>
</html>