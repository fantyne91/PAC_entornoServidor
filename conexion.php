<?php 

	function crearConexion() {
		// Cambiar en el caso en que se monte la base de datos en otro lugar
		$host = "localhost";
		$user = "root";
		$pass = "";
		$baseDatos = "pac3_daw";

		//ESTABLECEMOS CONEXION  Completar...
                $conexion = mysqli_connect($host, $user, $pass, $baseDatos );
                
               // if(!$conexion){
                   // die("<br> Error de conexi�n con base de datos: ". mysqli_connect_error());
               // }else {
                    return $conexion;
               // }
	}


	function cerrarConexion($conexion) {
		// Completar...
                mysqli_close($conexion);
	}


?>