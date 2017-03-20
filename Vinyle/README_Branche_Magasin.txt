La branche "magasin" est une branche obsolete du projet sur les Vinyles. En effet l'�tat de la base de donn�e "vinylestore.sql" n'est pas celui que nous avons gard�.
N�anmoins la branche "magasin" comporte quelque sp�cificit� que nous n'avons pas gard� dans la branche master:

Design Pattern:
Le singleton est utilis� deux fois dans les classes Magasin et SuperAdmin, nous avons choisi d'utiliser ce design pattern afin d'avoir une instance de chacune de ces classes.
Nous ne voulions pas par exemple qu'un utilisateur puisse cr�er une seconde instance de Magasin et y faire des op�ration, le singleton permet donc de prot�ger la Base de Donn�e.
Il en va de m�me pour le SuperAdminstrateur, dans notre conception le SuperAdministrateur est le seule utilisateur capable de g�rer les administrateurs,
il permet de garder une hi�rarchie, et d'eviter la possibilit� que les administrateurs utilisent leurs pouvoirs de fa�on abusive.

La Composition: L'h�ritage est utilis� dans la branche master �galement, mais dans la branche magasin nous avons utilis� la composition dans la classe SuperAdmin afin de ne pas utiliser l'h�ritage.
En effet, nous avions pr�vu initialement de mettre un champs de type Utilisateur[] (classe abstraite et parent de Admin et Client) cependant si nous faisions h�riter SuperAdmin de la classe Admin
Cela aurait laiss� une possiblit� (en dehors du singleton) d'avoir plusieurs instance de SuperAdmin pour un seule Magasin.

Les principales op�rations sont pr�sentent dans cette branche, achat, gestion de client + administrateur, le client peut noter les produit qu'il a achet� et les commander, l'administrateur peut g�rer son stock. 

 