<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo.css" >
	<title>Articulos</title>
</head>
<body>

	<?php 

		include "funciones.php";
	?>  
    <header>
    </header>

    <div class="lista">
	<h1>Lista de artículos</h1>
<?php
        
        if (!isset($_COOKIE['datos'])or ($_COOKIE['datos'] != "autorizado")){
            echo " No tienes permisos ";
            
        }else{
                
          if (getPermisos()==1){
                  //echo "<a href='formArticulos.php?anadir' name='Accion'> Añadir Producto</a><br>";
                echo "<a class='boton' href='articulos.php?anadir' name='Accion'> Añadir Producto</a><br>";

                if (isset($_GET['anadir'])){                 
                  
                    pintaAnadir();          
                   
                }
                if(isset($_GET['Añadir'])){
                    if(anadirProducto($_GET["nombre"],$_GET["coste"],$_GET["precio"])){
                    echo "<p class='green'> Se ha añadido ".$_GET['nombre']." </p>";
                                                
                   }else{
                    echo "No se ha añadido";
                   }   
                 }

               if(!isset($_GET["orden"])){
                   $orden="ProductID";
               }else{
                $orden=$_GET["orden"];
               }
            
            
        pintaProductos($orden);
        //todo logica diferente tabla añadir      
              
        
        }
      }
        ?>
        <a href="index.php" > Volver a inicio </a>
    </div>
</body>
</html>