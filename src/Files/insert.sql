
INSERT INTO badge (badge) VALUES ('001');
INSERT INTO qualif (qualif) VALUES ('Q');

INSERT INTO membres (nom,prenom,adresse,codepostal,ville,tel,fax,email,numbadge,numqualif,profession,lieunaissance,cartefederal,datenaissance,dateattestation,datetheoriquebb,datetheoriqueppla,datebb,dateppla,numerobb,numeroppla,dateinscription, password) VALUES  ('Jean','pierre','349 rue du faubourg de hem', '56500','Paris','06315468','555','email@gmail.com',1,1,'profession', 'hopital', 'catefed',CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE  , '01015949566' , 'TT01451654564',CURRENT_DATE,  '$2y$10$j/ZoW8oFpCDWxVSyMmhud.GWBzKo8v/pz2YBkFtAc0070O47wo5wm');
INSERT INTO membres (nom,prenom,adresse,codepostal,ville,tel,fax,email,numbadge,numqualif,profession,lieunaissance,cartefederal,datenaissance,dateattestation,datetheoriquebb,datetheoriqueppla,datebb,dateppla,numerobb,numeroppla,dateinscription, password) VALUES  ('Jean','pierre','349 rue du faubourg de hem', '56500','Paris','06315468','555','a',1,1,'profession', 'hopital', 'catefed',CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE, CURRENT_DATE  , '01015949566' , 'TT01451654564',CURRENT_DATE,  '$2y$10$rJpDUKJ01o/EVdvJJyMQx.bpDU1Diu1BB3quWWqRFxnisrLGGGpJW');



INSERT INTO comptesAc(numMembre, numSeq, description, date, debit, credit) VALUES (1, null, 'Init acc 2', CURRENT_DATE, 0, 522);
INSERT INTO comptesAc(numMembre, numSeq, description, date, debit, credit) VALUES (1, null, 'Remboursement 1', CURRENT_DATE, 5000, 0);
INSERT INTO comptesAc(numMembre, numSeq, description, date, debit, credit) VALUES (1, null, 'Remboursement 2 ', CURRENT_DATE, 5000, 0);

INSERT INTO avions (numAvions, type_avion, taux, forfait1, forfait2, forfait3, heures_forfait1, heures_forfait2, heures_forfait3, reduction_semaine, immatriculation, image, name, description)
VALUES
    (1, 'PA28', 127.00, 1161.00, 0.00, 1387.00, 10, 0, 10, 4.00, 'PA28 F-GDJF', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (2, 'PA28', 127.00, 1161.00, 0.00, 1387.00, 10, 0, 10, 4.00, 'PA28 F-GIED', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (3, 'D112', 70.00, 655.00, 0.00, 895.00, 10, 0, 10, 0.00, 'D112 F-PNUI', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (4, 'D112', 70.00, 655.00, 0.00, 895.00, 10, 0, 10, 0.00, 'D112 F-PNUI', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (5, 'HR200', 90.00, 850.00, 0.00, 1109.00, 10, 0, 10, 0.00, 'HR200 F-BVYS', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (6, 'C150', 90.00, 270.00, 0.00, 0.00, 3, 0, 0, 0.00, 'C150 N-704YA', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (7, 'ATL', 85.00, 810.00, 0.00, 1048.00, 10, 0, 10, 0.00, 'ATL F-GFSE', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (9, 'PA28', 127.00, 1161.00, 0.00, 1387.00, 10, 0, 10, 4.00, 'TB9 F-GLAQ', 'paintimage2.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (10, 'PA28', 135.00, 0.00, 0.00, 0.00, 0, 0, 0, 0.00, 'CAP10', 'paintPlane.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (11, 'TB10', 132.00, 0.00, 0.00, 0.00, 0, 0, 0, 4.00, 'TB10 F-GEVB', 'paintPlane.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit '),
    (12, 'PA28', 0.00, 0.00, 0.00, 0.00, 10, 0, 10, 4.00, 'TB9 F-GDBZ', 'paintPlane.png', 'Mon super Avions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut lectus arcu bibendum at varius vel pharetra. Magna eget est lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat interdum varius sit ');


INSERT INTO instructeurs(numInstructeur, nom, prenom, numCivil, tauxInstructeur, adresse, codePostal, ville, tel, fax, email, numBadge) 
VALUES 
(1, NULL, NULL, 1, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'HALLU', 'Pierre', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'LECOUTRE', 'Jean-François', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'BONNAILLIE', 'Patrick', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'CROUZERY', 'Didier', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'MARCHAND', 'Jacques', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'PERIGNON', 'Serge', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ZA', NULL, 1, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'FOULON', 'Samuel', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'OBERT', 'Francois Xavier', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'LEGRAND', 'Aymeric', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'ZB', NULL, 1, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'THOMAS', 'Christophe', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'FREMAUX', 'Olivier', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'MAGNIN', 'LOUIS CHARLES', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'FOLLIOT', 'Eric', 1, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL);