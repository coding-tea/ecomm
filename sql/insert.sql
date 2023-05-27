INSERT INTO `categorie` (`Num_categorie`, `Name_categorie`, `image_categorie`, `Description_categorie`) VALUES 
(NULL, 'informatique', 'cat-informatique.jpg', 'Toutes Les produit concerne linformatique'),
(NULL, 'women', 'cat-women.jpg', 'les vetements des femmes'),
(NULL, 'men', 'cat-men.jpg', 'les vetements des hommes')
;




INSERT INTO `produit` (`id_produit`, `Name`, `description`, `url_img`, `quantite_produit`, `price`, `discount`, `id_compte`, `Num_categorie`) VALUES 
(NULL, 'Jacket Homme-Automne noir', 'Jacket Homme-Automne Humide et léger à porter pour tout les jours de la semaine et vous donne  aussi une température modérée.\r\ncolor : noir\r\ntaille : standard\r\n', 'product-2m.jpg', '15', '150', '5', '1', '3'),
(NULL, 'Iphone 14 Pro Max', "IPhone 14 Pro Stockage : 256 color : noir/bleu processeur : m1", '10','product-3i.jpg' ,'15000', '10', '1', '1'),
(NULL, 'MacBook Pro', "Jusqu à
1,4x plus rapide que le modèle avec puce M12 Jusqu à 6x plus rapide que le modèle avec processeur Intel2 Jusqu à 20 h
d autonomie1 ",'product-2i.jpg', '10', '20000', '5', '1', '1'),
(NULL, "Camera  Nikon", "Capturez le monde qui vous entoure à travers des images 4K2 HDR (HLG) grâce au capteur CMOS Exmor RS® empilé de type 1.0. Les performances inégalées de la mise au point automatique hybride rapide assurent une mise au point automatique (AF) et un suivi AF extrêmement précis, réactifs et fiables, ce qui augmente vos chances de saisir les scènes les plus furtives avec brio. Avec de telles capacités pro à votre portée, vos ambitions artistiques nauront plus aucune limite avec ce caméscope Handycam®","product-1i.jpg" ,'10', '1600', '10', '1', '5'),
(NULL, 'Robe long', 'Robe long avec bouton pratique pour tout les jours tissu de bonne qualité', 'product-6w.jpg', '20', '250', '10', '1', '2'),
(NULL, 'ROMWE Goth Robe', 'Couleur:	Noir
Style:	Casual
Type de motif:	Unicolore
détails:	Volants superposés, Froncé, Buste froncé
Type:	Trapèze
Type du col:	Col carré
Longueur des manches:	Manches longues',"product-1w.jpg", '12', '280', '10', '1', '2'),
(NULL, 'Homme Surchemise à poche', 'Couleur: Tabac\r\nStyle: Casual\r\nType de motif: Lettres\r\ndétails: Avec boutons devant, Poche, Écussons\r\nType: Surchemise\r\nType du col: Col chemise\r\nLongueur des manches: Manches longues\r\nType de manches: Classiques\r\nLongueur: Classique\r\nPatte: Une rangée de boutons',"product-5m.jpg", '10', '180', '5', '1', '3'),

(NULL, 'Pantalon de survêtement ', "Couleur:	Multicolore
Type de motif:	Tie dye, Lettres
détails:	Cordon
Type de fermeture:	Cordon à la taille
Tour de taille:	Naturel
Longueur:	Pantacourt
Type d'ajustement:	Coupe régulière
Tissu:	Extensibilité légère
Tissu/matériel:	ÉtoffeCouleur:	Multicolore
Type de motif:	Tie dye, Lettres
","product-1m.jpg", '10', '200', '5', '1', '3'),
(NULL, 'Homme Sweat-shirt à lettres', "Couleur:	Bleu gris
Style:	Casual
Type de motif:	Lettres
Type:	À enfiler
Type du col:	Col rond
Longueur des manches:	Manches longues
Type de manches:	Classiques
Longueur:	Classique
Type d'ajustement:	Coupe régulière
Tissu:	Extensibilité légère
Tissu/matériel:	Tissu tricoté","product-3m.jpg" ,'10', '300', '5', '1', '3'),


;





INSERT INTO `compte` (`id_compte`, `email`, `password`, `role`) VALUES 
(NULL, 'admin1@gmail.com', 'admin1234', 'admin'),
(NULL, 'user1@gmail.com', 'user1234', DEFAULT),
(NULL, 'user2@gmail.com', 'user1234', DEFAULT),
;


INSERT INTO `users` (`Num_user`, `fullName`, `phone`, `adresse`, `city`, `zip_code`, `retrieve_password`, `Date_inscription`, `id_compte`) VALUES 
(NULL, 'Soufyane Ismail', '06-58-43-33-12', 'Hay Al Adarissa ', 'Fes', '30000', 'ofppt adarissa', current_timestamp(), '1'),
(NULL, 'Hamza Zouhir', '06-33-23-33-12', 'Hay Al Adarissa', 'Fes', '30000', 'ofppt adarissa', current_timestamp(), '1'),
(NULL, 'Gamal Ahmed', '06-12-15-33-12', 'Ain Sebaa', 'Casa', '20000', 'casa', current_timestamp(), '2'),
(NULL, 'Khalid Sameh', '06-57-09-33-28', 'centre ville', 'fes', '30050', 'fes', current_timestamp(), '3')
;



