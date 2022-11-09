CREATE TABLE `avions` (
    `numAvions` smallint(10) PRIMARY KEY,
    `type` char(8),
    `tauxDouble` double,
    `forfait1` double,
    `forfait2` double,
    `forfait3` double,
    `reductionSemaine` double,
    `immatriculation` varchar(20)
) ENGINE=innodb;

CREATE TABLE `instructeurs` (
    `numInstructeur` smallint(10) PRIMARY KEY,
    `nom` varchar(20), 
    `prenom` varchar(20), 
    `numCivil` varchar(15), 
    `tauxInstructeur` double, 
    `adresse` varchar(200), 
    `codePostal` char(6), 
    `ville` varchar(30), 
    `tel` varchar(20), 
    `fax` varchar(20), 
    `email` varchar(20), 
    `numBadge` smallint(16)
) ENGINE=innodb;

CREATE TABLE `membres` (
    `numMembres` smallint(10) PRIMARY KEY,
    `nom` varchar(20), 
    `prenom` varchar(20), 
    `numCivil` varchar(15), 
    `adresse` varchar(200), 
    `codePostal` char(6), 
    `ville` varchar(30), 
    `tel` varchar(20), 
    `fax` varchar(20), 
    `email` varchar(20), 
    `numBadge` smallint(16), 
    `numQualif` char(5), 
    `profession` varchar(20), 
    `lieuNaissance` varchar(20), 
    `carteFederal` varchar(20), 
    `dateNaissance` DATE, 
    `dateAttestation` DATE, 
    `dateTheoriqueBB` DATE, 
    `dateTheoriquePPLA` DATE, 
    `dateBB` DATE, 
    `datePPLA` DATE, 
    `numeroBB` DATE, 
    `numeroPPLA` DATE, 
    `dateInscription` DATE
) ENGINE=innodb;


CREATE TABLE `comptesAc` (
    `numCompte` int(20) PRIMARY KEY,
    `numMembre` smallint(10),
    `numSeq` int(20),
    `date` DATE,
    `debit` double,
    `credit` double
) ENGINE=innodb;

CREATE TABLE `sequence` (
    `numSequence` int(20) PRIMARY KEY,
    `numMembres` smallint(10),
    `numInstructeur` smallint(10),
    `numAvions` smallint(10),
    `date` DATE,
    `temps` int(10),
    `prixSpecial` double,
    `taux`double,
    `reductionSemaine` double,
    `numMotif` smallint(10),
    `tauxInstructeur` double,
    `forfaitInitiation` smallint(1)
) ENGINE=innodb;


CREATE TABLE `motifs` (
    `numMotif` smallint(10) PRIMARY KEY,
    `motif` varchar(80)
) ENGINE=innodb;

CREATE TABLE `qualif` (
    `numQualif` char(5) PRIMARY KEY,
    `qualif` char(5)
) ENGINE=innodb;

CREATE TABLE `badge` (
    `numBadge` smallint(16) PRIMARY KEY,
    `badge` varchar(80)
) ENGINE=innodb;

ALTER TABLE `sequence`
ADD CONSTRAINT FK_sequence_membres
FOREIGN KEY (numMembres) REFERENCES membres(numMembres);

ALTER TABLE `sequence`
ADD CONSTRAINT FK_sequence_instructeurs
FOREIGN KEY (numInstructeur) REFERENCES instructeurs(numInstructeur);

ALTER TABLE `sequence`
ADD CONSTRAINT FK_sequence_avions
FOREIGN KEY (numAvions) REFERENCES avions(numAvions);

ALTER TABLE instructeurs
ADD CONSTRAINT FK_instructeurs_badge
FOREIGN KEY (numBadge) REFERENCES badge(numBadge); 

ALTER TABLE membres
ADD CONSTRAINT FK_membres_badge
FOREIGN KEY (numBadge) REFERENCES badge(numBadge); 

ALTER TABLE membres
ADD CONSTRAINT FK_membres_qualif
FOREIGN KEY (numQualif) REFERENCES qualif(numQualif); 