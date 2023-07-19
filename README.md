PROCÉDURE D'INSTALLATION

1) Prérequis:
   . Assurez-vous que vous avez installé les prérequis pour exécuter Symfony sur votre système (PHP, Composer, MySQL, etc.).
   . Créez une base de données vide sur votre serveur MySQL qui sera utilisée par le projet Symfony avec comme nom "usersymfony"

2) Clonez le dépot GitHub :
   . Copiez l'url du dépot GitHub = https://github.com/Biteau-Gael/symfony-authentication.git
   . Ouvrez un terminal ou une console sur votre machine locale
   . Utilisez la commande 'git clone' pour cloner le dépot GitHub sur votre machine :
   "git clone https://github.com/Biteau-Gael/symfony-authentication.git"
   . Cela créera un répertoire contenant le code source du projet Symfony

3) Accédez au répertoire du projet
   . Utilisez la commande 'cd' pour accéder au répertoire du projet que vous venez de cloner :
   "cd symfony-authentication"

4) Installez les dépendances avec Composer
   . Exécutez la commande composer install pour installer les dépendances du projet Symfony :
   "composer install"

5) Ouvrez le fichier .env dans un éditeur de texte et configurez les paramètres de connexion à la base de données (DATABASE_URL) en utilisant les informations d'accès que vous avez créées dans la base de données préalablement.

6) Exécutez la commande pour mettre à jour le schéma de la base de données en utilisant Doctrine :
   "php bin/console doctrine:migrations:migrate"

7) lancez le serveur web:

"symfony server:start
