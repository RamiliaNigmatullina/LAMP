<?php
  class DB {
    public function getConnection() {
      $host = "localhost";
      $port = "5432";
      $dbname = "php-exam-db";
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

      $sql = "SELECT ".$fields." FROM ".$table." WHERE (id =".$needleId.")";
      $q   = $conn->query($sql) or die("failed!");

      while($r = $q->fetch(PDO::FETCH_ASSOC)){
        for ($i = 0; $i < count($schema); $i++) {
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

    public function inner_join_query($table1, $table2, $schema1, $schema2) {
      $rows = [];
      $conn = self::getConnection();

      foreach ($schema1 as &$field1) {
        $field1 = $table1.".".$field1;
      }
      unset($field1);

      foreach ($schema2 as &$field2) {
        $field2 = $table2.".".$field2;
      }
      unset($field2);

      $fields1 = implode(", ", $schema1);
      $fields2 = implode(", ", $schema2);

      $sql = "SELECT ".$fields1.", ".$fields2." FROM ".$table1." INNER JOIN ".$table2." ON ".$table1.".".substr_replace($table2, "", -1)."_id = ".$table2.".id";
      $q   = $conn->query($sql) or die("failed!");

      while($r = $q->fetch(PDO::FETCH_ASSOC)) {
        array_push($rows, $r);
      }

      $conn = null;
      return $rows;
    }

    public function inner_join_query_by_id($table1, $table2, $schema1, $schema2, $needleId) {
      $rows = [];
      $conn = self::getConnection();

      foreach ($schema1 as &$field1) {
        $field1 = $table1.".".$field1;
      }
      unset($field1);

      foreach ($schema2 as &$field2) {
        $field2 = $table2.".".$field2;
      }
      unset($field2);

      $fields1 = implode(", ", $schema1);
      $fields2 = implode(", ", $schema2);

      $sql = "SELECT ".$fields1.", ".$fields2." FROM ".$table1." INNER JOIN ".$table2." ON ".$table1.".".substr_replace($table2, "", -1)."_id = ".$table2.".id WHERE (".$table1.".id =".$needleId.")";
      $q   = $conn->query($sql) or die("failed!");
      $conn = null;

      return $q->fetch(PDO::FETCH_ASSOC);
    }
  }
