# UwU games

## 1. Objet

UwU games est un site développé dans le cadre d’un projet de première année des étudiants du département Imagerie Numérique de l’IUT de Clermont-Ferrand 1 – site délocalisé du Puy-en-Velay. C’est un site qui se comporte comme une plateforme de téléchargement de jeux vidéo. Il est disponible sur les différents navigateurs internet.

## 2. Documentation de référence

### 2.1. Youtube, Login system :

https://www.youtube.com/watch?v=gCo6JqGMi30

### 2.2. Lien Github du projet :

https://github.com/Paracetamol56/UwU-game.git

## 3. Terminologie et sigles utilisés

Pas de terminologie ou sigle précis.

### 4.1. Présentation des objectifs du site

L’objectif de ce site est de proposer de télécharger des jeux en ligne aux internautes. Ils pourront créer un compte et modifier leur profil, télécharger des jeux sur l’onglet boutique du site, ainsi que poster des jeux.
Les jeux seront classés par catégories (type de jeux comme plateformer, fps, rpg etc…) ce qui facilitera la recherche des jeux dans la boutique de plus on pourra également rechercher les jeux en fonction de leur nom. De plus chaque jeu aura une page dédiée où il pourra être représenté par des images et une description. Enfin les internautes pourront télécharger des jeux du site jusqu’à leur ordinateur.

### 4.2. Exigences concernant la conception et la réalisation

#### 4.2.1. Exigences envers les facteurs de qualité

Le site pouvoir supporter la majorité des jeux.
Il doit avoir un système de sécurité suffisant afin de contrer des attaques simples comme des injections SQL au seins du code.
Chaque téléchargement doit être comptabilisé.
Seul le créateur du jeu pourra modifier/supprimer le jeu de la boutique.

#### 4.2.2. Exigences de programmation

- Langages de programmation : PHP, MySQL, html/css/twig 
- Utilisation d’un Framework
- Création du code sous format MVC (Model View Controller)

#### 4.2.3. Exigences envers les outils de développement

La majorité de la programmation se fera sur Visual Studio Code 1.56.2. Les différentes données générées par le projet seront partagées grâce à GitHub.

#### 4.2.4. Exigences particulières de sécurité

- Aucune information personnelle se sera diffusé.
- La présence d’un mot de passe assurera la sécurité du compte utilisateur.
- Le Framework crée par Mathéo Galuba assurera la protection du code contre des attaques malveillantes simples.

### 4.3. Exigences opérationnelles

#### 4.3.1	Environnement

##### 4.3.1.1	Environnement matériel

CPU, RAM et un accès à une source internet.

##### 4.3.1.2	Environnement logiciel

Navigateur internet et explorateur de fichier du système d’exploitation hôte.

#### 4.3.2	Mise en œuvre

Le logiciel UwU games est un site internet. S’il est donc hébergé tout le monde peut y accéder via une connexion internet suffisante. L’utilisateur peut trouver le site via une recherche dans le navigateur ou en entrant directement l’IRL. Cependant afin d’utiliser le site à son plein potentiel il est nécessaire de créer un compte. De plus quand l’utilisateur a terminé il est conseillé de se déconnecter.
 
### 4.4	Exigences fonctionnelles

#### 4.4.1(1). Fonctionnalité <Création et utilisation de compte>

L’utilisateur peut créer un compte qui lui sera propre répertoriant ses informations personnelles et ses données engendrées sur le site (comme les jeux qu’il a téléchargé). Il pourra également poster un jeu sur le magasin.

##### 4.4.1.1. Entrées

Register : Pseudo, mot de passe, informations personnelles.
Login : Pseudo, mot de passe.

##### 4.4.1.2. Sorties

Register : Création d’un compte
Login : Connexion aux compte et possibilité d’accéder aux services reliés.

##### 4.4.1.3. Traitement

Register : Si pseudo identique à un autre impossibilité de le prendre, pas de mot de passe vide, pas d’informations personnelles obligatoires vides.
Login : Si mauvais mot de passe pas de connexion au compte.

##### 4.4.1.4. Validation de la fonctionnalité

Fonctionnalité validée

#### 4.4.1(2). Fonctionnalité <Magasin de jeux>

L’utilisateur aura accès au magasin de jeu qui lui permettra de rechercher un jeu par catégorie ou par nom. Chaque jeu aura une page associée avec une description, une image et un lien de téléchargement.

##### 4.4.1.1. Entrées

Mot clé pour la recherche par nom et choix de catégorie.

##### 4.4.1.2. Sorties

Jeux correspondant au résultat de la recherche.

##### 4.4.1.3. Traitement

Recherche tous les jeux correspondant aux critères de recherche. Si pas de résultat affiche un message l’indiquant.

#### 4.4.1.4. Validation de la fonctionnalité

Fonctionnalité validée

### 4.5. Interfaces

#### 4.5.1. Interfaces avec des matériels

Aucune interface particulière avec du matériel n’est nécessaire.

#### 4.5.2. Interfaces avec d’autres produits logiciels

Aucune interface particulière avec d’autres produits logiciels n’est nécessaire autre que les interfaces générées nativement par le navigateur internet et le système d’exploitation hôte.

#### 4.5.3. Interfaces avec des fichiers ou bases de données

Aucune interface particulière avec des fichiers ou bases de données n’est nécessaire autre que les interfaces générées nativement par le navigateur internet et le système d’exploitation hôte.

#### 4.5.4. Interfaces homme-machines

##### 4.5.4.1. Barre des menus

![Barre des menus][BarreDesMenus]

De gauche à droite :
Logo de UwU games.
Shop : espace pour visualiser les différents jeux du magasin et potentiellement les prendre.
Library : espace pour visualiser les différents jeux en notre possession.
Add Game : Menu où l’on peut ajouter un jeu au Shop.
Sign up : Menu où l’on peut s’inscrire et remplir ses informations personnelles.
Log in : Espace de connexion à son profil.

##### 4.5.4.2. Ecran de Sign up

![Ecran de Sign up][EcranDeSignUp]

Les différents espaces pour rentrer ses informations qui sont de haut en bas :
Son nom, son email, son pseudo, mot de passe et enfin la confirmation du mot de passe.

##### 4.5.4.3. Ecran de Log in

![Ecran de Log in][EcranDeLogIn]

Les différents espaces pour rentrer ses informations nécessaires à la connexion au profil qui sont de haut en bas :
Le pseudo ou l’email et le mot de passe.

##### 4.5.4.4. Ecran du profil

![Ecran du profil][EcranDuProfil]

L’écran résumant le profil du compte.
Une image de compte et un message de bienvenue avec le pseudo du compte.
Le username correspondant au pseudo, le full name au nom de la personne et l’email à son email.
Le bouton « Delete user » permet de supprimer son compte et le bouton « Modify user » de le modifier.

##### 4.5.4.5. Ecran de modification de profil

![Ecran de modification de profil][EcranDeModificationDeProfil]

Différents espaces afin de pouvoir changer ses informations personnelles comme :
L’image de profil en cliquant sur le bouton « Choisir un fichier » et en choisissant un fichier externe .png ou .jpg. Le pseudo, le nom et l’email.
Le bouton « Upload » sert à valider le choix de l’image de profil et le bouton « Apply » sert à appliquer toutes les modifications aux informations du compte.

##### 4.5.4.6. Shop menu

![Shop menu][ShopMenu]

Dans la partie supérieure nous avons les critères de recherche que l’on peut choisir pour affiner notre recherche :

![Critères de recherche][CriteresDeRecherche]

Nous pouvons tout d’abord trier les jeux par le critère « Most popular » qui trie les jeux selon le nombre de téléchargement, nous pouvons également les trier selon leur date de sortie avec le critère « Most recent » ou encore par le critère « Alphabetical » qui trie les jeux par ordre alphabétique.
Nous avons aussi la possibilité de chercher les jeux par leur nom.
Ensuite nous avons tous les jeux postés sur le site avec quelques informations importantes comme son nom, sa date de sortie et son nombre de téléchargement. Un bouton « View more » est présent pour accéder à la page du jeu en question. Sur la gauche nous avons également une image représentative du jeu.

##### 4.5.4.7. Menu d’un jeu

![Menu d’un jeu][MenuDunJeu]

Sur cet écran nous retrouvons les informations de base comme le nom, la date de sortie, le nombre de téléchargement mais aussi d’autres informations comme le pseudo de la personne qui a posté ce jeu ainsi que la description du jeu.
Nous également un bouton « Download » amenant sur un site externe permettant de télécharger le jeu.

## 5. Exigences concernant la qualification du logiciel
- Pouvoir se créer un compte.
- Pouvoir se connecter à son compte.
- Résistance aux attaques simples (injections sql…).
- Pouvoir modifier ses informations.
- Pouvoir ajouter un jeu.
- Pouvoir accéder au téléchargement des différents jeux de la plateforme.
- Pouvoir rechercher un jeu selon certains critères.
- Comptabilisation des téléchargements.

[BarreDesMenus]:doc/BarreDesMenus.png
[EcranDeSignUp]:doc/EcranDeSignUp.png
[EcranDeLogIn]:doc/EcranDeLogIn.png
[EcranDuProfil]:doc/EcranDuProfil.png
[EcranDeModificationDeProfil]:doc/EcranDeModificationDeProfil.png
[ShopMenu]:doc/ShopMenu.png
[CriteresDeRecherche]:doc/CriteresDeRecherche.png
[MenuDunJeu]:doc/MenuDunJeu.png



