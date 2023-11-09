CREATE DATABASE IF NOT EXISTS bddgarage;

CREATE TABLE garage (
                        id INT PRIMARY KEY NOT NULL,
                        name VARCHAR(35) NOT NULL,
                        address VARCHAR(100) NOT NULL,
                        phone_number INT(10) NOT NULL,
                        opening_time_morning TIME,
                        closing_time_morning TIME,
                        opening_time_evening TIME,
                        closing_time_evening TIME
);

CREATE TABLE gallery (
                         id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                         photo_title VARCHAR(30) NOT NULL,
                         photo VARCHAR(30) NOT NULL
);

CREATE TABLE services (
                          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          title CHAR(30) NOT NULL,
                          category CHAR(30) NOT NULL,
                          price FLOAT NOT NULL
);

CREATE TABLE usedcars (
                          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          title VARCHAR(45) NOT NULL,
                          description VARCHAR(45) NOT NULL,
                          year YEAR NOT NULL,
                          kilometers INT(6) NOT NULL,
                          price FLOAT NOT NULL,
                          option1 VARCHAR(45),
                          option2 VARCHAR(45),
                          option3 VARCHAR(45),
                          option4 VARCHAR(45),
                          main_photo VARCHAR(45),
    /* usedcars page connects with gallery */
                          connects INT NOT NULL,
                          FOREIGN KEY (connects) REFERENCES gallery(id)
);

CREATE TABLE user (
                      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      email VARCHAR(45) NOT NULL,
                      name CHAR(30) NOT NULL,
                      password BINARY(50) NOT NULL,
                      is_admin BOOLEAN NOT NULL,
    /* garage possesses users One-to-Many */
                      possesses INT NOT NULL,
                      FOREIGN KEY(possesses) REFERENCES garage(id),
    /* gallery is_modified_by user One-to-Many */
                      is_modified_by INT NOT NULL,
                      FOREIGN KEY(is_modified_by) REFERENCES gallery(id)
);

/*associative table between user and services */
CREATE TABLE changes_to_services (
                                     user_id INT NOT NULL,
                                     services_id INT NOT NULL,
                                     PRIMARY KEY (user_id, services_id),
                                     FOREIGN KEY (user_id) REFERENCES user(id),
                                     FOREIGN KEY (services_id) REFERENCES services(id)
);

/*associative table between user and usedcars */
CREATE TABLE changes_to_usedcars (
                                     user_id INT NOT NULL,
                                     usedcars_id INT NOT NULL,
                                     PRIMARY KEY (user_id, usedcars_id),
                                     FOREIGN KEY (user_id) REFERENCES user(id),
                                     FOREIGN KEY (usedcars_id) REFERENCES usedcars(id)
);

CREATE TABLE comments (
                          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          name CHAR(30) NOT NULL,
                          message VARCHAR(150),
                          mark INT(1),
    /* user moderates comments. One user can moderate multiple comments. Multiple users cannot moderate the same comment. One-to-Many */
                          moderates INT NOT NULL,
                          FOREIGN KEY(moderates) REFERENCES user(id)
);
CREATE TABLE form (
                          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          firstname CHAR(30) NOT NULL,
                          lastname CHAR(30) NOT NULL,
                          email VARCHAR(40) NOT NULL,
                          telephone INT(10) NOT NULL,
                          subject CHAR(30) NOT NULL,
                          message VARCHAR(150) NOT NULL,
    /* user receives form messages. */
                          receives INT NOT NULL,
                          FOREIGN KEY(receives) REFERENCES user(id)
);

/* TABLE garage */
INSERT INTO garage (id, name, address, phone_number, opening_time_morning, closing_time_morning, opening_time_evening, closing_time_evening)
VALUES (648646, 'Garage Vincent Parrot', '125 Rue des Lilas 32560 Maville', 0523824591, 8.45, 12.00, 14.00, 18.00);

/* TABLE gallery */
INSERT INTO gallery (id, photo_title, photo)
VALUES (6483, 'Citroen C3 II', 'Gallery/C3.jpg');

/* TABLE services */
INSERT INTO services (id, title, category, price)
VALUES (56, 'Vidange', 'Entretien', 70);

/* TABLE usedcars */
INSERT INTO usedcars (id, title, description, year, kilometers, price, option1, option2, option3, option4, main_photo, connects)
VALUES (23, 'Citroën C3 II', 'Superbe C3 Diesel volant à droite à vendre.', 2010, 90000, 10000, 'volant à droite', 'boîte manuelle à gauche', 'rétroviseurs', 'clés de contact', 'C3', 6483);
/* TABLE user */
INSERT INTO user (id, email, name, password, is_admin, possesses, is_modified_by)
VALUES (1, 'admin@admin.com', 'admin1', 'iuhrfiuzogp6269864', true, 648646, 6483);

INSERT INTO user (id, email, name, password, is_admin, possesses, is_modified_by)
VALUES (2, 'employee@employee.com', 'employee1', 'iuhrzuuzpgp6266842', false, 648646, 6483);

/* TABLE comments */
INSERT INTO comments (id, name, message, mark, moderates)
VALUES (654899, 'Patricia', 'Le monsieur avec la moustache était très gentil.', 5, 2);

INSERT INTO comments (id, name, message, mark, moderates)
VALUES (654900, 'Luc', 'Plutôt déçu...', 2, 2);

/* TABLE form */
INSERT INTO form (id, firstname, lastname, email, telephone, subject, message, receives)
VALUES (87951, 'Christine', 'Lachlan', 'clachlan@mail.com', 0782456371, 'Question', 'Bonjour, comment ça va ?', 2);