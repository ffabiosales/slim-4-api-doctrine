USE simplesvet;
CREATE TABLE patologias (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(200),
    description TEXT,
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SET character_set_client = utf8;
SET character_set_connection = utf8;
SET character_set_results = utf8;
SET collation_connection = utf8_general_ci;
INSERT INTO patologias (name, description) VALUES ("Alergia Alimentar", '<p>Etiam elit magna, venenatis nec dapibus ut, dapibus vitae est.</p>');