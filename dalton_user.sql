CREATE TABLE user (
    id INT AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL ,
    prenom VARCHAR(30) NOT NULL ,
    email VARCHAR(30) NOT NULL ,
    pwd VARCHAR(30) NOT NULL ,
    date_naissance DATETIME NOT NULL ,
    date_incription DATETIME DEFAULT NOW() ,
    CONSTRAINT pk_id PRIMARY KEY (id)
)

