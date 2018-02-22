<?php
  require_once 'conexion.php';

class Cliente{
  //private $rut;
  //private $nombre;
  //private $direccion;
  //private $telefono;
  private $conexion;

  public function __construct(){
    $this->conexion = Conexion::getInstancia();
    $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function existe($rut){
    $consulta = $this->conexion->prepare("SELECT count(*) FROM cliente WHERE rut = :rut");
    $consulta->bindParam(':rut', $rut, PDO::PARAM_STR);
    $consulta->execute();

    return $consulta->fetchColumn();
  }

  public function agregar($rut, $nombre, $direccion, $telefono){
  try{
      if($this->existe($rut)){
        return 'El Cliente Existe';
      }else{
        $consulta = $this->conexion->prepare("INSERT INTO cliente (rut, nombre, direccion, telefono) VALUES(:rut, :nombre, :direccion, :telefono)");
        $consulta->bindParam(':rut', $rut, PDO::PARAM_STR);
        $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $consulta->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $consulta->execute();
        return 'El Cliente ha sido agregado';
      }
    }catch(PDOException $e){
      return 'No se pudo agregar el Cliente ' . $e->getMessage();
    }
  }

  public function listar()
  {
    try{
       $consulta = $this->conexion->prepare("SELECT rut, nombre, direccion, telefono FROM cliente");
       $consulta->execute();
       $filas = $consulta->rowCount();
       if($filas > 0){
         return  $consulta->fetchAll(PDO::FETCH_CLASS, 'Cliente');
       }
    }catch(PDOExcetion $e){
      echo 'Error de Conexion', $e->getMessage();
    }

  }

}
