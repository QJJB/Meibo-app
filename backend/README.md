# Etapes pour cloner le projet

## Dans le dossier backend:

- Dans le dossier backend, réinstaller les packages avec:
    ```php 
        composer install 
    ```
- Ensuite créer le fichier .env grâce au .env.example avec la commande:
    ```php
        cp .env.example .env
    ```
- Dans le .env, configurer sa base de données

- Démarrer son serveur backend avec la commande:
    ```php 
        php artisan serve
    ```
- Si vous avez l'erreur: "No application encryption key has been specified.", faite la commande:
    ```php 
        php artisan key:generate
    ```
