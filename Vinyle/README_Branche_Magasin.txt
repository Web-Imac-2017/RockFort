La branche "magasin" est une branche obsolete du projet sur les Vinyles. En effet l'état de la base de donnée "vinylestore.sql" n'est pas celui que nous avons gardé.
Néanmoins la branche "magasin" comporte quelque spécificité que nous n'avons pas gardé dans la branche master:

Design Pattern:
Le singleton est utilisé deux fois dans les classes Magasin et SuperAdmin, nous avons choisi d'utiliser ce design pattern afin d'avoir une instance de chacune de ces classes.
Nous ne voulions pas par exemple qu'un utilisateur puisse créer une seconde instance de Magasin et y faire des opération, le singleton permet donc de protéger la Base de Donnée.
Il en va de même pour le SuperAdminstrateur, dans notre conception le SuperAdministrateur est le seule utilisateur capable de gérer les administrateurs,
il permet de garder une hiérarchie, et d'eviter la possibilité que les administrateurs utilisent leurs pouvoirs de façon abusive.

La Composition: L'héritage est utilisé dans la branche master également, mais dans la branche magasin nous avons utilisé la composition dans la classe SuperAdmin afin de ne pas utiliser l'héritage.
En effet, nous avions prévu initialement de mettre un champs de type Utilisateur[] (classe abstraite et parent de Admin et Client) cependant si nous faisions hériter SuperAdmin de la classe Admin
Cela aurait laissé une possiblité (en dehors du singleton) d'avoir plusieurs instance de SuperAdmin pour un seule Magasin.

Les principales opérations sont présentent dans cette branche, achat, gestion de client + administrateur, le client peut noter les produit qu'il a acheté et les commander, l'administrateur peut gérer son stock. 

 