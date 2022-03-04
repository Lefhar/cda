CREATE TABLE Personne
(
    per_num     INT AUTO_INCREMENT,
    per_nom     VARCHAR(50),
    per_prenom  VARCHAR(50),
    per_adresse VARCHAR(50),
    per_ville   VARCHAR(50),
    PRIMARY KEY (per_num)
);

CREATE TABLE Groupe
(
    Gro_num     INT AUTO_INCREMENT,
    gro_libelle VARCHAR(50),
    PRIMARY KEY (Gro_num)
);

CREATE TABLE Appartient
(
    per_num INT,
    Gro_num INT,
    PRIMARY KEY (per_num, Gro_num),
    FOREIGN KEY (per_num) REFERENCES Personne (per_num),
    FOREIGN KEY (Gro_num) REFERENCES Groupe (Gro_num)
);
