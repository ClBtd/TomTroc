-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 09 août 2024 à 19:35
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `TomTroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `Books`
--

CREATE TABLE `Books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `disponibility` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Books`
--

INSERT INTO `Books` (`id`, `title`, `author`, `cover`, `description`, `disponibility`, `user_id`) VALUES
(3, 'The magician\'s nephew', 'C.S. Lewis', 'the-magicians-nephew.jpg', ' \"The Magician\'s Nephew\" is a fantasy novel written by C.S. Lewis, and it serves as a prequel to the beloved \"Chronicles of Narnia\" series. The story follows two children, Digory and Polly, who stumble upon a magical world while exploring the attic of Digory\'s uncle. As they venture further into this mysterious realm, they encounter the powerful magician, Uncle Andrew, and the majestic lion, Aslan.', 1, 2),
(7, 'The lion, the witch and the wardrobe', 'C.S. Lewis', 'the-lion-the-witch-and-the-wardrobe.jpg', '\"The Lion, the Witch, and the Wardrobe\" is the second book in C.S. Lewis\'s \"Chronicles of Narnia\" series, although it is often read as the first due to its popularity. This enchanting fantasy novel follows the adventures of four siblings - Peter, Susan, Edmund, and Lucy Pevensie - who are evacuated from London during World War II and sent to live in the countryside.\r\n\r\nWhile exploring their new home, Lucy discovers a magical wardrobe that serves as a gateway to the mystical land of Narnia. The siblings soon find themselves caught in a struggle between the kind-hearted lion, Aslan, and the White Witch, who has plunged Narnia into an eternal winter.', 1, 2),
(8, 'Age Tendre', 'Clémentine Beauvais', 'age-tendre.jpg', '\"Age Tendre\" de Clémentine Beauvais raconte l\'histoire de Valentin Lemonnier, un adolescent envoyé dans le Pas-de-Calais pour effectuer son année de service civique dans un centre pour personnes âgées atteintes d\'Alzheimer. Sa première mission consiste à écrire une lettre à une pensionnaire qui avait participé à un concours dans un magazine des années 60, lui annonçant que Françoise Hardy ne pourra pas venir chanter dans leur ville. Par un concours de circonstances, Valentin annonce l\'inverse et promet que Françoise Hardy viendra. Pour tenir sa promesse, il doit trouver un sosie de la star et organiser un concert pour les pensionnaires.', 1, 5),
(9, 'Ne nous libérez pas, on s\'en charge !', 'Bibia Pavard', 'ne-nous-libérez-pas-on-sen-charge-!.jpg', '\"Ne nous libérez pas, on s\'en charge\" explore le rôle essentiel des femmes dans les mouvements de libération en France des années 1950 aux années 1970. Les auteures mettent en lumière la contribution souvent méconnue des femmes dans les luttes pour l\'égalité, la justice sociale et la libération politique, en examinant les mouvements féministes, anticoloniaux, ouvriers et LGBT+. Cet essai remet en question les stéréotypes de genre et réaffirme l\'importance du rôle des femmes dans l\'histoire de la lutte pour la liberté en France.\r\n', 0, 8),
(10, 'J\'aurais aimé te tuer', 'Pétronille Rosatgnat', 'jaurais-aimé-te-tuer.jpg', 'Laura Turrel se présente au commissariat pour avouer le meurtre présumé de Bruno Delaunay, affirmant avoir agi en légitime défense lors d\'une tentative de viol. Le commandant Damien Deguire et son second, Jonathan Pigeon, enquêtent sur cette affaire complexe où la vérité semble échapper à chaque tournant. Le corps a disparu et la scène de crime ne correspond pas entièrement aux aveux de Laura, suscitant le doute quant à ses motivations réelles.', 1, 3),
(11, 'Brexit Romance', 'Clémentine Beauvais', 'brexit-romance.jpg', 'Marguerite Fiorel, une jeune soprano française de 17 ans, se rend à Londres pour chanter dans \"Les Noces de Figaro\", accompagnée de son professeur, Pierre Kamenev. Leur rencontre avec un lord anglais flamboyant, Cosmo Carraway, et Justine Dodgson, créatrice de la start-up secrète \"Brexit Romance\", qui vise à organiser des mariages blancs entre Français et Anglais afin de leur permettre d\'obtenir le passeport européen, donne lieu à une série de péripéties. ', 0, 5),
(12, 'Pines (Wayward Pines 1)', 'Blake Crouch', 'pines-wayward-pines-1.jpg', 'Secret Service agent Ethan Burke wakes up in the idyllic town of Wayward Pines, Idaho, after a car accident. However, he soon realizes that something is off about the town. Despite its picturesque appearance, Wayward Pines is hiding dark secrets, and its residents are trapped with no way out. As Ethan delves deeper into the mystery of Wayward Pines, he discovers that the town is governed by strict rules and surveillance, and escape seems impossible. With each revelation, Ethan uncovers more about the sinister forces at play in Wayward Pines and must fight to survive in this strange and dangerous town.', 1, 6),
(13, 'The horse and his boy', 'C.S. Lewis', 'the-horse-and-his-boy.jpg', '\"The Horse and His Boy\" tells the story of Shasta, a young boy living in the land of Calormen, who escapes his cruel adoptive father and sets out on a journey to Narnia. Along the way, he meets a talking horse named Bree who dreams of freedom. Together, they embark on an adventure filled with danger and excitement as they seek to uncover their true identities and find their place in the world of Narnia.', 1, 2),
(14, 'Prince Caspian', 'C.S. Lewis', 'prince-caspian.jpg', 'In \'Prince Caspian,\' the Pevensie siblings return to Narnia to help Prince Caspian reclaim his throne from his evil uncle, King Miraz. They join forces with Caspian and the Narnian creatures to battle against Miraz\'s forces and restore peace to the land. Along the way, they encounter challenges, allies, and betrayals, testing their courage and loyalty to Narnia.', 1, 2),
(15, 'The voyage of the Dawn Treader', 'C.S. Lewis', 'the-voyage-of-the-dawn-treader.jpg', 'Edmund and Lucy Pevensie, along with their cousin Eustace, join King Caspian on a journey across the sea aboard the magnificent ship, the Dawn Treader. Their quest is to find the seven lost lords of Narnia and to explore the uncharted waters of the Eastern Ocean. Along the way, they encounter magical islands, mythical creatures, and test their faith and courage as they face various trials and temptations. Ultimately, the voyage leads them to the edge of the world and a confrontation with Aslan, the Great Lion, where they learn valuable lessons about themselves and the nature of Narnia.', 1, 2),
(16, 'The silver chair', 'C.S. Lewis', 'the-silver-chair.jpg', 'In \'The Silver Chair,\' Eustace and Jill set out on a quest to find Prince Rilian, who vanished under mysterious circumstances. Guided by Aslan, they journey through perilous lands, facing challenges and encountering strange creatures. With the help of a noble Marshwiggle named Puddleglum, they uncover the truth behind Rilian\'s disappearance and learn valuable lessons along the way.', 1, 2),
(17, 'The last battle', 'C.S. Lewis', 'the-last-battle.jpg', 'In \'The Last Battle,\' the final installment of \'The Chronicles of Narnia,\' a false Aslan and an ape named Shift deceive the Narnians into believing that they must conquer the neighboring country of Calormen. Aslan\'s true followers, including King Tirian and the children from our world, must fight against this deception and restore peace to Narnia. The battle between good and evil reaches its climax as the fate of Narnia hangs in the balance, leading to a final confrontation and the ultimate resolution of the series.', 0, 2),
(18, 'Something is killing the children T1', 'James Tynion IV &amp; Werther Dell&#039;Edera', 'something-is-killing-the-children-t1.jpg', 'Dans la petite ville d&#039;Archer&#039;s Peak, des enfants disparaissent mystérieusement et d&#039;autres sont retrouvés morts dans des circonstances horribles. Les habitants sont terrifiés, et la police est impuissante face à cette menace inconnue. La situation semble désespérée jusqu&#039;à l&#039;arrivée d&#039;Erica Slaughter, une chasseuse de monstres déterminée et impitoyable, qui travaille pour une mystérieuse organisation secrète.\r\n\r\nErica possède des compétences surnaturelles et utilise des méthodes peu conventionnelles pour traquer et éliminer les créatures responsables des disparitions et des meurtres. Elle se lie avec un jeune survivant, James, qui a été témoin des horreurs et dont le témoignage pourrait être crucial pour arrêter les monstres.', 1, 10),
(19, 'Something is killing the children T2', 'James Tynion IV & Werther Dell\'Edera', 'something-is-killing-the-children-t2.jpg', 'Dans le tome 2 de \"Something Is Killing The Children\", l\'histoire continue à explorer les horreurs qui affligent la petite ville d\'Archer\'s Peak. Erica Slaughter poursuit sa mission de chasse aux monstres, mais les défis qu\'elle doit affronter se multiplient.\r\n\r\nAlors qu\'Erica s\'efforce de traquer les créatures, elle fait face à une résistance accrue de la part des habitants de la ville, qui sont de plus en plus méfiants et désespérés. La situation devient encore plus complexe lorsque l\'organisation secrète à laquelle Erica appartient, l\'Ordre de Saint-Georges, envoie des agents pour superviser ses actions. Ces agents, moins compréhensifs et plus brutaux, sont prêts à prendre des mesures drastiques pour contenir la situation.\r\n\r\nJames, le jeune survivant du premier tome, continue d\'aider Erica, mais il est profondément traumatisé par les événements qu\'il a vécus. Leur relation se renforce, et James commence à comprendre l\'étendue des sacrifices qu\'Erica doit faire pour protéger les innocents.', 1, 10),
(20, 'Something is killing the children T3', 'James Tynion IV & Werther Dell\'Edera', 'something-is-killing-the-children-t3.jpg', 'Dans le tome 3 de \"Something Is Killing The Children\", la chasseuse de monstres Erica Slaughter continue son combat contre les créatures meurtrières à Archer\'s Peak. L\'Ordre de Saint-Georges intensifie son contrôle, envoyant plus d\'agents pour surveiller Erica et imposer leurs méthodes brutales.\r\n\r\nLes tensions montent alors qu\'Erica doit non seulement lutter contre les monstres, mais aussi naviguer à travers la méfiance et l\'hostilité croissantes des habitants de la ville et les machinations de son propre ordre. Les enfants survivants, notamment James, sont de plus en plus impliqués, apportant de nouvelles révélations sur la nature des créatures.', 1, 10),
(21, 'Le livre de Perle', 'Timothée de Fombelle', 'le-livre-de-perle.jpg', '&quot;Le Livre de Perle&quot; raconte l&#039;histoire d&#039;Ilian, un prince exilé de son monde féerique vers la France des années 1930. Recueilli par la famille Perle, il adopte le nom de Joshua et vit en cachant son véritable passé. Tout en essayant de s&#039;adapter à ce nouveau monde, Ilian cherche désespérément à retrouver son grand amour, Olia, et à retourner dans son royaume enchanté.\r\n\r\nÀ travers les années et les épreuves, Ilian se confronte à la Seconde Guerre mondiale et tente de préserver les souvenirs de son passé. Sa quête est marquée par des rencontres avec des personnages variés, des aventures captivantes et une lutte constante pour garder l&#039;espoir vivant. Le roman est une ode à l&#039;imagination, à l&#039;amour et au pouvoir des histoires pour transcender les réalités et les mondes.', 0, 9),
(22, 'Interruption', 'Sandra Vizzavona', 'interruption.jpg', '\"Interruption\" est un ouvrage dans lequel Sandra Vizzavona partage son expérience personnelle de l\'avortement et les récits de nombreuses femmes qui ont vécu cette expérience. Vizzavona aborde le sujet avec une profonde sensibilité, soulignant l\'importance de donner la parole aux femmes pour qu\'elles puissent exprimer librement leurs sentiments et expériences sans jugement ni tabou. Le livre mélange des témoignages variés, certains douloureux, d\'autres anodins, et une quête personnelle qui a transformé l\'auteure. Il vise à briser le silence et la honte qui entourent l\'avortement, affirmant que le droit à l\'avortement sera toujours fragile tant que les femmes ne pourront pas en parler ouvertement.', 1, 8),
(23, 'D\'ambre et de feu', 'Agnès Domergue & Hélène Canac', 'dambre-et-de-feu.jpg', '\"D\'ambre et de feu\" est une bande-dessinée qui nous plonge dans un univers fantastique où la magie et les éléments naturels jouent un rôle central. L\'histoire suit les aventures d\'une jeune héroïne dotée de pouvoirs mystérieux liés à l\'ambre et au feu. À travers son parcours, elle découvre ses origines, apprend à maîtriser ses dons, et affronte des forces obscures menaçant son monde. Le récit est une quête initiatique pleine de mystère, de dangers et de révélations, explorant les thèmes de l\'identité, du pouvoir et du destin.', 1, 1),
(24, 'You are the placebo', 'Joe Dispenza', 'you-are-the-placebo.jpg', 'In \"You Are the Placebo,\" Dr. Joe Dispenza explores the power of the mind to heal the body and transform lives. Drawing on scientific research, case studies, and personal anecdotes, Dispenza explains how beliefs and thoughts can influence physical health and well-being. The book delves into the mechanisms of the placebo effect, showing how the brain can be reprogrammed to create positive changes in the body. Through practical exercises and meditations, Dispenza guides readers on how to harness this power to achieve their own health and wellness goals. The central message is that by changing our thoughts and perceptions, we can alter our reality and heal ourselves.', 1, 9),
(25, 'Beta', 'Rachel Cohn', 'beta.jpg', 'Beta is a science fiction novel set on the luxurious, man-made island of Demesne. The island is a utopia where the wealthy live in perfect harmony, with all their needs catered to by genetically engineered clones. The protagonist, Elysia, is one such clone, a \"Beta,\" designed to be flawless and serve the human residents. However, unlike other clones, Elysia begins to experience emotions and memories from her human \"First.\" As she navigates this forbidden consciousness, Elysia uncovers dark secrets about the island and the true nature of her existence. Her journey challenges her to confront the ethics of cloning and the meaning of humanity.', 1, 7),
(26, 'Something is killing the children T4', 'James Tynion IV & Werther Dell\'Edera', 'something-is-killing-the-children-t4.jpg', 'In Volume 4 of Something is Killing the Children, the focus shifts to Erica Slaughter\'s arrival at the House of Slaughter. The story delves into her initiation into the secretive organization that hunts monsters. As Erica navigates the strict and dangerous world of the House of Slaughter, she must prove her worth and adapt to their rigid rules and brutal training. The volume provides insight into the inner workings of the House, its various factions, and the ominous power struggles within. Erica\'s resilience and determination are tested as she faces both the horrors of her past and the deadly challenges of her present, setting the stage for her future battles against the monsters.', 1, 10),
(27, 'Something is killing the children T5', 'James Tynion IV & Werther Dell\'Edera', 'something-is-killing-the-children-t5.jpg', 'In Volume 5 of Something is Killing the Children, Erica Slaughter becomes a renegade from the House of Slaughter. Defying the organization\'s strict rules and dangerous politics, she travels to the small town of Tribulation in New Mexico. Here, she takes on a new and deadly mission to eliminate a duplicite, a terrifying monster that threatens the town. As Erica navigates the challenges of being an outsider in Tribulation, she must rely on her skills and instincts to protect the townspeople and confront the monstrous threat. This volume explores Erica\'s struggle against both external monsters and the internal conflicts with her former allies at the House of Slaughter.', 1, 10),
(28, 'Something is killing the children T6', 'James Tynion IV & Werther Dell\'Edera', 'something-is-killing-the-children-t6.jpg', 'Did Erica Slaughter really think she could so easily turn away from the Order of St. George and break the blood pact that bound her to her adoptive family? One thing is certain: the Old Dragon is determined to eliminate this renegade agent by sending their most ruthless hunter after her. After dealing with Big Gary, Erica\'s last ally, Miss Cutter is now on her way to Tribulation, New Mexico. Let the hunt begin.', 0, 10),
(29, 'La chair est triste hélas', 'Ovidie', 'la-chair-est-triste-hélas.jpg', 'L\'autrice et documentariste Ovidie partage son parcours vers une grève sexuelle de quatre ans, exprimant son ras-le-bol des rapports sexuels empreints de contraintes et de sacrifices pour satisfaire les désirs masculins. Elle évoque les moments où son plaisir était optionnel, les douleurs physiques et émotionnelles subies lors de rapports sexuels, ainsi que la pression sociale exercée sur les femmes pour maintenir leur attractivité. Ovidie met en lumière la servitude volontaire des femmes hétérosexuelles dans une société où le plaisir féminin est souvent relégué au second plan.', 1, 8),
(30, 'La ville sans vent (tome 1)', 'Eléonore Devillepoix', 'la-ville-sans-vent-tome-1.jpg', 'Lastyanax, un jeune mage, est confronté à un destin inattendu lorsque le meurtre de son mentor le propulse au sommet de la hiérarchie d&#039;Hyperborée. Son chemin croise celui d&#039;Arka, une guerrière intrépide en quête de son passé. Alors que Lastyanax recherche l&#039;assassin de son maître, Arka cherche des réponses sur son père disparu. Malgré leurs différences, ils doivent s&#039;allier pour déjouer les complots qui menacent la Ville sans vent. Ce roman captivant explore les thèmes de la quête de vérité, de l&#039;entraide et de la découverte de soi au sein d&#039;une société en proie à la manipulation et à la trahison.', 1, 4),
(31, 'Il nous restera ça', 'Virginie Grimaldi', 'il-nous-restera-ça.jpg', 'Les vies de trois personnages aux destins contrastés vont se croiser : Iris, une trentenaire nomade en quête de sens, Théo, un jeune homme désabusé par les échecs de la vie, et Jeanne, une septuagénaire scrutant son passé avec mélancolie. Leur rencontre fortuite les conduit à partager une colocation, initiant ainsi une histoire pleine de rebondissements. Entre ces trois âmes solitaires, des liens se tissent, révélant les rencontres improbables qui peuvent changer une existence. Ce roman explore avec sensibilité les thèmes de l\'amitié, de la résilience et de la redécouverte de soi à travers les aléas de la vie quotidienne.', 1, 3),
(32, 'Poésies complètes', 'Arthur Rimbaud', 'poésies-complètes.jpg', '&quot;Poésies complètes de Rimbaud&quot; rassemble l&#039;œuvre poétique flamboyante d&#039;Arthur Rimbaud, un des plus grands poètes français du XIXe siècle. Dans ce recueil, on trouve ses célèbres poèmes tels que &quot;Le Bateau ivre&quot;, &quot;Sensation&quot;, &quot;Ma Bohème&quot; et bien d&#039;autres. Rimbaud, à travers ses vers riches en images et en émotions, explore les thèmes de la quête de liberté, de la révolte contre la société et de la recherche de l&#039;absolu. Son écriture révolutionnaire et visionnaire a profondément marqué la poésie française et continue d&#039;inspirer les lecteurs du monde entier par sa modernité et sa puissance évocatrice.', 1, 1),
(33, 'Fourth Wing (Volume 1)', 'Rebecca Yarros', 'fourth-wing-volume-1.jpg', 'Twenty-year-old Violet Sorrengail, originally destined for a quiet life among books, finds herself thrust into the rigorous world of Navarre&#039;s elite dragon riders by her commanding general mother. Despite her smaller stature and fragile body, Violet must navigate the deadly trials of dragon bonding, where failure means certain death.\r\n\r\nWith dragons scarce and competition fierce, Violet faces hostility from her peers, including the powerful and ruthless wingleader Xaden Riorson. As she fights to survive each day, the external threats of war and failing defenses add to the danger.\r\n\r\nAmidst the chaos, Violet uncovers dark secrets hidden by leadership, leading her to question everything and everyone around her. In a place where agendas rule and survival is paramount, Violet must rely on her wits to navigate the treacherous halls of Basgiath War College, where the only outcomes are graduation or death.', 1, 6),
(34, 'Le prophète', 'Khalil Gibran', 'le-prophète.jpg', '\"Le Prophète\" de Khalil Gibran est un recueil de poèmes en prose qui explore les thèmes de la vie, de l\'amour, du travail, de la liberté et de la spiritualité à travers les paroles d\'un prophète nommé Almustafa. Dans cet ouvrage intemporel, Almustafa partage sa sagesse avec les habitants de la ville d\'Orphalese, répondant à leurs questions sur différents aspects de l\'existence humaine. À travers ses réponses, le prophète aborde des sujets profonds tels que la douleur, la joie, la beauté et la quête de sens dans la vie. Les mots de Gibran sont empreints de poésie et de philosophie, offrant des réflexions profondes sur la condition humaine et invitant le lecteur à méditer sur les mystères de l\'existence.', 1, 2),
(35, 'Wayward (Wayward Pines 2)', 'Blake Crouch', 'wayward-wayward-pines-2.jpg', '&quot;Wayward&quot; by Blake Crouch is a gripping thriller that follows the story of Ethan Burke, a Secret Service agent who arrives in the small town of Wayward Pines, Idaho, in search of two missing colleagues. However, as Ethan delves deeper into the town&#039;s mysteries, he discovers that Wayward Pines is not what it seems. Trapped in a bizarre and dangerous reality, Ethan must navigate a web of secrets and confront the sinister forces that control the town. With pulse-pounding suspense and unexpected twists, &quot;Wayward&quot; is a thrilling rollercoaster ride that will keep readers on the edge of their seats until the very end.', 1, 6),
(36, 'Horn venait la nuit', 'Lola Gruber', 'horn-venait-la-nuit.jpg', 'Simon Ungar connaît peu de choses sur son père, parti refaire sa vie au Canada. À un tournant difficile de sa vie où il se fait licencier et est quitté par sa petite amie, il décide de partir en République tchèque, à Olomouc, ville d’origine des Ungar, pour en apprendre davantage sur ses racines. Ce voyage, marqué par l\'amateurisme de Simon, le conduit de train en train jusqu’à Bratislava et Budapest. Il enchaîne les rencontres, les hasards et les coïncidences, mais reconstituer le puzzle familial s’avère complexe, entre fausses pistes et pièges tendus.\r\n\r\nPendant ce temps, le récit nous transporte dans le passé, au moment où l’armée d’Hitler envahit la Tchécoslovaquie. Ilse Küsser, encore enfant, voit sa famille exploser à cause de la guerre. Des événements apparemment insignifiants, comme une soirée à l’Opéra ou un accident de gymnastique, façonnent son destin. Sa vie prend un tournant décisif dans un théâtre de Bratislava pendant les années 1950, sous le régime communiste, lorsqu’elle rencontre le mystérieux Horn.\r\n\r\nAu fil du roman, les histoires de Simon et d’Ilse se croisent, révélant des mensonges enfouis et des secrets découverts. Lola Gruber nous entraîne dans une enquête romanesque captivante, où l\'humour côtoie la tragédie, la mort et l\'amour. En explorant la mémoire juive ashkénaze, les œuvres de Jules Verne, le clapotis du Danube la nuit et les banlieues sombres de Budapest, l’auteure tisse un récit où chaque page résonne avec intensité et émotion.', 1, 12),
(37, 'Sorcery of Thorns', 'Margaret Rogerson', 'sorcery-of-thorns.jpg', 'Sorcery of Thorns by Margaret Rogerson follows Elisabeth Scrivener, a librarian apprentice at one of the Great Libraries, which house magical grimoires. When an act of sabotage releases a dangerous grimoire, Elisabeth is implicated and forced to team up with Nathaniel Thorn, a sorcerer, and his demonic servant, Silas. Together, they uncover a conspiracy that threatens the entire kingdom. As Elisabeth grapples with her distrust of sorcery and her growing feelings for Nathaniel, she must confront dark forces and discover her own hidden powers to save the world she loves.', 1, 7),
(40, 'Dark Places', 'Gillian Flynn', 'dark-places.jpg', 'Dark Places by Gillian Flynn follows Libby Day, the only survivor of her family\'s brutal murder when she was seven years old. As an adult, Libby is contacted by The Kill Club, a group obsessed with solving notorious crimes, who believe her brother, Ben, was wrongfully convicted of the murders. Desperate for money, Libby agrees to investigate the crime and revisit her traumatic past. As she uncovers dark secrets and pieces together the events of that fateful night, Libby realizes the truth is more horrifying than she ever imagined. The novel explores themes of memory, trauma, and the consequences of violence.', 1, 1),
(43, 'Goupil ou face', 'Lou Lubie', NULL, 'Certains ont un chien, un chat ou un poisson rouge. Lou a une cyclothymie, un trouble de l’humeur de la famille des maladies bipolaires. Ce livre explore ce que cela signifie de découvrir et de vivre avec un petit renard sauvage dans son cerveau. Peut-on apprivoiser et dompter cette créature imprévisible ? Comment être heureux malgré cette cohabitation ? L\'auteur, en partageant son expérience personnelle, offre un ouvrage de vulgarisation scientifique qui dresse avec humour et sensibilité le portrait de ce trouble psychiatrique encore largement méconnu.', 0, 1),
(44, 'La cité des brumes oubliées', 'Sachiko Kashiwaba', 'la-cité-des-brumes-oubliées.jpg', 'La Cité des brumes raconte l&#039;histoire de Lina, une jeune fille qui est envoyée en vacances à la montagne. Son voyage l&#039;entraîne dans une ville magique, peuplée de créatures fantastiques et d&#039;énigmes. À travers ses aventures, elle rencontre divers personnages qui l’aident à mieux comprendre le monde qui l’entoure et à grandir. Ce roman est une quête initiatique teintée de mystère et de merveilleux, mêlant aventure et introspection. Ce livre a inspiré le film d&#039;Hayao Myazaki, &quot;Le voyage de Chihiro&quot;.', 1, 10),
(45, 'L&#039;origine du monde', 'Liv Stromquist', NULL, 'Une bande dessinée engagée et humoristique qui explore l&#039;histoire et les représentations du sexe féminin à travers les âges. Strömquist, avec son style distinctif mêlant illustrations simples et textes percutants, examine comment la société, la science, la religion et la culture ont façonné les perceptions et les tabous autour du corps des femmes. À travers des anecdotes historiques, des analyses socioculturelles et des références à la culture populaire, l&#039;auteur démystifie les idées reçues et met en lumière la manière dont le patriarcat a influencé notre compréhension du sexe féminin. Cette œuvre est une réflexion incisive et souvent drôle sur la sexualité, le pouvoir et les préjugés.', 0, 12),
(46, 'Iron Flame (Fourth Wing 2)', 'Rebecca Yarros', 'iron-flame-fourth-wing-2.jpg', 'Everyone expected Violet Sorrengail to fail during her first year at Basgiath War Academy, including herself. The initial trial was a wild adventure designed to weed out the weak, unworthy, and unlucky. However, that was just the beginning. The real training starts now, and Violet is already wondering how she will survive. It&#039;s not just the exhaustion, the brutality, or the program&#039;s design to push the riders beyond their pain tolerance. The new vice-commander seems determined to show Violet how powerless she is, constantly challenging her abilities and resolve.\r\n\r\nViolet faces a dilemma: betray the man she loves or continue to endure the relentless trials. Despite the overwhelming odds, Violet possesses an iron will and the fiercest determination. She has learned the most crucial lesson Basgiath has to offer: a dragon rider makes their own rules. Armed with this knowledge and her unyielding spirit, Violet is ready to face whatever comes her way, determined to carve her own path and prove everyone wrong.', 0, 6),
(47, 'La ville sans vent (Tome 2)', 'Eleonore Devillepoix', 'la-ville-sans-vent-tome-2.jpg', 'Alors que le froid glacial s&#039;abat sur Hyperborée, Lastyanax et Arka se retrouvent séparés. Lastyanax, jeune mage, quitte sa famille et ses amis pour partir à la recherche de sa disciple, Arka, qui s&#039;est aventurée loin au sud pour découvrir ses racines.\r\n\r\nPendant ce temps, le maître des lémures semble sur le point de conquérir la cité. Cependant, les plans sinistres de ses supérieurs menacent de bouleverser ses ambitions.\r\n\r\nDans cette situation complexe, Lastyanax doit affronter de nombreux dangers pour retrouver Arka. De son côté, Arka découvre des secrets sur son passé, renforçant sa détermination et sa compréhension de son propre pouvoir.\r\n\r\nLe maître des lémures doit naviguer avec prudence pour maintenir son contrôle, car ses projets sont en péril.\r\n\r\nLes destins de ces personnages s&#039;entrelacent dans une lutte pour le pouvoir et la survie. Qui prendra finalement la tête de la ville sans vent ? Seul l&#039;avenir le dira, alors que chacun doit faire face à ses propres défis et décisions cruciales.', 0, 4),
(48, 'Femme portant un fusil', 'Sophie Pointurier', NULL, 'Au début, elles étaient quatre : Claude, Harriet, Élie et Anna. Quatre femmes attirées par une annonce mystérieuse proposant la vente d&#039;un hameau isolé dans le Tarn. De cette annonce est né un rêve, celui de créer un lieu unique, construit par et pour les femmes. Elles ont transformé ce rêve en réalité, bâtissant un sanctuaire où jeunes et vieilles, forgées par les luttes des générations passées, pouvaient enfin vivre libres et solidaires.\r\n\r\nCependant, aujourd&#039;hui, ce rêve est menacé. Claude se retrouve face aux gendarmes, accusée du meurtre d&#039;un homme. Mère de famille et figure centrale de cette communauté, elle doit expliquer les événements qui ont conduit à ce jour fatidique.', 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Messages`
--

INSERT INTO `Messages` (`id`, `content`, `date`, `userId`, `senderId`) VALUES
(1, 'Dear Gandalf,\n\nI hope this message finds you well. I have long admired your wisdom, courage, and the magic you wield in Middle-earth. Your tales have inspired countless adventures in my own world.\n\nI would be honored to meet you someday and perhaps exchange stories and knowledge. Until then, please accept my warmest regards.\n\nSincerely,\nHermione Granger', '2024-04-18 00:00:00', 2, 1),
(2, 'Dear Hermione,\r\n\r\nGreetings from Middle-earth. Your message brings a smile to my face, for it is always heartening to hear from a fellow seeker of knowledge and wisdom. Your reputation as a talented witch and a fierce advocate for justice precedes you, and I commend your tireless efforts in your own world.\r\n\r\nI too would be delighted to meet you and exchange stories of our adventures. There is much we could learn from each other, for though our realms are different, the pursuit of knowledge and the battle against darkness are universal.\r\n\r\nMay your journey be filled with wonder and discovery. Until we meet, I send you my best wishes and warm regards.\r\n\r\nYours in wisdom and fellowship,\r\nGandalf the Grey', '2024-04-19 00:00:00', 1, 2),
(3, 'Dear Gandalf,\r\n\r\nThank you for your kind and encouraging words. It means a great deal to me to receive a message from someone of your stature and wisdom. Your tales of bravery and your dedication to the light have always been a source of inspiration for me.\r\n\r\nI agree that there is much we could learn from each other. The exchange of knowledge and experiences between our worlds could only serve to strengthen our respective quests against the darkness that threatens us all.\r\n\r\nI look forward to the day when we can share our stories in person. Until then, I will continue to draw strength from your example and strive to live up to the ideals you embody.\r\n\r\nWarmest regards,\r\n\r\nHermione Granger', '2024-04-20 00:00:00', 2, 1),
(6, 'Hello, I&#039;m very interested by your book &quot;La ville sans vent&quot;, do you think we can organize an exchange ? Best regards, Hermione Granger', '2024-07-24 12:37:09', 4, 1),
(7, 'Of course, would you want to make the exchange for both books, or just the first one ? Best regards, Lizzie', '2024-07-25 19:33:36', 1, 4),
(8, 'I guess it would be easier for me to get both of them right away, thanks !', '2024-07-25 20:13:02', 4, 1),
(9, 'Sure, no problem ! You will love them, i&#039;m sure of it !', '2024-07-25 20:13:39', 1, 4),
(10, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem consectetur, eum aliquid accusamus veniam porro, ab aspernatur asperiores neque nulla architecto accusantium sapiente repellendus! At, ab? Quisquam ex odio recusandae?', '2024-07-25 20:14:15', 10, 4),
(11, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem consectetur, eum aliquid accusamus veniam porro, ab aspernatur asperiores neque nulla architecto accusantium sapiente repellendus! At, ab? Quisquam ex odio recusandae?', '2024-07-25 20:15:05', 2, 4),
(12, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem consectetur, eum aliquid accusamus veniam porro, ab aspernatur asperiores neque nulla architecto accusantium sapiente repellendus! At, ab? Quisquam ex odio recusandae?', '2024-07-25 20:15:17', 6, 4),
(13, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem consectetur, eum aliquid accusamus veniam porro, ab aspernatur asperiores neque nulla architecto accusantium sapiente repellendus! At, ab? Quisquam ex odio recusandae?', '2024-07-25 20:16:57', 12, 4),
(14, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem consectetur, eum aliquid accusamus veniam porro, ab aspernatur asperiores neque nulla architecto accusantium sapiente repellendus! At, ab? Quisquam ex odio recusandae?', '2024-07-25 20:17:41', 6, 1),
(15, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem consectetur, eum aliquid accusamus veniam porro, ab aspernatur asperiores neque nulla architecto accusantium sapiente repellendus! At, ab? Quisquam ex odio recusandae?', '2024-07-25 20:17:51', 7, 1),
(16, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem consectetur, eum aliquid accusamus veniam porro, ab aspernatur asperiores neque nulla architecto accusantium sapiente repellendus! At, ab? Quisquam ex odio recusandae?', '2024-07-25 20:18:00', 12, 1),
(17, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:24:05', 10, 1),
(18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:24:30', 3, 1),
(19, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:24:51', 4, 2),
(20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:25:34', 1, 3),
(21, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:25:42', 10, 3),
(22, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:25:49', 6, 3),
(23, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:26:28', 2, 4),
(24, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident minus in accusantium, commodi ipsa. Reiciendis laboriosam, eius, placeat ipsa iste omnis ab nihil laudantium numquam aut tempora ducimus recusandae.', '2024-07-25 20:26:38', 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `login`, `email`, `password`, `picture`, `inscription`) VALUES
(1, 'Hermione Granger', 'hermione.granger@poudlard.uk', '$2y$10$7ZFLB9L90JstUVH0ZtNimOb/3/cdLImGmRNIkTh.NgQZydutHBp0S', 'hermione-granger.jpg', '2020-04-07'),
(2, 'Gandalf', 'gandalf@istari.me', '$2y$10$qjQlrtLs4rlg88wuWhBiWO0wlokD0hLgPClFNxH9tDiWKHtWfMB0i', 'gandalf.jpg', '1954-03-01'),
(3, 'Sherlock Holmes', 'sherlock.holmes@scotland-yard.uk', '$2y$10$K4wshxxGC1dc2pFVmM8FresVwYn1jRLt5y6U6FblS8aaVwffP8qFe', 'sherlock.jpg', '1887-10-31'),
(4, 'Elizabeth Bennet', 'elizabeth.bennet@gmail.com', '$2y$10$2g8rOqDp1sIo1nOU2KR9a.Qntw43LhgduWGAYecIfusGMMlFfxTMi', 'elizabeth-bennet.jpg', '1813-05-10'),
(5, 'Arya Stark', 'arya.stark@coldmail.wl', '$2y$10$BbZsROJ47B7bbMDHZYII2Omc.I/ttFNjM4qvAA1mVQFyKd8UTZZ2.', 'arya-stark.jpg', '1997-11-13'),
(6, 'Atticus Finch', 'atticus.finch@gmail.com', '$2y$10$S/R2TPhZ6Pc9CLkNPyKTU.yYwonbtI6J5nxkCilOFa2CCD43kLi7G', 'atticus-finch.jpg', '1960-12-15'),
(7, 'D&#039;Artagnan', 'dartagnan@service-public.fr', '$2y$10$QK2o1vMhkOt7y5rb3ejT6OtVQ8XJ9fcA/6k4irDCHfVo1kl/LoyaC', 'dartagnan.jpg', '1650-01-26'),
(8, 'Lisbeth Salander', 'lili_the_hacker@gmail.com', '$2y$10$xfgvm8BI5aYOywA2EGj7uuSrLSIAE5yb7cWXS6shzx14Nx9EIU5QS', 'lisbeth-salander.jpg', '2006-02-14'),
(9, 'Don Quichotte', 'donquichottedelamancha@gmail.com', '$2y$10$c6MsJObiHvYX2agIjP1SsuDau6yKeSj5axvP53R.mCr2gLxKsnWPG', 'don-quichotte.jpg', '1606-06-22'),
(10, 'Katniss Everdeen', 'katniss.everdeen@hungergames.pm', '$2y$10$VTrMvOVeoUTkk/wrE1eLZeo8R9/5dDFuI4XJ1n0NrLvg19n9X6fCa', 'katniss-everdeen.jpg', '2009-07-07'),
(11, 'Gargantua', 'gargantua@theleme.fr', '$2y$10$IoYdVrLlCxGytARe.DU.NOJdS/0myHWOhqOb43NRzzANAiUpMeCmm', 'gargantua.jpg', '1535-08-05'),
(12, 'Violet Sorrengail', 'violet.sorrengail@basgiath.na', '$2y$10$rlVitb94WtnmnyubffGujeouV4yujkt1kOMKhJUp5UXRs8xoQAPkm', 'violet-sorrengail.jpg', '2024-06-16'),
(14, 'Mia Corvere', 'mia.corvere@blessed-murder.ai', '$2y$10$DQE0Q2JIdrxelXkL./.tX.7rA40JWj3P.NBiQMq7HeM0Xv3FqFwpm', NULL, '2024-07-15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`user_id`);

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sent_to` (`userId`),
  ADD KEY `sent_by` (`senderId`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Books`
--
ALTER TABLE `Books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Books`
--
ALTER TABLE `Books`
  ADD CONSTRAINT `owner` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `sent_by` FOREIGN KEY (`senderId`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sent_to` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
