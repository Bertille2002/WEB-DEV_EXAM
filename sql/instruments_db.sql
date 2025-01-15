CREATE DATABASE instruments_db;

USE instruments_db;

CREATE TABLE instruments (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Catégorie VARCHAR(255) NOT NULL, 
    Prix INT, 
    État VARCHAR(255) NOT NULL,
    Disponibilité VARCHAR(255) NOT NULL,
    Vendeur VARCHAR(255) NOT NULL
);

INSERT INTO instruments (ID, Nom, Catégorie, Prix, État, Disponibilité, Vendeur)
VALUES 
    (1, "Guitare acoustique", "Corde", 150, "Bon", "Disponible", "John Doe"),
    (2, "Piano éléctrique", "Clavier", 300, "Très bon", "Disponible", "Jane Smith"),
    (3, "Batterie", "Percussion", 200, "Bon", "Indisponible", "Alice Cooper"),
    (4, "Violon", "Corde", 120, "Excellent", "Disponible", "Bob Marley"),
    (5, "Trompette", "Cuivre", 180, "Bon", "Indisponible", "Lisa Brown");

CREATE TABLE users (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (ID, username, password)
VALUES 
    (1, "admin", "password123"),
    (2, "user1", "guitar2024"),
    (3, "user2", "piano5678"),
    (4, "user3", "drums!2023");