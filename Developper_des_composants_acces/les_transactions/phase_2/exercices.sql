#exercice_1
START TRANSACTION;

SELECT nomfou FROM fournis WHERE numfou=120;

UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120 ;

SELECT nomfou FROM fournis WHERE numfou=120 ;
commit;
#que concluez-vous ?
#la transaction gére une à une les requêtes

#la transaction est-elle terminée?
# ben telle quelle sans le commit non car cela sert à demandé l'envoi

#comment rendre la modification permanente ?
# avec l'inscruction commit;

#comment annuler la transaction ?
# par l'instruction rollback;


#exercice 2 : les vérrouillages

