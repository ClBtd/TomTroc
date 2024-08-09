## Site d'échange de livre TomTroc

## Pour utiliser ce projet : 

- Commencez par cloner le projet. 
- Installez le projet chez vous, dans un dossier exécuté par un serveur local (type MAMP, WAMP, LAMP, etc...)
- Une fois installé chez vous, créez un base de données vide appelée : "TomTroc"
- Importez le fichier _TomTroc.sql_ dans votre base de données.

## Pour lancer le projet :

Pour la configuration du projet, éditez le fichier _config.php_ si nécessaire. 
Ce fichier contient notamment les informations de connextion à la base de données. 

Pour vous connecter, voici une liste de mail/password utilisables : 
- hermione.granger@poudlard.uk / BooksForever
- atticus.finch@gmail.com / FreeThemAll
- mia.corvere@blessed-murder.ai / KillJulius
- gargantua@theleme.fr / JaiFaim


## Problèmes courants :

Il est possible que la librairie intl ne soit pas activée sur votre serveur par défaut. Cette librairie sert notamment à traduire les dates en francais. Dans ce cas, vous pouvez soit utiliser l'interface de votre serveur local pour activer l'extention (wamp), soit aller modifier directement le fichier _php.ini_. 

Ce projet a été réalisé avec PHP 8.2. Bien que d'autres versions de PHP puissent fonctionner, il n'est pas garanti que le projet fonctionne avec des versions antérieures.

## Copyright : 

Projet créé dans le cadre d'une formation Openclassrooms. 
