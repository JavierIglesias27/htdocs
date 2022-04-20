<!DOCTYPE html>
<html lang="es">
    <head> 
       
        <meta charset="UTF-8">
        <title>Save php</title>
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

        <div class="main varmenu1">
    
            <div class=" varcen1   texto texto1">
                <p class="<?php if(!$save1){echo 'red';} else {echo 'green';} ?>">Nombre: <?php echo $name; ?></p>  
                <?php
                if(strlen($_POST['fname'])<=2) {
                                    echo "minimo 2 caracteres";        
                            }
                ?>
            </div>
            <div class=" varcen1  texto texto1 ">
                <p class="<?php if(!$save2){echo 'red';} else {echo 'green';} ?>"  >Mail: <?php echo $email; ?></p> 
                <?php
               
               if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
               {
                   echo "Error al introducir mail" ;
               }
                ?>

            </div>
            <div class=" varcen1   texto texto1 ">
                <p class="<?php if(!$save3){echo 'red';} else {echo 'green';} ?>" >Password: <?php echo $password; ?></p>
            </div>
        </div>

       <div class="  main varmenu2 ">
            <div class="varcen2 texto1">
                    
                <?php
                            if($save1&$save2&$save3)  {
                        
                                    $usuarios = new SimpleXMLElement('db.xml', 0, true);
                                    $nuevoUsuario = $usuarios->addChild('user');
                                    $nuevoUsuario->addChild('name', $name); 
                                    $nuevoUsuario->addChild('email', $email);
                                    $nuevoUsuario->addChild('password', $password);
                                    $nuevoUsuario->addChild('time', time());
                                    $usuarios->saveXML('db.xml');
                                    unset($_POST['fname']);
                                    unset($_POST['email']);
                                    unset($_POST['password']);
                                    //header("location:".$_SERVER['PHP_SELF']);   
                                    echo '<form method="POST" action=".\tabla.php">
                                    <div id="btn1">
                                    <input type="submit" Value="Enviar a"  >
                                    </div>
                                    </form>';

                                    echo 'Guardando datos...' ;'<input type="summit">';
                                    }
                            else {
                                    echo '<form method="POST" action=".\index.php">
                                    <div ="btn2">
                                    <input type="submit" value="Enviar a" >
                                    </div>
                                    <input type="hidden" name="fname" value="'.$name.'" >
                                    <input type="hidden" name="email" value="'.$email.'" >
                                    <input type="hidden" name="password" value="'.$password.'" >
                                    </form> ';

                                    echo 'Volviendo al inicio...' ;'<input type="summit">';
                            }                             
                    ?>    
                </div>   
         </div>           
    </body>
</html>
