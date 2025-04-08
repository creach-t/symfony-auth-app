# Symfony Auth App

Application Symfony avec système d'authentification et d'inscription.

## Installation

1. Cloner le repository
```bash
git clone https://github.com/creach-t/symfony-auth-app.git
cd symfony-auth-app
```

2. Installer les dépendances
```bash
composer install
```

3. Configurer la base de données dans le fichier .env

4. Créer la base de données
```bash
php bin/console doctrine:database:create
```

5. Exécuter les migrations
```bash
php bin/console doctrine:migrations:migrate
```

6. Lancer le serveur de développement
```bash
symfony server:start
# ou
php -S localhost:8000 -t public/
```

## Fonctionnalités

- Inscription d'utilisateurs
- Connexion et déconnexion
- Protection des routes par authentification