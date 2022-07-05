<!DOCTYPE html>
<html lang="ca">
    <head> 
       
        <meta charset="UTF-8">
        <title> formulario php</title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
       <style>
    
           
        
       </style>
    </head>
	<body>
    
    <! DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  <!-- aqui la ruta lo coge  directamente desde la carpeta de htdocs sino no funciona-->
    Nombre: <input type="text" name="fname">
    <input type="submit">
</form>
<?php
    if
        ($_SERVER["REQUEST_METHOD"] == "POST") { /* AQUI PONGO POST X QUE LO PRINTEE EN PANTALLA */
        // collect value of input field
        $name = $_POST['fname']; /* ATRAVES DEL METODO POST LEEME EL FNAME-- SE PUEDE CAMBIAR A GET CAMBIANDO */
    if (empty($name)) {
        echo "El nombre está vacío";
        } else {
    echo $name;
    }
    }
?>     
              
	</body>
</html>