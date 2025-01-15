<?php

require_once(__DIR__ . '/databaseconnect.php');
include 'header.php';

$user_id = $_SESSION['user_id'];
$username = null;

$stmt = $pdo->prepare("SELECT username FROM users WHERE ID = :ID");
$stmt->bindParam(':ID',$user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user) {
    $username = $user["username"];
}

$InstrumentsStatement = "SELECT Nom, Catégorie, Prix, État, Vendeur FROM instruments WHERE Disponibilité = 'Disponible'";
$instrumentresult = $pdo->query($InstrumentsStatement);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Occaz'Music</title>
    <link rel="stylesheet" href="assets/occaz.css">
</head>
<body>
    <div class="header">
        <p>Welcome to Occaz'Music <?php echo htmlspecialchars($username) ?> </p>
    </div>
    <main>
        <h1>
            Browse. Choose. Reserve.
        </h1>
        <br>
        <div>
            <section>
                <h2>Our currently available instruments :</h2>
            </section>
            <table>
                <tr>
                    <th>Instrument</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>État</th>
                    <th>Vendeur</th>
                </tr>
                <?php 
                    while($rows=$instrumentresult->fetch(PDO::FETCH_ASSOC))
                    {
                ?>
                <tr>
                    <td><?php echo $rows['Nom'];?></td>
                    <td><?php echo $rows['Catégorie'];?></td>
                    <td><?php echo $rows['Prix'];?></td>
                    <td><?php echo $rows['État'];?></td>
                    <td><?php echo $rows['Vendeur'];?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </main>
    <footer class="footer">
        <div id="contact">
            <h2>Contact us : </h2>
            <p>Phone: +33 9 26 23 22 25</p>
            <p>E-mail: occaz.music@gmail.com</p>
            <p>Adress: 123 city street, City</p>
        </div>
        <div class="copyright">
            <small>
                Copyright 2023 - Occaz'Music 
            </small>
        </div>
    </footer>
    <script src="gallery.js"></script>
</body>
</html>