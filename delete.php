<?php

require("./conexion.php");
    $data = json_decode(file_get_contents('php://input'), true);  
       $id = $data['Id_Productos'];
       $conexion = new Conexion();
       $db = $conexion->getConexion();
       $query = "DELETE FROM productos WHERE Id_Productos=:id";
       $statement = $db->prepare($query);
       $statement->bindParam(':id', $id);
       $result = $statement->execute();
       if($result){
         return "removed";
       }
       return "error!";  