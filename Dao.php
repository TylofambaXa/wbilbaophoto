<?php
class Dao {
  private $host = "localhost";
  private $db = "local";
  private $user = "root";
  private $pass = "mypassword";
  
  public function getConnection () {
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      echo print_r($e,1);
      exit;
    }
    return $conn;
  }

  public function removeUser ($uname) {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "delete from users where username like :usrname";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":usrname", $uname);
    $q->execute();
  }

  public function removeFolder ($uname) {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "DELETE FROM images WHERE images.user_id LIKE (SELECT users.id FROM users WHERE users.username LIKE :usrname)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":usrname", $uname);
    $q->execute();
  }

  public function getUser ($userName) {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "select * from users where username like :usrname";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":usrname", $userName);
    $q->execute();
    $user = $q->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function getAllUsers () {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "select * from users where admin like 0";
    $q = $conn->prepare($saveQuery);
    $q->execute();
    $AllUsers = $q->fetchAll();
    return $AllUsers;
  }

  public function getImages ($userName) {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "SELECT images.filepath FROM images JOIN users ON users.id = images.user_id WHERE users.username LIKE :usrname";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":usrname", $userName);
    $q->execute();
    $all_images = $q->fetchAll();
    return $all_images;
  }

  public function getUserEmail ($email) {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "select * from users where email like :email";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":email", $email);
    $q->execute();
    $user = $q->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function newUser ($username, $password, $email) {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "insert into users (username, password, email) values (:usrname, :pswrd, :email)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":usrname", $username);
    $q->bindParam(":pswrd", $password);
    $q->bindParam(":email", $email);
    $q->execute();
  }

  public function addPhoto ($username, $filepath) {
    $conn = $this->getConnection();
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $saveQuery = "INSERT INTO images(user_id, filepath) VALUES ((SELECT users.id FROM users WHERE users.username LIKE :usrname), :filepth)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":usrname", $username);
    $q->bindParam(":filepth", $filepath);
    $q->execute();
  }
}