CREATE TABLE users (
    id INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(256) NOT NULL,
    admin BOOLEAN NOT NULL,
    email VARCHAR(256) NOT NULL UNIQUE,
    datecreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE images (
    image_id INT AUTO_INCREMENT,
    user_id INT NOT NULL,
    filepath VARCHAR(256) NOT NULL,
    PRIMARY KEY(image_id)
);

INSERT INTO images(user_id, filepath) VALUES ((SELECT users.id FROM users WHERE users.username LIKE 'tylermathern'), 'filepath/second/try')

SELECT images.filepath FROM images JOIN users ON users.id = images.user_id WHERE users.username LIKE 'tylermathern'

DELETE FROM images WHERE images.user_id LIKE (SELECT users.id FROM users WHERE users.username LIKE 'realbob')


  private $host = "db777182820.hosting-data.io";
  private $db = "db777182820";
  private $user = "dbo777182820";
  private $pass = "Ty300189!";