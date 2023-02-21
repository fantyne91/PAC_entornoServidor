<!DOCTYPE html>
<html>
<head>
	<meta charset=UTF-8/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo.css" >
	<title>Index.php</title>
</head>
<body>
  

	<?php
	
		include "consultas.php";
        
             
        ?>
        <header>
        </header>

	<!--//CREAMOS FORMULARIO --> 
<div class="container">   

<div class="form">
    <form action= "index.php" method ="POST">
        <input type ="text" name="usuario" placeholder="Usuario"><p>
        <input type ="text" name="correo" placeholder="Correo"></p>
        <p> <input type ="submit" name="Entrar"></p>          
 
    </form>	
   

</div>  

<div class="guia">
    <h1>Como funciona:</h1>
    <p> Podrás acceder como invitado, autorizado o administrador.</p>
    <ul>
        <li>Si accedes como administrador, podras autorizar a los usuarios registrados a modificar o añadir articulos.<br>
            Ejemplo: Jack Blue / jack@blue.com</li><br>
        <li>Si accedes como autorizado podras añadir o modificar articulos si los permisos estan activados <br>
    Ejemplo: Catherine Duck / Catherine@redhat.com </li>
</div>

</div >
<div>
<div id="bienvenida">
<?php
    //A TRAVES DE FORMULARIO POST GUARDAMOS LOS DATOS EN LAS VARIABLES Y LAS USAMOS EN LA FUNCION TIPOUSUARIO
	
		if (isset($_POST['Entrar'])) {
                    $nombre = $_POST['usuario'];
                    $correo= $_POST['correo'];
                    $tipoUsuario = tipoUsuario($nombre, $correo);
                    
                    //UNA VEZ GUARDADO EL VALOR TIPOUSUARIO LO CLASIFICAMOS
                    setcookie("datos", $tipoUsuario, time()+100000);
                    
                    switch ($tipoUsuario){
                        case 'superadmin':
                            echo "Bienvenido $nombre, pulsa <a class='boton' href= 'usuarios.php'> AQUÍ </a> para entrar al panel de Usuarios  ";
                            break;
                        case 'autorizado':
                            echo "Bienvenido $nombre, pulsa <a class='boton'  href= 'articulos.php'> AQUÍ </a> para entrar al panel de Artículos.  ";
                            break;
                        case 'registrado':
                            echo "Bienvenido $nombre,no tienes permisos para continuar. ";
                            break;
                        default:
                            echo "El usuario no está registrado en el sistema.  ";
                            break;                        
                    }
                }                
        ?> 
</div>
<div> </div>
</div>
</body>
</html>