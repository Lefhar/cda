# 1. Calculer le nombre d'employés de chaque titre.
SELECT titre, COUNT(*) FROM employe GROUP BY titre;

#2. Calculer la moyenne des salaires et leur somme, par région.
SELECT AVG(salaire) as `Moyenne des salaires`, sum(salaire) as somme, dept.nom as `nom région` FROM employe JOIN dept on employe.nodep = employe.nodep GROUP by dept.nom;

#3. Afficher les numéros des départements ayant au moins 3 employés.
SELECT nodep, COUNT(*) as COUNT FROM employe GROUP by nodep HAVING COUNT(*)>=3;

#4. Afficher les lettres qui sont l'initiale d'au moins trois employés.
SELECT substring(nom,1,1) as nbremp FROM `employe` group by nbremp having count(nbremp)>=3;

#5. Rechercher le salaire maximum et le salaire minimum parmi tous les salariés et l'écart entre les deux.
SELECT max(salaire) as maxsal, min(salaire) as minsal, (max(salaire) - min(salaire))as ecart FROM employe;

#6. Rechercher le nombre de titres différents.
SELECT COUNT(DISTINCT titre)  FROM employe;

#7. Pour chaque titre, compter le nombre d'employés possédant ce titre.
SELECT titre, COUNT(titre) FROM employe GROUP by titre;

#8. Pour chaque nom de département, afficher le nom du département et le nombre d'employés.
SELECT dept.nom, COUNT(noemp) FROM dept JOIN employe ON dept.nodept = employe.nodep GROUP by dept.nom;

#9. Rechercher les titres et la moyenne des salaires par titre dont la moyenne est supérieure à la moyenne des salaires des Représentants.
SELECT titre, avg(salaire) FROM `employe` WHERE salaire >(select avg(salaire) from employe where titre ="représentant") GROUP by titre;

#10.Rechercher le nombre de salaires renseignés et le nombre de taux de commission renseignés.
select COUNT('salaire') as salaire , COUNT(tauxcom) as `taux de commission` FROM employe where salaire is not null and tauxcom is NOT null