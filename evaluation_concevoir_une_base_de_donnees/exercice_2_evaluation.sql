-- Clef primaire IdClient pour avoir un identifiant unique en auto incrémente donc +1 chaque ligne
CREATE TABLE Client
(
    IdClient     INT auto_increment,
    NomClient    VARCHAR(50),
    PrenomClient VARCHAR(50),
    PRIMARY KEY (IdClient)
);

-- IdClient est la cleft étrangére de client afin de relier la commande au client ensuite ya Numcommande pour un numéro unique de commande
CREATE TABLE Commande
(
    NumCommande     INT auto_increment,
    DateCommande    DATE,
    MontantCommande DECIMAL(15, 2),
    IdClient        INT NOT NULL,
    PRIMARY KEY (NumCommande),
    FOREIGN KEY (IdClient) REFERENCES Client (IdClient)
);

--Clef primaire NumArticle qui est en auto Incrémente afin de pouvoir avoir un id unique
CREATE TABLE Article
(
    NumArticle         INT auto_increment,
    DesignationArticle VARCHAR(50),
    PuArticle          DECIMAL(15, 2),
    PRIMARY KEY (NumArticle)
);

-- Clef primaire NumCommande on importe la clef de l'article NumArticle
-- afin de relier les deux la table article est inséré avant car
-- aprés on relie par la clef étrangére de SeComposeDe avec la table Article
CREATE TABLE SeComposeDe
(
    NumCommande INT auto_increment,
    NumArticle  INT,
    Qte         INT,
    TauxTva     DECIMAL(4, 2),
    PRIMARY KEY (NumCommande, NumArticle),
    FOREIGN KEY (NumCommande) REFERENCES Commande (NumCommande),
    FOREIGN KEY (NumArticle) REFERENCES Article (NumArticle)
);
