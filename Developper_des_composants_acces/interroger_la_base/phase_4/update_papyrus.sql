#1 Application d'une augmentation de tarif de 4% pour le prix1, 2% pour le prix2 pour le fournisseur 9180
UPDATE `vente` SET `prix1`= prix1 + 0.4 and prix2=prix2 + 0.12 where numfou =9180

#2. Dans la table vente, mettre à jour le prix2 des articles dont le prix2 est null, en affectant a valeur de prix.
update vente set prix2 = prix1 where prix2 is null
#3. Mettre à jour le champ obscom en positionnant '*****' pour toutes les commandes dont le fournisseur a un indice de satisfaction <5
UPDATE fournis f INNER JOIN entcom e ON f.numfou = e.numfou SET e.obscom = '*****' WHERE f.satisf < 5;
#4. Suppression du produit I110
DELETE FROM vente WHERE codart = 'I110';
DELETE FROM produit  WHERE codart = 'I110';
#5. Suppression des entête de commande qui n'ont aucune ligne
DELETE e FROM entcom e LEFT JOIN ligcom l on e.numcom= l.numcom WHERE l.numcom IS NULL;