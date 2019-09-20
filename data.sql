



INSERT INTO `auteur` (`id`, `nom`, `relecteur`, `utilisateur_id`) VALUES
(1, 'Romain', 0, 2),
(2, 'AnneLouise', 0, 4),
(3, 'Stéphane', 0, 5),
(4, 'Pierre', 0, 3),
(5, 'Gaston', 0, 6),
(6, 'Panoramix', 0, 9),
(7, 'Obélix', 0, 8),
(8, 'Astérix', 0, 7);

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id`, `contenu`, `publiee_le`, `etat`, `titre`, `ecrit_par_id`) VALUES
(1, '<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.</h1> <p>Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.</p>', '2019-08-09 07:24:00', 'publié', 'lorem titre 1', 2),
(2, 'Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna.', '2019-09-20 00:00:00', 'publié', 'lorem 2', 2),
(3, 'Aliquam convallis sollicitudin purus. Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus. Fusce vulputate sem at sapien. Vivamus leo. Aliquam euismod libero eu enim. Nulla nec felis sed leo placerat imperdiet. Aenean suscipit nulla in justo. Suspendisse cursus rutrum augue. Nulla tincidunt tincidunt mi. Curabitur iaculis, lorem vel rhoncus faucibus, felis magna fermentum augue, et ultricies lacus lorem varius purus. Curabitur eu amet.', '2019-07-09 15:15:00', 'déprécié', 'lorem 3', 3),
(7, '<h1> Former à symfony, une longue et difficile tâche</h1>\r\n<a href=\"www.symfony.com\">www.symfony.com</a>\r\n<h2> dur dur d\'être formateur </h2>\r\n\r\n\r\nPour vous faire mieux connaitre d’où vient l’erreur de ceux qui blâment la volupté, et qui louent en quelque sorte la douleur, je vais entrer dans une explication plus étendue, et vous faire voir tout ce qui a été dit là-dessus par l’inventeur de la vérité, et, pour ainsi dire, par l’architecte de la vie heureuse.', '2019-09-11 11:11:00', 'publié', '9eme symfony', 4),
(10, 'Personne [dit Épicure] ne craint ni ne fuit la volupté en tant que volupté, mais en tant qu’elle attire de grandes douleurs à ceux qui ne savent pas en faire un usage modéré et raisonnable ; et personne n’aime ni ne recherche la douleur comme douleur, mais parce qu’il arrive quelquefois que, par le travail et par la peine, on parvienne à jouir d’une grande volupté. En effet, pour descendre jusqu’aux petites choses, qui de vous ne fait point quelque exercice pénible pour en retirer quelque sorte d’utilité ? Et qui pourrait justement blâmer, ou celui qui rechercherait une volupté qui ne pourrait être suivie de rien de fâcheux, ou celui qui éviterait une douleur dont il ne pourrait espérer aucun plaisir.', '2019-09-04 14:00:00', 'publié', 't2', 4),
(11, 'Au contraire, nous blâmons avec raison et nous croyons dignes de mépris et de haine ceux qui, se laissant corrompre par les attraits d’une volupté présente, ne prévoient pas à combien de maux et de chagrins une passion aveugle les peut exposer.', '2019-09-19 00:00:00', 'publié', 'Article enr 1', 6),
(12, 'J’en dis autant de ceux qui, par mollesse d’esprit, c’est-à-dire par la crainte de la peine et de la douleur, manquent aux devoirs de la vie. Et il est très facile de rendre raison de ce que j’avance. Car, lorsque nous sommes tout à fait libres, et que rien ne nous empêche de faire ce qui peut nous donner le plus de plaisir, nous pouvons nous livrer entièrement à la volupté et chasser toute sorte de douleur ; mais, dans les temps destinés aux devoirs de la société ou à la nécessité des affaires, souvent il faut faire divorce avec la volupté, et ne se point refuser à la peine.', '2019-09-18 00:00:00', 'publié', 'le banquet', 2),
(13, 'La règle que suit en cela un homme sage, c’est de renoncer à de légères voluptés pour en avoir de plus grandes, et de savoir supporter des douleurs légères pour en éviter de plus fâcheuses.', NULL, 'brouillon', 'la potion', 8),
(14, 'Ce texte a pour avantage d\'utiliser des mots de longueur variable, essayant de simuler une occupation normale. La méthode simpliste consistant à copier-coller un court texte plusieurs fois (« ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ceci est un faux-texte ») a l\'inconvénient de ne pas permettre une juste appréciation typographique du résultat final.', '2019-09-19 00:00:00', 'publié', 'les marrons', 7),
(15, 'Il n\'y a rien de meilleur qu\'un bon banquet au sanglier, et gaulois de péférence !!!', NULL, 'brouillon', 'Les sangliers', 7),
(16, 'J\'aime bien taper dessus !', '2019-09-19 00:00:00', 'publié', 'Les romains', 7),
(17, 'je les aime bien parce que ils portent mon prénom !', '2019-09-19 00:00:00', 'publié', 'Les romains', 1),
(18, 'J\'adore trop les herbes, je les fume des fois, mais je les utilise surtout pour les potions, et un peu pour la cuisine aussi!', '2019-09-17 00:00:00', 'publié', 'Les herbes', 6);

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`) VALUES
(1, 'coco@dawan.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$dC9EeHEycWdsalo2eU9XYQ$3LvcOUbZHBLOaGTIvmOyBqsHjVjZRgvLSp0G+94Gfmw'),
(2, 'romain@sigma.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$TFR5aDB4emt5TUxXalIyLw$lxF9+tetMQFrEvBM9CMJBovb8uSLgNSSa5rB/qribhI'),
(3, 'pierre@dawan.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$UWVhV0cwcmwuRXBGVmxabw$IFJysYUqC549ST3lvubwyuArTnCqnoVi5CvHVLmhdwQ'),
(4, 'annelouise@sigma.fr', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$UGQuckVBSFpzZWdOaDh4Lg$kouRcT/MiA5oidq3p+ztPcD3b3aYbkrKKAws1KT8cmQ'),
(5, 'stephane@sigma.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$R2J2ZzA2VVNLamUyMnh2Mw$orlBm7QfgInbj4bPOrUMd0omQECwSaVD7XuBkFHof0M'),
(6, 'gaston@lagaffe.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Z1ZuWk5yL2l1Q1lmLkpSVw$0yPZmB29PhAljxhy51Dzt3mvSM+tRNGs0O4eCYT6nkc'),
(7, 'asterix@asterix.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$cDk5ZElCZnZBR1ZGL1gyRg$hAwUYntdBbfAb+P/jcvTb1MC2tCw0Zt3e4jmrfID+Nw'),
(8, 'obelix@asterix.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$cDk5ZElCZnZBR1ZGL1gyRg$hAwUYntdBbfAb+P/jcvTb1MC2tCw0Zt3e4jmrfID+Nw'),
(9, 'panoramix@asterix.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$cDk5ZElCZnZBR1ZGL1gyRg$hAwUYntdBbfAb+P/jcvTb1MC2tCw0Zt3e4jmrfID+Nw'),
(10, 'agecanonix@asterix.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$cDk5ZElCZnZBR1ZGL1gyRg$hAwUYntdBbfAb+P/jcvTb1MC2tCw0Zt3e4jmrfID+Nw');
COMMIT;