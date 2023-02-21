<?php 

	include "conexion.php";

	function tipoUsuario($nombre, $correo){
		$con = crearConexion();
                
          if (esSuperadmin($nombre , $correo)){
              return "superadmin";

          }else{
              $consulta = "SELECT FullName, Email, Enabled FROM user WHERE Fullname ='$nombre' and Email ='$correo'";
              $resultado= mysqli_query($con , $consulta);
              
              cerrarConexion($con);
              
              if($datos = mysqli_fetch_array($resultado)){
                  if ($datos["Enabled"]== 0){
                      return "registrado";
                      
                  }else if ($datos["Enabled"] ==1){
                      return "autorizado";
                  }
              }else{
                  return "no registrado"; 
              }
          }
            
	}


	function esSuperadmin($nombre, $correo){
		// SI LOS DATOS INTRODUCIDOS COINCIDEN CON RESULTADO SERÁ TRUE
            $con= crearConexion();
            $consulta="SELECT user.UserID FROM  user INNER JOIN setup ON user.UserID = setup.SuperAdmin "
                    . "WHERE user.FullName = '$nombre' and user.Email ='$correo'";
            
            $resultado = mysqli_query($con, $consulta);
            
            if ($datos = mysqli_fetch_array($resultado)){
                return true;
            }else{
                return false;
            }
            
	}


	function getPermisos() {
		$con = crearConexion();
                $consulta= "SELECT * FROM setup";
                $resultado = mysqli_query($con, $consulta);
              $resul= mysqli_fetch_assoc($resultado);
                cerrarConexion($con);
                return $resul["Autenticacion"];
               
	}

 // SI LA FUNCION getPERMISOS ==1( EN BD AUTENTICACION=1) 
	function cambiarPermisos() {
		// Completar...	
            $permisos= getPermisos();
            $con= crearConexion();
            
            if (($permisos==1)){
                $consulta = "UPDATE setup SET Autenticacion = 0";
            }else if(($permisos ==0)){
                    $consulta = "UPDATE setup SET Autenticacion =1";
                }
                $resultado =mysqli_query($con, $consulta);
                cerrarConexion($con);
                    return $resultado;
            }
	


	function getCategorias() {
            $con= crearConexion();
            $consulta= "SELECT CategoryID, Name FROM category";
            $resultado=mysqli_query($con, $consulta);
            cerrarConexion($con);
            return $resultado;
          	
	}


	function getListaUsuarios() {
		$con= crearConexion();
            $consulta= "SELECT FullName, Email, Enabled FROM user";
            $resultado=mysqli_query($con, $consulta);
            cerrarConexion($con);
            return $resultado;
	}


	function getProducto($ID) {
		// Completar...	
            $con= crearConexion();
            $consulta= "SELECT * FROM product WHERE ProductID = $ID";
            $resultado=mysqli_query($con, $consulta);
            cerrarConexion($con);
            return $resultado;
	}


	function getProductos($orden) {
		// Completar...	
            $con= crearConexion();
            $consulta= "SELECT product.ProductID, product.Name, product.Cost, product.Price, category.Name as Categoria FROM product INNER JOIN category
                WHERE product.CategoryID = category.CategoryID ORDER BY $orden";
            
            $resultado=mysqli_query($con, $consulta);
            cerrarConexion($con);
            return $resultado;
	}

//todo añadir categoria nombre
	function anadirProducto($nombre, $coste, $precio) {
            $con= crearConexion();
            $consulta= "INSERT INTO PRODUCT ( Name, Cost, Price)
            VALUES ('$nombre', '$coste', '$precio')";
            $resultado=mysqli_query($con, $consulta);
            cerrarConexion($con);
            return $resultado;
		
	}


	function borrarProducto($id) {
		// Completar...	
            $con= crearConexion();
            $consulta= "DELETE FROM product WHERE ProductID=$id";
            $resultado=mysqli_query($con, $consulta);
            cerrarConexion($con);
            return $resultado;
	}


	function editarProducto($id, $nombre, $coste, $precio, $categoria) {
		// Completar...	
            $con= crearConexion();
            $consulta= "UPDATE product SET Name ='$nombre' , Cost ='$coste', Price='$precio', CategoryID ='$categoria' WHERE ProductID =$id";
            $resultado=mysqli_query($con, $consulta);
            cerrarConexion($con);
            return $resultado;
	}

?>