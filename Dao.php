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
}