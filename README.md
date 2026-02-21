## Utilisation de commande
php artisan serve --> Lancer le serveur (html sera update)
npm run dev --> Applique les @vite qui font marcher les css et js --> commande dans un autre terminal en ayant le serveur ouvert

php artisan migrate --> Créer les tables (applique les modèles)
php artisan make:model --> Créer un modèle
php artisan make:controller --> Créer un contrôleur
php artisan route:list --> Voir les routes

## Reprise du code

# Installation et setup du projet Barber

Suivez ces étapes après un `git clone` pour que le projet fonctionne correctement en local.

---

## 1️⃣ Aller dans le projet

```bash
cd Barber
````
## 2️⃣ Installer les dépendances PHP

```bash
composer install
```
## 3️⃣ Installer les dépendances front

```bash
npm install
```
## 4️⃣ Copier le fichier .env

```bash
cp .env.example .env
```

## 🔑 Contenu complet du .env à mettre

```bash
APP_NAME=Barber
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=/Users/halil672/Documents/édit/barber_site/Barber/database/database.sqlite

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

CACHE_STORE=file

QUEUE_CONNECTION=sync
```

## 5️⃣ Créer la base SQLite

```bash
touch database/database.sqlite
```
## 6️⃣ Générer la clé Laravel

```bash
php artisan key:generate
```
## 7️⃣ Supprimer tous les caches

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```
## 8️⃣ Migrer la base de données proprement

```bash
php artisan migrate:fresh
```
## 9️⃣ Lancer le front (si tu as du JS/Vite)

```bash
npm run dev
```
## 🔟 Lancer le serveur Laravel

```bash
php artisan serve
```