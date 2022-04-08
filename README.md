# ECF_hypnos
# Description

## Dépôt du projet Hotel.

 Les documents annexes sont disponibles sur le drive : 

* Charte graphique
* Manuel d'utilisation
* Documentation technique


# Récupération du projet

## Utiliser GIT Clone pour récupérer le dépôt 

git clone https://github.com/CaptainAG/ECF_hypnos
# Installation

## Déplacement dans le dossier 
cd ECF_hypnos

## Installation des dépendances 
npm install

## Création de la base de données 
php bin/console doctrine:database:create

## Création des tables (migrations) 
php bin/console doctrine:migrations:migrate

## Insertions des jeux de données (fixtures) 
php bin/console doctrine:fixtures:load --no-interaction


# Deux options pour lancer le serveur de développement PHP :

## Si vous avez installé Symfony :  
symfony server:start

## Si vous utilisez Composer, il faut installer le Web Server Bundle :  
composer require symfony/web-server-bundle --dev
php bin/console server:start