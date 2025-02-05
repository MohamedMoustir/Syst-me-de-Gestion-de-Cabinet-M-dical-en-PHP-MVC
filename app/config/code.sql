CREATE DATABASE cabinet_medical;
\c cabinet_medical;


CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL, 
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL, 
    role VARCHAR(50) NOT NULL, 
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);


CREATE TABLE medecins (
    id SERIAL PRIMARY KEY,
    utilisateur_id INT REFERENCES utilisateurs(id) ON DELETE CASCADE,
    specialite VARCHAR(100) NOT NULL, 
    Numero_Ordre INT NOT NULL 
);

CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    utilisateur_id INT REFERENCES utilisateurs(id) ON DELETE CASCADE,
    date_naissance DATE NOT NULL, 
    numeroSociale INT NOT NULL , 
);

CREATE TABLE rendezvous (
    id SERIAL PRIMARY KEY,
    patient_id INT REFERENCES patients(id) ON DELETE CASCADE, 
    medecin_id INT REFERENCES medecins(id) ON DELETE CASCADE, 
    date_rendezvous TIMESTAMP NOT NULL,
    statut VARCHAR(50) DEFAULT 'En attente', 
    motif TEXT, 
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




CREATE INDEX idx_utilisateurs_role ON utilisateurs(role); 
CREATE INDEX idx_rendezvous_date ON rendezvous(date_rendezvous);
CREATE INDEX idx_notifications_utilisateur ON notifications(utilisateur_id);

