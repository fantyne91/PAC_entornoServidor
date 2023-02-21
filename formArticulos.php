<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo.css" >
	<title>Formulario de arti�culos</title>
</head>
<body>
    <header>
    </header>
    <div class="lista">
	<?php 
    //todo logica anidacion archivos?
		include "funciones.php";	
        
     
  
              if (!isset($_COOKIE['datos']) or ($_COOKIE['datos']  != "autorizado")){
                echo "No tienes permisos";
                //SI ACCEDES DESDE EDITAR /BORRAR/ POR DEFECTO
            }else{
                if(isset($_GET["Editar"])){
                    $datosProducto= mysqli_fetch_array(getProducto($_GET["Editar"]));
                }else if (isset($_GET["Borrar"])){
                    $datosProducto=mysqli_fetch_array(getProducto($_GET["Borrar"]));                
                } 
            }
                //todo jquery para reiniciar valores? o como mostrar vacios en anadir sin otra tabla    
                //form desde php np pinta categorias                                                                                                                                              
            ?>
       
            <form action ="formArticulos.php" action="GET">
                <input type="number"  value="<?php echo $datosProducto['ProductID'];?> " disabled>
                <input type="hidden" name="id" value="<?php echo $datosProducto['ProductID'];?>">
                <p><label> Nombre: </label> 
                    <input type="text" name= "nombre" value = "<?php echo $datosProducto['Name']; ?>"></p>
                <p><label> Coste: </label> 
                    <input type="number" name="coste" value="<?php echo $datosProducto['Cost']; ?>"></p>
                 <p><label> Precio: </label> 
                    <input type="number" name="precio" value="<?php echo $datosProducto['Price']; ?>"></p>
                  <p><label> Categoría: </label> 
                      <select name="Categoria">
                          <?php pintaCategorias($datosProducto['CategoryID']);?> </select></p>
                  
                  <?php
                  //anexo form dependiendo boton
                  if (isset($_GET['Editar'])){
                      echo "<input type='submit' name='Accion' value= 'Editar'>";

                  } else if(isset($_GET['Borrar'])){ 
                      echo "<input type ='submit' name='Accion' value='Borrar'>";
                  }
                //  } else if (isset($_GET['anadir'])){                     
                //        echo "<input type='submit' name='Accion' value='Añadir'>";             
                          
                //   }
                  ?> </form>
                  
                  <?php 
                  
                  
                  if (isset ($_GET["Accion"])){
                  
                      switch ($_GET["Accion"]){
                          case 'Editar':
                              if(editarProducto($_GET["id"], $_GET["nombre"],$_GET["coste"], $_GET["precio"],$_GET["Categoria"])){
                                echo "<p class='green'>Se ha modificado. </p><br> <a href='articulos.php'> Vuelve<a>"; 
                               
                              }else{
                                  echo " No se ha modificado";
                              }
                              break;
                            case 'Borrar':
                                if(borrarProducto($_GET["id"])){
                                    echo "Se ha borrado. <br> <a href='articulos.php'> Vuelve<a>";
                                                                
                                }else{
                                    echo "No se ha borrado";
                                }
                              break;
                            // case 'Añadir':
                            //     //todo warning Name,y si uso plantilla categorias no puedo añadir más(hacer desde articulos otra tabla?)
                            //     if(anadirProducto($_GET["nombre"],$_GET["coste"],$_GET["precio"])){
                            //         echo "<p class='green'> Se ha añadido ".$_GET['nombre']." </p>";
                                                                
                            //        }else{
                            //         echo "No se ha añadido";
                            //        }   
                               
                            //     break;
                      }
                  }                
                  //todo commit changes     
 ?>          
 </div>         
</body>
</html>