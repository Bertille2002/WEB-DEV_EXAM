<?php

$InstrumentsStatement = $mysqlClient->prepare('SELECT Nom, Catégorie, Prix (€), État, Vendeur FROM instruments');
$InstrumentsStatement->execute();
$Instruments = $InstrumentsStatement->fetchAll();