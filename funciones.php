<?php 

	include "consultas.php";


	function pintaCategorias($defecto) {
	
            $categorias = getCategorias();
            while ($fila = mysqli_fetch_assoc($categorias)){
                if ($fila["CategoryID"]== $defecto ){
                    echo "<option value =".$fila["CategoryID"]. ">" .$fila["Name"]."</option>";
                    
                }else{
                    echo "<option value = ".$fila["CategoryID"] . ">" . $fila["Name"]. "</option>";
                }
                
            }
	}
	

	function pintaTablaUsuarios(){
		// Completar...	
            $listaUsuarios= getListaUsuarios();
            
            echo "<table> \n
            <tr> \n
            <th>Nombre </th> \n
            <th> Email</th>  \n
            <th> Autorizado</th> \n </tr>  \n";
            
            while ($fila = mysqli_fetch_assoc($listaUsuarios)){
                echo " <tr> \n
            <td>" . $fila['FullName'] . " </td> \n
            <td>" .$fila['Email'] .  "</td>  \n";
                
            if ($fila["Enabled"] ==1){
                echo "<td class= 'green'>" . $fila['Enabled']. "</td>\n";
            }else {
                echo "<td>" . $fila['Enabled'] . "</td>\n";
            }
            }
            
	}
	//muetra productos por ID x defecto
	function pintaProductos($orden) {
		// todo como a traves link?? se va al 97 en bd con AI, y no se visualiza
            $productos = getProductos($orden);
            
            echo  "<table> \n
            <tr> \n
            <th> <a href='articulos.php?orden=ProductID'>ID    </a></th> \n
            <th> <a href='articulos.php?orden=Name'>   Nombre </a></th>  \n
            <th> <a href='articulos.php?orden=Cost'>Coste </a></th> \n 
            <th> <a href='articulos.php?orden=Price'>  Precio </a></th>  \n
            <th> <a href='articulos.php?orden=Categoria'>Categoria </a></th> \n
            <th> Acciones</th>
</tr>  \n";
            while ($fila = mysqli_fetch_assoc($productos)){
                echo "<tr> \n
            <td> " . $fila['ProductID'] . " </td> \n
            <td> " . $fila['Name'] . " </td> \n
            <td> " . $fila['Cost'] . " </td> \n
            <td> " . $fila['Price'] . " </td> \n
            <td> " . $fila['Categoria'] ." </td> \n";    
                //todo trasladar id datosProducto formarticulos?
    if(getPermisos()==1) {
        echo "<td> <a class='boton' href='formArticulos.php?Editar=" . $fila['ProductID'] . "'>Editar </a> "
                . "- <a class='boton' href='formArticulos.php?Borrar=". $fila['ProductID'] . "'> Borrar </a>
                </td> \n ";
              
    }
    }
 echo "</table>";
    }
            
            
      function pintaAnadir(){
        echo " <form action ='articulos.php' action='GET'>
               <label> ID: <input type='number'  value='' disabled></label>
                <input type='hidden' name='id' value=''>
                <p><label> Nombre: </label> 
                    <input type='text' name= 'nombre' value = ''></p>
                <p><label> Coste: </label> 
                    <input type='number' name='coste' value=''></p>
                 <p><label> Precio: </label> 
                    <input type='number' name='precio' value=''></p>
                  <p><label> Categoría: </label> 
                      <input type='text' name='categoria'>
                         
                  
                    <input type='submit' name='Añadir' value='Añadir'></form>";             
                                                    
      }      
	

?>