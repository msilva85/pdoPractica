<?php
  require_once 'Cliente.php';
  //instancia de clase Cliente
  $cliente = new Cliente();
  $resultado = $cliente ->listar();
 
  $msg = '';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['rut'])){
      $rut = $_POST['rut'];
      $nombre = $_POST['nombre'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $msg = $cliente->agregar($rut, $nombre, $direccion, $telefono);
    }else{
      $msg = 'Debe Ingresar el valor de ID';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head><meta charset="utf-8"></head>
  <body>
   <h3>Ingresar Un nuevo Cliente</h3>
   <form action="#" method="post">
     <label for="rut">RUT: </label>
     <input type="text" id="rut" name="rut"><br>
     <label for="nombre">Nombre: </label>
     <input type="text" id="nombre" name="nombre"><br>
     <label for="direccion">Dirección: </label>
     <input type="text" id="direccion" name="direccion"><br>
     <label for="telefono">Teléfono: </label>
     <input type="text" id="telefono" name="telefono"><br><br>
     <input type="submit" value="Enviar"><br>
   </form>
   <h4><?= $msg ?></h4>
   <hr>
   <h3>Lista de Clientes</h3>
   <table border='1'>
     <thead>
       <tr>
         <th>Rut</th>
	 <th>Nombre</th>
	 <th>Dirección</th>
	 <th>Teléfono</th>
       </tr>
     <thead>
     <tbody>
       <?php 
	    if(isset($resultado)):
	       foreach($resultado as $cl): ?>
       <tr>
	 <td><?= $cl->rut ?></td>
	 <td><?= $cl->nombre ?></td>
	 <td><?= $cl->direccion ?></td>
	 <td><?= $cl->telefono ?></td>
       </tr>
       <?php endforeach; endif;?>
     </tbody>
   </table>
  </body>
</html>
