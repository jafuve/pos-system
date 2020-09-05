<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
    /*=============================================
	EDITAR USUARIOS
    =============================================*/
    public $idUsuario;

    public function ajaxEditarUsuario(){
        $item = 'id';
        $valor = $this->idUsuario;
        
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }//END ajaxEditarUsuario

    /*=============================================
	ACTIVAR USUARIO
    =============================================*/
    public $activarId;
    public $activarUsuario;

    public function ajaxActivarUsuario(){
        $tabla = 'usuarios';
        $item1 = 'estado'; $valor1 = $this->activarUsuario;
        $item2 = 'id'; $valor2 = $this->activarId;
        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
        echo $respuesta;
    }//END FUNCTION

    /*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

    public function ajaxValidarUsuario(){
		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
		echo json_encode($respuesta);

	}

}//end class

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> ajaxActivarUsuario();
    // echo 'isset ' . $_POST["activarId"];

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}
