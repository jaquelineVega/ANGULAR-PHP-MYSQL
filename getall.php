<?php

require("./conexion.php");
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM productos ORDER BY Id_Productos";
        $statement = $db->prepare($query);
        $statement->execute();
        $vec=[];
        while($row = $statement->fetch()) {
            $vec[]=$row;
        }
    $cad = json_encode($vec);
    echo $cad;