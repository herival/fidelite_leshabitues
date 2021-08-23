# Fidelite - leshabitues.fr
Calcul des points de fidelités 

## Specs :
 - symfony => 5.4
 
## Requirements:
- php v^7.4
- php-ext-pgsql
- docker

## Installation :
- git clone your_fork.git
- cd fidelite_leshabitues
- composer install
- docker-compose up -d

## Database:
- bin/console doctrine:migration:migrate

## Application disponible sur Heroku : 
https://fidelite-leshabitues-fr10.herokuapp.com/