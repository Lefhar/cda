#bloquer l'insertion inférieur à 1000m
DELIMITER $$
CREATE TRIGGER insert_station AFTER INSERT ON station
    FOR EACH ROW
BEGIN
    DECLARE altitude INT;
    SET altitude = NEW.sta_altitude;
    IF altitude<1000 THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Un problème est survenu. Règle de gestion altitude !';
    END IF;
END $$;


#1 modif_reservation : interdire la modification des réservations (on autorise l'ajout et la suppression).
DELIMITER $$
CREATE TRIGGER modif_reservation AFTER UPDATE ON reservation
    FOR EACH ROW
BEGIN


        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Un problème est survenu. Modification de réservation interdit !';

END $$;

#2 insert_reservation : interdire l'ajout de réservation pour les hôtels possédant déjà 10 réservations.
DELIMITER $$
CREATE TRIGGER insert_reservation
    AFTER INSERT
    ON reservation
    FOR EACH ROW
BEGIN
    DECLARE nombre_reservation INT;
    DECLARE chambreid INT;
    DECLARE numhotel INT;
    SET chambreid = NEW.res_cha_id;
    SET numhotel = (SELECT cha_hot_id FROM reservation JOIN chambre ON cha_id=res_cha_id  where res_cha_id=chambreid GROUP BY cha_hot_id);
    SET nombre_reservation = (SELECT COUNT(res_cha_id) FROM reservation JOIN chambre ON cha_id=res_cha_id  where  cha_hot_id=numhotel);
    IF nombre_reservation>10 THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Rèservation non autorisée !';
    END IF;
END $$
DELIMITER ;

#3insert_reservation2 : interdire les réservations si le client possède déjà 3 réservations.
DELIMITER $$
CREATE TRIGGER insert_reservation2
    AFTER INSERT
    ON reservation
    FOR EACH ROW
BEGIN
    DECLARE nombre_cli_reservation INT;
    SET res_cli_id = NEW.clientid;
    SET nombre_cli_reservation = (SELECT COUNT(res_cli_id) FROM reservation where res_cli_id=clientid);
    IF nombre_cli_reservation>3 THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'le client à trop réservé !';
    END IF;
END $$
DELIMITER ;

#4insert_chambre : lors d'une insertion, on calcule le total des capacités des chambres pour l'hôtel, si ce total est supérieur à 50, on interdit l'insertion de la chambre.
DELIMITER $$
CREATE TRIGGER insert_chambre
    AFTER INSERT
    ON chambre
    FOR EACH ROW
BEGIN
    DECLARE nombre_chambre_max INT;
    SET nombre_chambre_max = (SELECT sum(`cha_capacite`) from chambre where cha_hot_id=NEW.cha_hot_id);
    IF nombre_chambre_max>50 THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Aucun chambre disponible!';
    END IF;
END $$
DELIMITER ;



#travail à réaliser
DELIMITER $$
CREATE TRIGGER maj_total AFTER INSERT ON lignedecommande
    FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande;
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c);
    UPDATE commande SET total=tot WHERE id=id_c;
END $$
DELIMITER ;

#1 Mettez en place ce trigger, puis ajoutez un produit dans une commande, vérifiez que le champ total est bien mis à jour.
INSERT INTO `lignedecommande` (`id_commande`, `id_produit`, `quantite`, `prix`) VALUES ('2', '3', '3', '10');


#2 Ce trigger ne fonctionne que lorsque l'on ajoute des produits dans la commande, les modifications ou suppressions ne permettent pas de
# recalculer le total. Modifiez le code ci-dessus pour faire en sorte
# que la modification ou la suppression de produit recalcul le total de la commande.
##for update
DELIMITER $$
CREATE TRIGGER maj_total_update AFTER update ON lignedecommande
    FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande;
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c);
    UPDATE commande SET total=tot WHERE id=id_c;
END $$
DELIMITER ;


##delete
DELIMITER $$
CREATE TRIGGER maj_total_delete AFTER delete ON lignedecommande
    FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = old.id_commande;
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c);
    UPDATE commande SET total=tot WHERE id=id_c;
END $$
DELIMITER ;

#3 Un champ remise était prévu dans la table commande. Prenez en compte ce champ dans le code de votre trigger.

DELIMITER $$
CREATE TRIGGER maj_total_remise
    AFTER INSERT
    ON lignedecommande
    FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande;
    SET tot = (SELECT sum(prix*quantite)-remise FROM lignedecommande JOIN commande ON commande.id=lignedecommande.id_commande WHERE id_commande=id_c);
    UPDATE commande SET total=tot WHERE id=id_c;
END $$
DELIMITER ;