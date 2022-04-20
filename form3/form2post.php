<!DOCTYPE html>
<html lang="es">
    <head> 
       
        <meta charset="UTF-8">
        <title> formulario php</title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
       <style>
           body{
				background-color:#848484;
			}
			.main{
				background-color: #f2f2f2;
				margin: 5%;
				border-radius: 5px;
			}
			.center{
				margin: auto;
				width:30%;
				padding:10px;
				text-align:center;
			}
			label{
				text-align:left;
				display:block;
			}
			.input_text{
				width:99%;
			}
			
       
       </style>
    
       
    </head>
	<body>
    
    <! DOCTYPE html>
<html>
<body>
<div class="main">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="center" >
					<label for="fname">Name:</label>
					<input type="text" name="fname" placeholder="Your name.." class="input_text">
				</div>
				<div class="center">
					<label for="email">Email:</label>
					<input type="text" name="email" class="input_text">
				</div>
				<div class="center">
					<label for="password">Password:</label>
					<input type="password" name="password" class="input_text">
				</div>
				<div class="center">
					<input type="submit">
				</div>
			</form>
		</div>
<style>
    .asd {
        margin-left:20px;
    }
</style>
<?php
    $name ='el nombre esta vacio';
    $email='el mail esta vacio';
    $password='el password esta vacio';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(! empty($_POST['fname'])){
            $name = $_POST['fname'];
            //echo $name.'<br />' ; /* lo comento para que me imprima en el recuadro */
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(! empty($_POST['email'])){
            $email = $_POST['email'];
            //echo $email.'<br />' ;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(! empty($_POST['password'])){
            $password = $_POST['password'];
            //echo $password.'<br />' ;
        }
    }

    /*
    else{
        $name = $_POST['fname'];
            if (empty($name)) {
                echo "Name is empty";
            } else {
                echo $name;
            }
    } */
    
?>     



<div class="main">
    <div class="asd">
        <p>Nombre: <?php echo $name; ?></p>
    </div>
    <div class="asd">
        <p>Mail <?php echo $email; ?></p>
    </div>
    <div class="asd">
        <p>Password <?php echo $password; ?></p>
    </div>


</div>
    

              
	</body>
</html>