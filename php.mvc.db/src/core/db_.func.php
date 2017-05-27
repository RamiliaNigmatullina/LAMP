<?php
  class DB {
    public function getConnection() {
      $conn = null;
      $user = "postgres";
      $pass = "postgres";
      $host = "localhost";
      $port = "5432";
      $dbname = "php-mvc-db";
      try {
        $dbinfo = "pgsql:host=$host;port=$port;dbname=$dbname";
        $conn = new PDO($dbinfo,$user,$pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
      return $conn;
    }

    public function getUserFromPgSQL($nick) {
      $db = self::getConnection();
      $stmt = $db->prepare(
        'SELECT nick, password FROM users where nick = :nick',
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
      );
      $stmt->execute(array(':nick' => $nick));
      $user = $stmt->fetch();
      return new User($user['nick'], $user['password']);
    }

    public function signupUserInDB($user) {
      $db = self::getConnection();
      $stmt = $db->prepare(
      'INSERT INTO users (email, password, name, birthday, city, avatar)
      VALUES (:email, :password, :name, :birthday, :city, :avatar)',
      array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stmt->execute(
        array(
          ':email' => $user['email'],
          ':password' => $user['password'],
          ':name' => $user['name'],
          ':birthday' => $user['birthday'],
          ':city' => $user['city'],
          ':avatar' => $user['avatar']
        )
      );
      $stmt->fetch();
    }

    public function loadTable() {
      $db = self::getConnection();
      $stmt = $db->prepare(
      'SELECT id, name FROM post',
      array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
      );
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }
  }
