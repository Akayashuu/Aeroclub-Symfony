
INSERT INTO badge (badge) VALUES ('001');
INSERT INTO qualif (qualif) VALUES ('Q');

INSERT INTO membres (nom,prenom,numcivil,adresse,codepostal,ville,tel,fax,email,numbadge,numqualif,profession,lieunaissance,cartefederal,datenaissance,dateattestation,datetheoriquebb,datetheoriqueppla,datebb,dateppla,numerobb,numeroppla,dateinscription, password) VALUES  ('Jean','pierre','9999','adresse', '56500','ville','06315468','555','email@gmail.com',1,1,'profession', 'hopital', 'catefed',CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE , CURRENT_DATE , CURRENT_DATE , CURRENT_DATE, 'mypassword');

INSERT INTO avions (types, tauxdouble, forfait1, forfait2, forfait3, reductionsemaine, immatriculation, image) VALUES ('test', 5, 5, 5, 5, 5, 'aaaa', 'paintimage2.png');