# 🏥 Cabinet Médical - Migration vers une Architecture MVC

## 📝 Contexte du Projet  
Le cabinet médical utilise actuellement une application développée en **PHP natif** avec une approche procédurale. Ce projet vise à migrer vers une architecture **MVC (Modèle-Vue-Contrôleur)** pour améliorer la **modularité**, la **maintenabilité**, et préparer l'intégration de futures fonctionnalités.

---

## 🎯 Objectifs  
- Développer une architecture **MVC** bien structurée.  
- Créer un code **lisible** et **maintenable** en appliquant les bonnes pratiques (**SOLID**, **DRY**).  
- Intégrer des fonctionnalités pour améliorer l'expérience utilisateur et l'efficacité opérationnelle.  

---

## 🚀 Fonctionnalités  

### 1. **Structure MVC**  
- **Modèle (Model)**  
  - Gérer les interactions avec la base de données (**CRUD** pour les patients, médecins, rendez-vous).  
  - Implémenter des relations entre les entités (**one-to-many**, **many-to-many**).  
  - Utiliser des requêtes préparées pour sécuriser les données (**anti-SQL injection**).  

- **Vue (View)**  
  - Création de **templates réutilisables** (header, footer).  
  - Assurer un **design responsive**.  
  - Validation côté client avec **HTML5** et **JavaScript natif**.  

- **Contrôleur (Controller)**  
  - Gestion de la logique métier et des interactions entre les modèles et les vues.  
  - Validation des données côté serveur (prévention des attaques **XSS** et **CSRF**).  
  - Gestion des sessions et autorisations d'accès.  

---

### 2. **Fonctionnalités Clés**  

#### **Front Office**  
- Inscription et connexion des utilisateurs (**patients** et **médecins**).  
- Prise de rendez-vous en ligne avec sélection du médecin.  
- Consultation de l'historique des consultations.  

#### **Back Office**  
- Gestion des utilisateurs (création, mise à jour, suppression).  
- Gestion des rendez-vous (confirmation, annulation).  
- Tableau de bord avec **statistiques** (patients, consultations).  

---

### 3. **Exigences Techniques**  
- Utiliser **PostgreSQL** pour la gestion de base de données.  
- Respect des principes **OOP** (encapsulation, héritage).  
- Validation des données côté serveur et client.  
- Utilisation de **sessions PHP** pour la gestion des utilisateurs connectés.  

---

### 4. **Architecture Technique**  
- **Autoloading** avec **Composer** pour un chargement efficace des classes.  
- **Routing Dynamique** : Routeur personnalisé pour mapper les URLs vers les contrôleurs.  
- Configuration via **.htaccess** pour rediriger toutes les requêtes vers `index.php`.  
- Séparation stricte des couches (**Modèle**, **Vue**, **Contrôleur**).  



## 📅 Modalités Pédagogiques  
- **Travail individuel**.  
- **Durée** : 5 jours.  
- **Date de lancement** : 03/02/2025 à 09:00.  
- **Date limite de soumission** : 07/02/2025 avant 17:30.  


## 🛠️ Installation et Utilisation  

### **Prérequis**  
- **PHP 8.x** ou plus récent.  
- **PostgreSQL** pour la base de données.  
- **Composer** pour la gestion des dépendances.  

### **Installation**  
1. Clonez le repository :  
   ```bash
   git clone https://github.com/votre-utilisateur/votre-repository.git
   cd votre-repository

