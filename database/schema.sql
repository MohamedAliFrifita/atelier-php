-- Création de la table user
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

-- Insertion d'exemples simples
-- !!!!: En production, les mots de passe seront hachés via PHP
INSERT INTO user (username, password, role) VALUES 
('admin_insat', 'admin123', 'admin'),
('etudiant_test', 'user123', 'user');