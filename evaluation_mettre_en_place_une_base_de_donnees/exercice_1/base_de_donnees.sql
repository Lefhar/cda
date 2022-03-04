CREATE TABLE Client
(
    Cli_num     INT AUTO_INCREMENT,
    Cli_nom     VARCHAR(50),
    cli_adresse VARCHAR(50),
    Cli_tel     VARCHAR(30),
    PRIMARY KEY (`Cli_num`)
);

CREATE TABLE Commande
(
    Com_num  INT AUTO_INCREMENT,
    Com_date DATETIME,
    Com_obs  VARCHAR(50),
    Cli_num  INT NOT NULL,
    PRIMARY KEY (`Com_num`),
    UNIQUE (`Cli_num`),
    CONSTRAINT `comm_ibfk_1` FOREIGN KEY (`Cli_num`) REFERENCES Client (`Cli_num`)
);

CREATE TABLE Produit
(
    Pro_num         INT AUTO_INCREMENT,
    Pro_libelle     VARCHAR(50),
    Pro_description VARCHAR(50),
    PRIMARY KEY (`Pro_num`)
);

CREATE TABLE est_compose
(
    Com_num INT,
    Pro_num INT,
    est_qte INT,
    PRIMARY KEY (`Com_num`, `Pro_num`),
    CONSTRAINT `est_compose_ibfk_1`FOREIGN KEY (`Com_num`) REFERENCES `Commande`(`Com_num`),
    CONSTRAINT `est_compose_ibfk_2`FOREIGN KEY (`Pro_num`) REFERENCES `Produit`(`Pro_num`)
);
ALTER TABLE Client ADD INDEX `index_cli_nom` (`Cli_nom`);