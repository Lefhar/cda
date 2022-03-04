#1 Afficher la liste des hôtels avec leur station.
CREATE VIEW v_hotel_station
AS
SELECT hot_nom as `Nom hôtel`, sta_nom as `Nom station` FROM hotel JOIN station ON sta_id=hot_sta_id;


#2 Afficher la liste des chambres et leur hôtel
CREATE VIEW v_chambre_hotel
AS
SELECT cha_numero as `Numéro de chambre`, hot_nom as `Nom hôtel` FROM chambre JOIN hotel ON hot_id = cha_hot_id
SELECT * FROM v_chambre_hotel;



# création de la vu v_client_reservation pour associer la date de reservation et le nom du client
#3 Afficher la liste des réservations avec le nom des clients
CREATE VIEW v_client_reservation
AS
SELECT res_date as `Date réservation`, cli_nom as `Nom client `FROM `reservation` JOIN client ON cli_id = res_id
SELECT * FROM v_client_reservation;

#création de la vu v_chambre_hotel pour associer le nom de l'hôtel et le nom de la station
#4 Afficher la liste des chambres avec le nom de l'hôtel et le nom de la station
CREATE VIEW v_chambre_hotel_station
AS
SELECT cha_numero AS `Numéro de chambre`, hot_nom AS `Nom hôtel`, sta_nom AS `Nom station` FROM `chambre` JOIN hotel ON hot_id = cha_hot_id JOIN station ON sta_id = hot_sta_id
SELECT * FROM v_chambre_hotel_station;


#création de la vu v_chambre_hotel pour associer les réservations avec le nom du client et le nom de l'hôtel
#5 Afficher les réservations avec le nom du client et le nom de l'hôtel
CREATE VIEW v_reservation_client_hotel
AS
SELECT
    res_date AS `Date réservation`,
    cli_nom AS `Nom client`,
    hot_nom AS `Nom hôtel`
FROM
    reservation

        JOIN CLIENT ON cli_id = res_id
        JOIN chambre ON cha_id = res_cha_id
        JOIN hotel ON hot_id = cha_hot_id
SELECT * FROM v_reservation_client_hotel;