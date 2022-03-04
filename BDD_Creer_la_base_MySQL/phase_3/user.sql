GRANT ALL PRIVILEGES ON  papyrus.* TO 'util1'@'%' IDENTIFIED BY 'util1';
GRANT select  ON TABLE `papyrus`.* TO 'util2'@'%' IDENTIFIED BY 'util2';
GRANT SHOW VIEW ON TABLE `papyrus`.`fournis` TO 'util3'@'%' IDENTIFIED BY 'util3';