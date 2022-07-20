<<?php
require_once("modelo/index.php");
class modeloController{
	private $model;
	function __construct(){
        $this->model=new Modelo();
    }
    // MOSTRAR
    static function index(){
    	$producto 	=	new Modelo();
		$dato=$producto->mostrar("user","1");
		require_once("vista/index.php");
    }

    // INSERTAR
    static function nuevo(){
    	require_once("vista/nuevo.php");	    	    	
    }
    static function guardar(){
    	$nombre 	=	$_REQUEST['firstname'];
    	$apellido 	=	$_REQUEST['lastname'];
        $telefono 	=	$_REQUEST['phonenumber'];
        $nacimiento =	$_REQUEST['birthdate'];
        $correo 	=	$_REQUEST['email'];
        $data       =   "'".$nombre."','".$apellido."'".$telefono."'".$nacimiento."'".$correo."'";
    	$producto 	=	new Modelo();
		$dato 		=	$producto->insertar("user",$data);
		header("location:".urlsite);
    }


    // ACTUALIZAR

    static function editar(){
    	$id=$_REQUEST['id'];
    	$producto 	=	new Modelo();
    	$dato=$producto->mostrar("user","id=".$id);    	
    	require_once("vista/editar.php");
    }
    static function update(){
    	$id 		= 	$_REQUEST['id'];
    	$nombre 	=	$_REQUEST['nombre'];
    	$precio 	=	$_REQUEST['precio'];
        $data       =   "nombre='".$nombre."', precio=".$precio;
        $condicion  =   "id=".$id;
    	$producto 	=	new Modelo();
		$dato 		=	$producto->actualizar("user",$data,$condicion);
        header("location:".urlsite);
	}

    // ELIMINAR

	static function eliminar(){		
		$id 		= 	$_REQUEST['id'];    	
        $condicion  =   "id=".$id;
    	$producto 	=	new Modelo();        
		$dato 		=	$producto->eliminar("productos",$condicion);
		header("location:".urlsite);
	}
}
/*use controllers;
use views;

class UsuariosController extends Controller{

    public function loginAction (){
        //objeto generico que procesa toda las salidas a la pantalla
        //recibe el  nombre de vista
        $objView = new Viem("Usuarios");

        //metodo para pasar un modelo a la vista
        $objView->assignModel("Usuarios");

        //metodo para enviar a pantalla el resultado de una vista
        $objView->display();
    }
}*/