-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 16 Mars 2017 à 14:04
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `vinylestore`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_commande` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère commande',
  `adresse` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `nom`, `contenu`, `image`, `date`) VALUES
(1, 'Covers par Alex Bartsch', 'Londres est un endroit d\'une telle variété qu\'il est impossible de le présenter d’une manière globale. Plutôt que de capturer le Londres, les artistes peuvent capturer un Londres. La nouvelle série brillante de Alex Bartsch présente la ville d\'une manière vraiment inattendue. Alex a ressorti 42 couvertures de disques reggae sortis entre 1967 et 1987, parfaitement placés dans leurs lieux originaux de Londres. Dans Covers, la ville devient la toile de fond de la scène reggae vibrante de Londres.\r\n\r\nTout a commencé avec le LP de Brixton Cat par Joe\'s All Stars. «Je suis entré dans le reggae à l\'adolescence et j\'ai commencé à collectionner des disques il y a environ 10 ans», explique Alex.\r\n\r\n« Je suis artiste et photographe, donc je suis automatiquement attiré par l\'art sur les pochettes. En fait, j\'ai acheté le disque qui a commencé tout ce projet en grande partie pour la couverture. C\'était Brixton Cat sur Trojan Records, avec une femme debout, dos à la caméra, au coin de Atlantic Road et Electric Avenue. C\'est juste une super couverture ! »\r\n\r\nAlex est devenu fasciné par l\'idée de retrouver et de photographier des couvertures classiques in situ, mais ce n\'était pas toujours facile à exécuter. Certaines des photos les plus difficiles à réaliser demandaient d’escalader clôtures, des toits…\r\n\r\nIl y a eu des projets similaires avant, avec des scènes de film et des images historiques super-posées sur leurs lieux d\'origine. Mais grâce à la combinaison d\'un sujet inhabituel, de la ténacité d\'Alex et l\'attention au détail, Covers arrive avec une vague de fraicheur sur ce type de projets. \r\n\r\nNon seulement il documente une partie moins connue de l\'histoire culturelle de Londres, mais dévoile aussi des parties de la ville que la plupart des gens n\'aurait pas entendu parler, et encore moins visité.\r\n\r\n« Il est vrai que les non-Londoniens pourraient ne jamais ressentir le besoin d\'aller à Penge ou à Harlesden, » dit Alex. « Mais tous ces endroits ont des connexions - Harlesden et la zone environnante était vraiment le centre de reggae à Londres. »\r\n\r\n« Beaucoup de labels comme Pama et Trojan ont opéré à partir de là, et tant de couvertures ont été photographiées dans NW10. Je conseillerais aux gens de visiter Harlesden plutôt que Buckingham Palace. » \r\n\r\n\r\n\r\nsource : https://wetransfer.com/thisworks/2016/11/14/alex-bartsch-covers/\r\n', '/src/assets/imgs/articles/Brixton.jpg', '0000-00-00'),
(2, 'Quand Bob Marley faisait fondre les murs', 'Londres, 1975 : sur la scène du Lyceum, dans une ambiance de fournaise et d’hystérie hallucinatoire, c’est la naissance officielle du phénomène Marley. Deux concerts gravés sur disque pour le fameux “Live”, publié aujourd\'hui dans son intégralité sous la forme d\'un triple album.\r\n\r\nJames Brown à l’Apollo (volume 2) restauré en triple album dans toute sa splendeur frénétique, c’est au tour d’un autre concert mythique de se voir publier dans son intégralité. Celui-ci date de l’été 1975 et signe la naissance d’une star planétaire dans la chaleur humide d’un théâtre londonien du West End dont le directeur, au XIXe siècle, inspira, dit-on, le personnage de Dracula. L’enregistrement de Bob Marley au Lyceum, transformé en dancing, reste pour beaucoup (dont nous) l\'un des plus grands disques en concert de tous les temps. Pour ses multiples qualités d’abord, la fournaise rythmique qui ferait se liquéfier n’importe quels murs, la cohésion du groupe qui cuirasse le reggae de Kingston pour le public rock, la présence chamanique de Marley et de ses choristes, le tourbillon de tubes et d’hymnes qu’ils alignent. Mais aussi pour l’atmosphère démente qui entoure le concert, les échos délirants qu’il suscite à l’époque, donnant l’impression à n’importe quel ado, de Paris à Tokyo, qu’il a manqué l’immanquable. Qu’il faut être à Londres et nulle part ailleurs.\r\n\r\nLe 17 juillet, l’histoire est en marche. D’après les comptes rendus de la presse rock anglaise, ça se sent dès qu’on approche de la salle. La file d’attente s’allonge sur plusieurs centaines de mètres (« jusqu’à l’arrière-pays de Covent Garden »), la présence policière est considérable et ses émissaires sur les nerfs. La foule est à 50 % noire et à 200 % survoltée. Les Noirs de Londres n’ont pas souvent l’occasion d’aller se chauffer à l’une de leurs musiques dans une salle de deux mille personnes, et les Blancs sont de plus en plus curieux de ce phénomène qui débarque d’une île des Caraïbes et met le feu partout où il passe. Tous se mélangent et se frictionnent. « Que font les Blancs ici ce soir ?, demande un rude boy de l’assistance, ils n’étaient pas là la dernière fois ! » Bob Marley, qui revient d’une tournée américaine, fait la couverture de Time Out, les concerts sont archicomplets, la demande d’invitations est considérable. « Même Jim Morrison n’aurait pas eu la sienne », s’emballe un reporter de Sounds.\r\n\r\n\r\nsource : http://www.telerama.fr/musique/quand-bob-marley-faisait-fondre-les-murs,151498.php', '/src/assets/imgs/articles/marley.jpg', '0000-00-00'),
(3, 'Zappa, en verve et contre tous', 'Rééditions des premiers albums du guitar hero, pervers, bizarre et rigolo de Californie. Dont ce “We\'re only in it for the money”, manifeste vraiment révolutionnaire, avant-gardiste et magnifique, qui se moque de tout. Y compris des Beatles.\r\n\r\n\r\n En 1968, Frank Zappa a 28 ans. On ne la lui fait déjà plus depuis longtemps. La grande vibration hippie de l’été de l’amour l’a (au mieux) laissé de marbre. Les aventures rock de l’époque ne trouvent pas grâce à ses yeux. Sgt. Pepper’s, le chef-d’œuvre psyché des Beatles, et les inventions sur lesquelles toute une génération s’extasie ne sont pour lui, amateur de Varèse et de Stravinski, que vaguelettes sans conséquences. Le guitariste californien ne déteste pas l’album (« c’est pas mal »), mais les Beatles lui semblent appartenir à un autre monde que le sien : « Ils ne m’ont jamais fait fantasmer, avouait-il à la fin des années 1980. J’avais le sentiment, à l’époque, qu’ils n’étaient motivés que par l’argent [« They were only in it for the money »] — c’était un argument difficile à faire entendre. » Il ne se gêne pas pour autant. Au plus chaud de 1968, année chaude, sort We’re only in it for the money, le premier album phare des Mothers of Invention. La photographie de groupe de la pochette, signée Jerry Schatzberg qui vient de faire poser les Stones en filles, est une parodie de Sgt. Pepper’s. Les Mothers arborent leurs plus belles robes et leur pilosité la plus hirsute. Jimi Hendrix fait de la figuration à leur côtés. Ça pourrait faire rire les Beatles, mais pas du tout. Zappa téléphone à McCartney qui lui conseille de parler à son manager. Zappa a beau rétorquer que c’est aux artistes de prendre les décision eux-mêmes, la sortie est retardée, l’image censurée, remplacée pendant des années par une photo des Mothers patibulaires qui figure à l’intérieur du disque.\r\n\r\n  « La différence la plus frappante entre les Beatles et les Mothers of Invention n’est pas tant dans la musique que dans son approche, écrit alors un critique du New York Times. Les Beatles ont le désir de plaire à leur public, alors que les Mothers mettent celui-ci au défi. » Créées en 1965 dans le Los Angeles des premiers hippies (mais aussi celui des émeutes de Watts auxquelles Zappa fait bien plus attention), les « Mères de l’invention » forment une sacrée bande. Selon le critique Nick Cohen, elles évoquent « un gang de bikers qui débarque pour piller votre maison et kidnapper votre fille – même si plutôt que de la violer, ils lui font écouter du Stravinski ». Des punks avant l’heure qui refusent toute logique de système et militent activement pour une musique franchement révolutionnaire. Dans ses paroles drôles et caustiques prenant pour cible toutes les couches de la société, et pas seulement celle du spectacle, Zappa parle au nom des freaks, les vrais marginaux, irréductibles irrécupérables qui ne se retrouvent dans aucun mouvement (en 1968, Gilbert Shelton lance sa fameuse série BD, les Freak Brothers) et dessinent eux-mêmes les contours de leur propre univers.\r\n\r\n  Considéré à raison comme un des sommets de l’œuvre de Zappa (trois albums derrière lui, une trentaine à venir), We’re only in it for the money est le meilleur témoignage de cette époque agitée, pendant laquelle le groupe s’était installé à New York pour fixer ses règles et s’imposer sur le front de l’avant-garde. Le soir, il se produit pour trois dollars au Garrick, un petit théâtre de Greenwich Village. Les Mothers jouent (très) fort, ricanent entre eux, démembrent des poupées sur scène et, sur fond de projections, développent un son agressif mais particulièrement inventif qui, entre passion et dérision, creuse les racines de la musique populaire américaine. Le reste du temps, le groupe est en studio. Sous les ordres d’un Zappa un peu tyrannique, les Mothers s’immergent dans un cycle d’albums sobrement baptisé : « projet sans potentiel commercial » (où figurent aussi Ruben and The Jets, Lumpy Gravy et Uncle Meat).\r\n\r\n  Produit par leur mentor Tom Blanchard Wilson, un des rares producteurs black de l’époque (qui fit beaucoup pour Dylan, Simon and Garfunkel et le Velvet Undergound), We’re only in it for the money échappe à tous les formats. Dix-huit morceaux sur deux faces, certains d’à peine une minute, alors que le délire final, The Chrome Plated Megaphone of destiny se distord sur plus de six minutes. La musique est un montage mouvementé d’influences rock et doo-wop et de digressions très libres, collage d’harmonies lumineuses et de voix blanches, trafic de sons, inventions instrumentales et piratages d’ondes. Avec l’humour féroce et débile qui va faire sa signature, Zappa envoie des piques tous azimuts. Dans Concentration Moon, il s’en prend au système, à la police qui a brutalement réprimé les manifestations pour les droits civiques et qui cogne les étudiants partout dans le pays. Il rend hommage au passage au Velvet Underground (« un groupe encore plus pourri que celui de Zappa »). Les policiers et les réacs en prennent pour leur grade, mais les Mothers n’épargnent pas leurs propres « frères » de la génération hippie, leur naïveté dans Who needs the peace corp ?, leurs illusions dans Absolutely free (citation fendarde de Hey Joe) ou Flower Punk, le bien-nommé.\r\n\r\n L’album est favorablement accueilli et se taille même un petit succès (trentième au hit-parade américain), la carrière est lancée. Zappa s’impose comme le porte-parole révolutionnaire qu’il refusera d’être. Et il ne serait pas tout à fait Zappa sans les provocations salaces et énormes, les saynètes orgasmiques qui vont peupler sa musique. Dans Harry you’re a beast, la femme intime l’ordre à son homme, dont elle ne veut pas, de ne pas « jouir à l’intérieur. » Censure immédiate. La maison de disque fait passer la phrase à l’envers pour la rendre inintelligible. D’autres chansons sont tronquées, certaines phrases coupées (comme l’allusion au Velvet) sans que Zappa en soit informé. En 1984, il publiera We’re only... à nouveau avec les paroles d’origine, mais il est resté longtemps fâché à cause des misères faites à ce disque. Quand il fut élu parmi les meilleurs albums de tous les temps, Zappa maugréa : « Je préfère que la récompense aille à ceux qui ont censuré cet album, ils la méritent plus que moi. »\r\n\r\n\r\nSource :  http://www.telerama.fr/musique/zappa-en-verve-et-contre-tous,152473.php', '/src/assets/imgs/articles/zappa.jpg', '0000-00-00'),
(4, 'Réédition vinyle des albums de PLUMTREE', 'En 7 ans de carrière, de 1993 à 2000, le groupe canadien all-girl-band Plumtree a enregistré 3 albums d’indi-power-pop au succès très modeste. Elles ont commencé pourtant jeune, à 17 ans, ont tourné pas mal, et ont connu un succès critique au Canada.  La réédition par le bien nommé label Obscura, de leurs 3 albums en Mars 2017, pour la première fois en vinyle, mais seulement à 300 exemplaires, est une bonne occasion de redécouvrir ce groupe sympathique, qui ne révolutionna certes pas la musique, mais qui est bien agréable. Notons que les cd (les CD ! ) du groupe se trouvent à pas loin de 100 euros !\r\n\r\n\r\nPour en savoir plus : http://www.labelobscura.com/plumtree-vinyl-reissues/\r\n\r\n\r\nSource : https://disquesobscurs.fr/news/reedition-vinyle-albums-de-plumtree/', '/src/assets/imgs/articles/plumtree.jpg', '0000-00-00'),
(5, 'Pour le 74ème anniversaire d\'Harrison !', ' George Harrison aurait eu 74 ans le 25 février dernier. En cette occasion et pour la première fois, l\'intégralité des albums de George Harrison (Beatles) réunis dans un coffret Ultra collector en édition limitée 18 Vinyles LP ! Cette sortie événement sera accompagnée de la réédition du livre de plus de 600 pages \" I Me Mine \" (avec les paroles des chansons et des photocopies de textes manuscrits de l\'artistes) ! Attention aux stocks... et au prix....\r\nHeureusement l\'éditeur nous propose également tous les albums de George Harrison à l\'unité en édition Vinyle Remasterisée (édition remastered 2017) !\r\n\r\n\r\n George Harrison était-il l’égal de John Lennon et Paul McCartney ? Les surpassait-il parfois par son étrangeté, son ambition secrète, son feu sacré? On se gardera d’entrer dans une discussion qui ne mène nulle part. D’autres l’ont fait dans le passé pour le plaisir de l’agacerie et en sont ressortis tous phares éteints. Force est de constater tout de même que l’œuvre du plus jeune, du plus discret des Beatles, celui qu’on surnommait « le taiseux », est régulièrement visitée comme un monument. En 2011, Martin Scorsese consacrait une somme documentaire de plus de trois heures à ce prolo mystique comme lui, guitariste tourmenté, mort d’un cancer à 58 ans, dont les idées illuminèrent le trajet des « Fab Four ». Aujourd’hui, l’intégrale de ses disques vinyles nous tombe dessus comme une dalle de marbre. Une quinzaine d’albums recueillis dans un packaging colossal et sophistiqué, aux côtés duquel l’intégrale Lennon a des airs pauvrets. Paul McCartney, qui « jouait quarante-neuf de ses chansons avant de me laisser en placer une » (dixit Harrison) n’a pas encore publié la somme phraonique de ses années en solo. Ringo Starr doit s’en foutre comme de sa première chemise fleurie. Les ayants droit de George Harrison ont le champ libre. Il y a toujours eu de la revanche dans l’air.\r\n', '/src/assets/imgs/articles/harrison.jpg', '0000-00-00'),
(6, 'Bob Dylan, cœur de pirate', 'Réédition du premier volet des “Bootleg Series”, parues en 1991, à l\'époque où le chanteur décida de prendre les pirates de vitesse et de fouiller dans des archives dont on était encore loin d\'imaginer la splendeur et la richesse. Les disques pirates sont nés avec Dylan, il aura peut-être leur peau.\r\n\r\nAvant que le vinyle ne commence à s’effacer du paysage, au début des années 90, la chasse aux disques pirates était une activité des plus réjouissantes, riche en rebondissements et en surprises (parfois mauvaises), assez pour nous faire courir sur des kilomètres. Pour la pratiquer pleinement, il fallait maîtriser la communication avec le vendeur de disques, lequel, on le sait, est rarement friand de contacts, et surveille jalousement des trésors qu’il est seul à recenser. A New York, par exemple, aux portes du Greenwich Village cher à Dylan, il y avait quelques boutiques aux gardes sévères, dont Bleecker Bob, QG de Lenny Kaye, Patti Smith et des Ramones, où les bootlegs étaient (bien) gardés derrière la caisse. Selon l’humeur du jour, et si l’on était à même d’étaler quelques connaissances tenant lieu de sésame, on pouvait en voir quelques-uns, les écouter sûrement pas, confidentialité oblige. Impossible de savoir si le son était clair ou abject, il fallait risquer ses dollars comme au tripot. Des Dylan, il y en avait des dizaines, il aurait fallu un guide affable pour aider à faire le tri, la pioche était rarement bonne, des concerts mal ficelés ou des copies de copies. A vrai dire, le seul chef-d’œuvre « dylanesque » qu’on ait tiré de ces planques était un album de Patti Smith qui s’appelait I’ve never talked to Bob Dylan.\r\n\r\nLes disques pirates sont nés avec Dylan, semble-t-il, à la fin des années 60. Un commerce florissant a explosé le jour où est paru un album à la couverture entièrement vierge que les fans ont pris pour le dixième disque de leur héros. Une légende invérifiable avance que ce Great white wonder, publié à l’été 69, fut l’une des plus grosses ventes de l’auteur de Like a rolling stone. Pour les plus endurcis, l\'émotion était presque insoutenable. Aucune note de pochette ne l\'annonçait, mais le disque pirate contenait des trésors, enregistrements jamais entendus, sortis on ne sait comment des archives du chanteur, notamment des extraits des légendaires Basement Tapes gravées avec The Band et qui n’avaient encore jamais vu le jour. En toute illégalité, les disquaires ne se privèrent pas de le vendre et les radios de le passer. Ce frisson de clandestinité chauffa les esprits et trois mois plus tard Greil Marcus, dylanophile parmi les dylanophiles, s’en amusait, écrivant la critique dans Rolling Stone d’un album mythique de sessions secrètes rassemblant Jagger, Dylan, Lennon et McCartney. Sous l’emblème des Midnight Marauders, le disque, prétendument produit par Al Kooper, ne rassemblait que des imitateurs et fut à deux doigts de faire son trou dans les hit-parades.\r\nQuelques mois plus tard, le même Marcus étalait sur cinq pages la listes de tous les enregistrements inédits dont il avait connaissance. Des heures et des heures de chansons de Dylan dont on ne connaissait alors qu\'une centaine de morceaux. La chasse était ouverte. Elle n\'a jamais cessé. Au contraire. Malgré la publication, par Dylan lui-même, d’une quarantaine de disques tirés de ses archives secrètes, les réseaux n\'en finissent plus de se constituer sur le Web et ailleurs. Ils échangent des informations jusqu\'à saturation et proposent pirates plus mythiques que les pirates mythiques (le surplus des séances avec Johnny Cash, par exemple, ou la première mouture de Blood on the tracks) ainsi que des centaines de concerts inédits. Ceux du début (la performance légendaire du Town Hall, en 1964, sommet de la période protestataire), ou ceux de la fin qui n’en finit pas, le Never Ending Tour, soigneusement suivi, enregistré et compilé par les fans (en 2005 à Londres, Dylan reprend London Calling des Clash, ailleurs c\'est Something pour Harrison). On trouve tout ça (à peu près) sur YouTube. Et plus encore en utilisant certains de ses surnoms, Elston Gunn ou Blind Boy Grunt.\r\n\r\nCe qui nous amène (enfin) à notre réédition de la semaine : le premier volet de la série Bootlegs (volumes 1 à 3 en fait) qui en compte douze aujourd\'hui. En 1991, Dylan, jamais en mal d\'un coup de vice, prend les pirateurs à leur propre jeu et publie lui-même ses Bootlegs, qualité sonore et emballage soignés par Jeff Rosen, l\'homme « coffre-fort » de l\'artiste qui a déjà supervisé l\'excellente somme Biograph en 1985. A l\'époque, la publication fait son effet. 58 morceaux qui parcourent le spectre d\'une carrière. D\'un enregistrement maison (et la maison n\'était pas grande à l\'époque) gratté à la guitare sur fond de blues traditionnel (Hard Times in New York Town) aux chutes de studio de l\'âge d\'or Bringing it all back home/ Highway 61 revisited/ Blonde on blonde. Au fil des dix faces, une histoire parallèle s\'étoffe, des périodes jugées creuses comme celle d\'Infidels reprennent du poil de la bête avec la publication d\'inédits sidérants (Blind Willie Mc Tell ), des merveilles apparaissent partout, dont l\'impressionnant Series of dreams, que Daniel Lanois considérait comme l\'un des temps forts d\'Oh mercy, mais que Dylan avait refusé d\'inclure dans l\'album. La boîte de Pandore est ouverte. Dylan n\'en finira plus de fouiller ses archives, et plus il révèle de trésors, plus ses admirateurs se persuadent que d\'autres sont cachés.\r\n\r\n\r\nSource : http://www.telerama.fr/musique/bob-dylan-coeur-de-pirate,153214.php', '/src/assets/imgs/articles/dylan.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_article` int(11) UNSIGNED NOT NULL,
  `id_tag` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `description`, `image`) VALUES
(2, 'Renaud', '', ''),
(3, 'The Beatles', '', ''),
(4, 'ACDC', '', ''),
(5, 'Aretha Franklin', '', ''),
(6, 'The Dø', '', ''),
(7, 'Jacques Brel', '', ''),
(8, 'David Bowie', '', ''),
(9, 'Mickael Jackson', '', ''),
(10, 'Justice', '', ''),
(11, 'Nas', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur',
  `date` date NOT NULL,
  `id_panier` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère panier reliée à la commande',
  `ttc` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_commande` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère commande',
  `id_produit` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère produit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande_utilisateur`
--

CREATE TABLE `commande_utilisateur` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_commande` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère commande',
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) UNSIGNED NOT NULL,
  `contenu` text NOT NULL,
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur',
  `id_produit` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère produit',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) UNSIGNED NOT NULL,
  `note` int(11) NOT NULL,
  `id_produit` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère produit',
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'clé primaire du panier (ne désigne qu''un unique produit)',
  `numero` int(11) UNSIGNED NOT NULL COMMENT 'numéro du panier (discrimine les différents paniers - différents idPanier auront le même numPanier)',
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur',
  `id_produit` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère produit',
  `heureDebut` datetime NOT NULL COMMENT 'date création panier ',
  `heureFin` datetime NOT NULL COMMENT 'date destruction panier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(12) NOT NULL COMMENT 'type produit (platines, vinyles, coffrets)',
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text,
  `musique` text,
  `prix` decimal(10,0) NOT NULL,
  `genre` varchar(100) NOT NULL COMMENT 'coup de ceour, rock, electro, ...',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `type`, `nom`, `description`, `image`, `musique`, `prix`, `genre`, `date`) VALUES
(1, 'vinyles', 'Marche à l\'ombre', 'Marche à l\'ombre est le 4ᵉ album studio de Renaud sorti en février 1980 sous le label Polydor. C\'est dans cet album qu\'apparaît un des plus célèbres personnages de l\'univers de Renaud : Gérard Lambert, une petite frappe en mobylette.', '/src/assets/imgs/vinyles/renaud.jpg', 'test.mp3', '10', 'ChansonFrançaise Rock', '0000-00-00'),
(3, 'vinyles', 'Sgt Pepper\'s Lonely Hearts Club Band', 'Sgt. Pepper\'s Lonely Hearts Club Band est le huitième album des Beatles. Cet album est souvent cité comme leur plus grande œuvre et l\'un des albums les plus influents de tous les temps par les critiques.', '/src/assets/imgs/vinyles/SgtPepper.jpg', 'test.mp3', '15', 'Rock Pop Psychédélique', '0000-00-00'),
(4, 'platines', 'Pioneer PLX-500-W', 'Platine professionnelle', '/src/assets/imgs/platines/Pioneer.jpg', NULL, '325', 'Professionnel', '0000-00-00'),
(5, 'platines', 'Platine Vinyle Audio Technica AT-LP120USBHC', '', '/src/assets/imgs/platines/Technica.jpg', NULL, '299', '', '0000-00-00'),
(6, 'coffrets', 'Mars', 'La box tant attendue du mois de mars est là ! ', '/src/assets/imgs/coffrets/mars.jpg', NULL, '19', 'Pop HipHop', '0000-00-00'),
(7, 'coffrets', 'Février', 'C\'est le Rap qui est au rendez-vous pour ce mois de février !', '/src/assets/imgs/coffrets/fevrier.jpg', NULL, '19', 'Rap', '0000-00-00'),
(8, 'coffrets', 'Janvier', 'Un peu de poésie pour commencer l\'année 2017 en beauté !', '/src/assets/imgs/coffrets/janvier.jpg', NULL, '19', 'BandeOriginale Pop', '0000-00-00'),
(9, 'coffrets', 'Décembre', 'Pour terminer cette année 2016, nous vous proposons une sélection coup de coeur. Mais c\'est bien parce que c\'est vous !', '/src/assets/imgs/coffrets/decembre.jpg', NULL, '19', 'Pop Rock', '0000-00-00'),
(10, 'coffrets', 'Novembre', 'Une sélection de novembre pour se redonner un peu d\'énergie ! ', '/src/assets/imgs/coffrets/novembre.jpg', NULL, '19', 'Rock HipHop', '0000-00-00'),
(11, 'coffrets', 'Octobre', 'Nous sommes heureux de vous proposer notre tout premier coffret pour ce mois d\'octobre 2016. Et pour changer un peu, quelques vers français !', '/src/assets/imgs/coffrets/octobre.jpg', NULL, '19', 'ChansonFrançaise', '0000-00-00'),
(12, 'vinyles', 'Back in Black', 'Back in Black, sorti le 25 juillet 1980, est le 7e album du groupe de hard rock AC/DC. Il est souvent considéré comme un des meilleurs albums du groupe, mais également comme un des meilleurs albums de tous les temps et reste une date importante dans l\'histoire du Hard rock.', '/src/assets/imgs/vinyles/acdc.jpg', 'test.mp3', '10', 'Rock', '0000-00-00'),
(13, 'vinyles', 'Abbey Road', 'Abbey Road est le onzième album original publié par les Beatles, paru le 26 septembre 1969 au Royaume-Uni, et le 1er octobre aux États-Unis. Bien que sa sortie précède celle de Let It Be, paru en mai 1970, il est le dernier album enregistré par les Fab Four.\r\nPaul McCartney, au nom de tout le groupe, contacte le producteur George Martin pour lui proposer d\'enregistrer un album « comme avant ». Le 20 août 1969, les quatre Beatles sont réunis pour la toute dernière fois dans les studios EMI qui seront plus tard renommés Abbey Road.', '/src/assets/imgs/vinyles/AbbeyRoad.jpg\r\n', 'test.mp3', '15', 'Rock Pop', '0000-00-00'),
(14, 'vinyles', 'American Graffiti', 'American Graffiti est le second film de George Lucas. Fermez les yeux, vous voici en Californie en août 1962. Tout l\'univers de la musique des good old 50\'s est là !', '/src/assets/imgs/vinyles/americangraffiti.png', 'test.mp3\r\n', '10', 'Rock BandeOriginale', '0000-00-00'),
(15, 'vinyles', 'I Never Loved A Man The Way I Loved You', 'I Never Loved a Man the Way I Love You est un album d\'Aretha Franklin sorti le 10 mars 1967.', '/src/assets/imgs/vinyles/Aretha.jpg', 'test.mp3', '9', 'Soul', '0000-00-00'),
(16, 'vinyles', 'Aladdin Sane', 'Aladdin Sane est le sixième album de David Bowie, sorti en avril 1973.', '/src/assets/imgs/vinyles/bowie.jpg', NULL, '15', 'Rock', '0000-00-00'),
(17, 'vinyles', 'Les Marquises', 'Les Marquises est le treizième et dernier album studio de Jacques Brel, sorti en 1977 chez Barclay. Sans titre à l\'origine, il est désormais identifié par celui de la chanson qui clôt le disque.', '/src/assets/imgs/vinyles/brel.jpg', 'test.mp3', '10', 'ChansonFrançaise', '0000-00-00'),
(18, 'vinyles', 'Shake Shook Shaken', 'Shake Shook Shaken est le troisième album du groupe The Dø sorti le 29 septembre 2014.', '/src/assets/imgs/vinyles/do.png', 'test.mp3', '15', 'Rock', '0000-00-00'),
(19, 'vinyles', 'Thriller', 'Thriller 25 est un album de Michael Jackson sorti en février 2008, réédition de Thriller dont il fête le 25ᵉ anniversaire de la sortie le 1ᵉʳ décembre 1982', '/src/assets/imgs/vinyles/jackson.jpg', 'test.mp3', '20', 'Rock Disco', '0000-00-00'),
(20, 'vinyles', 'Woman', 'Woman est le troisième album du groupe de musique électronique français Justice, sorti en France le 18 novembre 2016.', '/src/assets/imgs/vinyles/justice.jpg', 'test.mp3', '20', 'Electro', '0000-00-00'),
(21, 'vinyles', 'Illmatic', 'Illmatic est le premier album studio de Nas, sorti le 19 avril 1994.', '/src/assets/imgs/vinyles/nas.png', 'test.mp3', '10', 'HipHop', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `produit_artiste`
--

CREATE TABLE `produit_artiste` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_produit` int(11) UNSIGNED NOT NULL,
  `id_artiste` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit_artiste`
--

INSERT INTO `produit_artiste` (`id`, `id_produit`, `id_artiste`) VALUES
(1, 1, 2),
(2, 3, 3),
(3, 13, 3),
(4, 12, 4),
(5, 15, 5),
(6, 18, 6),
(7, 17, 7),
(8, 16, 8),
(9, 19, 9),
(10, 20, 10),
(11, 21, 11);

-- --------------------------------------------------------

--
-- Structure de la table `produit_tag`
--

CREATE TABLE `produit_tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_produit` int(11) UNSIGNED NOT NULL,
  `id_tag` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit_tag`
--

INSERT INTO `produit_tag` (`id`, `id_produit`, `id_tag`) VALUES
(1, 1, 2),
(2, 3, 1),
(3, 3, 3),
(4, 3, 4),
(5, 12, 1),
(6, 13, 1),
(7, 13, 3),
(8, 14, 1),
(9, 14, 7),
(10, 15, 8),
(11, 16, 1),
(12, 17, 2),
(13, 18, 1),
(14, 19, 1),
(15, 19, 9),
(16, 20, 10),
(17, 21, 5),
(18, 6, 3),
(19, 6, 5),
(20, 7, 6),
(21, 8, 7),
(22, 8, 3),
(23, 9, 3),
(24, 9, 1),
(25, 10, 1),
(26, 10, 5),
(27, 11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `nom`) VALUES
(1, 'Rock'),
(2, 'ChansonFrançaise'),
(3, 'Pop'),
(4, 'Psychédélique'),
(5, 'Hip Hop'),
(6, 'Rap'),
(7, 'Bande Originale'),
(8, 'Soul'),
(9, 'Disco'),
(10, 'Électro');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(4) NOT NULL DEFAULT 'user' COMMENT 'le type de l''utilisateur, admin ou user',
  `identifiant` varchar(10) NOT NULL COMMENT 'identifiant pour se connecter',
  `motDePasse` varchar(12) NOT NULL COMMENT 'mdp pour connexion',
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `region` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(10) NOT NULL DEFAULT 'France'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `panierCommande` (`id_panier`),
  ADD KEY `user-commande` (`id_utilisateur`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commande_utilisateur`
--
ALTER TABLE `commande_utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-panier` (`id_utilisateur`),
  ADD KEY `produit-panier` (`id_produit`),
  ADD KEY `numPanier` (`numero`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit_artiste`
--
ALTER TABLE `produit_artiste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande_utilisateur`
--
ALTER TABLE `commande_utilisateur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clé primaire du panier (ne désigne qu''un unique produit)';
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `produit_artiste`
--
ALTER TABLE `produit_artiste`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse-commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag-article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `article_tag-tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `panier-commande` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`numero`),
  ADD CONSTRAINT `utilisateur-commande` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit-commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commande_produit-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `commande_utilisateur`
--
ALTER TABLE `commande_utilisateur`
  ADD CONSTRAINT `commande_utilisateur-commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commande_utilisateur-utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commentaire-utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `note-utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `produit-panier` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `utilisateur-panier` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `produit_artiste`
--
ALTER TABLE `produit_artiste`
  ADD CONSTRAINT `prduit_artiste-artiste` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `prduit_artiste-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  ADD CONSTRAINT `produit_tag-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `produit_tag-tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`);
