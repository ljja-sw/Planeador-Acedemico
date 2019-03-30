<?php
class DB {

  private static function con() {

    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS,NULL);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }

  public static function query($query, $params = array()) {
    $stmt = self::con()->prepare($query);
    
    try {      
      $stmt->execute($params);
      return $stmt;

    } catch (PDOException $e) {
      echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } catch (Exception $e) {
      echo "General Error: The user could not be added.<br>".$e->getMessage();
    }

  }

  public static function single($stmt){
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function resultSet($stmt){
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
