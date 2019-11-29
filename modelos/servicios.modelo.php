<?php

require_once "conexion.php";

class ModeloServicios{

    /* ================================
    CREAR SERVICIOS
    =================================*/
    
    
    static public function mdlIngresarServicio($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(servicio, precio) VALUES (:servicio, :precio)");

        $stmt->bindParam(":servicio", $datos['servicio'], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos['precio'], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt ->close();

        $stmt -> null;
    }


    /* ================================
    MOSTRAR SERVICIOS
    =================================*/
    
    static public function mdlMostrarServicios($tabla, $item, $valor){
        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
             
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      
            $stmt -> execute();

            return $stmt -> fetchAll();

        }
    }


    /* ================================
    EDITAR SERVICIOS
    =================================*/
    static public function mdlEditarServicio($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET servicio = :servicio, precio = :precio WHERE id = :id");

        $stmt->bindParam(":servicio", $datos['servicio'], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos['precio'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt ->close();

        $stmt -> null;
    }

    /* ================================
    ELIMINAR SERVICIOS
    =================================*/
    static public function mdlBorrarServicio($tabla, $datos){

        $stmt =  Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt ->close();

        $stmt -> null;

    }
}
