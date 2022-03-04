#exercice 1 création d'une procédure stockée sans paramètre
#Créez la procédure stockée Lst_fournis correspondant à la requête n°2 afficher le code des fournisseurs pour lesquels une commande a été passée.
#Exécutez la pour vérifier qu’elle fonctionne conformément à votre attente.
#Exécutez la commande SQL suivante pour obtenir des informations sur cette procédure stockée :

DELIMITER  $$
CREATE PROCEDURE List_fournis()
begin
    SELECT fournis.numfou AS Numero_fournisseur, produit.libart AS produit_vendu
    FROM ligcom
             JOIN entcom ON entcom.numcom = ligcom.numcom
             JOIN fournis ON fournis.numfou = entcom.numfou
             JOIN produit ON produit.codart = ligcom.codart;
end $$
DELIMITER ;

#Exercice 2 : création d'une procédure stockée avec un paramètre en entrée
#Créer la procédure stockée Lst_Commandes, qui liste les commandes ayant un libellé particulier dans le champ obscom (cette requête sera construite à partir de la requête n°11).
DELIMITER  $$
CREATE PROCEDURE Lst_Commandes(In coms varchar(50))
begin
    SELECT entcom.numcom        AS 'numéro de commande',
           fournis.nomfou       AS 'nom du fournisseur',
           produit.libart       AS 'libellé du produit',
           SUM(qtecde * priuni) as 'Sous total'
    FROM ligcom
             JOIN produit ON produit.codart = ligcom.codart
             JOIN entcom ON entcom.numcom = ligcom.numcom
             JOIN fournis ON fournis.numfou = entcom.numfou
    WHERE obscom LIKE coms
    GROUP BY entcom.numcom, nomfou, libart;
end $$
DELIMITER ;


#Exercice 3 : création d'une procédure stockée avec plusieurs paramètres
#Créer la procédure stockée CA_ Fournisseur, qui pour un code fournisseur et une année entrée en paramètre, calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée (cette requête sera construite à partir de la requête n°19).

#On exécutera la requête que si le code fournisseur est valide, c'est-à-dire dans la table FOURNIS.

DELIMITER  $$
CREATE PROCEDURE CA_fournisseur(In Codefournis int(10),Year int(4))
begin
    SELECT SUM(
                   ligcom.priuni * ligcom.qtecde * 1.2) as `chiffre d'affaire`
    from entcom
             JOIN ligcom ON ligcom.numcom = entcom.numcom
    WHERE YEAR(ligcom.derliv) = Year and entcom.numfou = Codefournis
    GROUP BY entcom.numfou;
end $$
DELIMITER ;

#Testez cette procédure avec différentes valeurs des paramètres.
call CA_fournisseur(120,2007);