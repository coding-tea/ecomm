-- #------------------------------------------------------------
-- # database: ecomme
-- #---------------------------------------------------------

CREATE DATABASE ecomm ;
use ecomm ; 

-- #------------------------------------------------------------
-- # Table: Compte
-- #------------------------------------------------------------

CREATE TABLE Compte(
        id_compte Int  Auto_increment  NOT NULL PRIMARY KEY,
        email     Varchar (50) NOT NULL UNIQUE,
        password  Varchar (50) NOT NULL,
    	role varchar(20) DEFAULT 'user'
)ENGINE=InnoDB;

-- #------------------------------------------------------------
-- # Table: Categorie
-- #------------------------------------------------------------

CREATE TABLE Categorie(
        Num_categorie         Int  Auto_increment  NOT NULL PRIMARY KEY,
        Name_categorie        Varchar (50) NOT NULL ,
        image_categorie       Varchar (200),
        Description_categorie Varchar (300)
)ENGINE=InnoDB;


-- #------------------------------------------------------------
-- # Table: Users
-- #------------------------------------------------------------

CREATE TABLE Users(
        Num_user          Int  Auto_increment  NOT NULL PRIMARY KEY,
        fullName          Varchar (50) NOT NULL ,
        phone             Varchar (50) NOT NULL ,
        adresse           Varchar (100) NOT NULL ,
        city              Varchar (20) NOT NULL ,
        zip_code          Int NOT NULL ,
        retrieve_password Varchar (20) NOT NULL ,
        id_compte         Int NOT NULL,
        FOREIGN KEY (id_compte) REFERENCES Compte(id_compte)
)ENGINE=InnoDB;


-- #------------------------------------------------------------
-- # Table: Commande
-- #------------------------------------------------------------

CREATE TABLE Commande(
        num_commande   Int  Auto_increment not null PRIMARY KEY,
        state_commande int DEFAULT 0,
        date_commande  Date NOT NULL DEFAULT now(),
        Num_user Int,
        id_compte Int DEFAULT 1,
	FOREIGN KEY (Num_user) REFERENCES Users(Num_user),
	FOREIGN KEY (id_compte) REFERENCES Compte(id_compte)
)ENGINE=InnoDB;

-- #------------------------------------------------------------
-- # Table: Produit
-- #------------------------------------------------------------

CREATE TABLE Produit(
        id_produit    Int  Auto_increment  NOT NULL PRIMARY KEY,
        Name          Varchar (30) NOT NULL ,
        description   text NOT NULL ,
        url_img    Varchar (300) NOT NULL ,
        quantite_produit int NOT NULL ,
        price         Float NOT NULL ,
        discount      Float DEFAULT 0,
        id_compte     Int DEFAULT 1,
        Num_categorie Int,
	FOREIGN KEY (id_compte) REFERENCES Compte(id_compte),
	FOREIGN KEY (Num_categorie) REFERENCES Categorie(Num_categorie)
)ENGINE=InnoDB;


-- #------------------------------------------------------------
-- # Table: Panier
-- #------------------------------------------------------------

CREATE TABLE Panier(
        id_produit Int NOT NULL ,
        Num_user   Int NOT NULL ,
        Qte        Int NOT NULL,
        FOREIGN KEY (id_produit) REFERENCES Produit(id_produit),
	FOREIGN KEY (Num_user) REFERENCES Users(Num_user),
        PRIMARY KEY (id_produit,Num_user)
)ENGINE=InnoDB;


-- #------------------------------------------------------------
-- # Table: Ligne Commande
-- #------------------------------------------------------------

CREATE TABLE LigneCommande(
        id_produit int,
        num_commande   Int,
        Num_user       Int,
        qte_commande int,
		FOREIGN KEY (num_commande) REFERENCES Commande(num_commande),
        FOREIGN KEY (id_produit) REFERENCES Produit(id_produit),
		FOREIGN KEY (Num_user) REFERENCES Users(Num_user),
        PRIMARY KEY (id_produit, Num_user, num_commande)
)ENGINE=InnoDB;
