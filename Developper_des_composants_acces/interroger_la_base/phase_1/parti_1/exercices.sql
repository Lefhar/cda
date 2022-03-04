#1 afficher toutes les informations concernant les employés.
select * from employe;

#2 afficher toutes les informations concernant les départements.
select * from dept;

#3 Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés.
select nom, dateemb, nosup, nodep, salaire from employe;

#4 Afficher le titre de tous les employés.
select titre from employe;

#5 Afficher les différentes valeurs des titres des employés
select distinct titre from employe;

#6. Afficher le nom, le numéro d'employé et le numéro du  département des employés dont le titre est « Secrétaire ».
select nom, noemp, nodep from employe where titre="Secrétaire";

#7. Afficher le nom et le numéro de département dont le numéro de département est supérieur à 40.
select nom, nodep from employe where nodep>40;

#8. Afficher le nom et le prénom des employés dont le nom est alphabétiquement antérieur au prénom.
select nom, prenom from employe order by nom, prenom asc

#9. Afficher le nom, le salaire et le numéro du département des employés dont le titre est « Représentant »,
# le numéro de département est 35 et le salaire est supérieur à 20000.
select nom, salaire, nodep from employe where nodep =35 and salaire >20000;

# 10.Afficher le nom, le titre et le salaire des employés dont le titre est
# « Représentant » ou dont le titre est « Président ».
select nom, titre, salaire  from employe where titre="Représentant" or  titre="Président";

#11.Afficher le nom, le titre, le numéro de département, le salaire des employés du département 34,
# dont le titre est « Représentant » ou « Secrétaire ».
select nom, titre, nodep, salaire  from employe where nodep =34 and  (titre="Représentant" or titre="Secrétaire");

#12.Afficher le nom, le titre, le numéro de département, le salaire des employés dont le titre est Représentant,
# ou dont le titre est Secrétaire dans le département numéro 34.
select nom, titre, nodep, salaire  from employe where nodep =34 and  (titre="Représentant" or titre="Secrétaire");

#13.Afficher le nom, et le salaire des employés dont le salaire est compris entre 20000 et 30000.
select nom, salaire from employe where  salaire >=20000 and salaire <=30000 ;

#15.Afficher le nom des employés commençant par la lettre « H ».
select nom from employe where  nom like 'H%' ;


#16.Afficher le nom des employés se terminant par la lettre « n ».
select nom from employe where  nom like '%n' ;

#17.Afficher le nom des employés contenant la lettre « u » en 3ème position.
select nom from employe where  nom like '__u%' ;


#18.Afficher le salaire et le nom des employés du service 41 classés par salaire croissant.
select salaire, nom from employe where nodep= 41 order by salaire asc

#19.Afficher le salaire et le nom des employés du service 41 classés par salaire décroissant.
select salaire, nom from employe where nodep= 41 order by salaire desc;

#20.Afficher le titre, le salaire et le nom des employés classés par titre croissant et par salaire décroissant.
select titre, salaire nom from employe where nodep= 41 group by titre asc ,salaire desc;

#26.Afficher le nom, le salaire, le taux de commission et la commission des employés dont le taux de commission
# n'est pas nul. (la commission est calculée en multipliant le salaire par le taux de commission)
select nom, salaire,tauxcom, (salaire*tauxcom) as commission from employe where tauxcom is not null;

#27. Afficher le nom, le salaire, le taux de commission, la commission des
#employés dont le taux de commission n'est pas nul, classé par taux de commission croissant.
select nom, salaire,tauxcom, (salaire*tauxcom) as commission from employe where tauxcom is not null order by tauxcom asc;

#28. Afficher le nom et le prénom (concaténés) des employés. Renommer les colonnes
select concat(nom,prenom) as `nom et prenom` from employe;

#29. Afficher les 5 premières lettres du nom des employés.
select substring(nom,1,5) from employe;

#30. Afficher le nom et le rang de la lettre « r » dans le nom des employés.
select nom, instr(nom,"r")  as `rang` from employe where nom like '%r%';
#31. Afficher le nom, le nom en majuscule et le nom en minuscule de l'employé dont le nom est Vrante.
select concat( UCASE(nom)," ", LCASE(nom))  as `nom et rang` from employe where nom ="Vrante";
#32. Afficher le nom et le nombre de caractères du nom des employés. CHAR_LENGTH('test string');
select concat( nom," ", CHAR_LENGTH(nom))  as `nom et nombre de caractére` from employe;