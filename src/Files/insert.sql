
INSERT INTO badge (badge) VALUES ('001');
INSERT INTO qualif (qualif) VALUES ('Q');

INSERT INTO membres (nom,prenom,adresse,codepostal,ville,tel,fax,email,numbadge,numqualif,profession,lieunaissance,cartefederal,datenaissance,dateattestation,datetheoriquebb,datetheoriqueppla,datebb,dateppla,numerobb,numeroppla,dateinscription, password) VALUES  ('Jean','pierre','349 rue du faubourg de hem', '56500','Paris','06315468','555','email@gmail.com',1,1,'profession', 'hopital', 'catefed',CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE  , '01015949566' , 'TT01451654564',CURRENT_DATE,  '$2y$10$j/ZoW8oFpCDWxVSyMmhud.GWBzKo8v/pz2YBkFtAc0070O47wo5wm');

INSERT INTO avions (types, tauxdouble, forfait1, forfait2, forfait3, reductionsemaine, immatriculation, image, name, description) VALUES ('test', 5, 5, 5, 5, 5, 'aaaa', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit ');
INSERT INTO avions (types, tauxdouble, forfait1, forfait2, forfait3, reductionsemaine, immatriculation, image, name, description) VALUES ('test', 5, 5, 5, 5, 5, 'aaaa', 'paintPlane.png' , 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit ');


INSERT INTO comptesAc(numMembre, numSeq, description, date, debit, credit) VALUES (1, null, 'Init acc 2', CURRENT_DATE, 0, 522);
INSERT INTO comptesAc(numMembre, numSeq, description, date, debit, credit) VALUES (1, null, 'Remboursement 1', CURRENT_DATE, 5000, 0);
INSERT INTO comptesAc(numMembre, numSeq, description, date, debit, credit) VALUES (1, null, 'Remboursement 2 ', CURRENT_DATE, 5000, 0);
