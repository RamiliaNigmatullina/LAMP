<?php
  class DB {
    public function getConnection() {
      $host = "localhost";
      $port = "5432";
      $dbname = "php-mvc-db";
      $pass = "postgres";
      $user = "postgres";

      $conn = null;
      try {
        $dbinfo = "pgsql:host=$host;port=$port;dbname=$dbname";
        $conn = new PDO($dbinfo,$user,$pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
      return $conn;
    }

    public function db_select_all($table, $schema) {
      $rows = [];
      $conn = self::getConnection();

      $fields = implode(", ", $schema);

      $sql = "SELECT ".$fields." FROM ".$table;
      $q   = $conn->query($sql) or die("failed!");

      while($r = $q->fetch(PDO::FETCH_ASSOC)){
        $row = [];
        for ($i = 0; $i < count($schema); $i++) {
          $row[$schema[$i]] = $r[$schema[$i]];
        }
        array_push($rows, $row);
      }
      $conn = null;
      return $rows;
    }

    public function db_find($table, $schema, $needleId) {
      $rows = [];
      $conn = self::getConnection();

      $fields = implode(", ", $schema);

      $sql = "SELECT ".$fields." FROM ".$table."s"." WHERE (id =".$needleId.")";
      $q   = $conn->query($sql) or die("failed!");

      while($r = $q->fetch(PDO::FETCH_ASSOC)){
        for ($i = 0; $i <= count($schema); $i++) {
          $rows[$schema[$i]] = $r[$schema[$i]];
        }

      }
      $conn = null;
      return $rows;
    }

    public function db_find_by($table, $schema, $criteria) {
      $rows = [];
      $conn = self::getConnection();

      $fields = implode(", ", $schema);

      $where = self::generateSearchData($criteria);
      $sql = "SELECT ".$fields." FROM ".$table."s"." WHERE (".$where.")";

      $q  = $conn->query($sql) or die("failed!");

      while($r = $q->fetch(PDO::FETCH_ASSOC)){
        $row = [];
        for ($i = 0; $i < count($schema); $i++) {
          $row[$schema[$i]] = $r[$schema[$i]];
        }
        array_push($rows, $row);
      }

      $conn = null;
      return $rows;
    }


    public function db_add($table, $schema, $data){
      $conn = self::getConnection();

      $fields = implode(", ", $schema);
      $values = self::prepareData($schema, $data);
      var_dump($fields);

      $stmt = $conn->prepare("INSERT INTO ".$table." (".$fields.") VALUES (".$values.")");
      $stmt->execute();
    }

    private function prepareData($schema, $data) {
      $result = "";
      for ($i = 0; $i < count($schema); $i++) {
        $result.="'".$data[$schema[$i]]."'";
        if ($i < count($schema) - 1) {
          $result.=", ";
        }
      }
      return $result;

    }

    private function generateSearchData($criteria) {
      $where = [];

      foreach ($criteria as $key => $value) {
        array_push($where, $key."='".$value."'");
      }
      return implode(" AND ", $where);
    }
  }
