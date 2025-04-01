# 🔥 MeiBo

> Application de gestion de tâches collaborative conçue pour faciliter l’organisation et le suivi du travail en équipe.

## Technologies utilisées

### Frontend

- **Next.js** – Pour une application rapide, optimisée et compatible SSR (Server-Side Rendering).
- **TypeScript** – Pour un code plus robuste et maintenable.
- **Tailwind CSS** – Pour un design élégant et une mise en page efficace.
- **GSAP** – Pour des animations fluides et dynamiques.
- **React Query** – Pour une gestion avancée des requêtes et du cache côté client.
- **Axios** – Pour des appels API rapides et optimisés.

### Backend

- **Laravel** – Un framework PHP puissant et modulaire.
- **Laravel Breeze** – Un système d’authentification simple et efficace.
- (Autres technologies à compléter)

## Installation du projet Meibo

### 1️⃣ Clonage du projet

Commence par cloner le dépôt :

```sh
git clone <URL_du_dépôt>
```

Ensuite, entre dans le dossier du projet :

```sh
cd Meibo
```

---

### 2️⃣ Installation et configuration du backend (Laravel)

> Assure-toi d’avoir PHP, Composer et une base de données (MySQL/PostgreSQL) installés.

1. Accède au dossier backend :

   ```sh
   cd backend
   ```

2. Installe les dépendances PHP avec Composer :

   ```sh
   composer install
   ```

3. Copie le fichier d’environnement et configure-le :

   ```sh
   cp .env.example .env
   ```

4. Génère la clé d’application :

   ```sh
   php artisan key:generate
   ```

5. Configure la base de données dans le fichier `.env`, puis exécute les migrations (uniquement lors de la première configuration) :

   ```sh
   php artisan migrate --seed
   ```

6. Lance le serveur Laravel :

   ```sh
   php artisan serve
   ```

---

### 3️⃣ Installation et lancement du frontend (Next.js)

> Assure-toi d’avoir Node.js et npm installés.

1. Accède au dossier frontend :

   ```sh
   cd ../frontend
   ```

2. Installe les dépendances :

   ```sh
   npm install
   ```

3. Copie le fichier des variables d'environnement :

   ```sh
   cp .env.example .env.local
   ```

4. Lance le serveur Next.js :

   ```sh
   npm run dev
   ```

---
