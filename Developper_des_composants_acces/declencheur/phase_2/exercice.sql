#Create table ARTICLES_A_COMMANDER
DROP DATABASE IF EXISTS `ARTICLES_A_COMMANDER`;
CREATE TABLE `ARTICLES_A_COMMANDER`
(
    `CODART` char(4) NOT NULL,
    `DATE`   date    NOT NULL DEFAULT current_timestamp(),
    `QTE`    int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

#Mysql : les déclencheurs, Papyrus

DELIMITER $$

CREATE TRIGGER after_products_update
    AFTER UPDATE
    ON produit
    FOR EACH ROW
BEGIN
    declare qte_commande int;
    set qte_commande = (select ARTICLES_A_COMMANDER.QTE from ARTICLES_A_COMMANDER where ARTICLES_A_COMMANDER.CODART=NEW.CODART);
    if  qte_commande is null then
        set qte_commande = 0;
    end if;
    IF NEW.stkale > NEW.stkphy THEN

        INSERT INTO ARTICLES_A_COMMANDER (QTE, CODART) VALUES ((NEW.stkale - NEW.stkphy - qte_commande), NEW.CODART);
    END IF;
END $$

DELIMITER ;