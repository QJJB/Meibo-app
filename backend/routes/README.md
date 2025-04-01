# API.PHP:

| **Méthode HTTP** | **URI**           | **Contrôleur et Méthode**           | **Middleware**       | **Description**                                                                 |
|-------------------|-------------------|-------------------------------------|-----------------------|---------------------------------------------------------------------------------|
| GET               | `/user`          | `Closure`                          | `auth:sanctum`        | Récupère les informations de l'utilisateur connecté.                           |
| GET               | `/projects`      | `ProjectController@showAll`        | `auth:sanctum`        | Récupère tous les projets associés à l'utilisateur connecté.                   |
| GET               | `/projects/{id}` | `ProjectController@show`           | `auth:sanctum`        | Récupère les détails d'un projet spécifique.                                   |
| POST              | `/projects`      | `ProjectController@create`         | `auth:sanctum`        | Crée un nouveau projet.                                                        |
| PUT               | `/projects/{id}` | `ProjectController@update`         | `auth:sanctum`        | Met à jour un projet existant.                                                 |
| DELETE            | `/projects/{id}` | `ProjectController@delete`         | `auth:sanctum`        | Supprime un projet existant.                                                   |

# AUTH.PHP:

| **Méthode HTTP** | **URI**                          | **Contrôleur et Méthode**                          | **Middleware**                     | **Nom de la Route**              | **Description**                                                                 |
|-------------------|----------------------------------|---------------------------------------------------|-------------------------------------|-----------------------------------|---------------------------------------------------------------------------------|
| POST              | `/register`                    | `RegisteredUserController@store`                 | `guest`                             | `register`                        | Permet à un utilisateur de s'enregistrer.                                      |
| POST              | `/login`                       | `AuthenticatedSessionController@store`           | `guest`                             | `login`                           | Permet à un utilisateur de se connecter.                                       |
| POST              | `/forgot-password`             | `PasswordResetLinkController@store`              | `guest`                             | `password.email`                  | Envoie un lien de réinitialisation de mot de passe à l'utilisateur.            |
| POST              | `/reset-password`              | `NewPasswordController@store`                    | `guest`                             | `password.store`                  | Réinitialise le mot de passe de l'utilisateur.                                 |
| GET               | `/verify-email/{id}/{hash}`    | `VerifyEmailController`                          | `auth`, `signed`, `throttle:6,1`    | `verification.verify`             | Vérifie l'email de l'utilisateur via un lien signé.                            |
| POST              | `/email/verification-notification` | `EmailVerificationNotificationController@store` | `auth`, `throttle:6,1`              | `verification.send`               | Renvoie un email de vérification à l'utilisateur connecté.                     |
| POST              | `/logout`                      | `AuthenticatedSessionController@destroy`         | `auth`                              | `logout`                          | Déconnecte l'utilisateur.                                                      |
