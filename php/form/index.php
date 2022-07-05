<!DOCTYPE html>
<html lang="es">
    <head> 
       
        <meta charset="UTF-8">
        <title> Index php</title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
        <link rel="stylesheet" href="style.css">
          
    </head>
	<body>

    <?php
            $name ='';
            $email='';
            $password='';
            $save1=false;
            $save2=false;
            $save3=false;
            

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(! empty($_POST['fname'])){
                            $name = $_POST['fname'];
                            $save1=true;
                        }
                    }
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(! empty($_POST['email'])){
                            $email = $_POST['email'];
                            $save2=true;
                        }
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(! empty($_POST['password'])){
                            $password = $_POST['password'];
                            $save3=true;
                        }
                    }
        ?>     
    
        <div class="main">
                <form method="POST" action=".\save.php">
                    <div class="center texto" >
                        <label for="fname">Name:</label>
                        <input type="text" name="fname" placeholder="Insert Name"  class="input_text" value= <?php echo $name;?>>
                    </div>
                    <div class="center texto">
                        <label for="email">Email:</label>
                        <input type="mail" name="email" placeholder="usuario@gmail.com"  class="input_text" value= <?php echo $email;?>>
                    </div>
                    <div class="center texto">
                        <label for="password">Password:</label>
                        <input type="password" name="password"  placeholder="Insert Password"class="input_text" value=<?php echo $password; ?>>
                    </div>
                   <div id="btn" class="center">
                        <input type="submit" value="Enviar a">
                    </div>
                   
                </form>
        </div>      
    </body>
</html>