CREATE TABLE user (
    id INT ,
    nom VARCHAR(30) NOT NULL ,
    prenom VARCHAR(30) NOT NULL ,
    email VARCHAR(30) NOT NULL ,
    pwd VARCHAR(30) NOT NULL ,
    date_naissance DATETIME NOT NULL ,
    date_inscription DATETIME DEFAULT NOW(),
    adr_ip VARCHAR(46) NOT NULL ,
    est_connect BOOLEAN NOT NULL ,
    CONSTRAINT pk_id PRIMARY KEY (id)
)

