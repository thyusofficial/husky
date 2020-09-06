<?php



abstract class Connection
{

  private static $conn;

  public static function getConn()
  {
    if (self::$conn == null) {
      $dsn = "mysql:dbname=" . 'husky' . ";" . "host=" . 'localhost' . ";" . "charset=" . 'utf8' . ";";
      self::$conn = new PDO($dsn, 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    return self::$conn;
  }
}
