<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Usuarios</title>
</head>
<body>
    <header>
    </header>
    <div class="lista">
	<?php 

		include "funciones.php";
                
                //SI NO NOS HEMOS AUTENTIFICADO(aCCEDIENDO POR RUTA, O NO SOMOS SUPERADMIN NO PODEMOS ACCEDER
     if (!isset($_COOKIE['datos']) or ($_COOKIE['datos'] != "superadmin")) {
                    
            echo "No tienes permiso para estar aqui ";
     }else {
            //TODO al actualizar se activa cambiar permisos js??
            if(isset($_GET['Cambiar'])) {
                cambiarPermisos();
            }              
               pintaTablaUsuarios();

               echo("<form class='permisos' action ='usuarios.php' action='GET'>
               <p><input type ='submit' name='Cambiar' value='Cambiar permisos'> </p>  </form>
               <p>Los permisos actuales son: ") . getPermisos();  
          
               echo (" <div class='permisos'>  
               <p>Si los permisos son 1, las persona Autorizadas podrán modificar y añadir artículos </p>
              </div>");
     }
      //todo no baja 
        ?>
         
    </div>
   
     <div>
       <a href ='index.php'> Volver a inicio </a>
    </div>
  

</body>
</html>