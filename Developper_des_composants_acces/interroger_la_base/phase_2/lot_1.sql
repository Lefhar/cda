-- 1 afficher la liste des hôtels
SELECT hot_nom, hot_ville FROM hotel


-- 2 - Afficher la ville de résidence de Mr White
SELECT cli_ville FROM client where cli_nom like 'white'


-- 3 - Afficher la liste des stations dont l’altitude < 1000 Le résultat doit faire apparaître le nom de la station et l'altitude
SELECT sta_altitude, sta_nom from station where sta_altitude <1000


-- 4 - Afficher la liste des chambres ayant une capacité > 1 Le résultat doit faire apparaître le numéro de la chambre ainsi que la capacité
SELECT cha_capacite, cha_numero FROM chambre where cha_capacite > 1


-- 5 - Afficher les clients n’habitant pas à Londre Le résultat doit faire apparaître le nom du client et la ville
SELECT cli_nom,cli_ville from client where cli_ville != 'londre'


-- 6 - Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie>3 Le résultat doit faire apparaître le nom de l'hôtel, ville et la catégorie
SELECT hot_nom, hot_ville, hot_categorie from hotel  where  hot_ville ='Bretou' and hot_categorie > 3