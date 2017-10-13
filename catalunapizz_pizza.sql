CREATE TABLE catalunapizz.pizza
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(255),
    ingredients text,
    price decimal(6,2)
);
INSERT INTO catalunapizz.pizza (title, ingredients, price) VALUES ('Margarita', 'tomate, jambon, gruyère', 9.00);
INSERT INTO catalunapizz.pizza (title, ingredients, price) VALUES ('Trois fromages', 'gruyère, bleu, mozza', 10.00);