<?php
  require_once 'db.config.php';
  
class Conexion{

  
  private static $instancia = null;
  

  private function __construct(){
    try{
		$dsn = sprintf('%s:charset=UTF8;host=%s;dbname=%s', DB_CONFIG_FILE['driver'], DB_CONFIG_FILE['host'], DB_CONFIG_FILE['dbname']);
      self::$instancia = new PDO($dsn, DB_CONFIG_FILE['user'], DB_CONFIG_FILE['password']);
	  self::$instancia->setAttribute(DB_CONFIG_FILE['errmode'], DB_CONFIG_FILE['errexcep']);
    }catch(PDOException $e){
      echo 'No se ha podido establecer conexión con el servidor de bases de datos. ';
      die("Error: " . $e->getMessage());
    }
  }

  public static function getInstancia(){
    if(!self::$instancia){
      new self();
    }
    return self::$instancia;
  }

  public static function cerrar(){
    self::$instancia = null;
  }
}

?>
