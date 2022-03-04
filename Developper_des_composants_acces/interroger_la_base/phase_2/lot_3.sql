--13 - Compter le nombre d’hôtel par station
select count(hot_sta_id) from hotel, station where hot_sta_id =sta_id group by hot_sta_id


--14 - Compter le nombre de chambre par station
select count(cha_id) from chambre, hotel, station where cha_hot_id=hot_id and hot_sta_id =sta_id group by sta_id


--15 - Compter le nombre de chambre par station ayant une capacité > 1
select count(cha_id) from chambre, hotel, station where cha_capacite >1 and cha_hot_id=hot_id and hot_sta_id =sta_id group by sta_id


--16 - Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation
SELECT cli_id, cli_nom, res_cli_id, res_cha_id, cha_hot_id, hot_nom, hot_id FROM  `client` JOIN reservation ON res_cli_id = cli_id JOIN chambre ON cha_id = res_cha_id JOIN hotel ON hot_id = cha_hot_id WHERE cli_nom = "squire"


--17 - Afficher la durée moyenne des réservations par station
SELECT AVG(DATEDIFF( res_date_fin,  res_date_debut)) FROM `client` join reservation on res_cli_id = cli_id  JOIN chambre ON cha_id = res_cha_id join hotel on hot_id = cha_hot_id JOIN station ON hot_sta_id = sta_id