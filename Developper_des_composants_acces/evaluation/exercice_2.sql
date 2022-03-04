#9 – Depuis quelle date le client « Du monde entier » n’a plus commandé ?
DELIMITER
    $$
CREATE PROCEDURE last_commande(IN Compname varchar(50))
BEGIN
    SELECT OrderDate AS 'Date de dernière commande'
    FROM `order details`
             JOIN orders ON orders.OrderID = `order details`.OrderID
             JOIN customers ON customers.CustomerID = orders.CustomerID AND CompanyName = Compname
    ORDER BY OrderDate DESC
    LIMIT 1;
END $$
DELIMITER
    ;

# 10 – Quel est le délai moyen de livraison en jours ?
DELIMITER
$$
CREATE PROCEDURE delai_moyen()
BEGIN
    select round(AVG(DATEDIFF(ShippedDate, OrderDate))) AS 'Délai moyen de livraison en jours'
    from orders;
END $$
DELIMITER
    ;