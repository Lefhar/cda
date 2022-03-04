# SELECT
#     suppliers.Country
# FROM
#     `order detailsModel`
#         JOIN orders ON orders.`OrderID` = `order detailsModel`.OrderID
#         JOIN customers ON customers.CustomerID = orders.CustomerID
#         JOIN products ON products.ProductID = `order detailsModel`.ProductID
#         JOIN suppliers ON suppliers.SupplierID = products.SupplierID where suppliers.Country = "uk"


DELIMITER $$
CREATE TRIGGER after_insert_order_detail
    AFTER insert
    ON `order details`
    FOR EACH ROW
BEGIN
    DECLARE payscompare INT;
    SET payscompare = (SELECT suppliers.SupplierID
                       FROM `order details`
                                JOIN orders ON orders.`OrderID` = `order details`.OrderID
                                JOIN customers ON customers.CustomerID = orders.CustomerID
                                JOIN products ON products.ProductID = `order details`.ProductID
                                JOIN suppliers ON suppliers.SupplierID = products.SupplierID
                       where suppliers.Country = customers.Country
                         and `order details`.ProductID = NEW.ProductID and `order details`.OrderID = NEW.OrderID);
    IF payscompare is null THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'pays vendeur et client correspondre pas!';
    END IF;
END $$
DELIMITER ;