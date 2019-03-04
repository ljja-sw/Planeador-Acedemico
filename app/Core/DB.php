<?php
class DB {

  private static function con() {

    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }

  public static function query($query, $params = array()) {
    $stmt = self::con()->prepare($query);
    $stmt->execute($params);
    return $stmt;
  }

  public static function single($stmt){
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function resultSet($stmt){
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
