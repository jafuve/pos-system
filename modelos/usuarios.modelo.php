<?php

require_once "conexion.php";

class ModeloUsuarios{

    /***** MOSTRAR USUARIOS  *****/
    static public function mdlMostrarUsuarios($tabla, $item, $valor){
        
        if($item != null){//RETURN 1 USER
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }else{//RETURN ALL USERS
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;
    }//END FUNCTION

    /*=============================================
	REGISTRO DE USUARIO
    =============================================*/
    
    static public function mdlIngresarUsuario($tabla, $datos){

        // return "error: " . print_r($datos);

        $link = Conexion::conectar();
        $stmt =$link->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) 
        VALUES(:nombre, :usuario, :password, :perfil, :foto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        

        if($stmt->execute()){
            $res = [ 'res' => TRUE];
            return  $res;
        }
        else{
            $err = $stmt->errorInfo();
            $res = [ 'res' => FALSE, 'err' => $err[0] . " - " . $err[1] . " - " . $err[2]];
            return $res;
        }

        $stmt->close();
        $stmt=null;

    }//END FUNCTION

    /*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
        
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if($stmt->execute()){
            $res = [ 'res' => TRUE];
            return  $res;
        }
        else{
            $err = $stmt->errorInfo();
            $res = [ 'res' => FALSE, 'err' => $err[0] . " - " . $err[1] . " - " . $err[2]];
            return $res;
        }

		$stmt -> close();
		$stmt = null;
    }
    
    /*=============================================
	ACTUALIZAR USUARIO
    =============================================*/
    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
// return $valor2;
		if($stmt -> execute()){
            return 'ok';
            // return  [ 'res' => TRUE];
		
		}else{
			// $err = $stmt->errorInfo();
            // return [ 'res' => FALSE, 'err' => $err[0] . " - " . $err[1] . " - " . $err[2]];
            return 'error';
		}

		$stmt -> close();

		$stmt = null;

    }
    
    /*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}

		$stmt -> close();

		$stmt = null;


	}

}