CREATE TABLE chat (

    id INT ,
    id_user INT ,
    msg VARCHAR(200) NOT NULL,
    date_msg DATETIME DEFAULT NOW(),
    
    CONSTRAINT pk_id_chat PRIMARY KEY (id , id_user),
    CONSTRAINT fk_id_user FOREIGN KEY(id_user) REFERENCES user(id)
)

