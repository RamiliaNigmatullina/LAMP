<?php
  class DB {
    public function db_select_all($table, $schema) {
      $rows = [];
      $handle = fopen(SITE_PATH . '/data/' . $table . '.csv', "r");
      if ($handle) {
        $id = 1;
        while (($line = fgets($handle)) !== false) {
          $line = trim($line);
          if(strlen($line)){
            $row = str_getcsv($line);
            $row = array_combine($schema, $row);
            $row['id'] = $id;
            $rows[$id] = $row;
          }
          $id++;
        }
      } else {
        exit('No such DB:"' . $table . '".');
      }
      fclose($handle);
      return $rows;
    }

    public function db_find($table, $schema, $needleId) {
      $row = NULL;
      $handle = fopen(SITE_PATH . '/data/' . $table . '.csv', "r");
      if ($handle) {
        $id = 1;
        while (($line = fgets($handle)) !== false) {
          if($id === $needleId){
            $line = trim($line);
            if(strlen($line)){
              $row = str_getcsv($line);
              $row = array_combine($schema, $row);
              $row['id'] = $id;
            }
            break;
          }
          $id++;
        }
      } else {
        exit('No such DB:"' . $table . '".');
      }
      fclose($handle);
      return $row;
    }

    public function db_find_by($table, $schema, $criteria) {
      $row = NULL;

      $handle = fopen(SITE_PATH . '/data/' . $table . '.csv', "r");
      if ($handle) {
        $id = 1;
        while (($line = fgets($handle)) !== false) {
          $line = trim($line);
          if(strlen($line)){
            $row = str_getcsv($line);
            $row = array_combine($schema, $row);// Can trigger an error
            $row['id'] = $id;
            $found = true;
            foreach($criteria as $cName => $cValue){
              if($row[$cName] !== $cValue){
                $found = false;
              }
            }
            if($found){
              break;
            }
            else{
              $row = NULL;
            }
          }
          $id++;
        }
      } else {
        exit('No such DB:"' . $table . '".');
      }
      fclose($handle);
      return $row;
    }


    public function db_add($table, $schema, $data){
      // var_dump(SITE_PATH . '/data/' . $table . '.csv');
      $handle = fopen(SITE_PATH . '/data/' . $table . '.csv', "a+");
      if ($handle) {
        $dataToWrite = [];
        foreach ($schema as $field){
          if(isset($data[$field])){
            $dataToWrite[$field] = $data[$field];
          }
          else{
            $dataToWrite[$field] = '';
          }
        }
        fputcsv($handle, $dataToWrite);
      }
      fclose($handle);
    }
  }
