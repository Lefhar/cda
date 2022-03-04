-- 7 - Afficher la liste des hôtels avec leur station Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, la catégorie, la ville)
SELECT hotel.hot_nom, hotel.hot_sta_id, hotel.hot_categorie, hotel.hot_ville, station.sta_nom, station.sta_id From hotel, station
-- ou
SELECT cha_numero, hot_nom, hot_categorie, hot_ville, sta_nom, sta_id From hotel, station WHERE sta_id = hot_sta_id


-- 8 - Afficher la liste des chambres et leur hôtel Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre)
SELECT chambre.cha_numero, hotel.hot_nom, hotel.hot_categorie, hotel.hot_ville From chambre, hotel


-- 9 - Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou
-- Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre
-- et sa capacité)

SELECT chambre.cha_numero, chambre.cha_capacite, hotel.hot_nom, hotel.hot_categorie, hotel.hot_ville From chambre, hotel WHERE hotel.hot_ville = "bretou" and chambre.cha_capacite >1
--ou
SELECT hot_nom, hot_categorie,hot_ville, cha_numero, cha_capacite FROM chambre JOIN hotel ON hot_id = cha_hot_id WHERE  chambre.cha_capacite >1  AND hot_ville = "bretou"

--10 - Afficher la liste des réservations avec le nom des clients Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de réservation

SELECT reservation.res_cli_id, reservation.res_date, reservation.res_cha_id, client.cli_id, client.cli_nom, chambre.cha_id, chambre.cha_hot_id, hotel.hot_id, hotel.hot_nom
from reservation, client, chambre, hotel where reservation.res_cli_id = client.cli_id
--ou
SELECT cli_nom, hot_nom, res_date from reservation JOIN client ON cli_id = res_cli_id JOIN chambre ON cha_id = res_cha_id JOIN hotel ON hot_id = cha_hot_id

--11 - Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station Le résultat doit faire apparaître le nom de la station,
--le nom de l’hôtel, le numéro de la chambre et sa capacité)
SELECT chambre.cha_numero, chambre.cha_capacite, chambre.cha_hot_id, hotel.hot_id, hotel.hot_sta_id, hotel.hot_nom, station.sta_id, station.sta_nom from chambre, hotel, station
where chambre.cha_hot_id = hotel.hot_id and hotel.hot_sta_id = station.sta_id
--ou
SELECT cha_numero, cha_capacite, hot_id, hot_sta_id, hot_nom, sta_id, sta_nom from station join hotel on hot_sta_id = sta_id JOIN chambre ON cha_hot_id = hot_id

--12 - Afficher les réservations avec le nom du client et le nom de l’hôtel Le résultat doit faire apparaître le nom du client, le nom de l’hôtel,
--la date de début du séjour et la durée du séjour SELECT DATEDIFF( date1, date2 );
SELECT  res_date_debut,DATEDIFF( res_date_fin,  res_date_debut), hot_nom, cli_nom FROM `client` join reservation on res_cli_id = cli_id  JOIN chambre ON cha_id = res_cha_id join hotel on hot_id = cha_hot_id