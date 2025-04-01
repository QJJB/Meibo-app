# Workflow Git : Création, Modification, Merge et Suppression d'une Branche

## 1. Création d'une Nouvelle Branche

```sh
# Met à jour la branche principale locale
git checkout main
git pull origin main

# Crée et change vers une nouvelle branche
git checkout -b nom-de-la-branche
```

## 2. Faire des Modifications et Commits

```sh
# Ajoute tous les fichiers modifiés à la zone de staging
git add .

# Commit les modifications avec un message descriptif
git commit -m "Description des modifications"
```

## 3. Pousser la Branche vers le Dépôt Distant

```sh
# Envoie la branche vers le dépôt distant
git push origin nom-de-la-branche
```

## 4. Création d'une Pull Request (PR)

1. Aller sur **GitHub/GitLab/Bitbucket**
2. Créer une **Pull Request** en comparant `nom-de-la-branche` avec `main`
3. Demander une revue de code

## 5. Fusionner la Branche (Merge)

```sh
# Se placer sur la branche main
git checkout main

# Mettre à jour la branche main
git pull origin main

# Fusionner la branche de travail
git merge nom-de-la-branche

# Pousser les modifications sur le dépôt distant
git push origin main
```

## 6. Suppression de la Branche

```sh
# Supprimer la branche localement
git branch -d nom-de-la-branche

# Supprimer la branche sur le dépôt distant
git push origin --delete nom-de-la-branche
```

---

🎉 **Félicitations !** Vous avez complété le cycle de travail avec Git !
