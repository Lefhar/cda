DROP DATABASE IF EXISTS hotel;

CREATE DATABASE hotel;
USE hotel;

CREATE TABLE station
(
    sta_id       INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sta_nom      VARCHAR(50) NOT NULL,
    sta_altitude INT
);

CREATE TABLE hotel
(
    hot_id        INT AUTO_INCREMENT NOT NULL,
    hot_sta_id    INT                NOT NULL,
    hot_nom       VARCHAR(50)        NOT NULL,
    hot_categorie INT                NOT NULL,
    hot_adresse   VARCHAR(50)        NOT NULL,
    hot_ville     VARCHAR(50)        NOT NULL,
    FOREIGN KEY (hot_sta_id) REFERENCES station (sta_id),
    PRIMARY KEY (hot_id)
);

CREATE TABLE chambre
(
    cha_id       INT NOT NULL AUTO_INCREMENT,
    cha_hot_id   INT NOT NULL,
    cha_numero   INT NOT NULL,
    cha_capacite INT NOT NULL,
    cha_type     INT NOT NULL,
    FOREIGN KEY (cha_hot_id) REFERENCES hotel (hot_id),
    PRIMARY KEY (cha_id)
);

CREATE TABLE client
(
    cli_id      INT NOT NULL AUTO_INCREMENT,
    cli_nom     VARCHAR(50),
    cli_prenom  VARCHAR(50),
    cli_adresse VARCHAR(50),
    cli_ville   VARCHAR(50),
    PRIMARY KEY (cli_id)
);

CREATE TABLE reservation
(
    res_id         INT           NOT NULL AUTO_INCREMENT,
    res_cha_id     INT           NOT NULL,
    res_cli_id     INT           NOT NULL,
    res_date       DATETIME      NOT NULL,
    res_date_debut DATETIME      NOT NULL,
    res_date_fin   DATETIME      NOT NULL,
    res_prix       DECIMAL(6, 2) NOT NULL,
    res_arrhes     DECIMAL(6, 2),
    FOREIGN KEY (res_cha_id) REFERENCES chambre (cha_id),
    FOREIGN KEY (res_cli_id) REFERENCES client (cli_id),
    PRIMARY KEY (res_id)
);